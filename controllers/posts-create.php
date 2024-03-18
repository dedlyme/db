<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    

    $query = " INSERT INTO posts (title, category_id) 
                VALUE (:title, :category_id);";
};


$title = "create a post";
require "views/posts-create.view.php";
