// resources/js/services/UserService.js

import axios from '../axios'; // Import your Axios instance

class VaccineService {
    async fetchVaccineCenters() {
        try {
            const response = await axios.get('/vaccine-centers');
            return response.data;
        } catch (error) {
            throw error;
        }
    }

    async registerUser(userData) {
        try {
            const response = await axios.post('/vaccines/register', userData);
            return response.data;
        } catch (error) {
            throw error;
        }
    }

    async getStatus(nid) {
        try {
            const response = await axios.get(  `/vaccines/status/${nid}`);
            return response.data;
        } catch (error) {
            throw error;
        }
    }
}

export default new VaccineService();
