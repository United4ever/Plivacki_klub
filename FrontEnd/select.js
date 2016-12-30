var trenerDugme = document.getElementsByClassName("forma-dugme")[1];
trenerDugme.addEventListener("click", function() {
	var select = document.getElementById("selekt");
	var selectValue = select.options[select.selectedIndex].text;
	var range = document.getElementById("rejndz").value;

	//select == koji trener \\// range == koja ocjena
	var data = "type=forma3" + "&select=" + selectValue + "&range=" + range;
	var x = new XMLHttpRequest();
	x.onreadystatechange = function() {
		if(x.readyState == 4){
			
		}
	}
	x.open("POST", "serijalizacija.php", true);		
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	x.send(data);
});