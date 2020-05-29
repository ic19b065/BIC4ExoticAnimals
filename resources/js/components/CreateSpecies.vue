<template>
    <div>
        <!-- <h2>Create Species</h2> -->
        <form @submit.prevent="submit">
            <div>
                <input id="name" class="input" type="text" placeholder="Name" v-model="form.name" v-bind:class="{ 'is-danger': form.errors.has('name')}">
                <input id="description" class="input" type="text" placeholder="Description" v-model="form.description" v-bind:class="{ 'is-danger': form.errors.has('description')}">
            </div>
            <button type="submit">create</button>
        </form>
    </div>
</template>
<script>
    let form = new Form({
        'name': '',
        'description': '',

    });

    export default {
        name: "CreateSpeciesComponent",
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
                        this.url = '/species/' + response.slug;
                        this.form.name = response.name;
                        this.form.description = response.description;

                        this.form.noReset = ['id', 'name', 'species', 'description', 'created_at', 'updated_at' ];
                        alert('Species created!');
                    })
                    .catch(e => {
                        console.log(e);
                    });

            }
        },
        created() {
            this.url = '/species';
        }

    }
</script>




