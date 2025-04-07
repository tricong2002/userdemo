import { defineStore } from "pinia";
import axios from "axios";
import router from "@/router";
export const productGeter = defineStore("productGeter", {
    state: () => ({
        proget: [],

    }),
    actions: {
        async search() {
            try {
                const textsearch = document.querySelector(".search-input").value;
                const response = await axios.post("/api/search-product", { textsearch });
                // Cập nhật state sau khi nhận dữ liệu
                console.log(this.proget);
                router.push('/categories');
                this.proget = response.data;
                localStorage.setItem('check', 0)

            } catch (error) {
                console.log("Lỗi khi gọi API ", error.response?.data || error);
            }
        },

        async getListcate() {
            try {
                localStorage.setItem('check', 0)
                const response = await axios.get("/api/truong");
                this.proget = response.data; // Cập nhật state sau khi nhận dữ liệu
                /*  localStorage.setItem('checksearch', 0) */
            } catch (error) {
                console.log("Lỗi khi gọi API ", error.response?.data || error);
            }
        },

        async moveSl(id) {
            try {
                localStorage.setItem('check', 0)
                const response = await axios.post("/api/get-catepr", { id });
                this.proget = response.data; // Cập nhật state sau khi nhận dữ liệu
                /*  localStorage.setItem('checksearch', 0) */
            } catch (error) {
                console.log("Lỗi khi gọi API ", error.response?.data || error);
            }
        },

    },
});
