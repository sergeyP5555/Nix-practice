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
        return $products;
    }
}
