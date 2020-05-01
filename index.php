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

    <h2>Find Article by index number</h2>
    <form action="./index.php" method="GET">
        <label for="find-article">
            Find Article by Index:
            <input type="text" name="find-article" id="find-article">
        </label>
        <input type="submit" value="Find">
    </form>
    <?php
    if (!empty($_GET)) //making sure something is submitted
    {
        $index=intval($_GET['find-article'])-1;
        var_dump($index);
        $articleList->findArticleByIndex($index); 
    }
    ?>
</body>

</html>