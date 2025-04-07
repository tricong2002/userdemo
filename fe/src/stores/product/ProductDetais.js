import { defineStore } from "pinia";
import { useShowtoast } from "@/stores/toast/toast.js";
export const quantityDetails = defineStore('valueAdddl', {

    state: () => ({
        count: 1,
    }),
    actions: {
        upvalue(maxquantity) {
            if (this.count >= maxquantity) {
               
                const toastStore = useShowtoast();
                toastStore.toast({
                    title: "Thông báo",
                    message: ' số lượng tối đa là ' + maxquantity,
                    type: "error",
                    duration: 2000 
                });
            } else {
                this.count++;
                console.log(maxquantity);
            }
        },
        downvalue(minquantity) {
            if (this.count <= minquantity) {
                alert('min 1');
            } else {
                this.count--
            }
        },
        reset() {
            this.count = 1; // Reset về 0 khi đổi sản phẩm
        },
    },
})
