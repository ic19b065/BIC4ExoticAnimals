<template>

    <div>
        <!-- <h2>Animals</h2> -->
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
                <td>
                    <p class="buttons">
                        <a :href="'/animal/' + animal.slug + '/edit'" class="button is-info is-outlined">
                            <span class="icon">
                                Edit
                              <i class="fa fa-edit"></i>
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
                animal_id: ''
            }
        },

        created() {
            this.fetchAnimals();
        },
        methods: {
            fetchAnimals() {
                fetch('list/animal')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.animals=res;
                    })

            },
            submit()    {
                this.animal.delete(`/animal/$(animal.slug`);
                alert('Animal deleted');
            }

        }
    }
</script>



