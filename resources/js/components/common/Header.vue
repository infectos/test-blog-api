<template>
    <div class="header-2">

  <nav class="bg-white py-2 md:py-4">
    <div class="container px-4 mx-auto md:flex md:items-center">

      <div class="flex justify-between items-center">
        <router-link :to="{name: 'posts.index' }" class="font-bold text-xl text-indigo-600">Blog API</router-link>

      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <template v-if="user">
            <span class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300"> Logged as: {{ user.email }}</span>
            <button @click="logout" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">
                Logout
            </button>
        </template>
        <template v-else>
            <router-link :to="{name: 'auth.login'}" class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">Login</router-link>
        </template>
      </div>
    </div>
  </nav>
</div>
</template>

<script>
import useAuth from '../../composables/auth'

export default {
    setup() {
        const { user, logout } = useAuth()

        return {
            user,
            logout
        }
    },
}

</script>
