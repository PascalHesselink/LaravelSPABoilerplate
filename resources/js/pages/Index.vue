<template>
    <div class="py-8">
        <p>Welcome to the index!</p>
        <div v-if="!getUser" class="mt-4">
            <router-link :to="{ name: 'login' }" tag="button" class="px-4 py-1 text-white tracking-wide focus:outline-none bg-blue-500 hover:bg-blue-600 mr-4">Login</router-link>
            <router-link :to="{ name: 'register' }" tag="button" class="px-4 py-1 text-white tracking-wide focus:outline-none bg-blue-500 hover:bg-blue-600">Register</router-link>
        </div>
    </div>
</template>


<script>
    import {mapGetters} from 'vuex';

    export default {
        computed : {
            ...mapGetters(['getUser'])
        }
    }
</script>
