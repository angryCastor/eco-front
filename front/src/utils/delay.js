export default (val, delay = 1000) => new Promise((resolve) => setTimeout(
  () => resolve(val), delay,
));
