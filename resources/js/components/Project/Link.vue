<template>
    <div class="project-link">
        <article class="media">
            <figure class="media-left">
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <a :href="url">
                            <strong>{{ title }}</strong>
                        </a>
                    </p>
                    <p>
                        <a :href="url">
                            <small>{{ url}}</small>
                        </a>
                    </p>
                </div>
            </div>
            <div class="media-right">
                <b-field>
                    <p class="control">
                        <b-button icon-right="circle-edit-outline" size="is-small" type="is-warning"></b-button>
                    </p>
                    <p class="control">
                        <b-button :loading="isDeleting" @click="deleteLink" icon-right="delete" size="is-small"
                                  type="is-danger"></b-button>
                    </p>
                </b-field>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: "Link",
        props: ['id', 'title', 'url'],
        data() {
            return {
                isDeleting: false,
            }
        },
        methods: {
            deleteLink() {
                this.isDeleting = true;

                axios.delete('/link/' + this.id)
                    .then((res) => {
                        if (!res.data.ok) {
                            this.$buefy.toast.open({
                                duration: 5000,
                                message: 'Unexpected error',
                                position: 'is-top',
                                type: 'is-danger'
                            });
                        }

                        this.$emit('delete');
                    })
                    .finally(() => {
                        this.isDeleting = false;
                    })
            }
        }
    }
</script>

<style scoped>
    .project-link {
        padding-bottom: 15px;
        padding-top: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .project-link:first-child {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>
