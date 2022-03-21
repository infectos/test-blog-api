<template>
<div>
  <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

      <div class="mb-4">
        <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Post not found</h1>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import usePosts from '../../composables/posts'
import { onMounted } from 'vue';

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const { post, getPost } = usePosts()
        console.log(props.id)
        return {
            post
        }
    }
}
</script>
