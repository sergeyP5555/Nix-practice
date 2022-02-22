<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Caveat&family=Comic+Neue:ital,wght@1,700&family=Lobster&family=Lora:wght@700&family=Pacifico&family=Philosopher:ital,wght@1,700&display=swap"
          rel="stylesheet">
    <title>Shopping-cart</title>
</head>
<body>
<div class="cart-wrapper">
    <?php require_once 'header.php' ?>
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
        <form class="form-info">
            <div class="form-pay">
                <p class="header-text-cart">Форма оплаты?</p>
                <input type="radio" name="payment" id="cart" value="Карта">
                <label class="form-of-payment" for="cart">Карта</label>
                <input type="radio" name="payment" id="cash" value="Наличные">
                <label class="form-of-payment" for="cash">Наличные</label>
            </div>
            <input class="send-order" type="submit" value="Отправить заказ">
        </form>
    </div>
    <?php require_once 'footer.php' ?>
</div>
</body>
</html>