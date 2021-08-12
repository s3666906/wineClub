<template>
<div>

<div class="breadcrumb-wrapper">

  <ol class="breadcrumbs" role="navigation" aria-label="breadcrumbs">
    <li>
      <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
    </li>

    <li>
      <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
      <span>Wine Club</span>
    </li>

  </ol></div>

<div class="container py-4">
    <div class=" text-center">
        <h2 class="display-4 p-4 text-center">Join the club!</h2>
        <p class="lead">
            We welcome you to join the prestige Hilliards Creek wine club<br />
            Get access to member only deals and special access to Hilliards
            events!
        </p>
    </div>

    <hr>

    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
            <div class="card-header" id ="card-header-silver">
                <h4 class="my-0 font-weight-normal">Silver</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">
                    $0 <small class="text-muted">/ month</small>
                </h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Be notified of upcoming events</li>
                    <li>Up to 10% discounts on selected products</li>
                    <li>Monthly news announcements</li>
                    <li>Get monthly wine reviews</li>
                </ul>
                <!--not sure how to implement correct use of link -->
                <a href="/register?membership=Silver" class="btn btn-lg btn-block btn-primary">Select Silver</a>
            </div>
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header" id ="card-header-gold">
                <h4 class="my-0 font-weight-normal">Gold</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">
                    $29 <small class="text-muted">/ month</small>
                </h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Recieve Silver level perks</li>
                    <li>Up to 20% discounts on selected products</li>
                    <li>
                        Recieve two bottles from our monthly selection
                        monthly
                    </li>
                </ul>
                <!--not sure how to implement correct use of link -->
                <a href="/register?membership=Gold" class="btn btn-lg btn-block btn-primary">Select Gold</a>
            </div>
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header" id ="card-header-platinum">
                <h4 class="my-0 font-weight-normal">Platinum</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">
                    $59 <small class="text-muted">/ month</small>
                </h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Recieve Silver level perks</li>
                    <li>Up to 30% discounts on selected products</li>
                    <li>
                        Recieve six bottles from our monthly selection
                        monthly
                    </li>
                </ul>
                <!--not sure how to implement correct use of link -->
                <a href="/register?membership=Platinum" class="btn btn-lg btn-block btn-primary">Select Platinum</a>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
    name: "wineclub",
    data() {
        return {};
    }
};
</script>
