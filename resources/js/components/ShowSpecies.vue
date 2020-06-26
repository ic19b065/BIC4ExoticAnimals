<template>
    <div class="card">
        <div>
            <h2><b>Name:</b> {{form.name}}</h2>
            <h2><b>Description:</b> {{form.description}}</h2>
            <h2><b>Created at:</b> {{form.created_at | moment('DD.MM.YYYY')}}</h2>
            <h2><b>Updated at:</b> {{form.updated_at | moment('DD.MM.YYYY')}}</h2>
        </div>
        <div>
            <p class="buttons">
                <a :href="'/species/' + form.slug + '/edit'" class="button is-outlined is-primary is-fullwidth has-background-warning">
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
        'slug': '',
        'name': '',
        'description': '',
        'created_at': '',
        'updated_at': '',
        'noReset': ['species_id']
    });
    export default {
        name: "ShowAnimalComponent",
        components: {
            QueryMessage
        },
        props: {
            currentSpecies: {
                currentSpecies: {
                    required: false,
                    type: Object
                }
            }
        },
        data() {
            return {
                form: form,
                url: ''
            }
        },
        created() {
            this.url = '/species/' + this.currentSpecies.slug;
            this.form.id = this.currentSpecies.id;
            this.form.slug = this.currentSpecies.slug;
            this.form.name = this.currentSpecies.name;
            this.form.description = this.currentSpecies.description;
            this.form.created_at = this.currentSpecies.created_at;
            this.form.updated_at = this.currentSpecies.updated_at;

            this.form.noReset = ['id', 'slug', 'name', 'description', 'created_at', 'updated_at'];
        }
    }

</script>




