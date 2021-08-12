<template>
<div>
    <div class="breadcrumb-wrapper m-b-0">

        <ol class="breadcrumbs m-b-0" role="navigation" aria-label="breadcrumbs">
            <li>
                <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
            </li>

            <li>
                <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
                <span>About Us</span>
            </li>

        </ol>
    </div>

    <div v-cloak>
        <div v-for="(item, index) in sectionData" :key="index">
            <div class="schweppes-section p-4" :id="'section-' + index" :style="{ backgroundColor: item.color}">
                <img v-if="index%2 == 0" class="item m-4" :src="item.image">
                <h3 v-if="index%2 == 0" class="item year">{{item.title}}</h3>
                <div v-if="index%2 == 0" class="item p-4">
                <template v-if="index == 0">
                <h5 class="text-center">Our Story</h5>
                </template>

                {{item.text}}</div>
                <div v-if="index%2 != 0" class="item p-4">{{item.text}}</div>
                <h3 v-if="index%2 != 0" class="item year">{{item.title}}</h3>
                <img v-if="index%2 != 0" class="item m-4" :src="item.image">
                <img v-if="index < last" :data-next-section="'section-' + (Number(index) + Number(1))" :src="corkScrewImageUrl" class="section-button" />
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    name: "about",
    computed: {
      last() {
        return this.sectionData.length - 1;
      }
    },
    data() {
        return {
            sectionData: [{
                    color: "",
                    title: "1800s",
                    image: window.location.origin + "/images/oldbarrel.jpg",
                    text: "Hilliards Creek is a small stream that runs through the Redlands District of Brisbane in South-East Queensland and is named after the Hilliards family who settled there in the late 1800s. The Hilliards family farmed their acreage property along with the many other immigrant farmers in the local area. The tight community supported each other through good times and bad – weather events, economic downfalls, and financial hardship."
                },
                {
                    color: "#851917",
                    title: "1970",
                    image: window.location.origin + "/images/OurStoryVines.jpg",
                    text: "As a young 18 year old and the oldest child of the Hilliards, Robert worked in the family’s farming business until his early 40’s when he became interested in the wine industry and noticed a need for locally grown and accessible wines. With his extensive knowledge of the Redlands District and farming, and passion for quality wine, Robert established Hilliards Creek Winery in 1970 and became an instant success in the local area and wider Brisbane region."
                },
                {
                    color: "",
                    title: "2020",
                    image: window.location.origin + "/images/dining.jpg",
                    text: "Robert, his wife Marion, and their four children, worked hard to build their winery into a successful business, producing two new wines every year, selling their products locally and distributing to interstate outlets. In March 2020, Robert Hilliard passed away after a long illness. His legacy and passion for fine wines has been instilled in his children, who are as passionate and curious about wines as their father was, and who are intent on honouring Robert by continuing the family’s successful wine estate."
                },
                {
                    color: "#d9aa34",
                    title: "Today",
                    image: window.location.origin + "/images/weddingvenue.jpg",
                    text: "Hilliards Creek winery is now managed by Robert’s children. Helmed by the family’s oldest son, Peter, the Estate management also includes Robert’s three daughters, Prue, Susan and Kathleen, and son Mark. Together, this new generation have a clear vision of not only driviing the success of the family business but ensuring that it flourishes and remains relevant and modern for current and future generations of wine drinkers. New branding and the launch of new products is just the beginning for the new generation operating Hilliards Creek Winery."
                }
            ],
            corkScrewImageUrl: window.location.origin  + "/images/cork-screw.png"
        }
    },
      mounted() {
        $( ".section-button" ).click(function() {
          $('html, body').animate({
            scrollTop: $("#" + $(this).attr("data-next-section")).closest('.schweppes-section').offset().top
          }, 1500);
        });
      }
}
</script>
