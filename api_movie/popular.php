<?php
  include "conf/info.php";
  $title="Popular Movies";
?>
    <hr>
    <ul>
      <?php
        include_once "api/api_popular.php";
        if ($popular=="" or $popular==null) {
  echo "Data tidak Ditemukan";
}else{
        foreach($popular->results as $p){
          echo '<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop"><center>
              <img src="'.$imgurl_small.''. $p->poster_path . '">
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</div>
              <div class='mdl-card__supporting-text mdl-color-text--grey-600'><em> Rate : " . $p->vote_average . " | Vote : " . $p->vote_count . " | Popularity : " . round($p->popularity) . "</em></div></center>
            </div>";
        }
      }
      ?>
    </ul>
