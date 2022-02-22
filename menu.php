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
    <title>Our Menu</title>
</head>
<body>
<div class="menu-wrapper">
    <?php require_once 'header.php' ?>
    <h2 class="menu-header">Меню</h2>
    <div class="menu-list">
        <div class="block-menu">
            <?php
            function classAutoLoad($classname)
            {
                $filename = $classname . ".php";
                require_once($filename);
            }

            include_once 'product-list.php';
            spl_autoload_register('classAutoLoad');
            $productItem = new Template();
            echo $productItem->rendering($products);
            ?>
        </div>
    </div>
    <?php require_once 'footer.php' ?>
</div>
</body>
</html>