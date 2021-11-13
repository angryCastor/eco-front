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
  managementName: {
    operator: FilterOperator.AND,
    constraints: [{
      value: null,
      matchMode: FilterMatchMode.STARTS_WITH,
    }],
  },
  okpo: {
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
