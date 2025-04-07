<template>
  <div class="container-fluid box-pay">
    <!-- Modal -->
    <!--     <div id="toastbox" style="height: 100px" class="toastbox"></div> -->
    <div class="container-fluid">
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Chỉnh sửa địa chỉ
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="col-12 px-0">
                <div class="box-right" id="">
                  <div class="d-flex mb-2">
                    <p class="fw-bold">truong12321@gmail.com</p>
                    <p class="ms-auto textmuted">
                      <span class="fw-bold">034929929</span>
                    </p>
                  </div>
                  <div class="d-flex mb-2"></div>
                  <div class="row">
                    <div class="col-12 mb-2">
                      <addrest />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <div class="row m-0">
        <div class="col-md-12 col-12">
          <div class="row">
            <div class="col-12 mb-4">
              <div class="row box-right">
                <div class="col-md-8">
                  <p class="h5">Địa chỉ nhận hàng</p>
                </div>
                <div class="col-md-4">
                  <div
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    class="p-blue d-flex justify-content-end align-items-center text-decoration-underline"
                  >
                    <div class="fas fa-circle mx-1"></div>
                    <div class="">Thay đổi</div>
                  </div>
                </div>
                <div class="col-12 my-2">
                  <div v-if="useradd.select && useradd.select.fullif">
                    {{ useradd.select.fullif }}
                  </div>
                </div>
                <div class="col-12">
                  <b>truong12331@gmail.com | 03492222333</b>
                </div>
              </div>
            </div>

            <div class="col-12 px-0 mb-4">
              <div class="box-right">
                <!-- productpayment -->
                <div class="">
                  <h4 class="card-title mb-4">Your shopping cart</h4>
                  <!--     <h3 v-for="item in addforuser" :key="item.id">
{{ item }}
                  </h3> -->
                  <div class="row mb-4">
                    <div class="col-lg-4">
                      <div class="me-lg-4">
                        <div class="d-flex">
                          <div class="">
                            <a href="#" class="nav-link"></a>
                            <h5 class="text-muted">Sản phẩm</h5>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <h6>loại</h6>
                    </div>
                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <h6>Đơn giá</h6>
                    </div>
                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <h6>số lượng</h6>
                    </div>
                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <h6>Thành tiền</h6>
                    </div>
                  </div>
                </div>
                <!-- endproductpayment -->
                <!-- productpayment -->
                <div class="">
                  <div
                    class="row mb-4"
                    v-for="item in cart.cart"
                    :key="item.id"
                  >
                    <div class="col-lg-4">
                      <div class="me-lg-4">
                        <div class="d-flex">
                          <div>
                            <img
                              :src="'/images/products/' + item.image"
                              class="border rounded me-3"
                              style="width: 96px; height: 96px"
                            />
                          </div>
                          <div class="d-flex align-items-center">
                            <a href="#" class="nav-link"></a>
                            <p class="text-muted">{{ item.name }}</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <span>black</span>
                    </div>
                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <span>160</span>
                    </div>
                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <span>1</span>
                    </div>
                    <div
                      class="col-lg-2 col-sm-6 col-6 d-flex align-items-center"
                    >
                      <span>320</span>
                    </div>
                  </div>
                </div>
                <!-- endproductpayment -->
              </div>
            </div>
          </div>
        </div>
        <div class="py-3 bg-white border">
          <div class="col-12 bg-white">
            <div class="col-lg-12">
              <div class=""></div>

              <div class="mx-4 mb-4">
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
          <div class="box-left">
            <div class="">
              <div class="form">
                <div class="d-flex justify-content-end">
                  <h2 class="text-blue" v-if="cart.total">
                    {{ cart.total.toLocaleString("vi-VN") }}đ
                  </h2>
                </div>
                <div
                  class="btn btn-primary d-block h8"
                  v-on:click="getpay.Checkpay(cart.total, token)"
                >
                  Thanh toán ngay<span class="ms-3 fas fa-arrow-right"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

import "@/assets/css/payment/payment.css";
import { payment } from "@/stores/payment/payment";
import { getUseradd } from "@/stores/user/fectuseradd";
import { useraddres } from "../../stores/address/getuseraddress";
const useradd = useraddres();

import addrest from "@/components/addrest.vue";
const getpay = payment();
const cart = ref([]);
const token = localStorage.getItem("token");

const useraddress = async () => {
  try {
    const cartPro = await axios.get("/api/get-cart", 
      
    );
    cart.value = cartPro.data;
    console.log(cart.value);
    useradd.getselect(token);
    console.log(useradd.select);
  } catch (error) {}
};

onMounted(() => {
  useraddress();
});
</script>