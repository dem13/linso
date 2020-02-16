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
                <button class="delete"></button>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: "Link",
        props: ['id', 'title', 'url']
    }
</script>

<style scoped>

</style>
