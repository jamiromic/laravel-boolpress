<template>
    <div class="container_header">
        <h1 class="title_header">BOOLPRESS</h1>
        <ul class="menu_link">
            <li>
                <a href="/admin">Area Riservata</a>
            </li>
        </ul>
    </div>
    
</template>

<script>
    export default {
        
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
    color: whitesmoke;
    font-size: 1.25rem;
}



</style>