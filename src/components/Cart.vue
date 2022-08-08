<template>
  <div class="main-cart">
    <cart-products-list></cart-products-list>
    <cart-billing-form></cart-billing-form>
  </div>
</template>

<script>
import CartProductsList from "./cart/CartProductsList";
import CartBillingForm from "./cart/CartBillingForm";

export default {
  name: "Cart",
  components: {CartBillingForm, CartProductsList},

  }
</script>
