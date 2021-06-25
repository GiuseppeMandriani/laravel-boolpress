<template>
    <header class="header-content">
        <div class="left">
            <a href="">Boolpress</a>
        </div>

        <nav>
            <ul class="menu-nav">
                <li><a href="">Link 1</a></li>
                <li><a href="">Link 2</a></li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header"
};
</script>

<style lang="scss" scoped>
.header-content {
    height: 80px;
    padding: 0 10px;
    background-color: dodgerblue;
    display: flex;
    align-items: center;
}

.menu-nav {
    display: flex;
    list-style: none;
    li {
        margin: 0 1rem;
    }
}
</style>
