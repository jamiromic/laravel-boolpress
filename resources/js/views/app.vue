<template>
    <div class="app">
        <!-- Header -->
        <header>
            <NavBar/>
        </header>
        <main>
            <!-- Cards -->
            <div class="wrapper">
                <PostCard v-for="post in posts" :key="post.id" :post ="post"/>
            </div>
            <!-- Pagination -->
            <ul class="flex py-10 gap-4 justify-center">
                <li @click="fetchPosts(page)" 
                    :class="{
                    'w-6 h-6 flex item_center justify-center rounded-full text-black' : true,
                    'bg-amber-400' : page === currentPage,
                    'bg-gray-100 cursor-pointer hover:bg-amber-200' : page !== currentPage
                     }"
                    v-for="page in lastPage" :key="page">
                        {{ page }}     
                </li>     
            </ul>
        </main>
    </div>
</template>

<script>
    import PostCard from '../components/PostCard.vue'
    import NavBar from '../components/NavBar.vue'

    export default {
        components: {
            PostCard,
            NavBar

        },
        data() {
            return {
                title: 'Boolpress',
                posts: [],
                currentPage: 0,
                lastPage: 0,
                total: 0
            }
        },
        methods: {
            fetchPosts(page = 1) {
                axios.get('/api/posts',{
                    params: {
                        page: page
                    }
                }).then((res) => {
                    const { data, current_page, last_page, total } = res.data.result

                    this.posts = data
                    this.currentPage = current_page
                    this.lastPage = last_page
                    this.total = total
                })
            }        
        },
        beforeMount() {
            this.fetchPosts()
        }
    }
</script>

<style lang="scss" scoped>

main {
    background-color: #232323;
    color: whitesmoke;
    margin: 0 auto;
    padding: 2rem 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vw;
}

.wrapper {
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
    gap: 3rem;
    flex-basis: 0;
    flex-grow: 1;
    

}


</style>
