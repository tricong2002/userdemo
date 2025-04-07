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
          <form @submit.prevent="sumNewPass()">
            <div class="w-100 text-center my-5">
              <h2>Đổi mật khẩu</h2>
            </div>
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
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

              <label
                class="form-labe text-success text-danger"
                v-if="errors && Object.keys(errors).length"
                >{{ errors }}
              </label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
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
import { useRoute } from "vue-router";

export default {
  setup() {
    const errors = ref({});
    const route = useRoute();
    const email = route.query.email;
    const token = route.query.token;
    console.log(email);
    const inData = reactive({
      email,
      token,
      password: "",
      password_confirmation: "",
    });

    const sumNewPass = async () => {
      try {
        const response = await axios.post("/api/chance-pass", inData);
        if (response) {
          Swal.fire({
            icon: "success",
            title: response.data.sucsses,
            text: "Bạn sẽ được chuyển hướng sau 2 giây",
            timer: 2000,
            showConfirmButton: false,
          });

          setTimeout(() => {
            localStorage.setItem("token", response.data.token);
            errors.value = {};
            window.location.href = "/login";
          }, 2000);
        }
      } catch (error) {
        console.log(inData);
        errors.value = error.response.data.error; // Gán lỗi API vào errors.value
      }
    };

    return { inData, errors, sumNewPass };
  },
};
</script>