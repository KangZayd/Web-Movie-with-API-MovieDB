<?php
  include "conf/info.php";
  $title="Welcome to";
//  include_once "header.php";
?>
  <!--  <h1>~ Top Rated Movies ~</h1>
    --><hr>
    <ul>
      <?php
        include_once "api/api_toprated.php";
        if (count($toprated->results)<0) {
          echo "Tidak ada Data";
        }else{
          foreach($toprated->results as $p){
             
            echo '
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <img src="'.$imgurl_small. $p->poster_path . '">
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</div>
              <div class='mdl-card__supporting-text mdl-color-text--grey-600'><em>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . "</em></div>
            </div>";
          }
        }
      ?>
    </ul>

<?php
?>