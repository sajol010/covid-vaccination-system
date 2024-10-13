<template>
    <div class="container mt-5">
        <h2 class="text-center">Register for Vaccination</h2>
        <form @submit.prevent="register" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" v-model="name" required>
            </div>
            <div class="mb-3">
                <label for="nid" class="form-label">National ID Number</label>
                <input type="text" class="form-control" id="nid" v-model="nid" required>
            </div>
            <div class="mb-3">
                <label for="vaccineCenter" class="form-label">Select Vaccine Center</label>
                <select class="form-select" id="vaccineCenter" v-model="selectedCenter" required>
                    <option value="" disabled selected>Select a center</option>
                    <option v-for="center in vaccineCenters" :key="center.id" :value="center.name">{{ center.name }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            name: '',
            nid: '',
            selectedCenter: '',
            vaccineCenters: [
                { id: 1, name: 'Center 1' },
                { id: 2, name: 'Center 2' },
                { id: 3, name: 'Center 3' },
            ],
        };
    },
    methods: {
        register() {
            // Implement registration logic here
            console.log('Registered:', {
                name: this.name,
                nid: this.nid,
                center: this.selectedCenter,
            });
            // Clear form after submission
            this.name = '';
            this.nid = '';
            this.selectedCenter = '';
        },
    },
};
</script>

<style scoped>
.container {
    max-width: 600px; /* Center the form on the page */
}
</style>
