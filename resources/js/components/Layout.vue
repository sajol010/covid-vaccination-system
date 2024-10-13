<template>
    <div>
        <header class="bg-primary text-white text-center py-4">
            <h1>COVID Vaccine Registration System</h1>
            <nav>
                <router-link to="/home" class="text-white mx-2">Home</router-link>
                <router-link to="/register" class="text-white mx-2">Register</router-link>
                <router-link to="/status" class="text-white mx-2">Check Status</router-link>
            </nav>
        </header>
        
        <main>
            <slot></slot> 
        </main>

        <footer class="bg-light text-center py-3 mt-5">
            <p>&copy; 2024 COVID Vaccine Registration</p>
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
