
<div class="login-wrapper">
    <div class="authorization-form">
        <div class="top-form">
            <p class="form-title">La Fiesta!</p>
        </div>
        <form class="authorization" method="post" action="/account/register">
            <input type="text" id="login" name="login" placeholder="Введите Ваш логин:" required>
            <input type="password" name="password" placeholder="Введите Ваш пароль:" required>
            <input type="email" name="email" placeholder="Введите Ваш email:" required>
            <input type="tel" name="phone" placeholder="Введите Ваш телефон(+38):" required>
            <input type="submit" name="register" value="Зарегестрироваться">
        </form>
        <form class="entry">
        </form>
    </div>
    <?php
    if (isset($vars['message'])) {
        echo "<p class='send-answer'>" . $vars['message'] . "</p>";
    } ?>
</div>
