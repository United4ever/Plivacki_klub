<?php

	require('C:\wamp64\www\FrontEnd\fpdf\fpdf.php');

	class Ocjena {
		public $trener;
		public $ocjena;

		public function __construct($arg1, $arg2) {
			$trener = arg1;
			$ocjena = arg2;
		}
	}

	class MYPDF extends FPDF
	{
		function __construct() {
			parent::__construct();
		}

		function BasicTable($header, $data)
		{
		    foreach($header as $col)
		        $this -> Cell(50, 7 , $col, 1);
		    $this -> Ln();
		    for($i = 0; $i < count($data); $i++) {
		    	for($j = 0; $j < count($data[$i]); $j++) {
		    		$this -> Cell(50, 6, (string) $data[$j][$i], 1);
		    	}
		    	$this -> Ln();
		    }
		}
	}

	$var = $_POST;
	if(isset($var['type'])) {

		if($var["type"] == 'obrisi') {
			$xml = simplexml_load_file("feedback.xml");

			if(!empty($xml)) {
				for($i = 0; $i < count($xml -> feedback); $i++) {
					unset($xml -> feedback[$i]);
				}
			}

			//cak je implementirano i brisanje iz baze svih podataka

			$link = mysqli_connect('localhost', 'united4ever', 'united4ever', 'wt');

			mysqli_query($link, 'delete from pitanje');
			mysqli_query($link, 'delete from feedback');
			mysqli_query($link, 'delete from ocjene');

			mysqli_commit($link);
			mysqli_close($link);
		}
		else if($var["type"] == 'csv') {
			/*$file = "pitanja.xml";
			if (file_exists($file)) {
			    $xml = simplexml_load_file($file);
				$f = fopen("pitanja.csv", 'w');
			    foreach ($xml -> row as $row) {
			    	fputcsv($f, get_object_vars($row),',','"');
				}
				fclose($f);
			}*/

			$link = mysqli_connect('localhost', 'united4ever', 'united4ever', 'wt');
			$sql_pitanja = mysqli_query($link, 'select * from pitanje');
			$pitanja_rows = array();
			while($one_row = mysqli_fetch_array($sql_pitanja)) {
				$pitanja_rows[] = $one_row;
			}

			if($pitanja_rows != null && count($pitanja_rows) != 0) {
				$f = fopen("pitanja.csv", 'w');
			    foreach ($pitanja_rows as $row) {
			    	$ubacivanje = array();
			    	for($i = 0; $i < 3; $i++) {
			    		$ubacivanje[$i] = $row[$i];
			    	}
			    	fputcsv($f, $ubacivanje);
				}
				fclose($f);
			}

			mysqli_commit($link);
			mysqli_close($link);
		}
		else if($var["type"] == 'db') {

			$xml_pitanja = simplexml_load_file('pitanja.xml');
			$xml_feedback = simplexml_load_file('feedback.xml');
			$xml_ocjene = simplexml_load_file('ocjene.xml');
			
			$link = mysqli_connect('localhost', 'united4ever', 'united4ever', 'wt');

			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$sql_pitanja = mysqli_query($link, 'select * from pitanje');
			$sql_feedback = mysqli_query($link, 'select * from feedback');
			$sql_ocjene = mysqli_query($link, 'select * from ocjene');

			$pitanja_rows = array();
			$feedback_rows = array();
			$ocjene_rows = array();

			while($row = mysqli_fetch_array($sql_pitanja)) $pitanja_rows[] = $row;
			while($row = mysqli_fetch_array($sql_feedback)) $feedback_rows[] = $row;
			while($row = mysqli_fetch_array($sql_ocjene)) $ocjene_rows[] = $row;

			if($pitanja_rows == null || count($pitanja_rows) == 0 || count($xml_pitanja -> row) != count($pitanja_rows)) {
				mysqli_query($link, 'delete from pitanje');
				foreach ($xml_pitanja -> row as $row) {
					mysqli_query($link, 'insert into pitanje (ime, email, pitanje) values (' . '"' . $row -> ime . '"' . ',' . '"' . $row -> email . '"' . ',' . '"' . $row -> pitanje . '"' . ');');
				}
			}

			if($feedback_rows == null || count($feedback_rows) == 0 || count($xml_feedback -> feedback) != count($feedback_rows)) {
				mysqli_query($link, 'delete from feedback');
				foreach ($xml_feedback as $row) {
					mysqli_query($link, 'insert into feedback (feedback) values (' . '"' . $row . '"' . ');');
				}
			}

			if($ocjene_rows == null || count($pitanja_rows) == 0 || count($xml_ocjene -> row) != count($ocjene_rows)) {
				mysqli_query($link, 'delete from ocjene');
				foreach ($xml_ocjene -> row as $row) {
					mysqli_query($link, 'insert into ocjene (trener, ocjena) values (' . '"' . $row -> select . '"' . ',' . '"' . $row -> range . '"' . ');');
				}
			}

			mysqli_commit($link);
			mysqli_close($link);
		}
		else  if($var["type"] == 'pdf') {
			if(file_exists('izvjestaj.pdf')) {
				unlink('izvjestaj.pdf');
			}

			$pdf = new MYPDF();
			$header = array('Ukupno ocjena', 'Prosjecna ocjena', 'Najbolja ocjena', 'Najlosija ocjena');

			$pdf -> SetFont('Arial', '', 16);
			$pdf -> AddPage();

			//$xml = simplexml_load_file("ocjene.xml");

			$link = mysqli_connect('localhost', 'united4ever', 'united4ever', 'wt');

			//if(!empty($xml)) {

				$treneri = array();
				$ocjene = array();
				$sql = mysqli_query($link, 'select * from ocjene');

				while($row = mysqli_fetch_array($sql)) {
					$treneri[] = $row[0];
					$ocjene[] = $row[1];
				}

				/*foreach($xml -> row as $row) {
					$treneri[] = $row -> select;
					$ocjene[] = $row -> range;
				}*/

				$sume_treneri = array(0, 0, 0, 0);
				$brojaci_treneri = array(0, 0, 0, 0);
				$najvece_ocjene = array(0, 0, 0, 0);
				$najmanje_ocjene = array(10, 10, 10, 10);

				for($i = 0; $i < count($treneri); $i++) {
					if($treneri[$i] == 'Trener 1') {
						$sume_treneri[0] += $ocjene[$i];
						$brojaci_treneri[0]++;
						if($ocjene[$i] > $najvece_ocjene[0]) $najvece_ocjene[0] = (int) $ocjene[$i];
						if($ocjene[$i] < $najmanje_ocjene[0]) $najmanje_ocjene[0] = (int) $ocjene[$i];
					}
					else if($treneri[$i] == 'Trener 2') {
						$sume_treneri[1] += $ocjene[$i];
						$brojaci_treneri[1]++;
						if($ocjene[$i] > $najvece_ocjene[1]) $najvece_ocjene[1] = (int) $ocjene[$i];
						if($ocjene[$i] < $najmanje_ocjene[1]) $najmanje_ocjene[1] = (int) $ocjene[$i];
					}
					else if($treneri[$i] == 'Trener 3') {
						$sume_treneri[2] += $ocjene[$i];
						$brojaci_treneri[2]++;
						if($ocjene[$i] > $najvece_ocjene[2]) $najvece_ocjene[2] = (int) $ocjene[$i];
						if($ocjene[$i] < $najmanje_ocjene[2]) $najmanje_ocjene[2] = (int) $ocjene[$i];
					}
					else if($treneri[$i] == 'Trener 4') {
						$sume_treneri[3] += $ocjene[$i];
						$brojaci_treneri[3]++;
						if($ocjene[$i] > $najvece_ocjene[3]) $najvece_ocjene[3] = (int) $ocjene[$i];
						if($ocjene[$i] < $najmanje_ocjene[3]) $najmanje_ocjene[3] = (int) $ocjene[$i];
					}
				}

				$prosjecne_ocjene = array();
				for($i = 0; $i < 4; $i++) {
					if($brojaci_treneri[$i] != 0) $prosjecne_ocjene[$i] = $sume_treneri[$i] / $brojaci_treneri[$i];
					else $prosjecne_ocjene[$i] = 0;
				}
				$data = array($brojaci_treneri, $prosjecne_ocjene, $najvece_ocjene, $najmanje_ocjene);
				
				$pdf -> BasicTable($header, $data);
				$pdf -> Output("izvjestaj.pdf", 'F');

				mysqli_commit($link);
				mysqli_close($link);	

			//}
		}
	}
?>