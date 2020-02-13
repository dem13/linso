<template>
    <form action="/login" method="POST">
        <section>
            <b-field label="Email">
                <b-input icon="email" name="email"
                         placeholder="Email"
                         type="email">
                </b-input>
            </b-field>

            <b-field label="Password">
                <b-input name="password" password-reveal
                         type="password">
                </b-input>
            </b-field>

            <b-field label="Remember Me">
                <b-switch false-value="No"
                          name="remember"
                          true-value="Yes">
                </b-switch>
            </b-field>

            <div class="is-flex login-button">
                <div>
                    <b-button native-type="submit" type="is-primary">Login</b-button>
                </div>
                <div>
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </section>

        <input :value="csrf" name="_token" type="hidden">
    </form>
</template>

<script>
    export default {
        name: "LoginForm",
        data: function () {
            return {
                csrf: Laravel.csrf
            };
        }
    }
</script>

<style scoped>
    .login-button > div {
        margin-right: 10px;
    }
</style>
