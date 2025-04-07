import { defineStore } from "pinia";
import axios from "axios";

export const userupdate = defineStore("addressStore", {
  
    
    actions: {
       
     
        async updateuser() {
            try {
                const response = await axios.get(`/api/userprof`);
                this.wards = response.data.wards;
            } catch (error) {
                console.error("Lỗi khi lấy danh sách phường/xã:", error);
            }
        }
    }
});
