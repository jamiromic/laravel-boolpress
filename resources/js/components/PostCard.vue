<template>
    <article>
        <img v-if="post.cover" :src="post.cover_path" alt="">
        <ul class="p-4">
            <li>
                <h2><span>Titolo Post: </span> {{ post.title }}</h2>
            </li>
            <li>
                <p v-if="post.category" class="text_amber-600 text-sm m"><span>Categoria: </span>{{ post.category.name }}</p>
            </li>
            <li>
                <ul class="flex gap-3 py-2">
                    <span>Tags: </span>
                    <li class="rounded-full hover:bg-amber-400 bg-gray-400 px-1 py-0.5 text-sx text-black" v-for="tag in post.tags" :key="tag.id">
                        {{ tag.name }}
                    </li>
                </ul>
            </li>
            <li>
                <span>Creato il: </span>
                <span>{{ post.date }}</span>
            </li>
        </ul>
    </article>
</template>

<script>
    export default {
        props: {
            post: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style lang="scss" scoped>

article {
    width: 300px;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    border: 2px solid white;
    border-radius: 10px;
    padding: 1rem;

}


img {
    border-radius: 10px;
}

</style>