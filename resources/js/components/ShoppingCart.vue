<template>
  <div>
    <!-- <router-link to="/order/cart"> -->
      <font-awesome-icon icon="shopping-cart" size="2x" />
      <span class="badge badge-pill badge-danger">{{ cartLength }}</span>
    <!-- </router-link> -->
  </div>
</template>

<script>
export default {
    name: 'ShoppingCart',
    props: [
        'cartLength'
    ],
//     mounted() {
//     if (localStorage.getItem('restoCart')) {
//       this.cartElements = JSON.parse(localStorage.getItem('restoCart'));
//     }
//   }
}
</script>

<style scoped>
  
</style>