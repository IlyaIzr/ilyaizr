<div id="svg_container_1">
  <svg width="100%" height="80" version="1.1" xmlns="http://www.w3.org/2000/svg" id="svg_top_header">
    <rect x="0" y="0" width="100%" height="80" stroke-width="5"/>
  </svg>  
  <h2 id="welcome"><?php echo $content['intro']['h2'];?></h2>
  <div class="flex_container">
    <div class="language_line"></div>
    <div class="buttons">      
      <div class="language_switch">
        <input type="checkbox" id="drop" />
        <label for="drop"><?= $content['language'];?></label>
          <?php $rest_of_langs = [];
          if (isset($_GET['lang'])){
            foreach ($accepted_languages as $language) {
              if ($language != $_GET['lang']){
              $rest_of_langs[0] = $language;
              }
            }
          } elseif (isset($_COOKIE['lang'])){
            foreach ($accepted_languages as $language) {
              if ($language != $_COOKIE['lang']){
              $rest_of_langs[0] = $language;
              }
            }
          } else {
            $rest_of_langs[0] = 'ru';
          }
          ?>
        <ul class="options">
          <a href="?lang=<?= $rest_of_langs[0]?>"><?php if($rest_of_langs[0] === "ru")
          { echo "русский"; 
          } else {
            echo "english"; 
          }?></a>  
        </ul>
      </div>
    
      <div class="theme_switcher">
        <p class="trigger" id="theme_switcher_text"> 
        <?php if (isset($_COOKIE['theme'])){
          if($_COOKIE['theme'] == 'dark'){
            echo $content['themes']['to_light'];
          } else {
            echo $content['themes']['to_dark'];
          }
        } else {
          echo $content['themes']['to_light'];
        }
        ?></p>
      </div>
    </div>    
  </div>
  <div class="theme_line"></div>

</div>