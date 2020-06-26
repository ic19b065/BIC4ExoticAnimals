<template>
    <div>
        <header class="card-header has-background-success">
            <h1 class="card-header-title is-centered" v-text="edit ? form.title : 'New Animal'" />
        </header>
        <!-- <h2>Create Animal</h2> -->
        <query-message :success="form.isSuccess()" :fail="form.isFail()"
                       :message="form.failMessage || form.successMessage"></query-message>
        <form @submit.prevent="submit">
            <div class="field" v-if="!edit">
                <label class="label" for="name">Name</label>
                <div class="control">
                    <input id="name"
                           v-model="form.name"
                           class="input has-background-grey-light"
                           v-bind:class="{ 'is-danger': form.errors.has('name')}"
                           type="text" autofocus>
                </div>
                <p class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')" />
            </div>

            <div class="field">
                <label class="label" for="description">Description</label>
                <div class="control">
                    <textarea id="description" v-model="form.description" class="textarea has-background-grey-light"></textarea>
                </div>
                <p class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')" />
            </div>
            <div class="field">
                <label class="label" for="species_id">Chooce Species from Dropdown:</label>
                <div class="control">
                    <select id="species_id" v-model="form.species_id" class="input has-background-grey-light">
                        <option v-for="specie in species" :value="specie.id">{{specie.name}}</option>
                    </select>
                </div>
                <p class="help is-danger" v-if="form.errors.has('species_id')" v-text="form.errors.get('species_id')" />
            </div>

            <button type="submit" class="button is-large is-primary is-outlined is-fullwidth has-background-warning" v-text="edit ? 'Save' : 'Create'" />
            <div v-if="edit">
                <button @click="delete_animal" class="button is-danger is-large is-primary is-outlined is-fullwidth">Delete</button>
            </div>
        </form>
    </div>
</template>
<script>
    let form = new Form({
        'name': '',
        'description': '',
        'species_id': '',
        'noReset': ['animal_id']
    });

    export default {
        name: "CreateAnimalComponent",
        components: {
            QueryMessage
        },
        props: {
            isEditable: {
                required: false,
                type: Boolean,
                default: false
            },
            currentAnimal: {
                required: false,
                type: Object
            }
        },
        data() {
            return {
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

        methods: {
            submit() {
                if(this.edit)
                    this.form
                        .put(this.url);
                else
                    this.form
                        .post(this.url)
                        .then((response) => {
                            this.url = '/animal/' + response.slug;

                            this.form.name = response.name;
                            this.form.description = response.description;
                            this.form.species_id = response.species_id;

                            this.form.noReset = ['name', 'description', 'species_id'];

                            this.edit = true;
                        });
                window.location.href = '/animal';

            },
            delete_animal () {
                this.form.delete('/animal/' + this.currentAnimal.slug);
                window.location.href = '/animal';
            },
            fetchSpecies() {
                fetch('../list/species')
                    .then(res => res.json())
                    .then(res => {
                        console.log(res);
                        this.species=res;
                    })

            }
        },
        created() {
            this.edit = this.isEditable;

            if(this.edit) {
                this.fetchSpecies();
                this.url = '/animal/' + this.currentAnimal.slug;
                this.form.name = this.currentAnimal.name;
                this.form.description = this.currentAnimal.description;
                this.form.species_id = this.currentAnimal.species_id;

                this.form.noReset = ['name', 'description', 'species_id'];
            }
            else {
                this.fetchSpecies();
                this.url = '/animal';
            }
        }

    }
</script>




