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