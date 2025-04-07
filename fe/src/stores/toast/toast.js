import { defineStore } from "pinia";

export const useShowtoast = defineStore("Showtoast", {
    state: () => ({

    }),
    actions: {
        toast({ title = "", message = "", type = "info", duration = 3000 }) {
            const main = document.getElementById("toastbox");

            if (main) {

                const toast = document.createElement("div");

                // Auto remove toast
                const autoRemoveId = setTimeout(() => {
                    main.removeChild(toast);
                }, duration + 1000);

                // Remove toast when clicked
                toast.onclick = (e) => {
                    if (e.target.closest(".toast__close")) {
                        main.removeChild(toast);
                        clearTimeout(autoRemoveId);
                    }
                };

                const icons = {
                    success: "fas fa-check-circle",
                    info: "fas fa-info-circle",
                    warning: "fas fa-exclamation-circle",
                    error: "fas fa-exclamation-circle",
                };
                const icon = icons[type] || icons.info;
                const delay = (duration / 1000).toFixed(2);

                toast.classList.add("toastmain", `toast--${type}`, "mb-2");
                toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

                toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                `;
                main.appendChild(toast);
                console.log(toast);
            }
        },
    },
});
