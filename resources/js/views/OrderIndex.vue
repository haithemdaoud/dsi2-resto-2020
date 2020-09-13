<template>
<div>
  <div class="row">
    <div class="col-md-11">
      <h2>Order now !</h2>
    </div>
    <div class="col-md-1">
      <router-link to="/order/cart">
        <ShoppingCart v-bind:cartLength="cart.length"></ShoppingCart>
      </router-link>
    </div>
  </div>
  <div class="row">
    <MealsList v-on:send-to-cart="sendListToCart"></MealsList>
  </div>
</div>
</template>

<script>
import MealsList from "../components/MealsList";
import ShoppingCart from "../components/ShoppingCart";

export default {
  name: 'OrderIndex',
  components: {
    MealsList,
    ShoppingCart
  },
  data() {
    return {
      cart: []
    }
  },
  methods: {
    sendListToCart: function(id) {
      //new version
      // let index = this.cart.findIndex(meal => meal.id == id);
      // if (index >= 0) {
      //   this.cart[index].quantity+= 1
      // } else {
      //   axios.get('/api/meal/'+id)
      //     .then(res => {
      //       res.data.quantity = 1;
      //       this.cart.push(res.data);
      //     })
      //     .catch(err => console.log('unable to get meal details'))
      // }
      // localStorage.setItem('restoCart', JSON.stringify(this.cart)); //replaced with watcher

      // old version
      axios.get('/api/meal/'+id)
        .then(res => {
          let index = this.cart.findIndex(meal => meal.id == res.data.data.id);
          if(index == -1)
          {
             res.data.data.quantity = 1;
             this.cart.push(res.data.data);
          }
          else{
            this.cart[index].quantity+= 1
          }
         
          localStorage.setItem('restoCart', JSON.stringify(this.cart)); //replaced with watcher
        })
        .catch(err => {
          alert('unable to get meal details')
        })
    }
  },
  mounted() {
    if (localStorage.getItem('restoCart')) {
      this.cart = JSON.parse(localStorage.getItem('restoCart'));
    }
  },
  watch:{
    cart:function()
    {
      localStorage.setItem("restoCart", JSON.stringify(this.cart));
    }
  }
}
</script>

<style>

</style>