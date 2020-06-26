<template>
    <div class="card">
        <div>
            <h2><b>Name:</b> {{form.name}}</h2>
            <h2><b>Description:</b> {{form.description}}</h2>
            <h2 v-for="specie of species" v-if="specie.id == form.species_id"><b>Species:</b> {{specie.name}}</h2>
            <h2><b>Created at:</b> {{form.created_at | moment('DD.MM.YYYY')}}</h2>
            <h2><b>Updated at:</b> {{form.updated_at | moment('DD.MM.YYYY')}}</h2>
        </div>
        <div>
            <p class="buttons">
                <a :href="'/animal/' + form.slug + '/edit'" class="button is-outlined is-primary is-fullwidth has-background-warning">
                            <span class="icon">
                                Edit
                            </span>
                </a>
            </p>
        </div>
    </div>
</template>
<script>
    let form = new Form({
        'id': '',
        'name': '',
        'slug': '',
        'description': '',
        'species_id': '',
        'created_at': '',
        'updated_at': '',
        'noReset': ['animal_id']
    });
    export default {
        name: "ShowAnimalComponent",
        components: {
            QueryMessage
        },
        props: {
            currentAnimal: {
                currentAnimal: {
                    required: false,
                    type: Object
                }
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
        created() {
            this.fetchSpecies();

            this.url = '/animal/' + this.currentAnimal.slug;
            this.form.id = this.currentAnimal.id;
            this.form.name = this.currentAnimal.name;
            this.form.slug = this.currentAnimal.slug;
            this.form.description = this.currentAnimal.description;
            this.form.species_id = this.currentAnimal.species_id;
            this.form.created_at = this.currentAnimal.created_at;
            this.form.updated_at = this.currentAnimal.updated_at;

            this.form.noReset = ['id', 'name', 'slug', 'description', 'species_id', 'created_at', 'updated_at'];
        },
        methods: {
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




