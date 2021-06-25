<template>
    <header class="header-content">
        <div class="left">
            <router-link :to="{ name: 'home' }">BrandSite</router-link>
        </div>

        <nav>
            <ul class="menu-nav">
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'blog' }">Blog</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'about' }">About</router-link>
                </li>
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

.active {
    color: #fff;
}
</style>
