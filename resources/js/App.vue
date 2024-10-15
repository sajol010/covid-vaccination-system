<template>
    <div>
        <div class="text-center">
            <h1>Welcome to the COVID Vaccination System</h1>
            <span v-if="!isAdminPage">
                <p>Register for vaccination or check your vaccination status.</p>
                <router-link to="/register" class="btn btn-primary me-3">Register for Vaccination</router-link>
                <router-link to="/status" class="btn btn-secondary">Check Status</router-link>
            </span>
        </div>


        <!-- Main Content Area -->
        <main>
            <router-view></router-view>
        </main>

        <!-- Footer (Common for all pages) -->
        <footer class="bg-light text-center py-3 mt-5">
            <p>&copy; 2024 COVID Vaccination</p>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'Layout',
    computed: {
        isAdminPage() {
            // Check if the current route path starts with '/admin'
            return this.$route.path.startsWith('/admin');
        }
    }
};
</script>

<style scoped>
header {
    position: sticky;
    top: 0;
    z-index: 1000;
}
</style>
