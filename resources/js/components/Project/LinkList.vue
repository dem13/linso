<template>
    <div class="project-link-list">
        <div class="project-link-list__actions">
            <b-field grouped>
                <b-field>
                    <b-input
                        placeholder="Title"
                        v-model="title"
                    ></b-input>
                </b-field>
                <b-field expanded>
                    <b-input class="is-primary"
                             placeholder="URL"
                             v-model="url"
                    ></b-input>
                    <p class="control">
                        <b-button :loading="isLoading" @click="addLink" icon-right="plus-circle"
                                  type="is-primary"></b-button>
                    </p>
                </b-field>
            </b-field>
        </div>
        <div class="project-link-list__list">
            <project-link
                :id="link.id"
                :key="link.id"
                :title="link.title"
                :url="link.url"
                v-for="link in links"
            ></project-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LinkList",
        props: {
            links: {
                default: function () {
                    return [];
                }
            },
            id: {
                required: true
            }
        },
        data: function () {
            return {
                title: '',
                url: '',
                isLoading: false,
            };
        },
        methods: {
            addLink() {
                if (this.url === '' || this.title === '') {
                    this.$buefy.toast.open({
                        duration: 5000,
                        message: `You should enter URL and title to add a link`,
                        position: 'is-top',
                        type: 'is-danger'
                    });

                    return;
                }

                this.isLoading = true;

                axios.post(`${window.location.origin}/project/${this.id}/link`, {
                    _token: Laravel.csrf,
                    title: this.title,
                    url: this.url
                }).then((res) => {
                    this.links.unshift(res.data);

                    this.title = '';
                    this.url = '';

                }).catch((err) => {
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
                }).finally(() => {
                    this.isLoading = false;
                });
            }
        }
    }
</script>

<style scoped>
    .project-link-list__actions {
        margin-bottom: 20px;
        margin-left: 15px;
    }
</style>
