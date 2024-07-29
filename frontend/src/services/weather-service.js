import { axiosInstance } from '@/services/axios-instance'

const getCurrentWeather = (lat, lon, units = 'metric') => {
  return axiosInstance.get(`/current/weather`, {
    params: { lat, lon, units }
  })
}

const getWeatherForecast = (lat, lon, units = 'metric') => {
  return axiosInstance.get(`/weather/forecast`, {
    params: { lat, lon, units }
  })
}

export { getCurrentWeather, getWeatherForecast }
