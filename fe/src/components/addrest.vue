<template>
  <div>
    <label for="province">Chọn Tỉnh/Thành Phố:</label>
    <select
      id="province"
      class="w-100 p-2"
      v-model="store.selectedProvince"
      @change="onProvinceChange"
    >
      <option value="">-- Chọn tỉnh/thành phố --</option>
      <option
        v-for="province in store.provinces"
        :key="province.code"
        :value="province.code"
      >
        {{ province.name }}
      </option>
    </select>

    <label for="district">Chọn Quận/Huyện:</label>
    <select
      id="district"
      class="w-100 p-2"
      v-model="store.selectedDistrict"
      @change="onDistrictChange"
      :disabled="!store.selectedProvince"
    >
      <option value="">-- Chọn quận/huyện --</option>
      <option
        v-for="district in store.districts"
        :key="district.code"
        :value="district.code"
      >
        {{ district.name }}
      </option>
    </select>

    <label for="ward">Chọn Phường/Xã:</label>
    <select
      id="ward"
      class="w-100 p-2"
      v-model="selectedWard"
      :disabled="!store.selectedDistrict"
    >
      <option value="">-- Chọn phường/xã --</option>
      <option v-for="ward in store.wards" :key="ward.code" :value="ward.code">
        {{ ward.name }}
      </option>
    </select>
    <div class="btn btn-primary my-2">Thêm địa chỉ</div>
    <hr />
    <div
      class="d-flex align-items-center p-4 my-3 border"
      v-for="item in useradd.addresses"
      :key="item.idpro"
    >
      <div class="col-2">
        <input
          type="radio"
          :id="'address_' + item.idpro"
          name="selcect_add"
          @change="changeSelect.update(item.idpro)"
        />
      </div>
      <label v-if="item.fullif" :for="'address_' + item.idpro" class="col-10">{{ item.fullif }}</label>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { addslect } from "@/stores/address/address.js";
import { useraddres } from "@/stores/address/getuseraddress";
import { updateaddslect } from "@/stores/address/updateselect";
import axios from "axios";
// 💡 Khởi tạo store trước khi dùng
const store = addslect();
const useradd = useraddres();
const changeSelect = updateaddslect();

const selectedWard = ref("");
const token = localStorage.getItem("token");
onMounted(async () => {
  try {
    store.fetchProvinces();
    await useradd.getadduser(token);
  } catch (error) {
    console.error("Lỗi trong onMounted:", error);
  }
});

const onProvinceChange = () => {
  store.fetchDistricts(store.selectedProvince);
};

const onDistrictChange = () => {
  store.fetchWards(store.selectedDistrict);
};
</script>

