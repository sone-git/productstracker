<template>
  <div>
      <h1>Products</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Products</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Product sku</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.category }}</td>
                     <td>{{ product.sku }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.quantity }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click = "deleteProduct(product.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          products: []
        }
      },
      created() {
      let uri = 'http://127.0.0.1:8000/api/products';
      this.axios.get(uri).then(response => {
        this.products = response.data.data;
      });
    },
    methods: {
      deleteProduct(id)
      {
        let uri = `http://127.0.0.1:8000/api/product/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.products.splice(this.products.indexOf(id), 1);
        });
      }
    }
  }
</script>
