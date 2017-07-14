<?php
$input=$_GET['search'];
$channel=$_GET['channel'];
$search=$input;
if ($input==null) {
	echo "Data tidak tersedia";
	exit;
}
include_once "conf/info.php";
$title = 'Result Search | '.$input;
include_once "api/api_search.php";
?>
    <h7>Result Search: <em><?php echo $input?></em></h7>
<?php
	if ($search=="" or $search==null) {
		echo "Data tidak Ditemukan";
	}else{
		if($channel=="movie"){	
			foreach($search->results as $results){
				$title 		= $results->title;
				$id 		= $results->id;
				$release	= $results->release_date;
				if (!empty($release) && !is_null($release)){
					$tempyear 	= explode("-", $release);
					$year 		= $tempyear[0];
					if (!is_null($year)){
						$title = $title.' ('.$year.')';
					}
				}
				$backdrop 	= $results->backdrop_path;
				if (empty($backdrop) && is_null($backdrop)){
					$backdrop =  dirname($_SERVER['PHP_SELF']).'/image/no-gambar.jpg';
				} else {
					$backdrop = $imgurl_small.$backdrop;
				}
				echo '<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
						<center><img src="'.$backdrop.'">
						<div class="mdl-card__supporting-text mdl-color-text--grey-600">'.$title.'</div></center>
						</div>';
			}
		}
        }
        ?>
