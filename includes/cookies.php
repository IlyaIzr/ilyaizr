<?php
  $accepted_languages = ['en', 'ru'];
  $accepted_themes = ['dark', 'light'];

if ( isset($_GET['lang']) && in_array($_GET['lang'], $accepted_languages) ){
  //setcookie( "lang", $_GET['lang'], time()+60*60*24*30, '/ilyaizr', "ilyaizr.beget.tech", 0 ); //__Development
  setcookie( "lang", $_GET['lang'], time()+60*60*24*30, '/ilyaizr' );
  echo '<html lang="' .  $_GET['lang'] . '">';
  require_once $_GET['lang'] . '_content.php';

} else {
  //setcookie( "lang", "en", time()+60*60*24*30, '/ilyaizr', "ilyaizr.beget.tech", 0 ); //__Development
  setcookie( "lang", "en", time()+60*60*24*30, '/ilyaizr' );
  echo '<html lang="en">';
  require_once 'en_content.php';
}


if (!isset($_COOKIE['theme'])){
  setcookie('theme', 'dark', time()+60*60*24*30, '/ilyaizr');
} 
?>

