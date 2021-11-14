export default () => [
  {
    field: 'id',
    header: 'Id',
    type: 'common',
    style: 'min-width: 8rem',
    permanentVisibility: true,
    dataType: 'numeric',
  },

  {
    field: 'name',
    header: 'Название',
    type: 'common',
    style: 'min-width: 14rem',
    permanentVisibility: true,
    dataType: 'text',
  },
  {
    field: 'address',
    header: 'Адрес',
    type: 'address',
    style: 'min-width: 14rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'inn',
    header: 'ИНН',
    type: 'common',
    style: 'min-width: 10rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'reasonSearching',
    header: 'Причины поиска',
    type: 'reasons',
    style: 'min-width: 14rem',
    permanentVisibility: true,
    dataType: 'text',
  },
  {
    field: 'isRegistered',
    header: 'Стоит на учете',
    type: 'register',
    style: 'min-width: 14rem',
    permanentVisibility: true,
    dataType: 'boolean',
  },
  {
    field: 'phones',
    header: 'Телефон',
    type: 'common',
    style: 'min-width: 16rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'emails',
    header: 'Email',
    type: 'common',
    style: 'min-width: 20rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'managementName',
    header: 'Руководитель',
    type: 'common',
    style: 'min-width: 14rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'okpo',
    header: 'ОКПО',
    type: 'common',
    style: 'min-width: 10rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'okved',
    header: 'ОКВЭД',
    type: 'common',
    style: 'min-width: 10rem',
    permanentVisibility: false,
    dataType: 'text',
  },
  {
    field: 'okvedDisplay',
    header: 'ОКВЭД Значение',
    type: 'common',
    style: 'min-width: 10rem',
    permanentVisibility: false,
    dataType: 'text',
  },
];
