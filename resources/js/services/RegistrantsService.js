// resources/js/services/UserService.js

import axios from '../axios'; // Import your Axios instance

class RegistrantService {
    async fetchRegistrants({limit, page}) {
        try {
            const response = await axios.get(`/registrants?limit=${limit}&page=${page}` );
            return response.data;
        } catch (error) {
            throw error;
        }
    }

    async markAsVaccinated(id){
        try {
            const response = await axios.put(`/registrants/${id}/mark-as-vaccinated`, {} );
            return response.data;
        } catch (error) {
            throw error;
        }
    }
}

export default new RegistrantService();
