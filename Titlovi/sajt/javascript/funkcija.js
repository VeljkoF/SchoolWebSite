var xmlhttp;
function promena(vrednost, film){
	var id_titla=film;
	var opcija = vrednost.value;
	if(opcija.length == 0){
		document.getElementById("prikaz2").innerHTML = "";
		return;
	}
	xmlHttp = GetXmlHttpObject();
	if(xmlHttp == null){
		alert("Browser does not support HTTP Request");
		return;
	}
	var strana = "../strane/glasanje.php";
	var url = strana+"?glas="+opcija+"&film="+id_titla;
	xmlHttp.onreadystatechange=state_changed;
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
}
function state_changed(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("prikaz2").innerHTML = xmlHttp.responseText;
	}
}