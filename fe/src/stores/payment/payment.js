import { defineStore } from "pinia";
import axios from "axios";
import { useShowtoast } from "../toast/toast";
export const payment = defineStore('paymentvn', {
    actions: {
        async Checkpay(total, token) {
            try {
                const response = await axios.post("/api/total-payment", { total }, {
                    headers: {
                        authorization: `Bearer ${token}`,
                    },
                });

                this.cart = response.data;
                console.log(response.data);
                window.location.href = response.data.payment_url;

            } catch (error) {
                console.error("Lỗi khi gọi API:", error.response?.data || error);
            }
        },


        async toPay(token) {
            try {
              
                const response = await axios.get("/api/check-cart", {
                    headers: {
                        authorization: `Bearer ${token}`,
                    },
                });

                window.location.href = '/payment';

            } catch (error) {
                console.log(error.response.data.message)
                if (error.response.data.message == 'Unauthenticated.') {
                 
                    const toastshow = useShowtoast();
                    toastshow.toast({
                        title: "Thông báo",
                        message: 'vui lòng đăng nhập',
                        type: "error",
                        duration: 2000
                    });
                }
                if (error.response.data.error) {
                    console.log(error.response.data.error)
                    const toastshow = useShowtoast();
                    toastshow.toast({
                        title: "Thông báo",
                        message: error.response.data.error,
                        type: "error",
                        duration: 2000
                    });
                }
                console.error("Lỗi khi gọi API:", error.response?.data || error);
            }
        },
        /*  */

    },
})
