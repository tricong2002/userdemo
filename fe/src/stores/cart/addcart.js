import { defineStore } from "pinia";
import axios from "axios";
import { useShowtoast } from "@/stores/toast/toast.js";

export const cartductGeter = defineStore("cartductGeter", {

    state: () => ({
        cart: {},

    }),
    actions: {
        async fetchCart() {
            try {
                const response = await axios.get("/api/get-cart");
                this.cart = response.data;
                console.log("Fetched cart:", this.cart);
            } catch (error) {
                console.error("Lỗi khi gọi API:", error.response?.data || error);
            }
        },
        async addCartDetail() {
            try {
                const toastStore = useShowtoast();
                toastStore.toast({
                    title: "Thông báo",
                    message: "Đã thêm vào giỏ hàng",
                    type: "success",
                    duration: 2000 // 3 giây
                });

                const id = document.querySelector("#id_product").value;
                const quantity = document.querySelector("#quan_value_details").innerHTML;

                const cartdata = { id, quantity };
                const response = await axios.post("/api/add-to-cart", cartdata);

                this.cart = response.data.cart;


            } catch (error) {
                console.error("Lỗi khi gọi API:", error.response?.data || error);
            }
        },
        async upcart(id, quantity, max) {
            if (quantity < max) {
                try {
                    const response = await axios.post("/api/up-cart", { id });
                    this.cart = response.data.cart;

                } catch (error) {
                    console.error("Lỗi khi gọi API:", error.response?.data || error);
                }
            } else {
                alert('so hang toi da ' + max);
            }

        },
        async downcart(id, quantity) {
            if (quantity > 1) {
                try {
                    const response = await axios.post("/api/down-cart", { id });
                    this.cart = response.data.cart; // Cập nhật giỏ hàng sau khi giảm số lượng

                } catch (error) {
                    console.error("Lỗi khi gọi API:", error.response?.data || error);
                }
            } else {
                alert('so hang toi da 1');
            }

        },


        async deleteCart(id) {
            try {
                const response = await axios.post("/api/delete-cart", { id });
                this.cart = response.data;
                console.log("Fetched cart:", this.cart);
            } catch (error) {
                console.error("Lỗi khi gọi API:", error.response?.data || error);
            }
        },

    },
});
