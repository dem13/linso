<template>
    <a :href="'/project/' + id" class="box">
        <div class="media">
            <div class="media-left">
                <figure class="image is-64x64">
                    <img alt="book" src="/img/project/project.png">
                </figure>
            </div>
            <div class="media-content">
                <div class="content">
                    <div>
                        <strong>{{ name}}</strong>
                    </div>
                    <div> {{ desc}}</div>
                </div>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        name: "Preview",
        props: {
            id: {
                require: true
            },
            name: {
                required: true
            },
            desc: {
                default: ''
            }
        }
    }
</script>

<style scoped>
    img {
        border-radius: 3px;
    }

    .box {
        border: 1px solid #de4c4a;
        transition: transform .25s;
    }

    .box:hover {
        transform: scale(1.01);
    }

    .content div {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        max-width: 300px;
    }

</style>
