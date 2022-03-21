import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const user = ref()

export default function useAuth() {

  const errors = ref()
  const router = useRouter()

  const login = async (data) => {
    try {
      let response = await axios.post('/api/auth/login', data)
      setAuthToken(response.data.token)
      await router.push({name: 'posts.index'})
    } catch (e) {
        errors.value = e.response.data.errors
    }
  }
  const setAuthToken = (newToken) => {
    localStorage.setItem('token', newToken)
  }
  const getAuthToken = () => {
    localStorage.getItem('token');
  }
  
  const getCurrentUser = async () => {
    try {
      let response = await axios.get('api/user')
      user.value = response.data
    } catch (e) {
      console.log(e)
    }
  }
  
  const logout = async () => {
    try {
      let response =await axios.post('api/auth/logout')
      user.value = undefined
      await router.push({name: 'posts.index'})
      console.log(325)
    } catch (e) {
      console.log(e)
    }
  }

  return {
    errors,
    login,
    user,
    getCurrentUser,
    logout,
  }
}
