<?php

use App\Models\Category;

if(!function_exists('showCategories')){
    function showCategories(){
        $categories = Category::all()->toArray();
        foreach ($categories as $category){
            echo "<li class='menu-item'>".strtoupper($category['name'])."</li>";
        }      
    }
}
?>