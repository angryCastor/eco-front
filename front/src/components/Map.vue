<template>
  <div class="map relative h-full w-full">
    {{gMapSelectStyle}}
    <GMapMap
      :center="coords"
      :zoom="zoom"
      :options="mapOptions"
      @mousemove="onMapMouseMoveHandle"
      ref="map"
    >
      <div
        class="gmap-select"
        :style="gMapSelectStyle"
      ></div>
    </GMapMap>
  </div>
</template>

<script>
// eslint-disable-next-line object-curly-newline
import { onBeforeUnmount, onMounted, reactive, ref } from 'vue';

export default {
  setup() {
    const map = ref();
    const isMouseDown = ref(false);
    const defaultCoords = {
      lat: 55.159897,
      lng: 61.402554,
    };
    const defaultZoom = 11;
    const mapOptions = {
      draggable: false,
    };
    const gMapSelectStyle = reactive({});
    let mouseCoords = { x: 0, y: 0 };
    let startMouseCoords = null;

    let mousePosition = { x: 0, y: 0 };
    let startMousePosition = null;

    const initCoords = () => defaultCoords;

    const initZoom = () => defaultZoom;

    const coords = ref(initCoords());
    const zoom = ref(initZoom());

    const onMapMouseMoveHandle = (event) => {
      if (!isMouseDown.value) {
        mouseCoords = event.ib;
        mousePosition = event.pixel;
      } else {
        if (startMouseCoords === null && startMousePosition === null) {
          startMouseCoords = mouseCoords;
          startMousePosition = mousePosition;
          gMapSelectStyle.top = `${mousePosition.y}px`;
          // gMapSelectStyle.right = `${mousePosition.x}px`;
        }

        if (mousePosition.x - startMousePosition.x < 0) {
          gMapSelectStyle.right = `${startMousePosition.x}px`;
          delete gMapSelectStyle.left;
          // gMapSelectStyle.transform = 'rotateY(30deg)';
        } else {
          gMapSelectStyle.left = `${startMousePosition.x}px`;
          delete gMapSelectStyle.right;
        }

        mousePosition = event.pixel;
        mouseCoords = event.ib;

        gMapSelectStyle.width = `${Math.abs(
          // eslint-disable-next-line comma-dangle
          mousePosition.x - startMousePosition.x
        )}px`;
        gMapSelectStyle.height = `${
          Math.abs(
            // eslint-disable-next-line comma-dangle
            mousePosition.y - startMousePosition.y
          ) + 18
        }px`;
      }
    };

    onMounted(() => {
      document.onmousedown = () => {
        isMouseDown.value = true;
      };

      document.onmouseup = () => {
        isMouseDown.value = false;

        console.log(
          `SENT TO SERVER: [${startMouseCoords.x}, ${startMouseCoords.y}, ${mouseCoords.x}, ${mouseCoords.y}]`,
        );

        gMapSelectStyle.width = 0;
        gMapSelectStyle.height = 0;
        startMouseCoords = null;
        startMousePosition = null;
      };
    });

    onBeforeUnmount(() => {
      document.onmousedown = () => {};

      document.onmouseup = () => {};
    });

    return {
      map,
      coords,
      zoom,
      mapOptions,
      onMapMouseMoveHandle,
      isMouseDown,
      gMapSelectStyle,
    };
  },
};
</script>

<style lang="scss">
.map {
  .vue-map-container {
    height: 100%;
  }

  .factory-logo-svg {
    fill: var(--primary-color);
  }

  .gmap-select {
    background: blue;
    position: absolute;
  }
}
</style>
