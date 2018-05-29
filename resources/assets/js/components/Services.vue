<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>Categories</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="service">Service:</label>
                            <input placeholder="Enter the name of service" type="text" v-on:keyup.13="create" id="service" v-model="name" class="form-control">
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="service in services">
                                {{ service.name }}
                                <a :href="`/services/${service.id}`" class="btn btn-danger" @click.prevent="destroy(service)">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                name: '',
                services: this.data
            }
        },

        methods: {
            create() {
                let name = this.name;

                axios.post('services', { name: name })
                    .then((response) => {
                        this.services.push(response.data);
                        this.name = '';
                    })
                    .catch(error => console.log(error));
            },

            destroy(service) {
                let index = this.services.indexOf(service)

                axios.delete(`/services/${service.id}`)
                    .then(() => {
                        this.services.splice(index, 1);
                    })
                    .catch(error => console.log(error));
            }
        }
    }
</script>
