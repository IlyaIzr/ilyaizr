<?php include ('includes/cookies.php');?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="less/style.css" id="main_styleshhet">  
  <?php if (isset($_COOKIE['theme'])) :?>
    <link rel="stylesheet" href="less/<?= $_COOKIE['theme'] ?>_theme.css" id="theme_stylesheet">
  <?php else : ?>
    <link rel="stylesheet" href="less/dark_theme.css" id="theme_stylesheet">
  <?php endif; ?> 

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $content['title'];?></title>
</head>


<body>
<!-- Add preloader here one day --><!--
<div class="mask">
  <div id="intro-loader">
  </div>
</div>
-->

<?php include ('includes/header.php'); ?>

<?php 
  $height_services = count($content['services']['options']) * 40.404 + 40.404 + 74 + 36 + 158.39
  + 32 + 14; // 18 is half of headline which we're framing. 30 is some misscalculation i can't understand
  $height_improvments = count($content['improvments']['options']) * 40.404 + 84 + $height_services + 10
  - 0;

  $conn = mysqli_connect("localhost", "testo", "0000", "calendar");
  $query = 'SELECT * FROM busy WHERE date >= CURDATE();'; // Yeah... date is column name in that database
  $result = mysqli_query($conn, $query);

  $busy_months = [];
  if(mysqli_num_rows($result) > 0){
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)){
      $busy_months[$i] = $row['date'];
      $i++;
    }
  }
?>

<div id="pc_container">
<div class="left_space"></div>
<div class="main_content">
  

<!--| I skipped line offsets for more comfort. Everything goes inside .main_content anyway |-->


<div class="services_title_container">
  <h2 class="headline"><?php echo $content['services']['h2'];?></h2>
</div>

<section class="intro">    
  <div class="big_spacer"></div>

  <div class="container">
    <div class="intro_prefix"><?php echo $content['intro']['intro_prefix1'];?></div>
    <span class="intro_comment"><?php echo $content['intro']['intro_comment1'];?></span><br><div class="spacer"></div>
    <div class="intro_prefix"><?php echo $content['intro']['intro_prefix2'];?></div>
    <span class="intro_comment"><?php echo $content['intro']['intro_comment2'];?></span><br><div class="spacer"></div>
    <div class="intro_prefix"><?php echo $content['intro']['intro_prefix3'];?></div>
    <span class="intro_comment"><?php echo $content['intro']['intro_comment3'];?></span><div class="spacer"></div>
  </div>  

  <div class="big_spacer"></div>
</section>
<!--| |-->

<div class="left_offset_container">  

  <div class="grey_dude"></div>
  <div class="left_offset_items">

    <section class="services">
        <div class="big_spacer"></div>
        <div class="container" style="height: calc(3.4vw * <?php 
          echo (count($content['services']['options']) + 1)
        ;?>);">
          <?php $option_index = 0; 
          foreach($content['services']['options'] as $option): ?>
            <div class="services_options"> <?php echo $option;?> </div>
            <span class="services_comment">[ <?php 
              echo $content['services']["comments"][$option_index];
              $option_index++;
              ?> ]</span>
            <br>
            <div class="spacer"></div>
          <?php endforeach; ?>
          <div  id="latter_phrase1"><?php echo $content['services']['latter_phrase1'];?></div>
          <span id="latter_phrase2"><?php echo $content['services']['latter_phrase2'];?></span>
          <br>
          <div class="spacer"></div>
        </div>
        <div class="big_spacer"></div>
    </section>

    <section class="improvments">  
        <?php 
          $improvs_quantity = (count($content['improvments']['options']) + 1);  //+1 is just a measure for how divs counts height of absolutes
          $improvs_heght = 126 /*static elements*/ + ($improvs_quantity * 34) /*container height for 1000px width*/;
        ?>

        <svg style="position: absolute" class="wide_screen" viewBox="0 0 652.27 <?php echo $improvs_heght;?>" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <!--| Set viewbox height with php|-->
          <path d="M 1 0 V <?php echo ($improvs_heght - 1);?> H 290" class="alternative_color" stroke-width="3" fill="none"/> <!--| Vertical left down |-->
          <path d="M 1 2 H 230" class="alternative_color" stroke-width="3" fill="none"/> <!--| Horiz to headline |-->
          <path d="M 640 2 H 650 V <?php echo ($improvs_heght - 51);?> l -50 50" class="alternative_color" stroke-width="3" fill="none"/> <!--| Framer |-->
        </svg>

        <svg style="position: absolute; left: 0;" class="mobile_screen" viewBox="0 0 380 350" version="1.1" stroke-width="3" xmlns="http://www.w3.org/2000/svg">
          <path d="M 355 12.5 h 10 l 20 0" class="alternative_color" fill="none"/> <!--| Framer |-->
          <path d="M 0 12.5 h 380" class="alternative_color" fill="none"/>
        </svg>
        <svg style="position: absolute; bottom: 0; left: 0; height: 100%; width: 100%;" class="mobile_screen" viewBox="0 0 100 100" version="1.1" stroke-width="min(0.12vh, 1px)" xmlns="http://www.w3.org/2000/svg">
          <path d="M 78 99.5 h 10 l 15 -15 h 35" class="alternative_color" fill="none"/>
          <path d="M -30 99.5 h 63 " class="alternative_color" fill="none"/>
        </svg>

        <h2 class="headline"><?php echo $content['improvments']['h2'];?></h2>

        <div class="big_spacer"></div>

        <div class="container" style="height: calc(3.4vw * <?php echo $improvs_quantity;?>);">
          <?php $improvment_index = 0; 
          foreach($content['improvments']['options'] as $option): ?>
            <div class="improvments_option">
            <?php echo $option;?>
            </div>
            <span class="improvments_comment">[ <?php 
            echo $content['improvments']["comments"][$improvment_index];
            $improvment_index++;
            ?> ]
            </span>
            <br>
            <div class="spacer"></div>
          <?php endforeach; ?>
          
          <div class="improvments_expand">
            <a href="./improvments" title="<?= $content['improvments']['improvments_title_prop'] ?>">
            [<?php echo $content['improvments']['improvments_expand'];?>]
            </a>
          </div>
        </div>
        <div class="big_spacer"></div>
          
        <div class="spacer"></div>
        <div class="big_spacer"></div>
        <div class="headline_container">
          <h2 class="headline_prefix"><?php echo $content['skills']['h2'];?></h2>
          <span class="headline_postfix"><?php echo $content['skills']['h2_span'];?></span>  
        </div>
    </section>

    <section class="skills">
        <div class="big_spacer"></div>

        <div class="container">    
          <?php $skill_index = 0; 
          foreach($content['skills']['options'] as $option): ?>
            <div class="skills_option">
            <?php echo $option;?>
            </div>
            <span class="skills_comment">
              <?php 
            echo $content['skills']["comments"][$skill_index];
            $skill_index++;
            ?>
            </span>
            <br>
            <div class="spacer"></div>
          <?php endforeach; ?>
          <p class="skills_p"><?php echo $content['skills']['p'];?></p>
          
        </div>
        <div class="big_spacer"></div>
    </section>

    <div class="big_spacer"></div>
    <div class="two_lines_separator">
      <svg width="100%" height="10" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 652.27 10">
        <path d="M 20 2 H 316" class="secondary_color" stroke-width="3" fill="none"/>
        <path d="M 326 2 H 632" class="secondary_color" stroke-width="3" fill="none"/>
      </svg>  
    </div>
    <div class="big_spacer"></div>


    <section class="work_process">
      <h2 class="headline"><?php echo $content['work_process']['h2'];?></h2>
      <div class="big_spacer"></div>
      <div class="big_spacer"></div>
      <div class="container">      
      <?php $node_index = 0; 
        foreach($content['work_process']['nodes'] as $node): ?>

          <?php if($node_index%2) : ?>
            <div class="node node_right">
              <h3><?php echo $node["h3"];?></h3>
              
              <svg viewBox="0 0 403 28" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMaxYMin meet" class="wide_screen">
                <path d="M 150 26 h 220 l 26 -25.5" class="secondary_color" stroke-width="3" fill="none"/>
              </svg>
              <svg viewBox="0 0 350 24" xmlns="http://www.w3.org/2000/svg" class="mobile_screen">
                <path d="M 80 22 h 240 l 26 -26" class="secondary_color" stroke-width="3" fill="none"/>
              </svg>

              <p><?php echo $node["p"];?></p>
            </div>  
            <div class="spacer"></div> 

            <?php $node_index++ ?>
          <?php else : ?>
            <div class="node node_left">
              <h3><?php echo $node["h3"];?></h3>

              <svg viewBox="0 0 403 28" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMaxYMin meet" class="wide_screen">
                <path d="M 0 0 L 26 26 H 240" class="secondary_color" stroke-width="3" fill="none"/>
              </svg>
              <svg viewBox="0 0 350 24" xmlns="http://www.w3.org/2000/svg" class="mobile_screen">
                <path d="M 0 0 L 22 22 H 240" class="secondary_color" stroke-width="3" fill="none"/>
              </svg>

              <p><?php echo $node["p"];?></p>
            </div>    
            <div class="spacer"></div>

            <?php $node_index++ ?>
          <?php endif; ?>
          
        <?php endforeach; ?>             
      </div>
      <div class="big_spacer"></div>
    </section>
  </div>
</div>
<section class="calendar">
  <svg viewBox="0 0 750 172" xmlns="http://www.w3.org/2000/svg" class="wide_screen">            
    <path d="M 1 0 V 10 H 100" class="comment_color" stroke-width="2.5" fill="none"/>
    <path d="M 1 0 V 175" class="comment_color" stroke-width="2.5" fill="none"/>
  </svg>
  <h2 class="headline"><?php echo $content['calendar']['h2'];?></h2>  
  <div class="big_spacer"></div>

  <div class="calendar_scroller" id="style-1">
  <?php for ($i=0; $i<21; $i++) : ?>
    <?php $curent_date = date('Y-m-d', strtotime(" +$i day"));
    $search_res = array_search($curent_date, $busy_months);
    $additional_class = "vacant";
    if(gettype($search_res) == 'integer'){ //then it's a match, then
      $additional_class = "busy";
    }?>
    <div class="day_cell <?php echo $additional_class;?>" 
      data-tooltip="<?php echo $content['calendar']["placeholder_$additional_class"];?>">
      <h1 class="month_day"><?php echo date('d', strtotime(" +$i day")); ?></h1>
      <?php $month_Num = date('m', strtotime(" +$i day"));
        $month_Num = (int)$month_Num;
        #$month_name = $months[$month_Num-1];
        $month_name = ".0" . $month_Num;
      ?>
      <h4 class="month_name"><?php echo $month_name; ?></h4>
    </div>
  <?php endfor; ?>
  </div>
  <div class="big_spacer"></div>
</section>

<section class="prices">
  <svg viewBox="0 0 750 172" xmlns="http://www.w3.org/2000/svg" style="position: absolute;opacity:0.1" class="wide_screen">            
    <path d="M 0 32 H 100" class="comment_color" stroke-width="2.5" fill="none"/>
  </svg>
  <div class="big_spacer"></div>
  <h2 class="headline"><?php echo $content['prices']['h2'];?></h2>
  <div class="big_spacer"></div>
  <div class="container">
  <?php $unit_index = 0; 
    foreach($content['prices']['units'] as $unit): ?>

    <div class="unit_container <?php if (($unit_index+1)%2) {echo "odd";} ?>">
      <p class="description"><?php echo $unit["p"];?></p>
      <span class="price"><?php echo $unit["span"];?></span>
    </div>    
    
    <?php $unit_index++ ?>
  <?php endforeach; ?>
    <div class="spacer"></div>
    <p class="comment_color"><?= $content['prices']['comment'] ?></p>
  </div>
  <div class="big_spacer"></div>
</section>


<section class="examples">  
  <svg viewBox="0 0 750 1500" xmlns="http://www.w3.org/2000/svg" style="position: absolute;opacity:0.1">            
    <path d="M 1 0 V 40 H 375 l 20 20 h 180" class="comment_color" stroke-width="2.5" fill="none"/>
    <path d="M 395 60 l 14 14 V 1500" class="comment_color" stroke-width="2.5" fill="none"/>
    <path d="M 375 40 h 20 l 20 -20" class="comment_color" stroke-width="2.5" fill="none"/>
  </svg>
  <div class="big_spacer"></div>
  <div class="big_spacer"></div>

  <h2 class="headline"><?php echo $content['examples']['h2'];?></h2>
  <div class="container">
  <?php $example_index = 0; 
    foreach($content['examples']['examples'] as $example): ?>
    <div class="adress_and_description">
      <div class="description">
        <p><?php echo $example['p'];?></p>
        <div class="spacer"></div>
        <svg viewBox="0 0 375 3" xmlns="http://www.w3.org/2000/svg" style="opacity:0.1">
          <path d="M 374 2 h -20" class="comment_color" stroke-width="2.5" fill="none"/>    
        </svg>
        <div class="spacer"></div>
      </div>
      <div class="adresses">
      <?php if($example_index===0) : ?>
        <div class="big_spacer"></div>        
      <?php endif; ?>
        <a href="http://<?php echo $example['a'];?>"><?php echo $example['a'];?></a>
        <svg viewBox="0 0 127.8 3" xmlns="http://www.w3.org/2000/svg" style="opacity:0.1">
          <path d="M 1 2 h 20" class="comment_color" stroke-width="2.5" fill="none"/>    
        </svg>
      </div>
    </div>
    <?php $example_index++ ;?>
  <?php endforeach; ?>
  </div>
  <div class="big_spacer"></div>
  <div class="spacer"></div>
</section>

<section class="other">
  <div class="spacer"></div>
  <div class="big_spacer"></div>
  <h2 class="headline"><?= $content["other"]["about"] ?></h2>
  <div class="big_spacer"></div>
  <div class="bio">
    <p><?= $content["other"]["bio"] ?></p>
  </div>
  <div class="spacer"></div>
  <div class="hobbies">
    <div id="hobbies_and_line">
      <h3><?= $content["other"]["hobbies"] ?></h3>
      <svg viewBox="0 0 375 3" xmlns="http://www.w3.org/2000/svg" id="hobbies_svg">
        <path d="M 375 2 h -300" stroke-width="2.5" fill="none"/>    
      </svg>
    </div>
    <div class="spacer"></div>
    <p><?= $content["other"]["hobbies_list"] ?></p>
  </div>
  
  <div class="big_spacer"></div>
</section>


<section class="congratulations">
  <div class="big_spacer"></div>
  <h2 class="headline"><?= $content['congratulations'][0] ?></h2>
  <div class="big_spacer"></div>
  <img src="/" alt="Congrats! you've made it to the end" id="congratulations_image">
  <div class="spacer"></div>
  <p><?= $content['congratulations'][1] ?></p>
  <div class="big_spacer"></div>
<div class="huge_spacer" style="height: 9vh;"></div>
</section>




<!--
<section class="other">
  <div class="art">

  </div>
</section>

<section class="reviews">
  
</section>
-->

<!--Parralax intro images-->
<!--
<img src="img/dark.svg" alt="" class="dark lax" data-lax-translate-y="0 -600, 300 -460">
<img src="img/medium.svg" alt="" class="medium lax" data-lax-translate-y="0 -600, 300 -400">
<img src="img/light.svg" alt="" class="light lax" data-lax-translate-y="0 -600, 300 -180">
-->

</div>
<div class="right_space"></div>
<?php readfile ('includes/footer.php'); ?>