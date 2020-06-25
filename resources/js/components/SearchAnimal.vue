<template>
    <div>
        <!-- <h2>Search Animals</h2> -->
        <table class="table has-background-success is-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Species-ID</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            <tr v-for="animal in animals" v-if="animal.name==form.name">
                <td>{{ animal.id }}</td>
                <td>{{ animal.name }}</td>
                <td>{{ animal.slug }}</td>
                <td>{{ animal.description }}</td>
                <td>{{ animal.species_id }}</td>
                <td>{{ animal.created_at | moment('DD.MM.YYYY')}}</td>
                <td>{{ animal.updated_at | moment('DD.MM.YYYY')}}</td>
            </tr>
        </table>
        <form @submit.prevent="submit">
            <div>
                <input id="name" class="input has-background-grey-light" type="text" placeholder="Name" v-model="form.name" v-bind:class="{ 'is-danger': form.errors.has('name')}">
            </div>
            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth has-background-warning">search</button>
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
                url: ''
            }
        },

        methods: {
            submit() {
                fetch('/list/animal')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.animals=res;
                    })
            },

        }
    }
</script>



