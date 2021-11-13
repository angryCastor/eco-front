import {
  computed, ref, readonly,
} from 'vue';
import { tryOnBeforeUnmount, tryOnMounted } from '@vueuse/core';

export default (mapWrapper, callback) => {
  const isMouseDown = ref(false);

  const mouseCoords = ref({ lat: 0, lng: 0 });
  const startMouseCoords = ref({ lat: 0, lng: 0 });

  const mousePosition = ref({ x: 0, y: 0 });
  const startMousePosition = ref({ x: 0, y: 0 });

  const selectedRectangleStyle = computed(() => {
    if (!isMouseDown.value) {
      return {};
    }

    const mX = mousePosition.value ? mousePosition.value.x : 0;
    const mY = mousePosition.value ? mousePosition.value.y : 0;

    const sX = startMousePosition.value ? startMousePosition.value.x : 0;
    const sY = startMousePosition.value ? startMousePosition.value.y : 0;

    let top = sY;
    let left = sX;

    if (mY < sY) {
      top = mY;
    }

    if (mX < sX) {
      left = mX;
    }

    return {
      top: `${top}px`,
      left: `${left}px`,
      width: `${Math.abs(mX - sX)}px`,
      height: `${Math.abs(mY - sY)}px`,
    };
  });

  const onMapMouseMoveHandle = (event) => {
    const latLng = {
      lat: event.latLng.lat(),
      lng: event.latLng.lng(),
    };
    mouseCoords.value = latLng;
    mousePosition.value = event.pixel;
    if (!isMouseDown.value) {
      startMouseCoords.value = latLng;
      startMousePosition.value = event.pixel;
    }
  };

  const mouseDownHandler = (event) => {
    event.preventDefault();
    if (event.which === 3) {
      isMouseDown.value = true;
    }
  };

  const mouseUpHandler = () => {
    if (isMouseDown.value) {
      callback({
        start: {
          lat: Math.min(startMouseCoords.value.lat, mouseCoords.value.lat),
          lng: Math.min(startMouseCoords.value.lng, mouseCoords.value.lng),
        },
        end: {
          lat: Math.max(startMouseCoords.value.lat, mouseCoords.value.lat),
          lng: Math.max(startMouseCoords.value.lng, mouseCoords.value.lng),
        },
      });
    }

    isMouseDown.value = false;

    startMousePosition.value = {
      x: mousePosition.value.x,
      y: mousePosition.value.y,
    };

    startMouseCoords.value = {
      lat: mouseCoords.value.lat,
      lng: mouseCoords.value.lng,
    };
  };

  tryOnMounted(() => {
    document.addEventListener('mousedown', mouseDownHandler);
    document.addEventListener('mouseup', mouseUpHandler);
    mapWrapper.value.addEventListener('contextmenu', (e) => e.preventDefault());
  });

  tryOnBeforeUnmount(() => {
    document.removeEventListener('mousedown', mouseDownHandler);
    document.removeEventListener('mouseup', mouseUpHandler);
  });

  return {
    isMouseDown: readonly(isMouseDown),
    selectedRectangleStyle,
    onMapMouseMoveHandle,
  };
};
