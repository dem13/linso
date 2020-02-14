<template>
    <div class="dashboard-menu">
        <b-menu>
            <b-menu-list label="Dashboard">
                <b-menu-item :active="route === 'home'" href="/home" icon="home" label="Home"></b-menu-item>
            </b-menu-list>

            <b-menu-list label="Project">
                <b-menu-item :active="route === 'project.create'" href="/project/create" icon="plus-circle"
                             label="Create"></b-menu-item>
                <b-menu-item :active="route === 'project.index'" href="/project" icon="format-list-bulleted"
                             label="List"></b-menu-item>
            </b-menu-list>
        </b-menu>
    </div>
</template>

<script>
    export default {
        name: "Menu",
        data: function () {
            return {
                route: Laravel.route
            };
        }
    }
</script>

<style scoped>
    .dashboard-menu {
        padding: 5px;
        padding-top: 20px;
    }
</style>
