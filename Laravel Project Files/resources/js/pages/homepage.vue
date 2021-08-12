<template>
  <div>
    <div id="banner-underlay">
        <header :style="{ backgroundImage: 'url(' + backgroundImageUrl + ')' }">
            <div class="jumbotron mx-2 text-center">
              <h1 class="display-1 main-heading">Hilliards Creek Winery</h1>
              <p class="lead"><strong>Take a break from the hustle and bustle, come relax and re-energize the soul</strong></p>
              <hr class="my-4">
              <p>Leave the pressures of everyday life at the door and explore our new ranges</p>
              <p class="lead">
                <a class="btn btn-primary btn-lg explore-button" href="#" role="button">Explore</a>
              </p>
            </div>
        </header>
      </div>
      <!-- Our new range section -->
    <section class="container">
      <h2 class="display-4 p-4 text-center">Explore Our Range</h2>

      <blockquote class="blockquote">
        <p class="mb-0 text-center">Indulge yourself with a delectable bottle of pure ecstasy...</p>
      </blockquote>

      <div class="discover-card-conatiner">
        <div class="row">
          <div class="col-md-4" v-for="cardItem in discoverCardData" :key="cardItem.text">
        <discover-card
        :cardImageUrl="cardItem.imageUrl" :cardText="cardItem.text"/>
        </div>
        </div>
      </div>
    </section>
    <div class="container"><hr></div>
    <!-- Join the club section -->
    <section class="container">
      <h2 class="display-4 p-4 text-center">Join the Club</h2>
      <p class="p-4 lead text-center">
        Our Wine Club offers members discounts<br>
        on our products and events, as well as<br>
        invites to exclusive member-only events
      </p>
      <div class="text-center">
        <a role="button" class="btn btn-primary main-button btn-lg" href="register">Join now</a>
      </div>
    </section>
    <div class="container"><hr></div>
    <!-- Upcomming events sections -->
    <section class="container ">
      <h2 class="display-4 p-4 text-center">Upcoming Events</h2>

      <div class="row m-b-5">
        <div class="col-md-6">
          <img class="img-fullwidth " src="/images/event.jpg">
          </div>
          <div class="col-md-6">
            <p class="p-4 lead text-center">
              Whether you're with friends, family <br>
              or looking to meet new people, <br>
              look no further than the breathtaking scenery <br>
              and ambience at an event on Hilliards Vineyard
              <a href="/events" class="btn btn-primary m-t-2">Click here for more details!</a>
            </p>


            </div>

        <!-- <event-card  v-for="event in eventlist" :event="event" :key="event.id"/> -->
      </div>
    </section>
  </div>
</template>

<script>
import discoverCard from '../components/discoverCard.vue';

  export default {
  components: { discoverCard },
    name: "homepage",
    props: ["eventlist"],
    data() {
      return {
        backgroundImageUrl: "/images/HomepageHero_Sunset3.jpg",
        discoverCardData: [ {
          text: "Classic",
          imageUrl: "/images/Red Bottle.png"
          },{
          text: "Reserve",
          imageUrl: "/images/Blue Bottle.png"
          },{
          text: "Heritage",
          imageUrl: "/images/Green Bottle.png"
          } ]
      }
    },
    mounted() {

      $( '.card' ).hide();
      $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
      };

      async function killHandler() {
        $( window ).off('resize scroll');
      }

      async function fadeInCards() {
        $( '.card' ).css('visibility', 'visible').fadeIn(3500);
      }

      $( window ).on( 'resize scroll', async function() {
        console.log("scroll detected");
        if ( $('.discover-card-conatiner').isInViewport() ) {
            console.log("Card is in viewport");
            await fadeInCards();
            await killHandler();
        }
      });
    }
  }
</script>
