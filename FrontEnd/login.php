<?php
	$var = $_REQUEST;
	if(isset($var["type"])) {

		$xml = simplexml_load_file("podaciOAdminu.xml");
		if(!empty($xml)) {
			$username = $xml -> username;
			$pass = $xml -> pass;

			$getU = $var['username'];
			$getP = $var['pass'];

			$concat = $getU . ' ' . $getP;
			$regex = '/[a-z]{3,10}\s[a-z]{3,10}/';

			if($username == $getU && $pass == $getP && preg_match($regex, $concat) === 1) echo "yes";
			else echo "no";
		}
	}
?>