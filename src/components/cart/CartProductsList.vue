<template>
  <div class="foundation-cart">
    <div class="name-cart">
      <p class="header-text-cart">Ваш заказ: </p>
    </div>
    <div class="user-order">
      <ul>
        <cart-product-item
            v-for="(product, index) in itemsList"
            :key="product.id"
            :id="product.id"
            :name="product.name"
            :price="product.price"
            :amount="product.amount"
            @increment-amount="incrementProductAmount(index)"
            @decrement-amount="decrementProductAmount(index)"
            @remove="removeProductFromCart(index)"
        />


      </ul>
    </div>
    <div class="order-price">
      <p class="header-text-cart">Кол-во: {{ totalAmount }}</p>
      <p class="header-text-cart">Итого: {{ totalPrice }} грн</p>
    </div>

  </div>
</template>

<script>
import CartProductItem from "./CartProductItem";

export default {
  name: "CartProductsList",
  components: {CartProductItem},
  data: () => ({
    itemsList: [],
  }),
  computed: {
    totalPrice() {
      return this.itemsList.reduce((total, {price, amount}) => total + (amount * price), 0);
    },
    totalAmount() {
      return this.itemsList.reduce((total, {amount}) => total + amount, 0);
    },
  },
  mounted() {
    this.getProductsItem();
  },
  methods: {
    getProductsItem() {
      const productItem = localStorage.getItem('cart');
      if (productItem !== null) {
        return this.itemsList = JSON.parse(productItem);
      }
      return [];
    },
    incrementProductAmount(index) {
      const product = this.itemsList[index];
      this.itemsList.splice(index, 1, {
        ...product,
        amount: product.amount + 1,
      });
      localStorage.setItem('cart', JSON.stringify(this.itemsList));
    },
    decrementProductAmount(index) {
      const product = this.itemsList[index];
      this.itemsList.splice(index, 1, {
        ...product,
        amount: product.amount - 1,
      });
      localStorage.setItem('cart', JSON.stringify(this.itemsList));
    },
    removeProductFromCart(index) {
      this.itemsList.splice(index, 1);
      let item = JSON.parse(localStorage.getItem('cart'));
      item.splice(index, 1);
      item = JSON.stringify(item);
      localStorage.setItem("cart", item);
    },
  }
}
</script>
