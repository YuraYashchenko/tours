<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" v-text="tour.name"></h3>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="row">
                            <div class="col-md-5">
                                <img :src="tour.image" width="320" height="250" class="mr-1">
                            </div>
                            <div class="col-md-7">
                                <h5>Description: {{ tour.description }}</h5>
                                <h5>Price: {{ tour.price }}</h5>
                                <h5>Region: {{ tour.region }}</h5>
                                <h5>Stars: {{ tour.stars }}</h5>
                                <!--<h5>Services: {{ convertToString($tour->services) }} </h5>-->
                                <h5>Start date: {{  tour.start_date }}</h5>
                                <h5>End date: {{ tour.end_date }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                    <button class="btn btn-block btn-success" @click.prevent="buy">Order</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['tour'],

        methods: {
            buy() {
                this.setOptions();

                this.stripe.open({
                    name: this.tour.name,
                    description: 'Buy a tour',
                    amount: this.tour.price
                });
            },

            setOptions() {
                this.stripe = StripeCheckout.configure({
                    key: 'pk_test_ZD1Zu1tAMXqABoD35737DPc6',
                    image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                    locale: "auto",
                    token: token => {
                        let data = {
                            stripeToken: token.id,
                            stripeEmail: token.email,
                            tourId: this.tour.id
                        }

                        axios.post('/purchases', data)
                            .then(() => alert('!!!'));
                    }
                });
            }
        }
    }
</script>
