<template>
    <section class="container p-3 slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators m-0 p-0 mt-5" style="bottom: -20px;">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-primary"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-primary"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-primary"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex gap-3 rounded">
                        <img src="/src/assets/img/image.png" class="d-block rounded-5 w-100" alt="Slide 1">
                        <img src="/src/assets/img/image.png" class="d-block rounded-5 w-100" alt="Slide 1">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex gap-1 rounded">
                        <img src="/src/assets/img/image.png" class="d-block rounded-5 w-100" alt="Slide 2">
                        <img src="/src/assets/img/image.png" class="d-block rounded-5 w-100" alt="Slide 2">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex gap-1 rounded">
                        <img src="/src/assets/img/image.png" class="d-block rounded-5 w-100" alt="Slide 3">
                        <img src="/src/assets/img/image.png" class="d-block rounded-5 w-100" alt="Slide 3">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>
</template>

<script>
export default {

}
</script>

<style></style>