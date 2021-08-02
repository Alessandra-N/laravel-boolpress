<template>
    <div class="container">
        <div class="card" v-bind:key="article" v-for="article in articles">
            <img class="card-img-top p-5" :src="'/storage/' + article.image">
            <div class="card-body">
                <h4 class="card-title">{{article.title}}</h4>
                <p class="card-text">{{article.content}}</p>
            </div>
        </div>
  </div>
</template>

<script>
    const { default: Axios } = require('axios');
    export default {
        data() {
            return {
                articles: null,
            }
        },
        mounted() {
            console.log('Component mounted.')
            Axios.get('/api/articles').then(resp => {
                this.articles = resp.data.data;
                console.log(this.articles);
            }).catch(e => {
                console.error('Sorry! ' + e);
            })
        }
    }
</script>
