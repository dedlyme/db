<?php
auth();
require "core/Validator.php";
require "core/Database.php";
$config = require("config.php");
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $errors = [];

    if (!Validator::string($_POST["title"], min: 1, max: 255)) {
        $errors["title"] = "title cannot be empty or too long";
    }

    if (!Validator::number($_POST["category-id"], min:1,max:3)){
        $errors["category-id"] = "category id invalid";
    }
    if (empty($errors)) {
        $query = " INSERT INTO posts (title, category_id) 
        VALUE (:title, :category_id);";
        $params = [
        ":title" => $_POST["title"],
        ":category_id" => $_POST["category-id"]
        ];
   
        $db->execute($query, $params);
        header('location: /');
        die();

 }
}




$title = "create a post";
require "views/posts/create.view.php";
