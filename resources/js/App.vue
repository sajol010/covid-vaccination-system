<template>
    <div>
        <div class="text-center">
            <h1>Welcome to the COVID Vaccination System</h1>
            <p>Register for vaccination or check your vaccination status.</p>
            <router-link to="/register" class="btn btn-primary me-3">Register for Vaccination</router-link>
            <router-link to="/status" class="btn btn-secondary">Check Status</router-link>
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
    name: 'Layout'
};
</script>

<style scoped>
header {
    position: sticky;
    top: 0;
    z-index: 1000;
}
</style>
