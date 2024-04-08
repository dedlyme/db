<?php 
require "Validator.php";
require "Database.php";
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
        $query = "UPDATE posts
        SET title = :title, category_id = :category_id
        WHERE id = :id";
        $params = [
        ":title" => $_POST["title"],
        ":category_id" => $_POST["category-id"],
        ":id" => $_POST["id"]
    ];
   
        $db->execute($query, $params);
        header('location: /');
        die();

 }
}
$query = "SELECT * FROM posts WHERE id = :id";
$params = [":id" => $_GET["id"]];

$post = $db->execute($query, $params)->fetch();


require "views/posts/edit.view.php";