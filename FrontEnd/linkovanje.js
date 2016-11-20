var linkovanje = function() {

	var pages = document.getElementsByClassName("pages");

	pages[0].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				document.getElementsByClassName("kocka")[0].innerHTML = x.responseText;
			}
		}
		x.open("GET", "indexContent.html", true);		
		x.send();
	});
	pages[1].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				document.getElementsByClassName("kocka")[0].innerHTML = x.responseText;
			}
		}
		x.open("GET", "treneriContent.html", true);		
		x.send();
	});
	pages[2].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				document.getElementsByClassName("kocka")[0].innerHTML = x.responseText;
				
				var GalleryJS = function() {

					var slike = document.getElementsByClassName("prikaz");

					[].forEach.call(slike, function(element, index) {
						element.firstElementChild.addEventListener("click",function(){
							var slika = element.firstElementChild.getAttribute("src");
							console.log(slika);
							document.getElementById("largeImage").src = slika;
							document.getElementById("velikaSlika").style.display = 'block'; 
							
						});
					});

					var Overlay = document.getElementById("velikaSlika");
					document.onkeydown = function(event){
						event = event || window.event;
						var isEscape = false;
						if ("key" in event) {
						    isEscape = (event.key == "Escape" || event.key == "Esc");
						} else {
						    isEscape = (event.keyCode == 27);
						}
						if (isEscape && Overlay.style.display == 'block') {
						    Overlay.style.display = 'none';
						}
					}
				}
				GalleryJS();	

			}
		}
		x.open("GET", "galerijaContent.html", true);		
		x.send();
	});
	pages[3].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				document.getElementsByClassName("kocka")[0].innerHTML = x.responseText;
				var formeJS =  function() {

					var posaljiDugme = document.getElementsByClassName("forma-dugme")[0];
					var smth = document.getElementsByClassName("novost-tekst")[0];
					var was = document.getElementsByClassName("novost-tekst")[0].innerHTML;

					var buttonFeedback = document.getElementsByClassName("forma-dugme")[2];
					var wasFeedback = document.getElementsByClassName("novost-tekst")[2].innerHTML;
					var smth1 = document.getElementsByClassName("novost-tekst")[2];
					var feedback = document.getElementById("feedback");
						
					var enableButton = function(){
						if(posaljiDugme.disabled == true) {
							posaljiDugme.disabled = false;
							smth.innerHTML = was;
							smth.style.color = '#514F94';
						}
					}

					var enableButton1 = function(){
						if(buttonFeedback.disabled == true) {
							buttonFeedback.disabled = false;
							smth1.innerHTML = wasFeedback;
							smth1.style.color = '#514F94';
						}
					}

					var ime = document.getElementsByName("name")[0];
					var email = document.getElementsByName("name")[1];
					var pitanje = document.getElementsByName("name")[2];

					ime.addEventListener("change", enableButton);
					email.addEventListener("change", enableButton);
					pitanje.addEventListener("change", enableButton);
					feedback.addEventListener("input", enableButton1);

					posaljiDugme.onclick = function() {
						var valueIme = ime.value,
							valueEmail = email.value,
							valuePitanje = pitanje.value;

						var vIme = validirajInput(valueIme, "ime");
						var vMail = validirajInput(valueEmail, "email");
						var vPitanje = validirajInput(valuePitanje, "pitanje");

						if((valueIme.length == 0) || (valueEmail.length == 0) || (valuePitanje.length == 0)) {
							smth.innerHTML = "Niti jedno polje ne smije biti przno, molimo unesite odgovarajuće podatke!";
							smth.style.color = "red";
							posaljiDugme.disabled = true;
						}
						else if(!vIme) {
							smth.innerHTML = "Greska prilikom unošenja podataka u polje 'Vase ime', molimo ponovite unos!";
							smth.style.color = "red";
							posaljiDugme.disabled = true;
						}
						else if(!vMail) {
							smth.innerHTML = "Greska prilikom unošenja podataka u polje 'Vasa email adresa', molimo ponovite unos!";
							smth.style.color = "red";
							posaljiDugme.disabled = true;
						}
						else if(!vPitanje) {
							smth.innerHTML = "Greska prilikom unošenja podataka u polje 'Vase pitanje', molimo ponovite unos!";
							smth.style.color = "red";
							posaljiDugme.disabled = true;
						}
					}

					buttonFeedback.onclick = function() {
						console.log(feedback.value + " " + wasFeedback);
						var vFeedback = validirajInput(feedback.value, "feedback");

						if(feedback.value.length == 0 || !vFeedback) {
							smth1.innerHTML = "Greska prilikom unošenja podataka, molimo ponovite unos!";
							smth1.style.color = "red";
							buttonFeedback.disabled = true;
						}
					}

					function validirajInput(input, tip) {
						var patternIme = /[A-Z]{1}[a-z]{0,20}/;
						var patternMail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						var patternPitanje = /(\S{0,20}|\ ){100}(\ |\?)/; 
						var patternFeedback = /(\S{0,20}|\ ){200}/;

						if(tip === "ime") return patternIme.test(input);
						else if(tip === "email") return patternMail.test(input);
						else if(tip === "feedback") return patternFeedback.test(input);
						return patternPitanje.test(input);
					}
				}
				formeJS();
			}
		}
		x.open("GET", "formeContent.html", true);		
		x.send();
	});
	pages[4].addEventListener("click", function() {
		var x = new XMLHttpRequest();
		x.onreadystatechange = function() {
			if(x.readyState == 4){
				document.getElementsByClassName("kocka")[0].innerHTML = x.responseText;
			}
		}
		x.open("GET", "onamaContent.html", true);		
		x.send();
	});
}

linkovanje();