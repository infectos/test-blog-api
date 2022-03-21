import { ref } from 'vue'
import axios from 'axios'
import { useRouter, useRoute } from 'vue-router'

export default function usePosts() {
  const post = ref([])
  const posts = ref([])

  const errors = ref('')
  const router = useRouter()
  const route = useRoute() 

  const getPosts = async () => {
    try {
      let response = await axios.get('/api/posts', {params: route.query})
      posts.value = response.data
    } catch (e) {
      if (e.response.status === 404) {
        posts.value = undefined
      }
    }
  }


  const getPost = async (id) => {

    try {
      let response = await axios.get(`/api/posts/${id}`)
      post.value = response.data
    } catch (e) {
      if (e.response.status === 404) {
        await router.push({name: 'posts.notFound'})
      }
    }
  }

  const storePost = async (data) => {
    errors.value = ''
    try {
      await axios.post(`/api/posts`, data)
      await router.push({name: 'posts.index'})
    } catch (e) {
      if (e.response.status === 422) {
        for (const key in e.response.data.errors) {
          errors.value += e.response.data.errors[key][0] + ' ';
        }
      }
    }

  }

  const updatePost = async (id) => {
    errors.value = ''

    try {
      let response = await axios.put(`/api/posts/${id}`, post.value)
      post.value = response.data
      await router.push({name: 'posts.index'})
    } catch (e) {
      for (const key in e.response.data.errors) {
        errors.value += e.response.data.errors[key][0] + ' ';
      }
    }
  }

  const destroyPost = async (id) => {
    await axios.delete(`/api/posts/${id}`)
  }

  return {
    errors,
    post,
    posts,
    getPost,
    getPosts,
    storePost,
    updatePost,
    destroyPost
  }
}
