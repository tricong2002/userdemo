

<template>
  <div class="w-100 header">
    <div class="w-100" style="height: 150px">
      <div class="container h-100">
        <div class="d-flex h-100">
          <div
            class="col-lg-1 d-flex justify-content-center align-items-center"
          >
            <a href="/">
              <img
                :src="'/images/logo/lg56.jpg'"
                alt="Hình ảnh từ public"
                height="90px"
                width="90px"
            /></a>
          </div>
          <div
            class="col-lg-6 col-sm-10 m-sm-5 m-1 bg d-flex justify-content-center align-items-center"
          >
            <div class="serch_input-header col-12">
              <div class="search-wrapper">
                <!--    thanh tim kiem -->
                <form @submit.prevent="productGet.search()">
                  <div class="search-box">
                    <input
                      type="text"
                      class="form-control search-input"
                      placeholder="Search anything..."
                    />
                    <button type="submit" class="btn btn-primary search-button">
                      Search
                    </button>
                  </div>
                </form>
                <!-- thanh duoi tim kiem -->
                <div class="d-flex mt-2 d-none d-lg-flex ">
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>
                  <a href="#" class="text-secondary px-2">Điện gia dụng</a>
                </div>
              </div>
            </div>
          </div>

          <div
            class="col-lg-4  d-none d-lg-flex justify-content-center align-items-center"
          >
            <div class="serch_input-header p-3 col-12">
              <div class="search-wrapper">
                <!--    thanh tim kiem -->
                <RouterLink to="/login" v-if="!token">
                  <button
                    type="button"
                    class="btn btn-header_ff col-4 m-1 btn-outline-primary"
                  >
                    Đăng nhập
                  </button>
                </RouterLink>
                <RouterLink to="/userdetail" v-if="token">
                  <button
                    type="button"
                    class="btn btn-header_ff col-4 m-1 btn-outline-primary"
                  >
                    Tài khoản
                  </button>
                </RouterLink>
                <RouterLink to="/register" v-if="!token">
                  <button
                    type="button"
                    class="btn btn-header_ff col-4 m-1 btn-outline-primary"
                  >
                    Đăng ký
                  </button></RouterLink
                >

                <button
                  v-if="token"
                  @click="logout()"
                  type="button"
                  class="btn btn-header_ff col-4 m-1 btn-outline-primary"
                >
                  Đăng xuất
                </button>

                l
                <router-link to="/cart"
                  ><button
                    type="button"
                    class="btn col-2 m-1 btn-outline-primary"
                  >
                    <i class="fa-solid fa-cart-shopping"></i></button
                ></router-link>

                <!-- thanh duoi tim kiem -->
                <div
                  class="d-flex align-items-center mt-2 justify-content-center"
                >
                  <i class="fa-solid fa-cart-shopping"></i>Giao đến
                  <a href="#" class="text-secondary px-2"
                    >Q. 1, P. Bến Nghé, Hồ Chí Minh</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-info bg-gradient">
      <div class="container py-4">
        <!-- Breadcrumb -->
        <nav class="d-flex">
          <h6 class="mb-0">
            <a href="" class="text-white-50">Home</a>
            <span class="text-white-50 mx-2"> > </span>
            <a href="" class="text-white"><u>Shopping cart</u></a>
          </h6>
        </nav>
        <!-- Breadcrumb -->
      </div>
    </div>
  </div>
</template>

<style>
a {
  text-decoration: none;
}

.search-box {
  position: relative;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
  border-radius: 5px;
  border: 1px solid rgb(179, 179, 179);
  transition: all 0.3s ease;
}

.search-box:focus-within {
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.1);
  transform: translateY(-2px);
}

.search-input {
  border-radius: 20;
  padding: 10px 0;

  padding-left: 45px;
  padding-right: 20px;

  border: 2px solid transparent;
  transition: all 0.3s ease;
}

.search-input:focus {
  border-color: #0d6efd;
  box-shadow: none;
}

.search-icon {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: #6c757d;
  z-index: 10;
}

.search-button {
  position: absolute;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 10px;
  padding: 8px 20px;
  transition: all 0.3s ease;
}

.search-button:hover {
  background-color: #0b5ed7;
  transform: translateY(-50%) scale(1.05);
}

/* Dark theme search box */
.search-box.dark {
  background-color: #212529;
}

.search-box.dark .search-input {
  background-color: #212529;
  color: #fff;
}

.search-box.dark .search-input::placeholder {
  color: #6c757d;
}

.search-box.dark .search-icon {
  color: #6c757d;
}
</style>
<script setup>
import { ref, onMounted, reactive } from "vue";
import axios from "axios";
import router from "@/router";
import { productGeter } from "@/stores/categories/category.js";
const productGet = productGeter();
const token = localStorage.getItem("token"); // Lấy token từ localStorage
const logout = async () => {
  try {
    // Gửi yêu cầu logout với token trong header
    const response = await axios.get("/api/logout", {
      headers: {
        authorization: `Bearer ${token}`, // Đảm bảo rằng token được gửi đúng
      },
    });

    console.log(response.data);
    localStorage.removeItem("token");
    window.location.href = "/login";
  } catch (error) {
    console.log("Lỗi khi gọi API logout:", error.response?.data || error);
  }
};

/* const search = async () => {
  try {
    // Gửi yêu cầu logout với token trong header
    const response = await axios.post("/api/search-product", inDataSea);
  } catch (error) {
    console.log("Lỗi khi gọi API ", error.response?.data || error);
  }
}; */
</script>

