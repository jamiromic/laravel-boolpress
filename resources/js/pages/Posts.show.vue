<template>
    <article>
        <img v-if="post.cover_path" :src="post.cover_path" alt="">
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
        
        props: ['slug'],
        data() {
            return {
                post: null
            }
        },
        methods: {
            fetchPosts() {
                axios.get(`/api/posts/${this.slug}`).then((res) => {
                    console.log(res.data)
                    const { post } = res.data
                    this.post = post
                
                }).catch(err => {
                   
                    this.$router.replace({ name: '404'})
                })
            }        
        },
        beforeMount() {
            this.fetchPosts()
        }
    }
</script>

<style lang="scss" scoped>

</style>