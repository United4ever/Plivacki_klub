var admin = function() {
	var dugmad = document.getElementsByClassName("dugmad");

	dugmad[0].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				
			}
		}
		var data = "type=obrisi";
		x.open("POST", "adminPHP.php", true);		
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		x.send(data);
	});

	dugmad[1].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				window.location = "pitanja.csv";
			}
		}
		var data = "type=csv";
		x.open("POST", "adminPHP.php", true);
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		x.send(data);
	});

	dugmad[2].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				window.location = "izvjestaj.pdf";
			}
		}
		var data = "type=pdf";
		x.open("POST", "adminPHP.php", true);
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		x.send(data);
	});

	dugmad[3].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				
			}
		}
		var data = "type=db";
		x.open("POST", "adminPHP.php", true);
		x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");		
		x.send(data);
	});
}

admin();