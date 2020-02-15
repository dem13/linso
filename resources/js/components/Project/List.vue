<template>
    <div class="project-list">
        <project-preview :desc="project.desc" :id="project.id" :key="project.id" :name="project.name"
                         v-for="project in projects">

        </project-preview>
        <b-pagination
            :current.sync="projectsMeta.current_page"
            :per-page="projectsMeta.per_page"
            :total="projectsMeta.total"
            @change="goToPage">
        </b-pagination>
    </div>
</template>

<script>
    export default {
        name: "List",
        props: ["projects_json"],
        data: function () {
            return {
                projects: [],
                projectsMeta: {
                    total: 0,
                    current: 1,
                    per_page: 10
                }
            };
        },
        methods: {
            goToPage(page) {
                window.location.href = '/project?page=' + page;
            }
        },
        created() {
            const projectsData = JSON.parse(this.projects_json);
            this.projects = projectsData.data;
            this.projectsMeta = projectsData;
        }
    }
</script>

<style scoped>

</style>
