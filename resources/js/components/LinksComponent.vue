<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Web Acces List</div>
                    
                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Web Link</th>
                                <th>Short Link</th>
                                <th>Counter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td>{{product.id}}</td>
                                <td>{{product.title}}</td>
                                <td>{{product.longlink}}</td>
                                <td>{{product.shorlink}}</td>
                                <td>{{product.counter}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                      
                                       
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{products:[]}
        },
       created(){
            this.axios.get('http://localhost:8000/api/programs/').then(response => {
                this.products = response.data;
             });
        }
    }
</script>