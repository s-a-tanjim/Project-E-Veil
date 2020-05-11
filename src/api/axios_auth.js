import axios from 'axios'

const instance = axios.create({
  baseURL: 'https://cors-anywhere.herokuapp.com/https://identitytoolkit.googleapis.com/v1/accounts:'
})

//instance.defaults.headers.common['S'] = 's'

export default instance