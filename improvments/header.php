<!DOCTYPE html>
<?php
  $accepted_languages = ['en', 'ru'];
  $accepted_themes = ['dark', 'light'];

if ( isset($_GET['lang']) && in_array($_GET['lang'], $accepted_languages) ){
  echo '<html lang="' .  $_GET['lang'] . '">';
  require_once $_GET['lang'] . '_content.php';
  require_once './includes/' . $_GET['lang'] . '_content.php';
  setcookie( "lang", $_GET['lang'], time()+60*60*24*30, '/ilyaizr' );

} else {
  echo '<html lang="en">';
  require_once 'en_content.php';
  setcookie( "lang", "en", time()+60*60*24*30, '/ilyaizr' );
}


if (!isset($_COOKIE['theme'])){
  setcookie('theme', 'dark', time()+60*60*24*30, '/ilyaizr');
} 
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="../less/style.css" id="main_styleshhet">  
  <?php if (isset($_COOKIE['theme'])) :?>
    <link rel="stylesheet" href="../less/<?= $_COOKIE['theme'] ?>_theme.css" id="theme_stylesheet">
  <?php else : ?>
    <link rel="stylesheet" href="../less/dark_theme.css" id="theme_stylesheet">
  <?php endif; ?> 

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $content['title'];?></title>
</head>
<body>



<!-- Pre-loader --><!--
<div class="mask">
  <div id="intro-loader">
  </div>
</div>
-->
