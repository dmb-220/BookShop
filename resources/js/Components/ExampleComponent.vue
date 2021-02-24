<template>
  <div>
<star-rating v-model="rating"
             v-bind:increment="0.5"
             v-bind:max-rating="5"
             inactive-color="#000"
             active-color="#f00"
             v-bind:star-size="30"
             v-bind:show-rating="false"
             v-bind:padding="10">
</star-rating>
  </div>
</template>

<script>
import StarRating from 'vue-star-rating'

  export default {
      components:{ StarRating },

      data(){
          return {
              rating: 2.5
              }
            },

  };
</script>