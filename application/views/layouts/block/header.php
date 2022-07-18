<header class="top-header">
    <div class="logo">
        <a href="/main"><img class="image-logo" src="/public/images/logo1.png" alt="logotype"></a>
    </div>
    <nav class="navigation">
        <ul class="site-menu">
            <li><a href="/main">Главная</a></li>
            <li><a href="/menu">Меню</a></li>
            <li><a href="/cart">Корзина</a></li>
            <?php if (!isset($_SESSION['userLogin'])) { ?>
                <li><a href="/account">Войти</a></li>
            <?php } else { ?>
                <li><a href="/logout">Выйти</a></li>
            <?php } ?>

        </ul>
    </nav>
</header>
