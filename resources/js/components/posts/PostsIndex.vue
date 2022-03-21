<template>
<!-- Index Post -->
<div class="container max-w-7xl mx-auto mt-8">
  <div class="mb-4">
    <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Post Index</h1>
    <div class="flex justify-end">
      <router-link :to="{ name: 'posts.create' }" tag="button" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">
        Create Post
    </router-link>
</div>
  </div>
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
      <template v-if="posts">
        <table class="min-w-full">
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                ID</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Title</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Content</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Tags</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Created_At</th>
              <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="3">
                Action</th>
            </tr>
          </thead>

          <tbody class="bg-white">
            <template v-for="item in posts" :key="item.id">
                <tr>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                      {{ item.id }}
                    </div>

                  </td>

                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900">
                      {{ item.title }}
                    </div>
                  </td>

                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <p>{{ item.content }}</p>
                  </td>


                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <router-link :to="{name: 'posts.index', query: {tags:tag.name}}"  v-for="tag in item.tags" class="bg-blue-100 inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
                        <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1">
                            {{ tag.name }}
                        </span>
                    </router-link>
                  </td>

                  <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                    <span>{{ item.created_at }}</span>
                  </td>

                  <td v-if="user" class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                    <router-link :to="{ name: 'posts.edit', params: { id: item.id } }"  class="text-indigo-600 hover:text-indigo-900">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </router-link>
                    </td>

                  <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                    <router-link :to="{ name: 'posts.show', params: { id: item.id } }" class="text-gray-600 hover:text-gray-900">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </router-link>

                  </td>

                  <td v-if="user" class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                    <button @click="deletePost(item.id)"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg></button>

                  </td>
                </tr>

            </template>
          </tbody>
        </table>
        </template>
        <div v-else class="flex items-center justify-center  bg-white">
            <p class="text-5xl">Not found</p>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import usePosts from '../../composables/posts'
import useAuth from '../../composables/auth'
import { onMounted, watch } from 'vue';
import { useRouter, useRoute } from 'vue-router';

export default {
    setup() {
        const { posts, getPosts, destroyPost } = usePosts()
        const { user } = useAuth()
        const route = useRoute()

        const deletePost = async (id) => {
            if (!window.confirm('You sure?')) {
                return
            }
            await destroyPost(id)
            await getPosts()
        }
        
        watch (
            () => route.query,
            async () => {
                getPosts()
            }

        )

        onMounted(()=>{
            getPosts()
        })

        return {
            user,
            posts,
            deletePost,
            getPosts,
        }
    }
}
</script>
