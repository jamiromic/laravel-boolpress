<template>
    <header class="container_header">
        <h1 class="title_header">BOOLPRESS</h1>
        <ul class="menu_link">
            <li v-for="(link,i) in links" :key="i">
                <router-link :to="link.path">{{ link.word }}</router-link>
            </li>
            
        </ul>
    </header>
    
</template>

<script>
    export default {
        data() {
            return {
                links: [
                {
                    word: 'Home',
                    path: '/'
                },
                {
                    word: 'Posts',
                    path: '/blog'
                },
                {
                    word: 'Chi Siamo',
                    path: '/chi-siamo'
                },
                {
                    word: 'Contatti',
                    path: '/contatti'
                }

                ]
                
            }
        }
        
    }
</script>

<style lang="scss" scoped>

.container_header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #343A40;
    padding: 0.5rem 0;
}

.title_header {
    color: goldenrod;
    font-size: 2.5rem;


}

.menu_link {
    display: flex;
    gap: 4rem;
    color: whitesmoke;
    font-size: 1.25rem;
}



</style>