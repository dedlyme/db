<?php
require "Database.php";
$config = require("config.php");
$db = new Database($config);

// if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255 {
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $errors = [];

    if (trim($_POST["title"]) == ""){
        $errors["title"] = "title cannot be empty";
    }


    if (strlen($_POST["title"]) >255){
        $errors["title"] = "title cannot be longer than 255 letters";
    } 


    if ($_POST["category-id"] >3 || $_POST["category-id"] <1 ){
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
