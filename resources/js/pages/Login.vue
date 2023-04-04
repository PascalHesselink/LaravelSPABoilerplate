<template>
    <div class="py-8">
        <p class="mb-2 text-xl">Login</p>
        <form class="max-w-sm" v-on:submit.prevent="submitForm">
            <div class="mb-4">
                <input v-model="formData.email" autocomplete="false" class="shadow focus:outline-none border w-full py-2 px-4 px-3" type="email" placeholder="Email" :class="{ 'border-red-700': errors && errors.email }">
                <span v-if="errors.email" class="text-red-600 text-sm px-2">{{ errors.email[0] }}</span>
            </div>
            <div class="mb-4">
                <input v-model="formData.password" autocomplete="false" class="shadow focus:outline-none border w-full py-2 px-4 px-3" type="password" placeholder="Password" :class="{ 'border-red-700': errors && errors.password }">
                <span v-if="errors.password" class="text-red-600 text-sm px-2">{{ errors.password[0] }}</span>
            </div>
            <div class="block text-right">
                <button class="bg-blue-500 w-full hover:bg-blue-700 text-white py-2 px-4 focus:outline-none text-base" type="submit">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapMutations} from 'vuex';

    export default {
        data() {
            return {
                formData : {
                    email : '',
                    password : ''
                },
                errors   : {}
            }
        },
        methods : {
            ...mapMutations(['setUser', 'setAccessToken']),
            submitForm() {
                axios.post('api/auth/login', {
                    email     : this.formData.email,
                    password : this.formData.password
                })
                     .then(res => {
                         this.errors      = {};
                         let responseData = res.data;

                         this.setUser(responseData.user);
                         this.setAccessToken(responseData.access_token);

                         this.$router.push({
                             name : 'dashboard'
                         });
                     }).catch(err => {
                        this.errors = {};

                        if (err.response && err.response.status === 422) {
                            this.errors = err.response.data.errors;
                        } else if (err.response && err.response.status === 403) {
                            this.formData.password = '';
                            this.errors.password   = [
                                err.response.data.message
                            ];
                        } else {
                            console.warn(err);
                        }
                    }
                );
            }
        }
    }
</script>
