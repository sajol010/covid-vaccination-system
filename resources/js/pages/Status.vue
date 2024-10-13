<template>


    <div class="container mt-5">
        <h2 class="text-center">Check Vaccination Status</h2>
        <form @submit.prevent="checkStatus" class="mt-4">
            <div class="mb-3">
                <label for="nidStatus" class="form-label">Enter National ID Number</label>
                <input type="text" class="form-control" id="nidStatus" v-model="nid" required>
            </div>
            <button type="submit" class="btn btn-secondary">Check Status</button>
        </form>
        <div class="mt-3" v-if="statusResult">
            <h5>Status: {{ statusResult }}</h5>
        </div>
    </div>
</template>

<script>
import UserService from '../services/VaccineService';
export default {
    name: 'Status',
    data() {
        return {
            nid: '',
            statusResult: null,
        };
    },
    methods: {
        async checkStatus() {
            const $this = this;
            let currentStatus = await UserService.getStatus(this.nid).then(function (data){
                if(data.success){
                    $this.statusResult = data.data.status;
                }
            })

           if (currentStatus){
               console.log(currentStatus)
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
