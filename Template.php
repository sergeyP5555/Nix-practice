<?php

class Template
{
    function rendering($products)
    {
        $structure = '';
        foreach ($products as $product) {
            $structure .= '<div class="menu-element">';
            $structure .= "<p class=\"pizza-name\">$product[name]</p>";
            $structure .= "<img src=\"$product[img]\" alt=''>";
            $structure .= '<a href="#"><br><br><br>
                           <ul class="description">';
            foreach ($product['composition'] as $composition) {
                $structure .= "<li>$composition</li>";
            }
            $structure .= "</ul>";
            $structure .= "<div class=\"price-and-weight\">
                                <p>$product[price]  $product[weight]  $product[size]</p>
                           </div>";
            $structure .= '</a></div>';
        }
        return $structure;
    }
}

