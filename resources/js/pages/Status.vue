<template>


    <div class="container mt-5">
        <h2 class="text-center">Check Vaccination Status</h2>
        <form @submit.prevent="checkStatus" class="mt-4">
            <div class="mb-3">
                <label for="nidStatus" class="form-label">Enter National ID Number</label>
                <input type="text" class="form-control" id="nidStatus" v-model="nidStatus" required>
            </div>
            <button type="submit" class="btn btn-secondary">Check Status</button>
        </form>
        <div class="mt-3" v-if="statusResult">
            <h5>Status: {{ statusResult }}</h5>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Status',
    data() {
        return {
            nidStatus: '',
            statusResult: null,
        };
    },
    methods: {
        checkStatus() {
            // Implement status check logic here
            // For demonstration, you can simulate results
            if (this.nidStatus === '123456789') {
                this.statusResult = 'Scheduled for vaccination on 2023-10-15.';
            } else {
                this.statusResult = 'Not registered.';
            }
        },
    },
};
</script>
<style scoped>
.container {
    max-width: 600px; /* Center the form on the page */
}
</style>
