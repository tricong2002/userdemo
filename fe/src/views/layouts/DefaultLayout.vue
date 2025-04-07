<template>
  <div>
    <TheHeader />
    <main>
      <router-view />
    </main>
    <fotter />
  </div>
</template>
  
  <script>
import TheHeader from "@/components/TheHeader.vue";
import fotter from "@/components/footer.vue";

export default {
  components: {
    TheHeader,
    fotter,
  },
};
</script>
  