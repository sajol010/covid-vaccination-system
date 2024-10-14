<template>
    <div class="container mt-5">
        <h2 class="text-center">Register for Vaccination</h2>
        <form @submit.prevent="register" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" v-model="form_data.name" required>
                <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
            </div>
            <div class="mb-3">
                <label for="nid" class="form-label">National ID Number</label>
                <input type="text" class="form-control" id="nid" v-model="form_data.nid" required>
                <span v-if="errors.nid" class="text-danger">{{ errors.nid[0] }}</span>
            </div>

            <div class="mb-3">
                <label for="nid" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="nid" v-model="form_data.phone" required>
                <span v-if="errors.phone" class="text-danger">{{ errors.phone[0] }}</span>
            </div>

            <div class="mb-3">
                <label for="vaccineCenter" class="form-label">Select Vaccine Center</label>
                <select class="form-select" id="vaccineCenter" v-model="form_data.vaccine_center_id" required>
                    <option value="" disabled selected>Select a center</option>
                    <option v-for="center in vaccinationCenters" :key="center.id" :value="center.id">{{ center.name }}</option>
                </select>
                <span v-if="errors.vaccine_center_id" class="text-danger">{{ errors.vaccine_center_id[0] }}</span>
            </div>

            <!-- Success and Error Messages -->
            <div v-if="success_msg" class="alert alert-success">
                {{ success_msg }}
            </div>
            <div v-if="error_msg" class="alert alert-danger">
                {{ error_msg }}
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>

<script>
import UserService from '../services/VaccineService';

export default {
    name: 'Register',
    data() {
        return {
            form_data: {
              name: '',
              phone: '',
              vaccine_center_id: '',
            },
            vaccinationCenters: [],
            success_msg: "",
            error_msg: "",
            errors: {}
        };
    },
    mounted() {
        this.getVaccinationCenter();
    },
    methods: {
        async getVaccinationCenter(){
            await UserService.fetchVaccineCenters().then(data => {
                let vaccinationCenters = data.data;

                this.vaccinationCenters = vaccinationCenters.map(center => {
                    return {
                        id: center.id,
                        name: center.name,
                    }
                })
            });
        },
        async register() {
            this.error_msg = '';
            this.success_msg = '';
            await UserService.registerUser(this.form_data).then(data => {
                if (data.success){
                    this.success_msg = data.message;
                    this.form_data.name = '';
                    this.form_data.nid = '';
                    this.form_data.vaccine_center_id = '';
                }
            }).catch(error => {
                this.error_msg = error.response.data.message;
                if (error.response.data.errors){
                    this.errors = error.response.data.errors;
                }
            })
        },
    },
};
</script>

<style scoped>
.container {
    max-width: 600px; /* Center the form on the page */
}

.alert {
    margin-top: 20px;
}
</style>
