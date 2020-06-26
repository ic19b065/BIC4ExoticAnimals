<template>
    <div>
        <!-- <h2>Search Animals</h2> -->
        <table class="table has-background-success is-bordered" v-if="showTable">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Species</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            <tr v-for="animal in animals" v-if="animal.name==form.name">
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
        <h1>Name of the animal to search for:</h1>
        <form @submit.prevent="submit">
            <div>
                <input id="name" class="input has-background-grey-light" type="text" placeholder="Name of the Animal" v-model="form.name" v-bind:class="{ 'is-danger': form.errors.has('name')}">
            </div>
            <div>
                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth has-background-warning">search</button>
            </div>
        </form>
    </div>
</template>
<script>
    let form = new Form({
        'name': '',
    });
    export default {
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
                form: form,
                url: '',
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
        props: {
            showTable: {
                required: false,
                type: Boolean,
                default: false
            }
        },
        created() {
            this.fetchSpecies();
        },
        methods: {
            submit() {
                fetch('/list/animal')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.animals=res;
                        this.showTable=true;
                    })
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



