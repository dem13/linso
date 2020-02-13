<template>
    <form action="/register" method="POST">
        <section>
            <b-field label="Name">
                <b-input maxlength="100" name="name" v-model="name"></b-input>
            </b-field>

            <b-field label="Email">
                <b-input maxlength="100" name="email" type="email"
                         v-model="email">
                </b-input>
            </b-field>

            <b-field label="Password">
                <b-input name="password" type="password" v-model="password">
                </b-input>
            </b-field>

            <b-field :type="isDanger" label="Confirm Password">
                <b-input name="password_confirmation" type="password" v-model="conf_password">
                </b-input>
            </b-field>

            <b-field>
                <b-button native-type="submit" type="is-primary">Register</b-button>
            </b-field>
        </section>

        <input :value="csrf" name="_token" type="hidden">
    </form>
</template>

<script>
    export default {
        name: "LoginForm",
        props: {
            name: {
                required: false
            },
            email: {
                required: false
            }
        },
        data: function () {
            return {
                csrf: Laravel.csrf,
                password: '',
                conf_password: '',
            };
        },
        computed: {
            isDanger: function () {
                if (this.conf_password !== this.password) {
                    return 'is-danger';
                } else {
                    return '';
                }
            }
        }
    }
</script>

<style scoped>
    .login-button > div {
        margin-right: 10px;
    }
</style>
