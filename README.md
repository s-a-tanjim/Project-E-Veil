# project-eveil
Find full project [here](http://e-veil.web.app/)


## Project setup
```
npm install
```
* Add firebaseConfig.js file in src directory and add the firebase api keys there.
Example:

Filename: src/firebaseConfig.js
File Content:
```
export default{
  apiKey: "#",
  authDomain: "#",
  databaseURL: "#",
  projectId: "#",
  storageBucket: "#",
  messagingSenderId: "#",
  appId: "#"
}
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

## Dependencies
1. vue-router
2. vue-lazyload
3. Vuex
4. axios
3. Bootstrap version: 4.4.1
4. vue-table-dynamic

## Commands
1. npm run serve    =>To compile vue
2. npm run build    =>For final build
3. firebase serve   =>Test in firebase environment
4. firebase deploy  =>Deploy in firestore


## Resources
1. For table: https://vuejsexamples.com/a-vue-component-of-dynamic-table/
