# eco_imperium

Версия nodeJS - v14.17.3

## Установка пакетов
```
yarn install
```

### Сборка и запуск дев сервера
```
yarn serve
```

### Сборка и минификация для прода
```
yarn build
```


### Запуск из docker hub
```
//загрузка image из docker hub
docker pull angrycastor/eco_imperium:latest
//запуск контейнера на 80 порту
docker run -d -p 80:80 angrycastor/eco_imperium:latest
```
