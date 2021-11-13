import faker from 'faker';

const valOrUndefined = (val) => (Math.floor(Math.random() * 3) === 0 ? undefined : val);

export const item = () => ({
  id: faker.datatype.number(),
  address: `${faker.address.city()} ${faker.address.streetAddress()} ${faker.address.secondaryAddress()}`,
  name: faker.company.companyName(),
  lat: faker.datatype.float({
    min: 52.067628,
    max: 56.438124,
    precision: 0.000001,
  }),
  lng: faker.datatype.float({
    min: 57.150467,
    max: 64.633653,
    precision: 0.000001,
  }),
  management_name: valOrUndefined(`${faker.name.firstName()} ${faker.name.lastName()}`),
  state_actuality_date: valOrUndefined(new Date(faker.datatype.datetime())),
  state_registration_date: valOrUndefined(new Date(faker.datatype.datetime())),
  inn: faker.datatype.number({ min: 2460000000, max: 2980000000 }).toString(),
  ogrn: faker.datatype.number({ min: 2460000000, max: 2980000000 }).toString(),
  okpo: valOrUndefined(faker.datatype.number({ min: 2460000000, max: 2980000000 }).toString()),
  okato: valOrUndefined(faker.datatype.number({ min: 2460000000, max: 2980000000 }).toString()),
  oktmo: valOrUndefined(faker.datatype.number({ min: 2460000000, max: 2980000000 }).toString()),
  okogu: valOrUndefined(faker.datatype.number({ min: 2460000000, max: 2980000000 }).toString()),
  okfs: valOrUndefined(faker.datatype.number({ min: 1, max: 56 }).toString()),
  okved: valOrUndefined(`${faker.datatype.number({ min: 1, max: 99 })}.${faker.datatype.number({ min: 1, max: 56 })}`),
  phones: valOrUndefined(faker.phone.phoneNumber()),
  emails: valOrUndefined(faker.internet.email()),
});

export const list = (count) => (Array(count ?? 300).fill(0).map(() => item()));

export default {
  list,
  item,
};
