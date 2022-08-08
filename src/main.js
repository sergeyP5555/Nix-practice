import {createApp} from "vue";
import "./styles.css";
import ProductList from "./components/ProductList";
import Cart from "./components/Cart";


const app = createApp({});
app.component("product-list", ProductList)
app.component("cart", Cart)

app.mount("#app");

