<template>
  <div>

    <div class="breadcrumb-wrapper">

      <ol class="breadcrumbs" role="navigation" aria-label="breadcrumbs">
        <li>
          <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
        </li>

        <li>
          <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
          <span>Events</span>
        </li>

      </ol></div>

      <div class="container py-4">

        <div class=" text-center">
          <h2 class="display-4 p-4 text-center">Our Events</h2>
          <p class="lead">At Hilliards Creek, we love to celebrate everything wine related<br>
            So come and enjoy one of our events and see what we have to offer.
          </p>
        </div>

        <hr>

        <div class="row mb-3 mt-3">

          <!-- Event Card -->
          <div class="col-md-4" v-for="(event, index) in results.data">
            <div class="card mb-4 box-shadow">
              <!-- Event image -->
              <!-- <img class="card-img-top" style="; max-width:100%" :src="'/images/products_lg/' + result.display_src" data-holder-rendered="true"> -->
              <img class="card-img-top" style="; max-width:100%" :src="'/images/'+event.image_src" data-holder-rendered="true" alt="Event image">
              <div class="card-body">
                <!-- Event Title -->
                <h4>{{event.title}}</h4>
                <!-- Event Description -->
                <p class="card-text">{{event.description}}</p>
                <!-- Event buttons -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-block btn-primary" @click="setSelectedEvent(index)" href="#eventSchedule" data-toggle="modal">Book Now</button>
                  </div>
                  <small class="text-muted">{{event.duration}}</small>
                </div>
              </div>
            </div>
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



      <!-- Modal -->

      <div class="modal" id="eventSchedule" aria-modal="true" data-backdrop="static" v-if="selected != null">
        <div class="modal-dialog  modal-lg m-t-50">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white ">
              <h4 class="modal-title">Event Schedule and Bookings</h4>
              <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <!-- End modal header -->
            <!-- Modal Body -->
            <div class="modal-body">

              <div class="row">
                <div class="col-md-6">
                  <img class="card-img-top img-fullwidth" style="; max-width:100%" :src="'/images/'+selected.image_src" data-holder-rendered="true" alt="Event image">
                </div>
                <div class="col-md-6">

                  <h2>{{ selected.title }}</h2>
                  <p>{{ selected.description }}</p>

                  <h5>Book Now</h5>

                  <form>
                    <div class="form-group">
                      <input type="text" v-model="booking.name" class="form-control"  placeholder="Your Name"
                      :class="errors['booking.name'] != undefined ? 'is-invalid' : ''">
                      <div class="invalid-feedback"
                      v-if="errors['booking.name'] != undefined" v-for="error in errors['booking.name']"
                      >{{error}}</div>
                    </div>
                    <div class="form-group">
                      <input type="email" v-model="booking.email" class="form-control"  placeholder="Your Email"
                      :class="errors['booking.email'] != undefined ? 'is-invalid' : ''">
                      <div class="invalid-feedback"
                      v-if="errors['booking.email'] != undefined" v-for="error in errors['booking.email']"
                      >{{error}}</div>
                    </div>
                    <div class="form-group">
                      <input type="text" v-model="booking.phone" class="form-control" placeholder="Phone Number"
                      :class="errors['booking.phone'] != undefined ? 'is-invalid' : ''">
                      <div class="invalid-feedback"
                      v-if="errors['booking.phone'] != undefined" v-for="error in errors['booking.phone']"
                      >{{error}}</div>
                    </div>
                    <div class="form-group">

                      <v-select v-model="booking.session"
                      :options="bookingSchedule"
                      :clearable="false"
                      label="session"
                      :reduce="schedule => schedule.session"
                      :class="errors['booking.session'] != undefined ? 'is-invalid' : ''"
                      placeholder="Select a Session"></v-select>
                      <div class="invalid-feedback"
                      v-if="errors['booking.session'] != undefined" v-for="error in errors['booking.session']"
                      >{{error}}</div>
                    </div>
                  </form>

                </div>
              </div>




            </div>



            <!-- End Modal Body -->
            <!-- Footer -->
            <div class="modal-footer">
              <a href="javascript:;" class="btn btn-white" data-dismiss="modal" aria-hidden="true">Cancel</a>
              <a href="javascript:;" class="btn btn-primary" @click="bookEvent()">Sign Up</a>
            </div>
          </div>
          <!-- End Footer -->
        </div>
      </div>




    </div>
  </template>

  <script>
    export default {
      name: "event-index",
      props: {
        eventData: {
          type: Object
        }
      },
      data() {
        return {
          errors : {},
          results: this.eventData,
          selected: null,
          booking : {
            event : '',
            name : '',
            email : '',
            phone : '',
            session : '',
          }
        };
      },
      methods: {
        bookEvent() {
            // Reset Errors
            this.errors = {};
            this.success = false;

            axios({
                    method: 'post',
                    url: `/events/store`,
                    data: {
                        booking: this.booking,
                    },
                })
                .then(response => {
                    if (response.status == 200) {

                      Vue.toasted.show("Booking Created, See you there!.", {
                        theme: "toasted-primary",
                        type: "success",
                        position: "top-right",
                        duration : 5000
                      });

                        this.closeModal();
                    }
                })
                .catch(error => {
                    // set error array
                    this.errors = error.response.data.errors;
                });
        },
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
        closeModal() {
          // Hide modal
          $('.modal-backdrop').remove();
          $('#eventSchedule').modal('hide');
        },
      },
      computed: {
        bookingSchedule() {
          return this.selected.schedules;
        }
      }
    }
  </script>
