<template>
    <div class="py-8">
        <p>Welcome to the dashboard {{ getUser.email }}</p>
        <br>
        <button @click="logoutUser" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 focus:outline-none text-base" type="button">
            Logout
        </button>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        computed : {
            ...mapGetters(['getUser'])
        },
        methods  : {
            ...mapActions(['clearSession']),
            async logoutUser() {
                await this.clearSession().then(res => {
                    this.$router.push({
                        name : 'login'
                    });
                });
            }
        }
    }
</script>
