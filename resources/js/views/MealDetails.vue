<template>
  <div>
      <div class="row">
          <div class="col-md-11">
                <button class="btn btn-outline-primary my-3" @click="goBack">
                    <font-awesome-icon icon="arrow-left" /> Back
                </button>
          </div>
          <div class="col-md-1">
                <router-link to="/order/cart">
                    <ShoppingCart v-bind:cartLength="cartLength"></ShoppingCart>
                </router-link>
          </div>
      </div>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ meal.name }}</h5>
            <p class="card-text">{{ meal.description }}</p>
            <p class="card-text"><small class="text-muted">{{ meal.sell_price }} $</small></p>
        </div>
        <img class="card-img-bottom" :src="meal.photo" alt="Card image cap">
        <div class="card-footer text-muted">
            <button v-on:click="addToCart(meal.id)" type="button" class="btn btn-sm btn-outline-secondary">
                <font-awesome-icon icon="cart-plus" /> Add to cart
            </button>
        </div>
    </div>
  </div>
</template>

<script>
import ShoppingCart from './../components/ShoppingCart'
export default {
    name: 'MealDetails',
    components: {
        ShoppingCart
    },
    data() {
        return {
            meal: null,
            cartLength: []
        }
    },
    mounted() {
        axios.get('/api/meal/' + this.$route.params.id)
        .then(res => {
            this.meal = res.data.data;
        })
        .catch(err => console.log('unable to get meal details'));
        this.cartLength = JSON.parse(localStorage.getItem('restoCart')).length;
    },
    methods: {
        addToCart: function(id){
            // axios.get('/api/meal/'+id)
            // .then(res => {
            //     let index = this.cart.findIndex(meal => meal.id == res.data.data.id);
            //     if(index == -1) {
            //         res.data.data.quantity = 1;
            //         this.cart.push(res.data.data);
            //     } else{
            //         this.cart[index].quantity+= 1
            //     }
            //     localStorage.setItem('restoCart', JSON.stringify(this.cart)); //replaced with watcher
            // })
            // .catch(err => {
            //     alert('unable to get meal details')
            // })
        },
        goBack: function () {
            window.history.back();
        }
    }
}
</script>

<style>

</style>