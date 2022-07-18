
<div class="menu-wrapper">
    <h2 class="menu-header">Меню</h2>
    <div class="menu-list">
        <div class="block-menu">
            <?php
            $productItem = new \App\models\Menu();
            echo $productItem->getProduct();
            ?>
        </div>
    </div>
</div>
