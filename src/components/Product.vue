<template>
<div class="menu-element">
  <p class ="pizza-name">{{name}}</p>
  <img v-bind:src="img" alt="name">
  <a href="#" @click.prevent="$emit('add-to-cart')">
    <ul class="description">
      <li v-for="item in composition" :key="item.id">
        {{item.name}}
      </li>
    </ul>
    <div class="price-and-weight">
      <p>{{price}}.грн {{weight}} {{size}}</p>
    </div>
  </a>
</div>
</template>

<script>
export default {
  name: "Product",
  props: {
    name: {
      type: String,
      isRequired: true,
    },
    img: {
      type: String,
    },
    price: {
      type: Number,
    },
    weight: {
      type: String,
    },
    size: {
      type: String,
    },
    composition: {
      type: Array,
    }
  },
}
</script>
