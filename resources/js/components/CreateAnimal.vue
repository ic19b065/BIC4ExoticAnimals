<template>
    <div>
        <!-- <h2>Create Animal</h2> -->
        <form @submit.prevent="submit">
            <div>
                <input id="name" class="input" type="text" placeholder="Name" v-model="form.name" v-bind:class="{ 'is-danger': form.errors.has('name')}">
                <input id="description" class="input" type="text" placeholder="Description" v-model="form.description" v-bind:class="{ 'is-danger': form.errors.has('description')}">
                <input id="species_id" class="input" type="text" placeholder="Species ID" v-model="form.species_id" v-bind:class="{ 'is-danger': form.errors.has('species_id')}">
            </div>
            <button type="submit">create</button>
        </form>
    </div>
</template>
<script>
    let form = new Form({
        'name': '',
        'description': '',
        'species_id': '',

    });

    export default {
        name: "CreateAnimalComponent",
        components: {
            QueryMessage
        },
        data() {
            return {
                form: form,
                url: ''
            }
        },

        methods: {
            submit() {

                this.form
                    .post(this.url)
                    .then((response) => {
                        this.url = '/animal/' + response.slug;
                        //this.url = '/animal';
                        this.form.name = response.name;
                        this.form.description = response.description;
                        this.form.species_id = response.species_id;


                        this.form.noReset = ['id', 'name', 'species', 'description', 'species_id', 'created_at', 'updated_at' ];
                        alert('Animal created!');
                    })
                .catch(e => {
                    console.log(e);
                    alert('Creation not successful!');
                });

            }
        },
        created() {
            this.url = '/animal';
        }

    }
</script>




