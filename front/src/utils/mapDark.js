export default () => [
  {
    featureType: 'poi',
    elementType: 'labels',
    stylers: [
      { visibility: 'off' },
    ],
  },
  {
    featureType: 'all',
    elementType: 'all',
    stylers: [
      {
        invert_lightness: true,
      },
      {
        saturation: 10,
      },
      {
        lightness: 30,
      },
      {
        gamma: 0.5,
      },
      {
        hue: '#435158',
      },
    ],
  },
];
