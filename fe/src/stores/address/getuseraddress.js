import { defineStore } from "pinia";
import axios from "axios";
import { getUseradd } from "@/stores/user/fectuseradd";
export const useraddres = defineStore('useraddreses', {

    state: () => ({
        addresses: [],
        select: {},
        useradd: getUseradd(),

    }),
    actions: {

        /*    lay dia chi duoc chon cua nguoi dung */
        async getselect(token) {

            try {
                const response = await axios.get("api/getselect-user", {
                    headers: {
                        authorization: `Bearer ${token}`,
                    },
                });

                response.data.adselect;

                const provinceCode = response.data.adselect.province;
                const districCode = response.data.adselect.district;
                const wardCode = response.data.adselect.ward;
                this.select = await this.useradd.fetchAdd(
                    provinceCode,
                    districCode,
                    wardCode
                );
                console.log(this.select);
                
            } catch (error) {
                console.error("Lỗi khi gọi API:", error);
            }
        },



        /* lay tat ca dia chi nguoi dung */

        async getadduser(token) {

            try {
                const response = await axios.get("api/getselect-user", {
                    headers: {
                        authorization: `Bearer ${token}`,
                    },
                });

                for (const item of response.data.addresses) {
                    const result = await this.useradd.fetchAdd(
                        item.province,
                        item.district,
                        item.ward,
                        item.id
                    );
                    this.addresses.push(result);

                }
            } catch (error) {
                console.error("Lỗi khi gọi API:", error);
            }
        },


    },
})
