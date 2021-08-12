<template>

  <div>

    <div class="breadcrumb-wrapper">

      <ol class="breadcrumbs" role="navigation" aria-label="breadcrumbs">
        <li>
          <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
        </li>

        <li>
          <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
          <a href="/products" title="Product Range">Product Ranges</a>
        </li>

        <li>
          <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
          <span>{{product.range}} {{product.title}} {{product.release}}</span>
        </li>

      </ol></div>

      <div class="container ">

        <div class="row m-b-2">
          <div class="col-md-6">
            <img class="product-img img-fullwidth" :src="'/images/products_lg/'+product.display_src"/>
          </div>
          <div class="col-md-6">
            <h1 class="product-title">{{product.range}} {{product.title}}</h1>

            <div class="product-details">
              <div class="product-price">Price : ${{product.price}}</div>
              <div class="stars m-t-2">
                <label class="star-rating-label">Customer Average Rating</label>
                <star-rating v-model="product.rating" :increment="0.5" read-only :star-size="30"></star-rating></div>
                <div class="product-description">
                  <div class="description-header">
                    Product Description
                  </div>
                  <p><span v-html="product.description"></span> </p>
                </div>
              </div>
            </div>
          </div>



          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  Customer Reviews
                </div>
                <div class="col-md-6">
                  <button class="btn btn-white pull-right border" href="#newReview" data-toggle="modal">Add New Review</button>
                </div>
              </div>

            </div>
            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" width="10%">Date</th>
                    <th scope="col" width="20%">rating</th>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col">Comments</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(rating, index) in reviews">
                    <td>{{rating.created_at}}</td>
                    <td scope="row"><star-rating v-model="rating.rating" :increment="0.5" read-only :star-size="15"></star-rating></td>
                    <td>{{rating.name}}</td>
                    <td>{{rating.comments}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


        </div>


        <div class="modal" id="newReview" aria-modal="true" data-backdrop="static">
          <div class="modal-dialog  modal-md m-t-50">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header bg-dark text-white ">
                <h4 class="modal-title">New Customer Review</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <!-- End modal header -->
              <!-- Modal Body -->
              <div class="modal-body">


                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input type="text" class="form-control" v-model="review.name"  placeholder="Let us know who you are" :class="errors['review.name'] != undefined ? 'is-invalid' : ''">
                    <div class="invalid-feedback"
                    v-if="errors['review.name'] != undefined" v-for="error in errors['review.name']"
                    >{{error}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Review Rating</label>
                    <star-rating v-model="review.rating" :increment="0.5" :star-size="30"></star-rating>
                    <div class="invalid-feedback"
                    v-if="errors['review.rating'] != undefined" v-for="error in errors['review.rating']"
                    >{{error}}</div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Comments</label>
                    <textarea v-model="review.comments" class="form-control" id="exampleCheck1" placeholder="Please let us know what you think!" :class="errors['review.comments'] != undefined ? 'is-invalid' : ''"></textarea>
                    <div class="invalid-feedback"
                    v-if="errors['review.comments'] != undefined" v-for="error in errors['review.comments']"
                    >{{error}}</div>

                  </div>
                </form>
              </div>



              <!-- End Modal Body -->
              <!-- Footer -->
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal" aria-hidden="true">Cancel</a>
                <a href="javascript:;" class="btn btn-success" @click="submitReview()">Submit Review</a>
              </div>
            </div>
            <!-- End Footer -->
          </div>
        </div>

      </div>
    </template>

    <script>

      export default {
        name: "product-show",
        props: {
          product : { type : Object },
          ratings : { type: Array }
        },
        data() {
          return {
            review: {
              name : '',
              rating: 5,
              comments: '',
            },
            reviews : this.ratings,
            productId : this.product.id,
            rating:3.5,
            errors : {},
          };
        },
        methods: {
          submitReview() {

            this.errors = {};
            axios({
              method: 'post',
              url: `/products/${this.productId}/review`,
              data: {
                review : this.review
              }
            })
            .then(response => {

              if(this.reviews.length == 5) {
                this.reviews.pop();
              }

              this.reviews.unshift(response.data['review']);
              this.product.rating = response.data['rating'];

              Vue.toasted.show("Review Submitted, Thanks!.", {
                theme: "toasted-primary",
                type: "success",
                position: "top-right",
                duration : 5000
              });

              this.closeModal();

            })
            .catch(error => {
              // set error array
              this.errors = error.response.data.errors;
            });
          },
          closeModal() {
            // Hide modal
            $('.modal-backdrop').remove();
            $('#newReview').modal('hide');
          },
        },
      }
    </script>
