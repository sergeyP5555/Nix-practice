<div class="cart-wrapper">
    <div class="main-cart">
        <div class="foundation-cart">
            <div class="name-cart">
                <p class="header-text-cart">Ваш заказ:</p>
            </div>
            <div class="user-order">
                <ul>
                    <li>Пицца Филадельфия</li>
                    <li>...</li>
                    <li>...</li>
                </ul>
            </div>
            <div class="order-price">
                <p class="header-text-cart">Итого:</p>
            </div>
        </div>
        <form class="form-info" method="post" action="/cart/choose">
            <div class="form-pay">
                <p class="header-text-cart">Форма оплаты?</p>
                <input type="radio" name="payment" id="cart" value="Card">
                <label class="form-of-payment" for="cart">Карта</label>
                <input type="radio" name="payment" id="cash" value="Cash">
                <label class="form-of-payment" for="cash">Наличные</label>
            </div>
            <input class="send-order" name="send-order" type="submit" value="Отправить заказ">
        </form>
    </div>
    <?php
    if (isset($vars['message'])) {
        echo "<p class='send-answer'>" . $vars['message'] . "</p>";
    } ?>
</div>
