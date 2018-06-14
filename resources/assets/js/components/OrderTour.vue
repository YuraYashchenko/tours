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
                                <h5>Price per day, UAH: {{ tour.price / 100 }}</h5>
                                <h5>Region: {{ tour.region }}</h5>
                                <h5>Stars: {{ tour.stars }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="start-date">Start date of a trip: </label>
                <input class="form-control" type="date" id="start-date" v-model="startDate"/>
            </div>

            <div class="form-group mt-3">
                <label for="end-date">End date of a trip: </label>
                <input class="form-control" type="date" id="end-date" v-model="endDate"/>
            </div>

            <div class="form-group mt-3">
                <label for="end-date">Numbers of people: </label>
                <input class="form-control" type="text" v-model="number"/>
            </div>

            <div class="form-group mt-3">
                <label for="end-date">Choose food type: </label>
                <select name="food_type" class="form-control" id="food-type" v-model="foodType">
                    <option :value="food.id" v-for="food in tour.food_prices" v-text="`${food.name}/${food.price/100}UAH`"></option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="end-date">Choose food type: </label>
                <select name="food_type" class="form-control" id="room-type" v-model="roomType">
                    <option :value="room.id" v-for="room in tour.room_prices" v-text="`${room.name}/${room.price/100}UAH`"></option>
                </select>
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-block btn-success" @click.prevent="buy">Order</button>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['tour', 'stripeKey'],

        data() {
            return {
                endDate: moment().add('days', 1).format('YYYY-MM-DD'),
                startDate: moment().format('YYYY-MM-DD'),
                number: 1,
                foodType: 1,
                roomType: 1
            };
        },

        methods: {
            buy() {
                this.setOptions();

                this.stripe.open({
                    name: this.tour.name,
                    description: 'Buy a tour',
                    amount: this.calculatePrice()
                });
            },

            calculatePrice() {
                let diffInSeconds =  Date.parse(this.endDate) - Date.parse(this.startDate);

                if (diffInSeconds < 0) {
                    alert('Incorrect date');
                    throw new Error('Incorrect Date.');
                }
                console.log(moment.duration(diffInSeconds).days() * Number.parseInt(this.number) * (this.tour.price + this.getFoodPrice(this.foodType) + this.getRoomPrice(this.roomType)));
                return moment.duration(diffInSeconds).days() * Number.parseInt(this.number) * (this.tour.price + this.getFoodPrice(this.foodType) + this.getRoomPrice(this.roomType));
            },

            getFoodPrice(id) {
               let food = this.findById(id, this.tour.food_prices);

               return food.price;
            },

            getRoomPrice(id) {
                let room = this.findById(id, this.tour.room_prices);

                return room.price;
            },

            findById(id, items) {
                for (let key in items) {
                    if (items[key].id == id)
                        return items[key];
                }
            },

            setOptions() {
                this.stripe = StripeCheckout.configure({
                    key: this.stripeKey,
                    image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                    locale: "auto",
                    currency: 'uah',
                    token: token => {
                        let data = {
                            stripeToken: token.id,
                            stripeEmail: token.email,
                            tourId: this.tour.id,
                            end_date: this.endDate,
                            start_date: this.startDate,
                            number: this.number,
                            foodId: this.foodType,
                            roomId: this.roomId
                        }

                        axios.post('/purchases', data)
                            .then(() => window.location.href = '/user/tours');
                    }
                });
            }
        }
    }
</script>
