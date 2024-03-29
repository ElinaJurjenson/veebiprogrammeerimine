  <?php
  $userName="Elina Jürjenson";
  $photoDir= "../photos/";
  $picFileTypes= ["imgage/jpeg", "image/png", "image/jpg"];
  $fullTimeNow= date("d.m.Y H:i:s");
  $hourNow= date("H");
  $partOfDay= "hägune aeg";
  if($hourNow < 8){
	  $partOfDay="varajane hommik";
  }
?>
  <?php
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd= new DateTime("2019-12-13");
	$semesterDuration= $semesterStart->diff($semesterEnd);
	$today= new DateTime("now");
	$fromSemesterStart= $semesterStart->diff($today);
	//var_dump($fromSemesterStart);
	$semesterInfoHTML= "<p>Siin peaks olema info semestri kulgemise kohta</p>";
	$elapsedValue= $fromSemesterStart->format("%r%a");
	$durationValue= $semesterDuration->format("%r%a");
	//echo $testValue
	//<meter min="0" max="155" value="33">Väärtus</meter>
	if($elapsedValue > 0){
		$semesterInfoHTML = "<p>Semester on täies hoos: ";
		$semesterInfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterInfoHTML .= 'value="' .$elapsedValue .'" >';
		$semesterInfoHTML .= round($elapsedValue / $durationValue*100, 1) ."%";
		$semesterInfoHTML .="</meter>";
		$semesterInfoHTML .="</p>";
	}
	
	//foto lisamine lehele
	$allPhotos= [];
	$dirContent= array_slice(scandir($photoDir), 2);
	//var_dump($dirContent);
	foreach ($dirContent as $file){
		$fileInfo= getImagesize($photoDir .$file);
		//var_dump ($fileInfo);
		if(in_array($fileInfo["mime"], $picFileTypes) == true);{
			array_push($allPhotos, $file);
		}
	}

	var_dump($allPhotos);
	$picCount= count($allPhotos);
	$picNum= mt_rand(0, ($picCount - 1));
	//echo $allPhotos[$picNum]
	$photoFile = $photoDir .$allPhotos[$picNum];
	$randomImgHTML= '<img src="' .$photoFile .'" alt="TLÜ Terra õppehoone">';
	?>
	<?php
	echo $semesterInfoHTML;
	
	//lisame lehe päise
	require("header.php");
	
	?>

<body>
  <p>See leht on loodud koolitöö raames ja ei sisalda tõsiseltvõetavat sisu! </a></p>
  <hr>
  <?php
  echo $randomImgHTML
  
  ?>
  <p>Lehe avamise hetkel oli aeg: 
   <?php
    echo $fullTimeNow; 
  ?>
  .</p>
  <?php
    echo "<p>Lehe avamise hetkel oli ".$partOfDay ." .</p>";
	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd= new DateTime("2019-12-13");
	$semesterDuration= $semesterStart->diff($semesterEnd);
	$today= new DateTime("now");
	$fromSemesterStart= $semesterStart->diff($today);
	echo $fromSemesterStart;
  ?>
</body>
</html>
  
	