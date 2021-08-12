<template>
    <a v-cloak class="card" href="events">
        <img class="card-img-top" :src="'/images/'+event.image_src" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{event.description}}</p>
        </div>
    </a>
</template>

<script>
export default {
    props: ["event"]
}
</script>

<style scoped>

.card {
    width: 18rem;
}
</style>
