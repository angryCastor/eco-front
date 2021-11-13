import faker from 'faker';
import delay from '@/utils/delay';

export const item = () => ({
  id: faker.datatype.number(),
  factoryId: faker.datatype.number(),
  createdAt: new Date(faker.datatype.datetime()),
  createdUser: `${faker.name.firstName()} ${faker.name.lastName()}`,
  comment: faker.lorem.words(20),
});

export const list = (count) => delay((Array(count ?? 300).fill(0).map(() => item())));

export default {
  list,
  item,
};
