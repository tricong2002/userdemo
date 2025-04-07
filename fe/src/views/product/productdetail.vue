<template>
  <div class="bg-body-secondary">
    <!-- toast -->
    <div id="toastbox" style="height: 100px" class="toastbox"></div>

    <!-- toast -->

    <section>
      <div class="container-fluid">
        <div class="container h-100">
          <div class="row justify-content-between">
            <!--  select nam ben trai -->

            <div class="box_contai-left col-12 col-lg-9 p-2 flex-row d-lg-flex">
              <!--   box chua hinh anh -->
              <div class="p-2 col-12 col-lg-5">
                <div class="box-product_image-1 p-3 border rounded bg-white">
                  <div class="box-img_pr d-flex justify-content-center border">
                    <div class="w-100 h-100">
                      <img
                        :src="'/images/products/' + product.image"
                        class="h-100 w-100"
                        alt="#"
                      />
                    </div>
                  </div>
                  <div class="slection_img-pr mt-3">
                    <img
                      class="rounded"
                      :src="'/images/products/' + product.image"
                      height="80px"
                      width="80px"
                      alt="#"
                    />
                    <img
                      class="rounded"
                      :src="'/images/products/' + product.image"
                      height="80px"
                      width="80px"
                      alt="#"
                    />
                    <img
                      class="rounded"
                      :src="'/images/products/' + product.image"
                      height="80px"
                      width="80px"
                      alt="#"
                    />
                  </div>
                  <hr />
                  <div
                    class="d-flex justify-content-center align-items-center"
                    style="height: 50px"
                  >
                    <i class="fa-regular fa-face-smile"></i>
                    <div class="mx-3">xem them tom tat noi dung</div>
                    <i class="fa-regular fa-comment"></i>
                  </div>
                </div>
              </div>
              <!--  box img end -->

              <!--    box 2 star -->
              <div class="p-2 col-lg-7 col-12">
                <input type="hidden" :value="product.id" id="id_product" />
                <div class="box-product_2 p-3 border rounded bg-white">
                  <h4 id="name_product">
                    {{ product["name"] }}
                  </h4>
                  <div
                    class="my-2 d-flex align-items-center"
                    style="height: 20px"
                  >
                    <div class="me-1" v-if="product">
                      {{ product["rating"] }}
                    </div>
                    <i class="fa-regular fa-star"></i
                    ><i class="fa-regular fa-star"></i
                    ><i class="fa-regular fa-star"></i
                    ><i class="fa-regular fa-star"></i>
                    <div class="mx-2">|</div>
                    <div class="" v-if="product">
                      Đã bán {{ product["sold"] }}
                    </div>
                  </div>
                  <div class="d-flex align-items-center mt-1">
                    <div class="text-danger fs-3 text" v-if="product['sale']">
                      {{ product["sale"].toLocaleString("vi-VN") }}đ
                    </div>
                    <div class="m-1" v-if="product['sale'] && product['price']">
                      {{
                        (
                          (Number(product["sale"]) / Number(product["price"])) *
                          100
                        ).toFixed()
                      }}%
                    </div>

                    <div class="m-1">
                      <del>{{ product["price"] }}₫</del>
                    </div>
                  </div>
                </div>
                <!--    box ship -->
                <div
                  class="box-product_ifship mt-2 p-3 border rounded bg-white"
                >
                  <div class="m-1 py-1 border-bottom">
                    <h6>Thông tin vận chuyển</h6>
                    <div
                      class="shipping_adres d-flex mt-2 justify-content-between"
                    >
                      <div class="">
                        Giao đến Q. 1, P. Bến Nghé, Hồ Chí Minh
                      </div>
                      <div class="text-primary">Đổi</div>
                    </div>
                  </div>

                  <div class="m-1 py-1 border-bottom">
                    <div class="d-flex align-items-center">
                      <img
                        :src="'/images/shipping/shopnow.png'"
                        height="20px"
                        width="30px"
                      />
                      <h6 class="mx-2">Giao siêu tốc 2h</h6>
                    </div>
                    <div
                      class="shipping_adres d-flex mt-2 justify-content-between"
                    >
                      <div class="d-flex">
                        <div class="text-black">Trước 10h ngày mai:</div>
                        <div class="text-success mx-2">Miễn phí</div>
                        <del>25.000₫</del>
                      </div>
                    </div>
                  </div>

                  <div class="m-1 py-1 border-bottom">
                    <div class="d-flex align-items-center">
                      <img
                        :src="'/images/shipping/ship.png'"
                        height="20px"
                        width="30px"
                      />
                      <h6 class="mx-2">Giao siêu tốc 2h</h6>
                    </div>
                    <div
                      class="shipping_adres d-flex mt-2 justify-content-between"
                    >
                      <div class="text-black">
                        Freeship 10k đơn từ 45k, Freeship 25k đơn từ 100k
                      </div>
                      <div class="text-primary">Đổi</div>
                    </div>
                  </div>
                </div>
                <!--  end boxship -->

                <!--         uu dai start -->
                <div
                  class="box-product_image-1 mt-3 p-3 border rounded bg-white text-black"
                >
                  <div class="m-1 py-1">
                    <h6>Ưu đãi</h6>
                    <div
                      class="shipping_adres d-flex mt-2 justify-content-between align-items-center"
                    >
                      <div class="">4 Mã Giảm Giá</div>
                      <div class="text-primary d-flex">
                        <div class="border p-1 px-2 m-1">giảm 4%</div>

                        <div class="border p-1 px-2 m-1">giảm 4%</div>
                        <div class="m-1 p-1 px-2 d-flex align-items-center">
                          <i class="fa-solid fa-arrow-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--      ưu đãi endend -->

                <!--  sale more start -->
                <div
                  class="box-sale_more mt-3 p-3 border rounded bg-white text-black"
                >
                  <div class="m-1 py-1">
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <h6 class="">Mua 3 Giảm 5%</h6>
                      <div class=""><h6 class="text-primary">xem thêm</h6></div>
                    </div>
                    <div class="sale_box-img d-flex mt-3">
                      <img
                        :src="'/src/assets/images/products/1127010006330.gif'"
                        alt=""
                        height="70px"
                        width="70px"
                      />
                      <img
                        class="mx-1"
                        :src="'/src/assets/images/products/1127010006330.gif'"
                        alt=""
                        height="70px"
                        width="70px"
                      />
                      <img
                        class="mx-1"
                        :src="'/src/assets/images/products/1127010006330.gif'"
                        alt=""
                        height="70px"
                        width="70px"
                      />
                    </div>
                  </div>
                </div>

                <!--   sale more end -->

                <!--    dich vu bo sung start -->
                <div
                  class="box-product_sale mt-3 p-3 border rounded bg-white text-black"
                >
                  <div class="m-1 py-1">
                    <h6>Dịch vụ bổ sung</h6>
                    <div
                      class="shipping_adres d-flex mt-3 justify-content-between align-items-center"
                    >
                      <div class="d-flex">
                        <div class="d-flex align-items-center">
                          <img
                            class="rounded"
                            :src="'/src/assets/images/shipping/shipt1.png'"
                            height="40px"
                            width="40px"
                          />
                          <h6 class="mx-2">Ưu đãi đến 600k với thẻ TikiCard</h6>
                        </div>
                      </div>
                      <div class="text-primary d-flex">Mua trước trả sau</div>
                    </div>

                    <div
                      class="shipping_adres d-flex mt-3 justify-content-between align-items-center"
                    >
                      <div class="d-flex">
                        <div class="d-flex align-items-center">
                          <img
                            class="rounded"
                            :src="'/src/assets/images/shipping/shipt2.png'"
                            height="40px"
                            width="40px"
                          />
                          <h6 class="mx-2">Giao siêu tốc 2h</h6>
                        </div>
                      </div>
                      <div class="text-primary d-flex">Đăng ký</div>
                    </div>
                  </div>
                </div>
                <!--         dich vu bo sung end -->
              </div>
            </div>
            <!--   select nam benphai -->
            <div class="box_contai-right col-lg-3 p-2 d-none d-lg-flex">
              <div class="">
                <!--    box ship -->
                <div
                  class="box-product_ifship mt-2 p-3 border rounded bg-white"
                >
                  <div class="">
                    <div class="box_rate-prouser d-flex">
                      <div class="img_logo-product col-2">
                        <img
                          class="w-100 h-100"
                          :src="'/images/team/03.jpg'"
                          alt=""
                        />
                      </div>
                      <div class="mx-2 col-7">
                        <div class="row h-100">
                          <div class=""><h6>NKBook</h6></div>
                          <div class="d-flex">
                            <img
                              :src="'/src/assets/images/brands/legit_bra.webp'"
                              alt=""
                              height="20px"
                            />
                            <div class="border-end m-2"></div>
                            <div class="d-flex">
                              <div class="">4.8</div>
                              <i class="fa-solid fa-star mx-2"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        class="col-2 d-flex align-items-center justify-content-center p-2 border rounded"
                      >
                        <i class="fs-3 text fa-solid fa-comment"></i>
                      </div>
                    </div>

                    <hr />
                    <div class="m-1">
                      <h6>Số lượng</h6>
                      <br />
                      <div class="d-flex align-items-center">
                        <div class="fs-3 text d-flex">
                          <button
                            v-on:click="
                              quanDetails.upvalue(product['quantity'])
                            "
                            style="height: 40px; width: 40px"
                            type="button"
                            class="btn btn-outline-secondary"
                            id="add_value_details"
                          >
                            +
                          </button>
                          <div
                            id="quan_value_details"
                            class="mx-1 rounded text-center border"
                            style="height: 40px; width: 50px; appearance: none"
                          >
                            {{ quanDetails.count }}
                          </div>
                          <button
                            style="height: 40px; width: 40px"
                            type="button"
                            class="btn btn-outline-secondary"
                            v-on:click="quanDetails.downvalue(1)"
                          >
                            -
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="mt-3">
                      <h6>Tạm tính</h6>
                      <div class="d-flex align-items-center">
                        <div class="d-flex">
                          <div
                            id="price_product"
                            class="fs-3 text"
                            v-if="product['sale'] && product['price']"
                          >
                            {{
                              (
                                Number(product["sale"]) *
                                Number(quanDetails.count || 1)
                              ).toLocaleString("vi-VN")
                            }}
                          </div>
                          <div class="">đ</div>
                        </div>
                      </div>
                    </div>
                    <div class="container">
                      <div class="row mt-4 gap-2">
                        <button
                          type="button"
                          style="height: 45px"
                          class="btn btn-danger"
                        >
                          Mua ngay
                        </button>
                        <button
                          type="button"
                          style="height: 45px"
                          class="btn btn-outline-primary"
                          v-on:click="cartductGet.addCartDetail"
                        >
                          <!--  btnadd -->
                          Thêm vào giỏ hàng
                        </button>
                        <button
                          type="button"
                          style="height: 45px"
                          class="btn btn-outline-primary"
                        >
                          Mua trước trả sau
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--  end boxship -->
              </div>
            </div>
          </div>
        </div>
      </div>
   
    </section>
    <div class="sticky-bottom d-xl-none">
        <div class="">
          <div class="row mt-4 ">
            <button  type="button" style="height: 45px" class="btn btn-danger col-6">
              Mua ngay
            </button>
            <button
              type="button"
              style="height: 45px"
              class="btn btn-outline-primary col-6 bg-primary text-white"
              v-on:click="cartductGet.addCartDetail"
            >
              <!--  btnadd -->
              Thêm vào giỏ hàng
            </button>
          </div>
        </div>
      </div>
  </div>
</template>
<style>
.slection_img-pr img {
  margin: 5px;
  padding: 5px;
  border: 2px solid rgba(153, 153, 153, 0.119);
}
</style>
<script setup>
import { quantityDetails } from "@/stores/product/ProductDetais";
import { cartductGeter } from "@/stores/cart/addcart";

import { useRoute } from "vue-router"; // Import useRoute
import axios from "axios";
import { ref, onMounted } from "vue";
import "@/assets/css/toast/toast.css";

const quanDetails = quantityDetails();
const cartductGet = cartductGeter();

const product = ref({});
const route = useRoute();
const id = route.params.id;
quanDetails.reset();
const getProductsdetail = async () => {
  try {
    const response = await axios.get(`/api/detail/${id}`);
    product.value = response.data; // Cập nhật dữ liệu
    console.log(product.value);
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};
onMounted(() => {
  getProductsdetail(); // Gọi API khi component được mount
});
</script>