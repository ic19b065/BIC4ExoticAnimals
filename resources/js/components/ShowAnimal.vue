<template>
    <div>
        <!-- <h2>Show Animals</h2> -->
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Species-ID</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            <tr v-for="animal in animals">
                <td>{{ animal.id }}</td>
                <td>{{ animal.name }}</td>
                <td>{{ animal.slug }}</td>
                <td>{{ animal.description }}</td>
                <td>{{ animal.species_id }}</td>
                <td>{{ animal.created_at }}</td>
                <td>{{ animal.updated_at }}</td>
            </tr>
        </table>
        <form @submit.prevent="submit">
            <div>
                <input id="slug" class="input" type="text" placeholder="Slug" v-model="form.slug" v-bind:class="{ 'is-danger': form.errors.has('slug')}">
            </div>
            <button type="submit">show</button>
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
                fetch('http://localhost:8000/animal/' + this.form.slug)
                    //.then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.animals=res;
                    })

            },

        }
    }
</script>



