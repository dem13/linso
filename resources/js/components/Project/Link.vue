<template>
    <div class="project-link">
        <article class="media">
            <figure class="media-left">
            </figure>
            <div class="media-content">
                <div class="content">
                    <div class="link__content" v-if="!edit">
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
                    <div class="link__edit" v-else>
                        <b-field grouped>
                            <b-input
                                placeholder="Title"
                                v-model="editTitle"
                            ></b-input>
                        </b-field>
                        <b-field grouped>
                            <b-input
                                placeholder="Url"
                                v-model="editUrl"
                            ></b-input>
                        </b-field>
                    </div>
                </div>
            </div>
            <div class="media-right">
                <b-field>
                    <p class="control">
                        <b-button @click="edit = !edit" icon-right="circle-edit-outline" size="is-small"
                                  type="is-warning"></b-button>
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
                edit: false,
                editTitle: this.title,
                editUrl: this.url
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
            },
            editLink() {

                axios.put('/link/' + this.id, {
                    title: this.editTitle,
                    url: this.editUrl
                })
                    .then((res) => {
                        const link = res.data;

                        this.title = link.title;
                        this.url = link.url;

                        this.$buefy.snackbar.open(`Saved`)
                    })
                    .catch((err) => {
                        if (err.response.status === 422) {
                            const errors = err.response.data.errors;

                            Object.keys(errors).forEach((key) => {
                                this.$buefy.toast.open({
                                    duration: 5000,
                                    message: errors[key][0],
                                    position: 'is-top',
                                    type: 'is-danger'
                                });
                            });
                        }
                    });

            }

        },
        watch: {
            editTitle: function () {
                this.debounceEditLink()
            },
            editUrl: function () {
                this.debounceEditLink()
            }
        },
        created() {
            this.debounceEditLink = _.debounce(this.editLink, 1000)
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

    .link__content {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        max-width: 300px;
    }
</style>
