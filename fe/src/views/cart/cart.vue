<template>
  <div class="">
    <div id="toastbox" style="height: 100px" class="toastbox border-4"></div>

    <header>
      <!-- Jumbotron -->

      <!-- Jumbotron -->

      <!-- Heading -->

      <!-- Heading -->
    </header>

    <!-- cart + summary -->
    <section class="bg-light my-5">
      <div class="container">
        <div class="row">
          <!-- cart -->
          <div class="col-lg-9">
            <div class="card border shadow-0">
              <div class="m-4">
                <h4 class="card-title mb-4">Your shopping cart</h4>
                <div
                  class="row mb-4"
                  v-for="item in products.cart"
                  :key="item.id"
                >
                  <div class="col-lg-5">
                    <div class="me-lg-5">
                      <div class="d-flex">
                        <a :href="/detail/ + item.product_id">
                          <img
                            :src="'/images/products/' + item.image"
                            class="border rounded me-3"
                            style="width: 96px; height: 96px"
                          />
                        </a>
                        <div class="">
                          <a href="#" class="nav-link">{{ item.name }}</a>
                          <p class="text-muted">Yellow, Jeans</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                  >
                    <div class="">
                      <div
                        class="d-flex align-items-center justify-content-center me-4"
                      >
                        <button
                        class="border-0"
                          v-on:click="
                            cartductGet.upcart(
                              item.product_id,
                              item.quantity,
                              item.max_quantity
                            )
                          "
                        >
                          +
                        </button>
                        <div class="px-3 border">{{ item.quantity }}</div>
                        <button
                          class="border-0"
                          v-on:click="
                            cartductGet.downcart(item.product_id, item.quantity)
                          "
                        >
                          -
                        </button>
                      </div>
                    </div>
                    <div class="">
                      <text class="h6" v-if="products.total">{{
                        (item.price * item.quantity).toLocaleString("vi-VN")
                      }}</text>
                      <br />
                    </div>
                  </div>
                  <div
                    class="col-lg col-sm-6 d-flex d-flex align-items-center justify-content-xl-end mb-2"
                  >
                    <div class="float-md-end">
                      
                      <button
                        v-on:click="cartductGet.deleteCart(item.product_id)"
                        href="#"
                        class="btn btn-light border text-danger icon-hover-danger"
                      >
                        Remove
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-top pt-4 mx-4 mb-4">
                <p>
                  <i class="fas fa-truck text-muted fa-lg"></i> Free Delivery
                  within 1-2 weeks
                </p>
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco
                  laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
          <!-- cart -->
          <!-- summary -->
          <div class="col-lg-3">
            <div class="card mb-3 border shadow-0">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label class="form-label">Have coupon?</label>
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control border"
                        name=""
                        placeholder="Coupon code"
                      />
                      <button class="btn btn-light border">Apply</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card shadow-0 border">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Total price:</p>
                  <p class="mb-2" v-if="products.total">
                    {{ products.total.toLocaleString("vi-VN") }}
                  </p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Discount:</p>
                  <p class="mb-2 text-info">0đ</p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-2">TAX:</p>
                  <p class="mb-2">0đ</p>
                </div>
                <hr />
                <div class="d-flex justify-content-between">
                  <p class="mb-2">Total price:</p>
                  <p class="mb-2 fw-bold" v-if="products.total">
                    {{ products.total.toLocaleString("vi-VN") }}
                  </p>
                </div>

                <div class="mt-3">
                  <button
                    v-on:click="getpay.toPay(token)"
                    class="btn btn-success w-100 shadow-0 mb-2"
                  >
                    Make Purchase
                  </button>
                  <a href="#" class="btn btn-light w-100 border mt-2">
                    Back to shop
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- summary -->
        </div>
      </div>
    </section>
    <!-- cart + summary -->
    <section>
      <div class="container my-5">
        <header class="mb-4">
          <h3>Recommended items</h3>
        </header>

        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
              <div class="mask px-2" style="height: 50px">
                <div class="d-flex justify-content-between">
                  <h6>
                    <span class="badge bg-danger pt-1 mt-3 ms-2">New</span>
                  </h6>
                  <a href="#"
                    ><i
                      class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"
                    ></i
                  ></a>
                </div>
              </div>
              <a href="#" class="">
                <img
                  src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/7.webp"
                  class="card-img-top rounded-2"
                />
              </a>
              <div class="card-body d-flex flex-column pt-3 border-top">
                <a href="#" class="nav-link">Gaming Headset with Mic</a>
                <div class="price-wrap mb-2">
                  <strong class="">$18.95</strong>
                  <del class="">$24.99</del>
                </div>
                <div
                  class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto"
                >
                  <a href="#" class="btn btn-outline-primary w-100"
                    >Add to cart</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
              <div class="mask px-2" style="height: 50px">
                <a href="#"
                  ><i
                    class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"
                  ></i
                ></a>
              </div>
              <a href="#" class="">
                <img
                  src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/5.webp"
                  class="card-img-top rounded-2"
                />
              </a>
              <div class="card-body d-flex flex-column pt-3 border-top">
                <a href="#" class="nav-link">Apple Watch Series 1 Sport </a>
                <div class="price-wrap mb-2">
                  <strong class="">$120.00</strong>
                </div>
                <div
                  class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto"
                >
                  <a href="#" class="btn btn-outline-primary w-100"
                    >Add to cart</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0">
              <div class="mask px-2" style="height: 50px">
                <a href="#"
                  ><i
                    class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"
                  ></i
                ></a>
              </div>
              <a href="#" class="">
                <img
                  src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/9.webp"
                  class="card-img-top rounded-2"
                />
              </a>
              <div class="card-body d-flex flex-column pt-3 border-top">
                <a href="#" class="nav-link">Men's Denim Jeans Shorts</a>
                <div class="price-wrap mb-2">
                  <strong class="">$80.50</strong>
                </div>
                <div
                  class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto"
                >
                  <a href="#" class="btn btn-outline-primary w-100"
                    >Add to cart</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0">
              <div class="mask px-2" style="height: 50px">
                <a href="#"
                  ><i
                    class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"
                  ></i
                ></a>
              </div>
              <a href="#" class="">
                <img
                  src="https://mdbootstrap.com/img/bootstrap-ecommerce/items/10.webp"
                  class="card-img-top rounded-2"
                />
              </a>
              <div class="card-body d-flex flex-column pt-3 border-top">
                <a href="#" class="nav-link"
                  >Mens T-shirt Cotton Base Layer Slim fit
                </a>
                <div class="price-wrap mb-2">
                  <strong class="">$13.90</strong>
                </div>
                <div
                  class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto"
                >
                  <a href="#" class="btn btn-outline-primary w-100"
                    >Add to cart</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>
    </section>
    <!-- Recommended -->

    <!-- Footer -->

    <!-- Footer -->
  </div>
</template>
<script setup>
import { ref, onMounted, watch } from "vue";
import axios from "axios";
import { cartductGeter } from "@/stores/cart/addcart";
import { payment } from "@/stores/payment/payment";
import "@/assets/css/toast/toast.css";
const getpay = payment();
const cartductGet = cartductGeter();
const products = ref([]); // Dùng ref([]) để lưu danh sách sản phẩm
const token = localStorage.getItem("token");
const getProducts = async () => {
  try {
    const response = await axios.get("/api/get-cart");
    products.value = response.data; // Cập nhật dữ liệu
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};

onMounted(() => {
  getProducts(); // Gọi API khi component được mount
});
watch(
  () => cartductGet.cart, // Theo dõi giá trị giỏ hàng
  (newCart, oldCart) => {
    getProducts();
  },
  { deep: true } // Đảm bảo theo dõi cả các thay đổi bên trong object
);
</script>