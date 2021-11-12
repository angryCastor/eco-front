<template>
  <div class="map relative h-full w-full">
    {{newStyles}}
    <GMapMap
      :center="coords"
      :zoom="zoom"
      :options="mapOptions"
        @mousemove="onMapMouseMoveHandle"
      ref="map"
    >
      <div
        class="gmap-select"
        :style="newStyles"
      ></div>
    </GMapMap>
  </div>
</template>

<script>
// eslint-disable-next-line object-curly-newline
import { computed, onBeforeUnmount, onMounted, reactive, ref } from 'vue';

export default {
  setup() {
    const map = ref();
    const isMouseDown = ref(false);
    const coords = {
      lat: 55.159897,
      lng: 61.402554,
    };
    const zoom = 11;

    const mapOptions = {
      draggable: false,
    };
    const gMapSelectStyle = reactive({});
    const mouseCoords = { x: 0, y: 0 };
    // const startMouseCoords = null;

    const mousePosition = ref({ x: 0, y: 0 });
    const startMousePosition = ref({ x: 0, y: 0 });

    const newStyles = computed(() => {
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
      mouseCoords.value = event.ib;
      mousePosition.value = event.pixel;
      if (!isMouseDown.value) {
        // mouseCoords = event.ib;
        startMousePosition.value = event.pixel;
      }
    };

    onMounted(() => {
      document.onmousedown = () => {
        isMouseDown.value = true;
      };

      document.onmouseup = () => {
        isMouseDown.value = false;
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
      newStyles,
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
