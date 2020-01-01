<template>
    <div class="flex flex-col h-screen">
        <app-header/>
        <main class="flex-1">
            <div class="container mx-auto py-4 px-6">
                <router-view/>
            </div>
        </main>
        <app-footer/>
    </div>
</template>

<script>
    import AppHeader from './Header';
    import AppFooter from './Footer';

    export default {
        components : {
            AppHeader,
            AppFooter
        }
    }
</script>
