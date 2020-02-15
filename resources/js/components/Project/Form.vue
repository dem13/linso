<template>
    <div class="project-form">
        <form :action="action" method="post">
            <input :value="method" name="_method" type="hidden">
            <input :value="csrf" name="_token" type="hidden">
            <b-field label="Name">
                <b-input name="name" maxlength="255" type="text"
                         :value="name">
                </b-input>
            </b-field>

            <b-field label="Description">
                <b-input name="desc" maxlength="5000" type="textarea" :value="desc"></b-input>
            </b-field>


            <b-button icon-left="plus-circle" native-type="submit" type="is-success" v-if="id === null">Create
            </b-button>
            <template v-else>
                <b-button icon-left="content-save" native-type="submit" type="is-success">Save
                </b-button>
                <b-button :href="`/project/${id}`" class="project-form__show" icon-left="eye" tag="a" type="is-primary">
                    Show
                </b-button>
            </template>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Form",
        props: {
            method: {
                default: 'POST'
            },
            csrf: String,
            action: {
                default: ''
            },
            name: {
                default: ''
            },
            desc: {
                default: ''
            },
            id: {
                default: null
            }
        },
    }
</script>

<style scoped>
    .project-form__show {
        margin-left: 10px;
    }
</style>
