<template>
  <div>
    <div v-if="loading" class="d-flex justify-content-center">
      <img src="https://thumbs.gfycat.com/LoneDetailedFairybluebird-max-1mb.gif">
    </div>
    <div v-else>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div v-for="meal in meals" :key="meal.id" class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img :src="meal.photo" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">
                <div class="card-body">
                    <h4 class="card-title">{{ meal.name }}</h4>
                    <p class="card-text">{{ meal.description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <router-link :to="'/order/meal/' + meal.id">
                          <button type="button" class="btn btn-sm btn-outline-secondary">
                            <font-awesome-icon icon="search-plus" /> View
                          </button>
                        </router-link>
                          <button v-on:click="$emit('send-to-cart', meal.id)" type="button" class="btn btn-sm btn-outline-secondary">
                            <font-awesome-icon icon="cart-plus" /> Add to cart
                          </button>
                      </div>
                      <p class="text-primary"><strong>{{ meal.sell_price }} $</strong></p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <nav aria-label="Page navigation example col-4">
        <ul class="pagination">
          <li class="page-item" :class="{disabled:pagination.prev_link<=pagination.from}">
            <a class="page-link" href="#" @click="viewPage(pagination.prev_link)">Previous</a>
          </li>
          <li
            v-for="n in pagination.last_page"
            v-bind:key="n"
            class="page-item"
            :class="{active:pagination.current_page==n}"
          >
            <a class="page-link" href="#" @click="viewPage(n)">{{n}}</a>
          </li>
          <li class="page-item" :class="{disabled:pagination.next_link>pagination.last_page}">
            <a class="page-link" href="#" @click="viewPage(pagination.next_link)">Next</a>
          </li>
        </ul>
      </nav>
          <div class="col-md-4"></div>
        </div>
    </div>
    </div>
  </div>
</template>

<script>
export default {
    name:'MealsList',
    data() {
      return {
        meals: '',
        loading: true,
        pagination:{}
      }
    },
    mounted() {
      // axios.get('/api/meal?page=2')
      //   .then(res => {
      //     console.log(res);
      //       this.meals = res.data.data;
      //       this.loading = false;
      //   })
      //   .catch(err => {
      //     this.loading = false;
      //     alert('unable to fetch meals')
      //   })
      this.viewPage();
    },
    methods: {
      viewPage: function(page = 1){
        let url='/api/meal?page='+page;
    
     
      fetch(url)
      .then(res=>res.json())
        .then((res) => {
          this.loading = false;
          this.meals = res.data;
          this.pagination=res.pagination;
        })
        .catch((err) => console.log("error"));

      }
    }
}
</script>

<style scoped>

</style>