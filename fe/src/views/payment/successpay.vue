<style>
.congratulation-wrapper {
  max-width: 700px;
  margin-inline: auto;
  -webkit-box-shadow: 0 0 20px #f3f3f3;
  box-shadow: 0 0 20px #f3f3f3;
  padding: 30px 20px;
  background-color: #fff;
  border-radius: 10px;
}

.congratulation-contents.center-text .congratulation-contents-icon {
  margin-inline: auto;
}
.congratulation-contents-icon {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  height: 100px;
  width: 100px;
  background-color: #65c18c;
  color: #fff;
  font-size: 50px;
  border-radius: 50%;
  margin-bottom: 30px;
}
.congratulation-contents-title {
  font-size: 32px;
  line-height: 36px;
  margin: -6px 0 0;
}
.congratulation-contents-para {
  font-size: 16px;
  line-height: 24px;
  margin-top: 15px;
}
.btn-wrapper {
  display: block;
}
.cmn-btn.btn-bg-1 {
  background: #6176f6;
  color: #fff;
  border: 2px solid transparent;
  border-radius: 3px;
  text-decoration: none;
  padding: 5px;
}
</style>
<template>
  <div class="congratulation-area text-center mt-5">
    <div class="container">
      <div class="congratulation-wrapper">
        <div class="congratulation-contents center-text">
          <div class="congratulation-contents-icon">
            <i class="fas fa-check"></i>
          </div>
          <h4 class="congratulation-contents-title">Congratulations!</h4>
          <p class="congratulation-contents-para">
            Your account is ready to submit proposals and get work.
          </p>
          <div class="btn-wrapper mt-4">
            <a :href="'/'" class="cmn-btn btn-bg-1">
              Go to Home
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const paysuccess = async () => {
  try {
    const token = localStorage.getItem("token");
    const respone = await axios.get("/api/payment-success", {
      headers: {
        authorization: `Bearer ${token}`,
      },
    });
    if (respone.data.error) {
      window.location.href = "/";
    }
    console.log(respone.data);
  } catch (error) {}
};

onMounted(() => {
  paysuccess();
});
</script>