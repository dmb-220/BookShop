<template>
<div>
  <article class="box mb-3" v-if="userId">
    <form @submit.prevent="reviews_post">
      <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Rating</label>
        <div class="col-sm-9 pt-1">
            <star-rating v-model="rating"
              v-bind:max-rating="5"
              inactive-color="#000"
              active-color="#f00"
              v-bind:star-size="30"
              v-bind:show-rating="false"
              v-bind:padding="10">
            </star-rating>
            <br>
        </div>
      </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Book review</label>
        <div class="col-md-10"> 
        <textarea name="reviews" v-model='reviews' class="form-control" rows="3"></textarea>
        <span class="text-danger" v-if="errors && errors.reviews">
          {{ errors.reviews[0] }}
          </span>
        </div>
    </div>        
    <hr>
    <div class="form-group row mb-0">
        <div class="col-md-10 offset-md-2">
            <input type="submit" class="btn btn-sm btn-success btn-block"
            :value="form_submiting ? 'Saving review ...' : 'Write review'"
            :disabled="form_submiting" />
        </div>
    </div>
    </form>
  </article>

  <hr>

  <article class="box mb-3" v-for="da in Data.data" :key="da.id">
    <div class="icontext w-100">
          <img :src="da.user.avatar" class="img-xs icon rounded-circle">

      <div class="text">
          <span class="date text-muted float-md-right">
              {{ da.created_at }}
          </span>  
          <h6 class="mb-1">{{ da.user.name }}</h6>
          <ul class="rating-stars">
              <li :style="{width: da.rating +'%'}" class="stars-active">
                  <img src="http://book.test/img/stars-active.svg" alt="">
              </li>
              <li>
                  <img src="http://book.test/img/starts-disable.svg" alt="">
              </li>
          </ul>
      </div>
  </div>
      <div class="mt-3">
          <p>
              {{ da.reviews }}
          </p>	
      </div>
      
      <hr>
        <button v-if="userId === da.user.id"  @click="deleteReviews(da.id)" class="btn btn-danger btn-sm" type="submit">Delete</button>
  </article> 
  <hr>
  <pagination :data="Data" @pagination-change-page="get_reviews"></pagination>
  </div> 
</template>

<script>
import StarRating from 'vue-star-rating'

  export default {
    components:{ StarRating },

    props: {
      bookId: {type: Number},
      userId: {type: Number, default: 0 }
    },

    data(){
      return {
        Data: {},
        rating: 3,
        reviews: '',
        errors: {},
        form_submiting: false
        }
      },

    mounted(){
    this.get_reviews()
    },

    methods: {
      reset_form(){
        this.rating = 3;
        this.reviews = '';
      },
      
      deleteReviews(id){
        this.$swal({
          title: "Delete this review?",
          text: "Are you sure? You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          confirmButtonText: "Yes, Delete it!",
          closeOnConfirm: true
        }).then((result) => {
          if(result.value){
          axios.delete('http://book.test/api/reviews/'+ id +'/destroy')
          .then(response => {
            this.$swal('Review deleted successfully');
            this.get_reviews();
          })
          .catch(error => {
            console.log(error.response)
            this.$swal({icon: 'error', title: 'ERROR! Review not deleted!'});
          });
        }
        })
      },

      get_reviews(page = 1){
      axios
          .get('http://book.test/api/reviews/'+ this.bookId +'/?page='+ page)
          .then(response => {
            this.Data = response.data; 
          })
          .catch( error => {
            console.log(error.response)
              })
      }, 

      reviews_post(){
        this.form_submiting = true;
        axios
          .post(`http://book.test/api/reviews_store`, {
            reviews: this.reviews,
            rating: this.rating,
            book_id: this.bookId,
            user_id: this.userId
            })
          .then(response => {
            //console.log(response.data.data)
            this.$swal('Review create successfully');

            this.form_submiting = false;
            this.reset_form();
            this.get_reviews()
          })
          .catch( error => {
            this.$swal({icon: 'error', title: 'ERROR! Review not create!'});
            console.log(error.response)
            if(error.response.status === 422){
              this.errors = error.response.data.errors;
            }
            this.form_submiting = false;
          })
        },
      },

  };
</script>