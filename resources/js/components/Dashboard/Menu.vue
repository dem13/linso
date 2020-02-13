<template>
    <div class="dashboard-menu">
        <b-menu>
            <b-menu-list label="Project">
                <b-menu-item icon="plus-circle" label="Create"></b-menu-item>
                <b-menu-item icon="format-list-bulleted" label="List"></b-menu-item>
            </b-menu-list>
        </b-menu>
    </div>
</template>

<script>
    export default {
        name: "Menu"
    }
</script>

<style scoped>
    .dashboard-menu {
        padding: 5px;
    }
</style>
