<?php

namespace App\models;

use App\lib\Db\Db;

class Menu
{
    public function getProduct()
    {
        $db = new Db();
        $products = $db->db->query('SELECT * FROM products')->fetchAll();
        foreach ($products as $key => $product) {
            $products[$key]['composition'] = $db->db->query("SELECT  i.name FROM ingredients 
    AS i JOIN products_ingredients ON i.id = products_ingredients.ingredients_id WHERE products_ingredients.products_id = $product[id]")->fetchAll();
        }
        $structure = '';
        foreach ($products as $product) {
            $structure .= '<div class="menu-element">';
            $structure .= "<p class=\"pizza-name\">$product[name]</p>";
            $structure .= "<img src=\"$product[img]\" alt=''>";
            $structure .= '<a href="#"><br><br><br>
                           <ul class="description">';
            foreach ($product['composition'] as $composition) {
                $structure .= "<li>$composition[name]</li>";
            }
            $structure .= "</ul>";
            $structure .= "<div class=\"price-and-weight\">
                                <p>$product[price]  $product[weight]  $product[size]</p>
                           </div>";
            $structure .= '</a></div>';
        }
        return $structure;
    }

    public function getProductJson()
    {
        $db = new Db();
        $products = $db->db->query('SELECT * FROM products')->fetchAll();
        foreach ($products as $key => $product) {
            $products[$key]['composition'] = $db->db->query("SELECT  i.name FROM ingredients 
    AS i JOIN products_ingredients ON i.id = products_ingredients.ingredients_id WHERE products_ingredients.products_id = $product[id]")->fetchAll();
        }
         echo json_encode($products, JSON_UNESCAPED_UNICODE);
    }
}
