<template>
  <div ref="mapWrapper" class="map relative h-full w-full">
    <GMapMap
      :center="coords"
      :zoom="zoom"
      :options="mapOptions"
      @mousemove="onMapMouseMoveHandle"
    >
      <GMapMarker
        :key="item.id"
        v-for="(item) in factoriesFiltered"
        :icon="getMarkerIcon(item)"
        :position="{
            lat: item.lat, lng: item.lng
          }"
      />
      <div
        class="gmap-select"
        :style="selectedRectangleStyle"
      ></div>
      <div class="map__filter absolute" style="top: 8px; left: 8px">
        <MapFilter/>
      </div>
    </GMapMap>
    <div
      class="p-card absolute p-3 text-center text-lg"
      style="bottom: 30px; left: 50%; transform: translateX(-50%)">
      Для выделения области,<br>необходимо зажать правую кнопку мыши
    </div>
  </div>
</template>

<script>
import { computed, onMounted, ref } from 'vue';
import useMapSelectArea from '@/services/useMapSelectArea';
import useMapFactoryPopup from '@/services/useMapFactoryPopup';
import useTheme from '@/services/useTheme';
import mapDark from '@/utils/mapDark';
import getIconUrl from '@/utils/getIconUrl';
import MapFilter from '@/components/MapFilter.vue';
import useMapObjects from '@/services/useMapObjects';

export default {
  components: { MapFilter },
  setup() {
    const mapWrapper = ref(null);
    const { isDark } = useTheme();
    const { open, isOpen } = useMapFactoryPopup();
    const { load, factoriesFiltered } = useMapObjects();

    const {
      onMapMouseMoveHandle,
      selectedRectangleStyle,
      isMouseDown,
    } = useMapSelectArea(mapWrapper, isOpen, open);

    const coords = {
      lat: 55.159897,
      lng: 61.402554,
    };
    const zoom = 11;

    const mapOptions = computed(() => ({
      mapTypeId: 'roadmap',
      draggable: !isMouseDown.value,
      styles: isDark.value ? mapDark() : [{
        featureType: 'poi',
        elementType: 'labels',
        stylers: [
          { visibility: 'off' },
        ],
      }],
    }));

    const getMarkerIcon = (item) => ({
      url: getIconUrl(item.type, item),
      scaledSize: { width: 30, height: 30 },
      labelOrigin: { x: -15, y: -15 },
    });

    onMounted(() => load());

    return {
      mapWrapper,
      coords,
      zoom,
      mapOptions,
      onMapMouseMoveHandle,
      isMouseDown,
      selectedRectangleStyle,
      getMarkerIcon,
      factoriesFiltered,
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
