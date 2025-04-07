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
          <form @submit.prevent="sumLogin()">
            <div class="w-100 text-center my-5"><h2>Đăng Nhập</h2></div>
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input
                v-model="inData.email"
                type="email"
                id="emailinput"
                placeholder="Email"
                autocomplete="email"
                class="form-control form-control-lg"
              />
              <label
                class="form-labe text-success text-danger"
                for="emailinput"
                v-if="errors?.email && Object.keys(errors).length"
                >{{ errors.email[0] }}
              </label>
              <label
                class="form-labe text-success text-danger"
                for="emailinput"
                v-if="errors && Object.keys(errors).length"
                >{{ errors }}
              </label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input
                v-model="inData.password"
                placeholder="password"
                autocomplete=""
                type="password"
                id="passinput"
                class="form-control form-control-lg"
              />
              <label
                class="form-labe text-success text-danger"
                for="emailinput"
                v-if="errors?.password && Object.keys(errors).length"
                >{{ errors.password[0] }}
              </label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="form1Example3"
                  checked
                />
                <label class="form-check-label" for="form1Example3">
                  Remember me
                </label>
              </div>
              <router-link to="/forgot">Forgot password?</router-link>
            </div>

            <!-- Submit button -->
            <button
              type="submit"
              data-mdb-button-init
              data-mdb-ripple-init
              class="btn btn-primary btn-lg btn-block w-100"
            >
              Sign in
            </button>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
            </div>

            <a
              data-mdb-ripple-init
              class="btn w-100 btn-primary btn-lg btn-block"
              style="background-color: #3b5998"
              href="#!"
              role="button"
            >
              <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
            </a>
            <a
              data-mdb-ripple-init
              class="btn my-2 w-100 btn-primary btn-lg btn-block"
              style="background-color: #55acee"
              href="#!"
              role="button"
            >
              <i class="fab fa-twitter me-2"></i>Continue with Twitter</a
            >
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref, reactive } from "vue";
import Swal from "sweetalert2";
import axios from "axios";
import router from "@/router";

export default {
  setup() {
    const errors = ref({});
    const inData = reactive({
      email: "",
      password: "",
    });
    const token = ref(null);
    const sumLogin = async () => {
      try {
        const response = await axios.post("/api/login", inData);
        /* */
        Swal.fire({
          icon: "success",
          title: "Đăng nhập thành công!",
          text: "Bạn sẽ được chuyển hướng sau 2 giây",
          timer: 2000, // 2 giây
          showConfirmButton: false,
        });

        setTimeout(() => {
          localStorage.setItem("token", response.data.token);
          errors.value = {};
          window.location.href = "/";
        }, 2000);
        // Xóa lỗi nếu đăng ký thành công
      } catch (error) {
        console.log(error.response.data.error);
        errors.value = error.response.data.error; // Gán lỗi API vào errors.value
      }
    };

    return { inData, errors, sumLogin };
  },
};
</script>