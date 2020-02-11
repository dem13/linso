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

            <b-button native-type="submit" type="is-success">Create</b-button>
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
        },
    }
</script>

<style scoped>

</style>
