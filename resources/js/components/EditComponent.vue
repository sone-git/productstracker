<template>
  <div>
    <h1>Edit Product</h1>
    <form @submit.prevent="updateProduct">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Product Name:</label>
            <input type="text" class="form-control" v-model="products.name">
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
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          product: {}
        }
      },
      created() {
        let uri = `http://127.0.0.1:8000/api/product/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.product = response.data;
        });
      },
      methods: {
        updateProduct() {
          let uri = `http://127.0.0.1:8000/api/product/update/${this.$route.params.id}`;
          this.axios.post(uri, this.product).then((response) => {
            this.$router.push({name: 'products'});
          });
        }
      }
    }
</script>
