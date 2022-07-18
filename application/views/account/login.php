
<div class="login-wrapper">
    <?php
    if (isset($vars['message'])) {
        echo "<p class='send-answer'>" . $vars['message'] . "</p>";
    } ?>
    <div class="authorization-form">
        <div class="top-form">
            <p class="form-title">La Fiesta!</p>
        </div>
        <form class="authorization" action="/account" method="post">
            <input type="text" name="login" id="login" placeholder="Введите Ваш логин:" required>
            <input type="password" name="password" id="password" placeholder="Введите Ваш пароль:" required>
            <input class="login-button" name="entry" type="submit" value="Войти">
        </form>
        <div class="entry">
            <a href="/account/register">Зарегестрироваться</a>
        </div>
    </div>
</div>
