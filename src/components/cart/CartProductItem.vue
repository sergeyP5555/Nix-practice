<template>
  <li>{{name}} - {{price}} грн - (<button @click="$emit('decrement-amount')" :disabled="amount === 1" class="amount">-</button>
    {{amount}}
    <button @click="$emit('increment-amount')" class="amount">+</button>) -
    <button @click="$emit('remove')" class="amount"><img src="public/images/delete.png" alt="name" class="item-delete"></button></li>
</template>

<script>
export default {
  name: "CartProductItem",
  props: {
    id: {
      type: Number,
    },
    name: {
      type: String,
    },
    price: {
      type: Number,
    },
    amount: {
      type: Number,
    },
  }
}
</script>
