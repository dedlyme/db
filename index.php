<?php
require "function.php";
require "Database.php";

$config = require("config.php");

$pams = "SELECT * FROM caregories";

$query = "SELECT * FROM posts";
$params = [];

if (isset($_GET["id"]) && $_GET["id"] != ""){
    $id = $_GET["id"];
    $query .= " WHERE id=:id";
    $params = [":id" => $id];
}
$db = new Database($config);
$posts = $db
    ->execute($query, $params)
    ->fetchAll();

echo "<form>";
echo "<input name='id' />";
echo "<button>Submit></button>";
echo"</form>";


echo "<h1>posts</h1>";
echo "<ul>";
foreach($posts as $post) {
    echo "<li>" . $post["title"] . "</li>";
}
echo"</ul>";