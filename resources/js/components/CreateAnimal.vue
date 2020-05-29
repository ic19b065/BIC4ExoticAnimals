<template>
    <div>
        <!-- <h2>Create Animal</h2> -->
        <form @submit.prevent="submit">
            <div>
                <!--<input id="id" class="input" type="number" placeholder="ID" v-model="form.id" v-bind:class="{ 'is-danger': form.errors.has('id')}">-->
                <input id="name" class="input" type="text" placeholder="Name" v-model="form.name" v-bind:class="{ 'is-danger': form.errors.has('name')}">
                <!--<input id="species" class="input" type="text" placeholder="Species" v-model="form.species" v-bind:class="{ 'is-danger': form.errors.has('species')}">-->
                <input id="description" class="input" type="text" placeholder="Description" v-model="form.description" v-bind:class="{ 'is-danger': form.errors.has('description')}">
                <input id="species_id" class="input" type="text" placeholder="Species ID" v-model="form.species_id" v-bind:class="{ 'is-danger': form.errors.has('species_id')}">
                <!--<input id="created_at" class="input" type="date" placeholder="Description" v-model="form.created_at" v-bind:class="{ 'is-danger': form.errors.has('created_at')}">-->
                <!--<input id="updated_at" class="input" type="date" placeholder="Description" v-model="form.updated_at" v-bind:class="{ 'is-danger': form.errors.has('updated_at')}">-->
            </div>
            <button type="submit">create</button>
        </form>
    </div>
</template>
<script>
    let form = new Form({
        //'id': '',
        'name': '',
        //'species': '',
        'description': '',
        'species_id': '',
        //'created_at': '',
        //'updated_at': '',
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
                        //this.form.id = response.id;
                        this.form.name = response.name;
                        //this.form.species = response.species;
                        this.form.description = response.description;
                        this.form.species_id = response.species_id;
                        //this.form.created_at = response.created_at;
                        //this.form.updated_at = response.updated_at;

                        this.form.noReset = ['id', 'name', 'species', 'description', 'species_id', 'created_at', 'updated_at' ];
                        alert('Animal created!');
                        //this.edit = true;
                    })
                .catch(e => {
                    console.log(e);
                });

            }
        },
        created() {
            this.url = '/animal';
        }

    }
</script>




