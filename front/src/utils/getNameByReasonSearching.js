export default (reason) => {
  switch (reason) {
    case 'okved':
      return 'ОКВЭД';
    case 'emissions':
      return 'Лицензия: выбросы';
    case 'waste':
      return 'Лицензия: отходы';
    case 'metal':
      return 'Лицензия: металлы';
    default:
      return null;
  }
};
