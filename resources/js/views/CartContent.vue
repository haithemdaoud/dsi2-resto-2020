<template>
  <div>
    <div class="row py-3">
      <div class="col-md-6">
        <h3>
          Cart content
          <span class="badge badge-pill badge-danger">{{ cartContent.length }}</span>
        </h3>
      </div>
      <div class="col-md-6 text-right">
        <router-link to="/order/index">
          <span class="btn btn-outline-primary">Back to shopping</span>
          <span class="btn btn-outline-danger" @click.prevent="emptyCart">Empty your cart</span>
        </router-link>
      </div>
    </div>
    <div class="row py-3">
      <h1 v-if="cartContent.length == 0" class="text-center col-md-12">Your cart is empty now !</h1>
      <div v-else class="col-md-12">
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col" class="text-right">Total</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(meal, index) in cartContent" :key="meal.id">
              <th scope="row">{{ index + 1 }}</th>
              <td>{{ meal.name }}</td>
              <td>{{ meal.sell_price }}</td>
              <td class="row">
                <input
                  type="number"
                  class="form-control"
                  v-model="cartContent[index].quantity"
                  v-on:change="updateQuantity()"
                />
              </td>
              <td class="text-right">{{ parseFloat(meal.quantity * meal.sell_price).toFixed(3) }}</td>
              <td>
                <font-awesome-icon icon="info-circle" class="mr-2" @click="goToDetails(meal.id)" />
                <font-awesome-icon @click="deleteFromCart(index)" icon="trash-alt" />
              </td>
            </tr>

            <tr class="thead-light">
              <th colspan="4" class="text-right" scope="col">Subtotal :</th>
              <th class="text-right">{{total}}</th>
              <th class="text-center">
              </th>
            </tr>
            <tr class="thead-light">
              <th colspan="4" class="text-right" scope="col">Tax Amount (20 %) :</th>
              <th class="text-right">{{parseFloat(total * 0.2).toFixed(3)}}</th>
              <th class="text-center"></th>
            </tr>
            <tr class="thead-light">
              <th colspan="4" class="text-right" scope="col">Total :</th>
              <th class="text-right">{{ parseFloat(total * 1.2).toFixed(3) }}</th>
              <th class="text-center">
                <button @click="submitOrder" class="btn btn-success">Confirm Order</button>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CartContent",
  data() {
    return {
      cartContent: [],
      // total: 0,
    };
  },
  mounted() {
      this.cartContent = JSON.parse(localStorage.getItem("restoCart"));
      // this.calculateTotal();
  },
  computed: {
    total: function() {
      return this.cartContent.reduce((sum, meal) => sum + (meal.quantity*meal.sell_price), 0);
    }
  },
  methods: {
    updateQuantity: function () {
      localStorage.setItem("restoCart", JSON.stringify(this.cartContent));
      // this.calculateTotal();
   },
    calculateTotal: function() {
      this.total=0;

      this.cartContent.forEach((meal, index) => {
        this.total += meal.quantity * meal.sell_price;
      });

      this.total = parseFloat(this.total).toFixed(3);
      // this.total = this.total.toFixed(3).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    },
    submitOrder: function () {
      axios.post("/api/orders",{data:JSON.stringify(this.cartContent)})
        .then((res) => {
          alert('success')
          localStorage.removeItem("restoCart");
        })
        .catch((err) => {
          alert('error')
        });
    },
    deleteFromCart: function(index) {
      this.cartContent.splice(index, 1);

      // this.calculateTotal();
      
      localStorage.setItem("restoCart", JSON.stringify(this.cartContent)); //replaced with watcher
    },
    goToDetails: function(id) {
      this.$router.push({ name: 'mealDetails', params: { id: id }})
    },
    emptyCart: function () {
      const confirm = window.confirm('Are you sure you want to delete all the cart ?');
      if (confirm) {
        this.cartContent = [];
        localStorage.removeItem('restoCart');
      }
    }
  }
};
</script>

<style scoped>
  font-awesome-icon {
    cursor: pointer;
  }
</style>