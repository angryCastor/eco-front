import faker from 'faker';

function uniq(a) {
  return a.sort().filter((item, pos, ary) => !pos || item !== ary[pos - 1]);
}

// const valOrUndefined = (val) => (Math.floor(Math.random() * 3) === 0 ? undefined : val);

const generateReasonArray = () => {
  const len = Math.floor(Math.random() * 2);
  const items = [];

  // eslint-disable-next-line no-plusplus
  for (let i = 0; i < len; i++) {
    items.push(faker.random.arrayElement(['okved', 'emissions', 'waste', 'metal']));
  }

  return uniq(items);
};

export const item = () => ({
  id: faker.datatype.number(),
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
  isRegistered: faker.datatype.boolean(),
  reasonSearching: generateReasonArray(),
});

export const list = (count) => (Array(count ?? 300).fill(0).map(() => item()));

export default {
  list,
  item,
};
