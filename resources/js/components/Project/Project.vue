<template>
    <div class="project">
        <div class="project__name">
            <div>{{ name }}
                <a :href="`/project/${id}/edit`">
                    <b-icon class="project__edit" icon="circle-edit-outline"></b-icon>
                </a>
            </div>
        </div>
        <b-tabs type="is-boxed">
            <b-tab-item label="Main">
                <h1>Main</h1>
            </b-tab-item>

            <b-tab-item label="Links">
                <h1>Links</h1>
            </b-tab-item>

            <b-tab-item label="Description">
                <div class="project__description">
                    {{ desc }}
                </div>
            </b-tab-item>
        </b-tabs>
    </div>
</template>

<script>
    export default {
        name: "Project",
        props: {
            id: String,
            name: String,
            desc: String,
        },
        data: function () {
            return {}
        },
    }
</script>

<style scoped>
    .project__name {
        color: #de4c4a;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .project__edit {
        cursor: pointer;
        margin-left: 10px;
        transition: color .25s;
    }

    .project__edit:hover {
        color: #fff;
    }

    .project__description {
        word-break: break-all;
    }
</style>
