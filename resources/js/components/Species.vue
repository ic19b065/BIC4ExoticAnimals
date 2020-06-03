<template>
    <div>
        <!-- <h2>Species</h2> -->
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            <tr v-for="specie in species">
                <td>{{ specie.id }}</td>
                <td>{{ specie.slug }}</td>
                <td>{{ specie.name }}</td>
                <td>{{ specie.description }}</td>
                <td>{{ specie.created_at }}</td>
                <td>{{ specie.updated_at }}</td>
                <td>
                    <p class="buttons">
                        <a :href="'/species/' + specie.slug + '/edit'" class="button is-info is-outlined">
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
            this.fetchSpecies();
        },
        methods: {
            fetchSpecies() {
                fetch('list/species')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.species=res;
                    })

            },

        }
    }
</script>



