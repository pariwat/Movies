<?php
require_once './MovieService.php';

$category = $_POST['category'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$videoLink = $_POST['videoLink'];
$posterPath = 'images/poster/'. uniqid('img_').'.jpg';

if(move_uploaded_file($_FILES["cover"]["tmp_name"],$posterPath)) {
    $ms = new MovieService();
    $ms->addMovie($category, $title, $posterPath, $desc, $videoLink);
    echo $posterPath;
} else {
    echo "Fail";
}