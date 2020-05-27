<template>


    <div>
        <h2>Animals</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Species-ID</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            <tr v-for="animal in animals">
                <td>{{ animal.id }}</td>
                <td>{{ animal.name }}</td>
                <td>{{ animal.description }}</td>
                <td>{{ animal.species_id }}</td>
                <td>{{ animal.created_at }}</td>
                <td>{{ animal.updated_at }}</td>
            </tr>
            <tr>
                <!--<td>{{ animals[0].id }}</td>
                <td>{{ animals[0].animal }}</td>
                <td>{{ animals[0].description }}</td>
                <td>{{ animals[0].species_id }}</td>
                <td>{{ animals[0].created_at }}</td>
                <td>{{ animals[0].updated_at }}</td>-->
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
                    animal: '',
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

        }
    }
</script>



