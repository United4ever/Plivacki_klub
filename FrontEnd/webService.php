<?php
	//servis koji vraca sve ocjene trenera sa datim imenom

	$var = $_GET['imeTrenera'];

	$link = mysqli_connect('localhost', 'united4ever', 'united4ever', 'wt');

	$sql = mysqli_query($link, 'select * from ocjene where trener = ' . '"' . $var . '"');

	$arr = array();

	while ($row = mysqli_fetch_array($sql)) {
		$arr[] = $row["ocjena"];
	}

	echo "{\"Ocjene\": " . json_encode($arr) . "}";

?>