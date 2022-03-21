<template>
    <header-component></header-component>
    <div class="container max-w-7xl mx-auto mt-8">
        <router-view></router-view>
    </div>
    
</template>

<script>
import HeaderComponent from './common/Header.vue'
import useAuth from '../composables/auth'
import { onMounted } from 'vue';

export default {
    components: {
        HeaderComponent
    },
    setup() {
        const { getCurrentUser } = useAuth()

        onMounted(()=>{
            getCurrentUser()
        })
    },
}
</script>
