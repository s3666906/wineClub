<template>

<div>
  <div class="breadcrumb-wrapper">

  <ol class="breadcrumbs" role="navigation" aria-label="breadcrumbs">
    <li>
      <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
    </li>

    <li>
      <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
        <span>Product Ranges</span>
    </li>

  </ol></div>

  <div class="container py-4">


    <div class=" text-center">
      <h2 class="display-4 p-4 text-center">
        <template v-if="filter == 'All Products'">Our Product Ranges</template>
        <template v-if="filter != 'All Products'">{{filter}} Series</template>

      </h2>
      <p class="lead">From our classics to our modern heritage series<br>
        We have something for everyone and for every occasion.
      </p>
    </div>

    <hr>

    <div class="row mb-3 mt-3">
      <div class="col-md-3 offset-md-9">
        <label>Filter Product Range : </label>
        <v-select v-model="filter"
        :options="['All Products','Classic','Reserve','Heritage']"
        :clearable="false"
        @change="filterProducts()"></v-select>

      </div>
    </div>

    <div class="row">

      <!-- Event Card -->
      <div class="col-md-4" v-for="(result, index) in filteredProducts">

        <a class="product-link" :href="'/products/'+result.id">
          <div class="product-shot">
            <img class="" style="" :src="'/images/products_lg/' + result.display_src" data-holder-rendered="true">
          </div>
          <!-- Event image -->

          <div class="panel-body text-center">
            <!-- Event Title -->
            <h3>{{result.range}}</h3>
            <p>{{result.release}} {{result.title}}</p>


          </div>
        </a>
      </div>
      <!-- End Event Cards -->

    </div>
    <!-- End Cards Container -->

    <!-- Pagination -->
    <pagination :data="results" @pagination-change-page="getResults" align="right">
      <span slot="prev-nav">&lt; Previous</span>
      <span slot="next-nav">Next &gt;</span>
    </pagination>

  </div>
  </div>
</template>

<script>

  export default {
    name: "products",
    props: {
      productlist : { type : Object }
    },
    data() {
      return {
        results : this.productlist,
        filteredProducts : [],
        selected : null,
        filter: 'All Products',
        filtering : false
      };
    },
    methods: {
      setSelectedEvent(index) {
        this.selected = this.results.data[index];
      },
      // Our method to GET results from a Laravel endpoint
      getResults(page = 1) {
        axios.post('/events/search?page=' + page)
        .then(response => {
          this.results = response.data;
        });
      },
      async getFilteredProducts() {
        var productArray = [];
        var filter = this.filter;

        if(filter == 'All Products') {
          productArray = this.results.data;
          this.filtering = false;
        }
        else {
          this.results.data.forEach((product,index) => {
            console.log(product);
            if(product.range == filter) {
              productArray.push(product);
            }
          })
        }

        return productArray;


      },
      filterProducts() {
        this.filtering = true;
        this.filteredProducts = [];

        this.getFilteredProducts().then((products) => {
          this.filteredProducts = products;
          this.filtering = false;
        })


      }
    },
    computed: {

    },
    watch: {
      // whenever question changes, this function will run
      filter: function () {
        this.filterProducts();
      }
    },
    mounted() {
      this.filterProducts();
    }
  }
</script>
