<template>
  <div class="menu-wrapper">
    <h2 class="menu-header">Меню</h2>
    <div class="menu-list">
      <div class="block-menu">
        <product
            v-for="product in products"
            v-bind:key="product.id"
            v-bind:id="product.id"
            v-bind:name="product.name"
            v-bind:img="product.img"
            v-bind:price="product.price"
            v-bind:weight="product.weight"
            v-bind:size="product.size"
            v-bind:composition="product.composition"
            @add-to-cart="addProductToCart(product)"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Product from "./Product";

export default {
  name: "ProductList",
  components: {Product},
  data: () => ({
    products: [],
  }),
  mounted() {
    this.fetchProduct();
  },
  methods: {
    async fetchProduct() {
      const response = await fetch('http://nix/menu/products', {
        headers: {
          'Content-type': 'application/json; charset=UTF-8',
        },
      });
      this.products = await response.json();
    },
    getProducts() {
      const productLocalStorage = localStorage.getItem('cart');
      if (productLocalStorage !== null) {
        return JSON.parse(productLocalStorage);
      }
      return [];
    },
    addProductToCart(product) {
      let result = confirm('Добавить в корзину?');
      if (result) {
        let productsList = this.getProducts();
        if (!productsList.find(({id}) => id === product.id)) {
          productsList.push({...product, amount: 1});
          localStorage.setItem('cart', JSON.stringify(productsList));
        } else {
          return alert("Товар уже добавлен в корзину!")
        }
      }
    },

  }
}
</script>
