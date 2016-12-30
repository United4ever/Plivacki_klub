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
		}
		else if($var["type"] == 'csv') {
			$file = "pitanja.xml";
			if (file_exists($file)) {
			    $xml = simplexml_load_file($file);
				$f = fopen("pitanja.csv", 'w');
			    foreach ($xml -> row as $row) {
			    	fputcsv($f, get_object_vars($row),',','"');
				}
				fclose($f);
			}
		}
		else {
			$pdf = new MYPDF();
			$header = array('Ukupno ocjena', 'Prosjecna ocjena', 'Najbolja ocjena', 'Najlosija ocjena');

			$pdf -> SetFont('Arial', '', 16);
			$pdf -> AddPage();

			$xml = simplexml_load_file("ocjene.xml");
			if(!empty($xml)) {
				$treneri = array();
				$ocjene = array();
				foreach($xml -> row as $row) {
					$treneri[] = $row -> select;
					$ocjene[] = $row -> range;
				}
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
			}
		}
	}
?>