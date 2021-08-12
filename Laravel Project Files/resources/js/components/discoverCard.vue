<template>
    <div class="m-3 card bg-dark text-white">
        <img class="card-img" :src="cardImageUrl" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title">{{cardText}}</h5>
        </div>
    </div>
</template>

<script>

export default {
    props: [ "cardText", "cardImageUrl" ]
}
</script>

<style scoped>

.card {
    max-width: 300px;
}

</style>