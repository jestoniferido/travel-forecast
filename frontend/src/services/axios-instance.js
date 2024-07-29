import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL,
  headers: {
    Accept: 'application/json'
  }
})

let ongoingRequests = []

axiosInstance.interceptors.request.use(
  (config) => {
    const source = axios.CancelToken.source()
    config.cancelToken = source.token
    ongoingRequests.push({ config, cancel: source.cancel })
    return config
  },
  (error) => {
    return Promise.reject(error)
  }
)

axiosInstance.interceptors.response.use(
  (response) => {
    ongoingRequests = ongoingRequests.filter((req) => req.config !== response.config)
    return response
  },
  (error) => {
    ongoingRequests = ongoingRequests.filter((req) => req.config !== error.config)
    return Promise.reject(error)
  }
)

export { axiosInstance, ongoingRequests }
