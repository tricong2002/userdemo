import { defineStore } from "pinia";
import axios from "axios";

export const addslect = defineStore("addressStore", {
    state: () => ({
        provinces: [],  // Danh sách tỉnh/thành phố
        districts: [],  // Danh sách quận/huyện tương ứng
        wards: [],      // Danh sách phường/xã tương ứng
        selectedProvince: null, // Tỉnh/thành phố được chọn
        selectedDistrict: null  // Quận/huyện được chọn
    }),
    
    actions: {
        // Lấy danh sách tỉnh/thành phố
        async fetchProvinces() {
            try {
                const response = await axios.get("https://provinces.open-api.vn/api/");
                this.provinces = response.data;
              
            } catch (error) {
                console.error("Lỗi khi lấy danh sách tỉnh/thành phố:", error);
            }
        },

        // Lấy danh sách quận/huyện theo tỉnh/thành phố đã chọn
        async fetchDistricts(provinceCode) {
            try {
                const response = await axios.get(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`);
                this.districts = response.data.districts;
                this.wards = []; // Reset danh sách phường/xã khi thay đổi tỉnh/thành phố
                this.selectedDistrict = null; // Reset quận/huyện đã chọn
            } catch (error) {
                console.error("Lỗi khi lấy danh sách quận/huyện:", error);
            }
        },

        // Lấy danh sách phường/xã theo quận/huyện đã chọn
        async fetchWards(districtCode) {
            try {
                const response = await axios.get(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`);
                this.wards = response.data.wards;
            } catch (error) {
                console.error("Lỗi khi lấy danh sách phường/xã:", error);
            }
        }
    }
});
