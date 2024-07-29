import { axiosInstance } from '@/services/axios-instance'

const searchPlace = (location) => {
  return axiosInstance.get('/search/places', {
    params: { location }
  })
}

const getPlaceDetails = (id) => {
  return axiosInstance.get(`/places/details/${id}`)
}

const getPlacePhotos = (id, limit) => {
  return axiosInstance.get('/places/photos', {
    params: { id, limit }
  })
}

export { searchPlace, getPlaceDetails, getPlacePhotos }
