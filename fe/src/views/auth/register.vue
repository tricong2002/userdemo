<template>
  <section class="">
    <div class="container my-5">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid h-100"
            alt="Phone image"
          />
        </div>
        <div class="border rounded col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form @submit.prevent="sumRegister()">
            <div class="w-100 text-center my-5"><h2>Đăng Ký</h2></div>
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input
                autocomplete=""
                v-model="inData.email"
                type="email"
                id="emailinput"
                placeholder="Email"
                class="form-control form-control-lg"
              />
              <label
                class="form-labe text-success text-danger"
                for="emailinput"
                >{{ errors.email?.[0] }}</label
              >
            </div>
            <!--    username -->

            <div data-mdb-input-init class="form-outline mb-4">
              <input
                autocomplete=""
                v-model="inData.name"
                type="text"
                id="userinput"
                placeholder="User name"
                class="form-control form-control-lg"
              />
              <label
                class="form-labe text-success text-danger"
                for="emailinput"
                >{{ errors.name?.[0] }}</label
              >
            </div>
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input
                autocomplete=""
                v-model="inData.password"
                placeholder="password"
                type="password"
                id="passinput"
                class="form-control form-control-lg"
              />
              <label
                class="form-labe text-success text-danger"
                for="emailinput"
                >{{ errors.password?.[0] }}</label
              >
            </div>

            <!-- password_comfirm -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input
                autocomplete=""
                v-model="inData.password_confirmation"
                type="password"
                placeholder="password comfirm"
                id="passinputcomfirm"
                class="form-control form-control-lg"
              />
            </div>

            <!-- Submit button -->
            <button
              type="submit"
              data-mdb-button-init
              data-mdb-ripple-init
              class="btn btn-primary btn-lg btn-block w-100"
            >
              Register now
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>


<script>
import { ref, reactive } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import router from "@/router";
export default {
  setup() {
    const errors = ref({});
    const inData = reactive({
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    });

    const sumRegister = async () => {
      try {
        const response = await axios.post("/api/register", inData);
        Swal.fire({
          icon: "success",
          title: "Đăng ký thành công",
          text: "Bạn sẽ được chuyển hướng sau 2 giây",
          timer: 2000, 
          showConfirmButton: false,
        });

        setTimeout(() => {
          errors.value = {};
          window.location.href = "/login";
        }, 2000);
        // Xóa lỗi nếu đăng ký thành công
      } catch (error) {
        console.log(error.response.data.error);
        errors.value = error.response.data.error; // Gán lỗi API vào errors.value
      }
    };

    return { inData, errors, sumRegister };
  },
};
</script>
