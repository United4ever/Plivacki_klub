<?php
	
	$data = $_POST;
	if(isset($data["type"])) {

		$type = $data["type"];
		//$xml = new DOMDocument("1.0", "UTF-8");

		$link = mysqli_connect('localhost', 'united4ever', 'united4ever', 'wt');

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if($type == "forma1") {

			$name = $data["ime"];
			$email = $data["email"];
			$pitanje = $data["pitanje"];

			$patternIme = '/[A-Z]{1}[a-z]{0,20}/';
			$patternPitanje = '/(\S{0,20}|\ ){100}(\ |\?)/'; 

			if(preg_match($patternIme, $name) == 1 && preg_match($patternPitanje, $pitanje) == 1) {

				//ispod kod za xml
				/*$xml -> load("pitanja.xml");

				$root = $xml -> getElementsByTagName("root") -> item(0);

				$row = $xml -> createElement("row");
				$row -> appendChild($xml -> createElement("ime", $name));
				$row -> appendChild($xml -> createElement("email", $email));
				$row -> appendChild($xml -> createElement("pitanje", $pitanje));
				$root -> appendChild($row);
				$xml -> save("pitanja.xml");*/


				$tmp = mysqli_query($link, 'insert into pitanje (ime, email, pitanje) values (' . '"' . $name . '"' . ',' . '"' . $email . '"' . ',' . '"' . $pitanje . '"' . ');');
			}
		}
		else if($type == "forma3") {
			$select = $data["select"];
			$range = $data["range"];

			//ispod kod za xml
			/*$xml -> load("ocjene.xml");

			$root = $xml -> getElementsByTagName("root") -> item(0);

			$row = $xml -> createElement("row");
			$row -> appendChild($xml -> createElement("select", $select));
			$row -> appendChild($xml -> createElement("range", $range));
			$root -> appendChild($row);
			$xml -> save("ocjene.xml");*/

			mysqli_query($link, 'insert into ocjene (trener, ocjena) values ('. '"' . $select . '"' . ',' . '"' . $range . '"' . ');');
		}
		else {
			$feedback = $data["feedback"];

			$patternFeedback = '/(\S{0,20}|\ ){200}/';

			if(preg_match($patternFeedback, $feedback)) {

				//ispod kod za xml
				/*$xml -> load("feedback.xml");
				$root = $xml -> getElementsByTagName("root") -> item(0);
				$feedback = $xml -> createElement("feedback", $feedback);
				$root -> appendChild($feedback);
				$xml -> save("feedback.xml");*/

				mysqli_query($link, 'insert into feedback (feedback) values (' . '"' . $feedback . '"' . ');');
			}
		}

		mysqli_commit($link);
		mysqli_close($link);
	}
?>