<template>
  <div class="map-view h-full">
    <Map/>
    <MapFactoryPopup/>
  </div>
</template>

<script>
// @ is an alias to /src
import Map from '@/components/Map.vue';
import MapFactoryPopup from '@/components/MapFactoryPopup.vue';

export default {
  name: 'Home',
  components: {
    MapFactoryPopup,
    Map,
  },
};
</script>
