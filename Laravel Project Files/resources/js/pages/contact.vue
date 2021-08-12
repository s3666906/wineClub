<template>
<div>
    <div class="breadcrumb-wrapper">

        <ol class="breadcrumbs" role="navigation" aria-label="breadcrumbs">
            <li>
                <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
            </li>

            <li>
                <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
                <span>Contact Us</span>
            </li>

        </ol>
    </div>
    <div class=" container py-4">

        <div class=" text-center">
            <h2 class="display-4 p-4 text-center">How to get in touch</h2>
            <p class="lead">We welcome visitors and invite you to book a tour of our site<br>
                Complete the form below with your query and we will endeavour to respond within 24 hours
            </p>
        </div>

        <hr>

        <div class="alert alert-success" role="alert" v-if="success">
            Form successfully Submitted - We will get in contact as soon as we can!
        </div>

        <div class="row mt-5">
            <div class=" col-md-6 ">

                <h2 class="text-center">Message Us</h2>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Your name">
                    <div class="text-danger" v-if="errors['form.name'] != undefined" v-for="error in errors['form.name']">{{error}}</div>
                </div>
                <div class="form-group">
                    <label for="Name">Email</label>
                    <input v-model="form.email" type="text" class="form-control" id="name" placeholder="Your email">
                    <div class="text-danger" v-if="errors['form.email'] != undefined" v-for="error in errors['form.email']">{{error}}</div>
                </div>
                <div class="form-group">
                    <label for="Name">Phone</label>
                    <input v-model="form.phone" type="text" class="form-control" id="name" placeholder="Your Phone Number">
                    <div class="text-danger" v-if="errors['form.phone'] != undefined" v-for="error in errors['form.phone']">{{error}}</div>
                </div>
                <div class="form-group">
                    <label for="Name">Subject</label>
                    <input v-model="form.subject" type="text" class="form-control" id="name" placeholder="The topic of the enquiry">
                    <div class="text-danger" v-if="errors['form.subject'] != undefined" v-for="error in errors['form.subject']">{{error}}</div>
                </div>
                <div class="form-group">
                    <label for="Name">Message</label>
                    <textarea v-model="form.message" type="text" class="form-control" id="name" placeholder="How can we help?" rows="4"></textarea>
                    <div class="text-danger" v-if="errors['form.message'] != undefined" v-for="error in errors['form.message']">{{error}}</div>
                </div>

                <button type="button" class="btn btn-primary" @click="submitForm()">Submit</button>

            </div>
            <div class="col-md-5 offset-md-1">
                <h2 class="text-center">Or Come visit the Vineyard!</h2>

                <iframe width="450" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDuBb6U3zoxNp-rWClBlHoeZmgYEFq1gBw&q=Bayside+Green&center=-27.5258225,153.2101794&zoom=14
  &maptype=roadmap" allowfullscreen>
                </iframe>

                <address id="contacts-address">
                    24 Hilliards Creek Road</br>
                    HILLIARDS CREEK, QLD, 4160</br>
                    Phone: (07) 1234 5678<br>
                    Email: <a href="mailto:enquiries@hilliardscreek.com.au">enquiries@hilliardscreek.com.au</a>
                </address>
            </div>
        </div>

        <!-- start of contact details section-->

    </div>
</div>
</template>

<script>
export default {
    name: "ContactForm",
    data() {
        return {
            errors: {},
            success: false,
            form: {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: '',
            }
        };
    },

    methods: {
        resetForm() {
            this.form = {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: '',
            }
        },
        submitForm() {
            // Reset Errors
            this.errors = {};
            this.success = false;

            axios({
                    method: 'post',
                    url: `/contact`,
                    data: {
                        form: this.form,
                    },
                })
                .then(response => {
                    if (response.status == 200 || response.status == 201) {
                        // Display a confirmation here
                        this.success = true;
                        // this.resetForm();
                        // Reset Form
                    }
                })
                .catch(error => {
                    // set error array
                    this.errors = error.response.data.errors;
                });
        },
    },
    mounted() {},
}
</script>
