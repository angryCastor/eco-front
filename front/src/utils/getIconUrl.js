export default (type, item) => {
  if (item.isRegistered) {
    return '/svg/factory-success.svg';
  }

  if (item.reasonSearching.length > 0) {
    return '/svg/factory-bad.svg';
  }

  return '/svg/factory-warn.svg';
};
