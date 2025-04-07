import { defineStore } from "pinia";
import axios from "axios";
import { useraddres } from "@/stores/address/getuseraddress";
import { useShowtoast } from "../toast/toast";
export const updateaddslect = defineStore("updateaddslectt", {
    actions: {
        async update(id) {
            try {
                const token = localStorage.getItem("token");
                console.log(token);

                // Đặt headers vào phần thứ ba thay vì trong body
                const response = await axios.patch(`/api/addresses/${id}/set-default`, {}, {
                    headers: {
                        authorization: `Bearer ${token}`, // Cách gửi token
                    },
                });
                const userad = useraddres();

                await userad.getselect(token);
              /*   const toastStore = useShowtoast();
                toastStore.toast({
                    title: "Thông báo",
                    message: `${response.data.message}`,
                    type: "success",
                    duration: 2000 // 3 giây
                }); */
                console.log(response.data);
            } catch (error) {
                console.error("Lỗi khi cập nhật địa chỉ:", error); // Thông báo lỗi
            }
        },
    }
});
