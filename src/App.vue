<template>
    <div id="app" class="ui container">
        
        <form class="ui form segment" @submit.prevent="addNewURL">
            <div class="inline field">
                <label for="New url"> Nueva  url</label>
                <input type="text" placeholder="Nueva url" v-model="new_url">
                <button type="submit"> <i class="plus icon"/></button>
            </div>

        </form>
        
        <div class="ui segment">
            <div v-for="url in urls">
                {{url.id}} - {{url.url}} [ {{url.created_at}} ]
            </div>
        </div>

  </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
        msg: 'Welcome to Your Vue.js App',
        new_url:'',
        urls:[],
    }
  },
    methods: {
        fetchALL() {
             this.axios.get("/list/").then( resp => {
                console.log("resp", resp);
                this.urls= resp.data;
            })
        },
        addNewURL() {
            this.axios.post("/add/",{'url': this.new_url}).then(respo =>{
                console.log("add", respo.data);
                this.fetchALL();
            });
        }
    },
  mounted() {

       this.fetchALL();    
  }
}
</script>

<style scoped>
@import url("node_modules/semantic-ui-css/semantic.css");
</style>
