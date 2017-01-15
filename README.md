# Plivacki_klub

Tema iz projekta Web tehnologije, je plivacki klub. (Daljnji opis soon to come...)

Ime i prezime: Edin Ceric

Broj indeksa: 17095

Spirala broj 1:
	1. Napravljeno je 5 stranica, i to: glavna stranica, galerija slika, stranica koja sadrzi
	razne forme, o nama, te stranica koja sadrzi trenere
	2. Smatra se da je sve uradjeno na osnovu trazenih specijfikacija, u zadaci 
	3. i 4. niti jedan bug nije primijecen (stranice su provjerene html validatorom)
	5. 	index.html - main page file;
		galerija.html - galerija slika;
		forme.html - sadrzi 3 forme, na osnovu specifikacija;
		treneri.html - slike trenera;
		oNama.html - kontaktne informacije, te osnovne informacije o klubu;

Spirala broj 2:
	1. Validirane su sve forme u skladu sa trazenim u zadatku pod a) osim forme2
		iz razloga sto u tu formu nemoguce unijeti pogresne podatke (slide ruller),
		te je uradjena galerija slika sa opcijom poofff iz zadatka pod b), i ucitavanje
		bez relaodanja koristeci Ajax call
	2. Pokusao sam uraditi localstorage u zadatku pod b), medjutim nisam uspio adekvatno pokupiti
		podatke i displayati ih u odgovarajucim poljima
	3. Povalcenje podataka iz localstoragea mi je jasno, jedino sto bih naveo kao opis rjesenja je
		window.onReload (ili nesto slicno), te kada okine taj event, da se iz localstoragea po 
		key vrijednostima dodijele adekvatne vrijednosti poljima u formi
	5. 	index.html - main page file;
		galerija.html - galerija slika;
		forme.html - sadrzi 3 forme, na osnovu specifikacija;
		treneri.html - slike trenera;
		oNama.html - kontaktne informacije, te osnovne informacije o klubu;
		style.css - sav potreban css
		linkovanje.js - sav potreban javasrcipt code
		indexContent.html - pomocni .html za Ajax call
		galerijaContent.html - pomocni .html za Ajax call
		formeContent.html - pomocni .html za Ajax call
		treneriContent.html - pomocni .html za Ajax call
		onamaContent.html - pomocni .html za Ajax call
		
Spirala broj 3:
	1. Urađeno je:
		- serijalizacija podataka, koji se unose preko formi, u .xml fajlove
		- dodan je admin.html dokument koji sadrži button-e za brisanje slogova u fajlovima, te generisanje .csv i .pdf fajlova
		- urađena je i server-side validacija podataka, koristeći regex, koja između ostaloga onemogućava XSS napad
		- omogućeno je i generisanje izještaja u .pdf formatu, te povlačenje sadržaja .xml dokumenta u .csv formatu
		- sva komunikacija client - server je urađena koristeći AJAX, tj. nema direktnog poziva .php skripti, čak ni za login
	2. Nije urađeno:
		- zahtjev pod 4., tj. nije omogućen search sa prijedlozima
		- nije projekat deployan na Open Shift
	3. Bugova ne bi trebalo da ima, barem nisu primjećeni
	4. Kao i pod 3. 
	5. Novododani fajlovi:
		- admin.html - buttoni koji omogućavaju CRUD, isključivo adminu
		- adminContent.html - samo html sadržaj potreban prilikom AJAX poziva 
		- adminJS.js - popratni javascript kod potreban za funkcionalnosti vezane za admin.html fajl
		- adminPHP.php - popratni php kod potreban za funkcionalnosti vezane za admin.html fajl
		- login.php - serverski kod koji služi za identifikaciju admina
		- serijalizacija.php - kod putem kojeg se izvršava serijalizacija novododanih podataka u .xml fajlove
		
Spirala broj 4:
	1. Urađeno je:
		- napravljena sql baza podataka sa tri tabele, i to: pitanje, feedback, ocjene
		- editovana već postojeća php skripta, kodom koji prebacuje sadržaj xml fajlova u odgovarajuće tebele u bazi, te dodan 			html i css code po potrebi
		- skripte prepravljene da se svaki unos sa formi spašava u bazu, a ne u xml, te da se podaci povlače iz baze
		- napravljena skripta koja služi kao web servis, s time da je izričito napisao u specifikaciji zadatka da 	
		servis mora vraćati podatke u JSON formatu, te samim time i nisu implementirane ostale funkcionalnosti REST servisa
		- korišten postman da se testira servis
	2 Nije urađeno:
		- deploy na open shift
	3. Bugovi nisu primijećeni
	4. Kao i pod 3
	5. Novododani fajlovi: 
		- dump.sql - dump baze
		- webService.php - skripta koja sadrži web servis
	
