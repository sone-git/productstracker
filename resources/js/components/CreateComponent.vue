<template>
  <div>
    <h1>Create A Product</h1>
    <form @submit.prevent="addProdut">
          <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Name:</label>
            <input type="text" class="form-control" v-model="product.name">
          </div>
          <div class="form-group">
            <label>Product Category:</label>
            <input type="text" class="form-control" v-model="product.category">
          </div>
      <div class="form-group">
            <label>Product sku:</label>
            <input type="text" class="form-control" v-model="product.sku">
          </div>
                <div class="form-group">
            <label>Product Price:</label>
            <input type="text" class="form-control" v-model="product.price">
          </div>
                <div class="form-group">
            <label>Quantity:</label>
            <input type="text" class="form-control" v-model="product.quantity">
          </div>
        </div>
        </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          product:{}
        }
    },
    methods: {
      addProduct(){
        let uri = 'http://127.0.0.1:8000/api/product/create';
        this.axios.post(uri, this.product).then((response) => {
          this.$router.push({name: 'products'});
        });
      }
    }
  }
</script>
