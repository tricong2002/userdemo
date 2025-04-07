<template>
  <div class="">
    <div class="">
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner border">
          <div class="carousel-item active">
            <img
              :src="'/images/banner/ban2.png'"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              :src="'/images/banner/ban2.png'"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              :src="'/images/banner/p1.png'"
              class="d-block w-100"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span
            class="carousel-control-prev-icon bg-black"
            aria-hidden="true"
          ></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span
            class="carousel-control-next-icon bg-black"
            aria-hidden="true"
          ></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <section class="section-products">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-8 col-lg-6">
            <div class="header">
              <h3>Featured Product</h3>
              <h2>Sản phẩm nổi bật</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Single Product -->
          <div
            class="col-md-6 col-lg-3 col-xl-3"
            v-for="item in products.products"
            :key="item.id"
          >
            <a :href="'/detail/' + item.id">
              <div id="product-1" class="single-product border rounded-4 p-2">
                <div class="part-1" style="background-image: url('')">
                  <span class="discount"
                    >{{ ((item.sale / item.price) * 100).toFixed() }}% off</span
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
                  <h4 class="product-price">{{ item.sale }}đ</h4>

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

    <section class="section-products">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-8 col-lg-6">
            <div class="header">
              <h3>Featured Product</h3>
              <h2>San phẩm bán chạy</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Single Product -->
          <div
            class="col-md-6 col-lg-3 col-xl-3"
            v-for="item in products.topProducts"
            :key="item.id"
          >
            <a :href="'/detail/' + item.id">
              <div id="product-1" class="single-product border rounded-4 p-2">
                <div class="part-1" style="background-image: url('')">
                  <span class="discount"
                    >{{ ((item.sale / item.price) * 100).toFixed() }}% off</span
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
                  <h4 class="product-price">{{ item.sale }}đ</h4>

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

    <section class="section-products">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-8 col-lg-6">
            <div class="header">
              <h3>Featured Product</h3>
              <h2>Sản phẩm mới nhất</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Single Product newnew -->
          <div
            class="col-md-6 col-lg-3 col-xl-3"
            v-for="item in products.latestProducts   "
            :key="item.id"
          >
            <a :href="'/detail/' + item.id">
              <div id="product-1" class="single-product border rounded-4 p-2">
                <div class="part-1" style="background-image: url('')">
                  <span class="discount"
                    >{{ ((item.sale / item.price) * 100).toFixed() }}% off</span
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
                  <h4 class="product-price">{{ item.sale }}đ</h4>

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
</template>
<script setup>
import "@/assets/css/index.css";
import { ref, onMounted } from "vue";
import axios from "axios";

const products = ref([]); // Dùng ref([]) để lưu danh sách sản phẩm

const getProducts = async () => {
  try {
    const response = await axios.get("/api/truong");
    products.value = response.data; // Cập nhật dữ liệu
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};

onMounted(() => {
  getProducts(); // Gọi API khi component được mount
});
</script>

<style>
.carousel-item img {
  max-height: 650px;
}
</style>
