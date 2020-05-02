<?php include ('../includes/cookies.php');?>
<?php if ( isset($_GET['lang']) && in_array($_GET['lang'], $accepted_languages) ){
  require_once $_GET['lang'] . '_content.php';
} else {
  require_once 'en_content.php';
}
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <?php if (isset($_COOKIE['theme'])) :?>
    <link rel="stylesheet" href="../less/<?= $_COOKIE['theme'] ?>_theme.css" id="theme_stylesheet">
  <?php else : ?>
    <link rel="stylesheet" href="../less/dark_theme.css" id="theme_stylesheet">
  <?php endif; ?> 

  <link rel="stylesheet" href="../less/style.css" id="main_styleshhet">  
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="dark_theme.css">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $content['title'];?></title>
</head>
<body>

<?php include ('../includes/header.php');?>


<div id="pc_container">

<div class="left_space"></div>

<div class="main_content">
  <section class="intro">
    <div class="big_spacer"></div>
    <div class="big_spacer"></div>
    <div class="big_spacer"></div>
    <div class="spacer"></div>
    <h1 class="alternative_color" ><?= $content['improvments']['h2'] ?></h1>
    <div class="container">
      <h3 class="comment_color">Let's talk a bit more about each option</h3>
    </div>
    <svg viewBox="0 0 100 100" version="1.1" stroke-width="1.8" xmlns="http://www.w3.org/2000/svg" id="starting_svg">
      <path d="M -1000 99.2 h 2000" class="primary_color" fill="none"/>
      <path d="M 335 100 v -100" class="primary_color" fill="none"/>
      <path d="M -400 99.2 h 350" class="comment_color" fill="none"/>
    </svg>
  </section>

  <section class="options">
  <svg viewBox="0 0 100 100" version="1.1" stroke-width=".05vw" xmlns="http://www.w3.org/2000/svg">
    <path d="M 0 0 v 120" class="comment_color" fill="none"/>
  </svg>
    <div class="big_spacer"></div>
    <div class="spacer"></div>
    <div class="option primary_color">Customize your braaaaainz</div>
    <div class="option primary_color">Customize your braaaaainz</div>
    <div class="option primary_color">Customize your braaaaainz</div>
    <div class="option primary_color">Customize your braaaaainz</div>
    <div class="option primary_color">Customize your braaaaainz</div>
  </section>
</div>





<div class="right_space"></div>
</div>
</body>
</html>