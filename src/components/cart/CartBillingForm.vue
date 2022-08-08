<template>
  <form class="form-info" method="post" action="/cart/choose">
    <div class="form-pay">
      <p class="header-text-cart">Форма оплаты?</p>
      <input type="radio" name="payment" id="card" value="Card">
      <label class="form-of-payment" for="card">Карта</label>
      <input type="radio" name="payment" id="cash" value="Cash">
      <label class="form-of-payment" for="cash">Наличные</label>
    </div>
    <input @click="submitOrder" class="send-order" name="send-order" type="submit" value="Отправить заказ">
  </form>
</template>

<script>
export default {
  name: "CartBillingForm",
  methods: {
    sendOrder () {

    },
    deleteOrder () {
      localStorage.clear()
    },
    submitOrder() {
      // this.sendOrder();
      this.deleteOrder();

    }
  },
}
</script>


