<template>
  <div ref="mapWrapper" class="map relative h-full w-full">
    <GMapMap
      :center="coords"
      :zoom="zoom"
      :options="mapOptions"
      @mousemove="onMapMouseMoveHandle"
    >
      <div
        class="gmap-select"
        :style="selectedRectangleStyle"
      ></div>
    </GMapMap>
  </div>
</template>

<script>
import { computed, ref } from 'vue';
import useMapSelectArea from '@/services/useMapSelectArea';
import useMapFactoryPopup from '@/services/useMapFactoryPopup';

export default {
  setup() {
    const mapWrapper = ref(null);
    const { open } = useMapFactoryPopup();

    const {
      onMapMouseMoveHandle,
      selectedRectangleStyle,
      isMouseDown,
    } = useMapSelectArea(mapWrapper, open);

    const coords = {
      lat: 55.159897,
      lng: 61.402554,
    };
    const zoom = 11;

    const mapOptions = computed(() => ({
      draggable: !isMouseDown.value,
    }));

    return {
      mapWrapper,
      coords,
      zoom,
      mapOptions,
      onMapMouseMoveHandle,
      isMouseDown,
      selectedRectangleStyle,
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
    position: absolute;
    border: 3px solid var(--primary-color);
  }

  .gmap-select::after {
    content: '';
    background: var(--primary-color);
    opacity: 0.3;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
  }
}
</style>
