import { defineStore } from "pinia";
import axios from "axios";
import { useShowtoast } from "@/stores/toast/toast.js";

export const getUseradd = defineStore("userAddress", {

    state: () => ({


    }),
    actions: {
        async fetchAdd(provinceCode, districCode, wardCode, id = null) {
            try {
                const province = await axios.get(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`);
                const district = await axios.get(`https://provinces.open-api.vn/api/d/${districCode}?depth=2`);
                const ward = district.data.wards.find(w => w.code == wardCode);
                const fullif = `${province.data.name}, ${district.data.name}, ${ward ? ward.name : ""}`;
                return { fullif: fullif, idpro: id };


            } catch (error) {
                console.error("Lỗi khi gọi API:", error.response?.data || error);
            }
        },


    },
});
