

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <router-link :to="{ name: 'home'}" class="navbar-brand me-5">Sahretech</router-link>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <router-link :to="{ name: 'home'}" class="nav-link">Home</router-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
</template>

<script>
    export default {


    }
</script>
