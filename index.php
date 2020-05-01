<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './ArticleList.Class.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/main.css">
    <title>Article Page</title>
</head>

<body>
    <header>
        <h1>Article Page</h1>
    </header>
    <?php
    $articleList = new ArticleList(dirname(__FILE__) . '/articles.json');
    $articleList->output();
    ?>
</body>

</html>