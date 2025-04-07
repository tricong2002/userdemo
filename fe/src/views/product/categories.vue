<template>
  <div class="">
    <div class="container my-4">
      <div class="row">
        <div class="col-lg-2 border">
          <nav
            id="sidebarMenu"
            class="collapse d-lg-block sidebar collapse bg-white"
          >
            <div class="position-sticky">
              <div class="list-group list-group-flush">
                <a
                  href="/categories"
                  class="list-group-item list-group-item-action py-2 ripple"
                  aria-current="true"
                >
                  <i class="fas fa-tachometer-alt fa-fw me-3"></i
                  ><span>Tất cả sản phẩm</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action py-2 ripple active"
                >
                  <i class="fas fa-chart-area fa-fw me-3"></i
                  ><span>Webiste traffic</span>
                </a>
                <button
                  v-for="item in proget.category"
                  :key="item.id"
                  v-on:click="productGet.moveSl(item.id)"
                  href="#"
                  class="list-group-item list-group-item-action py-2 ripple"
                >
                  <i class="fas fa-lock fa-fw me-3"></i
                  ><span>{{ item.name }}</span>
                  
                </button>
              </div>
            </div>
          </nav>
        </div>

        <div class="col-lg-10 px-2">
          <section class="section-products p-0">
            <div class="container">
              <div class="row">
                <!-- Single Product -->
                <div
                  class="col-md-6 col-lg-3 col-xl-3"
                  v-for="item in proget.products"
                  :key="item.id"
                >
                  <a :href="'/detail/' + item.id">
                    <div
                      id="product-1"
                      class="single-product border rounded-4 p-1"
                    >
                      <div
                        class="part-1"
                        style="background-image: url(''); height: 230px"
                      >
                        <span class="discount"
                          >{{ ((item.sale / item.price) * 100).toFixed() }}%
                          off</span
                        >
                        <img
                          class="w-100 h-100"
                          :src="'/images/products/' + item.image"
                          alt=""
                        />

                        <ul>
                          <li>
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
                          </li>
                          <li>
                            <a href="#"><i class="fas fa-heart"></i></a>
                          </li>
                          <li>
                            <a href="#"><i class="fas fa-plus"></i></a>
                          </li>
                          <li>
                            <a href="#"><i class="fas fa-expand"></i></a>
                          </li>
                        </ul>
                      </div>
                      <div class="part-2">
                        <h3 class="product-title">{{ item.name }}</h3>
                        <h4 class="product-old-price">{{ item.price }} đ</h4>
                        <h4 class="product-price" v-if="item.sale">
                          {{ item.sale.toLocaleString("vi-VN") }}đ
                        </h4>

                        <div>
                          <span v-for="n in item.rating" :key="n">
                            <span>⭐</span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <!-- Single Product -->
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
</style>
<script setup>
import "@/assets/css/index.css";
import { ref, onMounted, computed, watch } from "vue";
import axios from "axios";
import Sidebar from "@/components/slicebar.vue";
import { productGeter } from "@/stores/categories/category.js"; // Import store

const productGet = productGeter(); // Gọi store

// computed để lấy dữ liệu từ Pinia store
const proget = computed(() => productGet.proget);

const getProducts = async () => {
  if (localStorage.getItem("check") == 0) {
    try {
      await productGet.search();
      // Chờ dữ liệu trả về
    } catch (error) {
      console.error("Lỗi khi gọi API:", error);
    }
  } else {
    await productGet.getListcate();
  }
};

onMounted(() => {
  getProducts();
});

/* watch(check, () => {
  getProducts();
}); */
</script>
