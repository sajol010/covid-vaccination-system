<template>
    <h4>User List</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Vaccine Center</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(registrant, index) in registrants" :key="index">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ registrant.name }}</td>
            <td>{{ registrant?.appointment?.vaccine_center?.name }}</td>
            <td>{{ registrant?.appointment?.scheduled_date }}</td>
            <td>{{ registrant?.appointment?.status_str }}</td>
            <td><button :disabled="registrant?.appointment?.status === 1" v-on:click="markAsVaccinated(registrant.id)">Mark as vaccinated</button></td>
        </tr>
        </tbody>
    </table>

    <div class="d-flex align-items-center mt-4">
        <button :disabled="page <= 1" class="btn btn-secondary me-2" v-on:click="changePage(page - 1)">Previous</button>
        <button :disabled="page >= (total / limit)" class="btn btn-primary" v-on:click="changePage(page + 1)">Next</button>
    </div>


</template>

<script>

import RegistrantsService from "../../services/RegistrantsService.js";
export default {
    name: "Dashboard",
    data(){
        return {
            registrants: [],
            limit: 10,
            page: 1,
            total: 0
        }
    },
    async mounted() {
        this.fetch();
    },
    methods:{
        fetch(){
            RegistrantsService.fetchRegistrants({"limit": this.limit, "page": this.page}).then((data)=> {
                this.registrants = data.data.list;
                this.total = data.data.total;
            });
        },
        changePage(page){
            this.page = page;
            this.fetch();
        },
        markAsVaccinated(id){
            RegistrantsService.markAsVaccinated(id).then((data)=> {
                this.fetch()
            });
        }
    }


}
</script>
