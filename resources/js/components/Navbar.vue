<template>
    <b-navbar type="is-black">
        <template slot="brand">
            <b-navbar-item href="/" tag="a">
                <img
                    alt="Project manager"
                    src="/img/logo/logo_main.png"
                >
            </b-navbar-item>
        </template>
        <template slot="start">
            <b-navbar-item href="/home">
                Home
            </b-navbar-item>

            <b-navbar-dropdown label="Projects">
                <b-navbar-item href="/project/create">
                    Create
                </b-navbar-item>
                <b-navbar-item href="/project">
                    My
                </b-navbar-item>
            </b-navbar-dropdown>
        </template>

        <template slot="end">
            <b-navbar-item tag="div" v-if="guest">
                <div class="buttons">
                    <a class="button is-primary" href="/register">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-dark" href="/login">
                        Log in
                    </a>
                </div>

            </b-navbar-item>

            <b-navbar-dropdown :label="username" v-else>
                <b-navbar-item @click="submitLogoutForm">
                    Logout
                </b-navbar-item>
                <form action="/logout" method="post" ref="form">
                    <input :value="csrf" name="_token" type="hidden">
                </form>
            </b-navbar-dropdown>
        </template>
    </b-navbar>

</template>

<script>
    export default {
        name: "Navbar",
        props: {
            guest: {
                default: true,
            },
            username: {
                required: false,
            },
        },
        methods: {
            submitLogoutForm() {
                this.$refs.form.submit();
            }
        },
        data: function () {
            return {
                csrf: Laravel.csrf
            };
        }

    }
</script>

<style scoped>
    nav {
        border-bottom: 1px solid #050505;
    }
</style>
