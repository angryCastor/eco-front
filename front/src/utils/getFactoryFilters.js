import { FilterMatchMode, FilterOperator } from 'primevue/api';

export default () => ({
  global: {
    value: null,
    matchMode: FilterMatchMode.CONTAINS,
  },
  id: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  name: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  address: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  inn: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  ogrn: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  phones: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  emails: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  management_name: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  state_registration_date: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.DATE_IS,
    }],
  },
  state_actuality_date: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.DATE_IS,
    }],
  },
  okpo: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  okato: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  oktmo: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  okogu: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  okfs: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.EQUALS,
    }],
  },
  okved: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  reasonSearching: {
    operator: FilterOperator.OR,
    constraints: [{ value: null, matchMode: FilterMatchMode.EQUALS }],
  },
});
