<template>

    <div>
        <!-- <h2>Animals</h2> -->
        <h2 v-if="isShow"><br>Animals from this species:<br></h2>
        <table class="table has-background-success is-bordered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Species</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            <tr v-for="animal in animals" v-if="!isShow">
                <td>{{ animal.name }}</td>
                <td>{{ animal.description }}</td>
                <td v-for="specie in species" v-if="specie.id == animal.species_id">
                    {{ specie.name }}</td>
                <td>{{ animal.created_at | moment('DD.MM.YYYY')}}</td>
                <td>{{ animal.updated_at | moment('DD.MM.YYYY')}}</td>
                <td>
                    <p class="buttons">
                        <a :href="'/animal/' + animal.slug + '/edit'" class="button is-info is-outlined has-background-warning">
                            <span class="icon">
                                Edit
                            </span>
                        </a>
                    </p>
                </td>
                <td>
                    <p class="buttons">
                        <a :href="'/animal/' + animal.slug" class="button is-info is-outlined has-background-warning">
                            <span class="icon">
                                Show
                            </span>
                        </a>
                    </p>
                </td>
            </tr>
            <tr v-for="animal in animals" v-if="isShow && animal.species_id==currentSpecies.id">
                <td>{{ animal.name }}</td>
                <td>{{ animal.description }}</td>
                <td v-for="specie in species" v-if="specie.id == animal.species_id">
                    {{ specie.name }}</td>
                <td>{{ animal.created_at | moment('DD.MM.YYYY')}}</td>
                <td>{{ animal.updated_at | moment('DD.MM.YYYY')}}</td>
                <td>
                    <p class="buttons">
                        <a :href="'/animal/' + animal.slug + '/edit'" class="button is-info is-outlined has-background-warning">
                            <span class="icon">
                                Edit
                            </span>
                        </a>
                    </p>
                </td>
                <td>
                    <p class="buttons">
                        <a :href="'/animal/' + animal.slug" class="button is-info is-outlined has-background-warning">
                            <span class="icon">
                                Show
                            </span>
                        </a>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</template>
<script>
    export default {

        components: {
            QueryMessage
        },
        props: {
            isShow: {
                required: false,
                type: Boolean,
                default: false
            },
            currentSpecies: {
                required: false,
                type: Object
            }
        },
        data() {
            return {
                animals: [],
                animal: {
                    id: '',
                    name: '',
                    slug: '',
                    species: '',
                    description: '',
                    species_id: '',
                    created_at: '',
                    updated_at: ''
                },
                animal_id: '',
                species: [],
                specie: {
                    id: '',
                    slug: '',
                    name: '',
                    description: '',
                    created_at: '',
                    updated_at: ''
                },
                species_id: ''
            }
        },

        created() {
            this.fetchAnimals();
            this.fetchSpecies();
        },
        methods: {
            fetchAnimals() {
                fetch('../list/animal')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.animals=res;
                    })

            },
            submit()    {
                this.animal.delete(`/animal/$(animal.slug`);
                alert('Animal deleted');
            },
            fetchSpecies() {
                fetch('../list/species')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.species=res;
                    })

            }
        }
    }
</script>



