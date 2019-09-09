//slideShow

$(document).ready(function(){
	slideShow();
});

function slideShow() {
  var current = $('#slide .slideShow');
  var next = current.next().length ? current.next() : current.parent().children(':first');
  
  current.hide().removeClass('slideShow');
  next.fadeIn().addClass('slideShow');
  
  setTimeout(slideShow, 5000);
}


//padajuciMeni
var trajanje= 300;
var vreme_pokazivanja	= 0;
var getID	= 0;

function motvori(id) 
{	
	mvreme_pokazivanja(); 

	
	if(getID){
		getID.style.visibility = 'hidden'; 
	}
	getID = document.getElementById(id); 
	getID.style.visibility = 'visible';
}
function mzatvori(){ 
	if(getID) 
		getID.style.visibility = 'hidden';	
}
function mvreme_trajanja(){ 
	vreme_pokazivanja = window.setTimeout(mzatvori, trajanje);
}
function mvreme_pokazivanja(){ 
	if(vreme_pokazivanja){
		window.clearTimeout(vreme_pokazivanja);
		vreme_pokazivanja = null;
	}
}

document.onclick = mzatvori;  

function padajuciMeni(){
	document.getElementById("padajuciMeni").style.display=block;
}



//padajuci login

$(document).ready(function(){
	$('#log >.f1').hide();
	
	$('#log').hover(function(){
		$('.f1')		
			.stop(true,true)
			.fadeIn('fast');	
			
		
	}, function(){
		$('.f1')
			.stop(true,true)
			.fadeOut("fast");
			$("#tbKorisnickoIme").val("");
			$("#tbLozinka").val("");
		
	})
	
});




//galerija

var text="";

	$(document).ready(function(){
	$.ajax({
		type:"GET",
		url:"galerija.xml",
		dataType:"xml",
		success:function(xml){
			$(xml).find("slika").each(function(){
				
				var naziv=$(this).find('naziv').text();
				var putanja=$(this).find('putanja').text();
				var alt=$(this).find('alt').text();
				
				text+='<div id="galerijaSlike"><div id="gslika"><a href="' + putanja + '" data-lightbox="galerija" data-title="'+naziv +'"><img src="' + putanja +'" alt="' +alt + '"/></a><p><b><i>' + naziv + '</i></b></p></div></div>';
			});
			
			document.getElementById("galerija").innerHTML=text;
		}
	});
	
});


//pretraga strana

function pretraga(){
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","Strane/pretraga.xml",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	dohvatiPodatke(xmlDoc);
}
function dohvatiPodatke(xmlDoc){
	var tbSearch=document.getElementById('tbSearch');
	var svaPretraga=xmlDoc.getElementsByTagName('strana');
	var ispis="";
	for(var i=0;i<svaPretraga.length;i++){
		var ime=svaPretraga[i].getElementsByTagName('ime')[0].childNodes[0].nodeValue;
		var srcc=svaPretraga[i].getElementsByTagName('srcc')[0].childNodes[0].nodeValue;
		
		if(tbSearch.value.toLowerCase().trim() ==ime.toLowerCase().trim()){
			ispis="<span>Назив: </span>"+ime+
	        " <a href='"+srcc+
			"' style='color:#19458e'>Saznaj više!</a>";
		}
	}
	
  document.getElementById('rezultat').innerHTML=ispis;
}
function pretraga2(){
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}
	else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","pretraga.xml",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	dohvatiPodatke(xmlDoc);
}
function dohvatiPodatke(xmlDoc){
	var tbSearch=document.getElementById('tbSearch');
	var svaPretraga=xmlDoc.getElementsByTagName('strana');
	var ispis="";
	for(var i=0;i<svaPretraga.length;i++){
		var ime=svaPretraga[i].getElementsByTagName('ime')[0].childNodes[0].nodeValue;
		var srcc=svaPretraga[i].getElementsByTagName('srcc')[0].childNodes[0].nodeValue;
		
		if(tbSearch.value.toLowerCase().trim() ==ime.toLowerCase().trim()){
			ispis="<span>Назив: </span>"+ime+
	        " <a href='"+srcc+
			"' style='color:#19458e'>Saznaj više!</a>";
		}
	}
	
  document.getElementById('rezultat').innerHTML=ispis;
}

//registracija

function prijava()
{
	var ime = document.getElementById('tbIme');
	var prezime = document.getElementById('tbPrezime');
	var brojIndeksa = document.getElementById('tbBrIndeksa');
	var status = document.getElementsByName('rbStatus');
	var korisnicko = document.getElementById('tbKorisnickoIme2');
	var lozinka = document.getElementById('tbLozinka2');
	var napomena= document.getElementById('taNapomena');
	var reIme = /^[A-Z]{1}[a-z]{2,14}$/;
	var rePrezime = /^[A-Z]{1}[a-z]{2,19}$/;
	var reBrojIndeksa = /^[1-9]{1}[0-9]{0,3}\/[0-9]{2}$/;
	var reKorisnicko = /^[\w]{1,10}$/;
	var reLozinka=/^[\w]{5,10}$/;
	
	var greske = new Array();
	var ispis = "<fieldset><legend>Покупљени подаци: </legend><ul>";
	var sadrzaj = new Array();
	
	
	if(!ime.value.match(reIme)){
		ime.style.border="1px solid red"
		greske.push("Име није у добром формату!");
	}
	else{
		ime.style.border="1px solid silver"
		ispis+= "<li>Ваше име је: " +ime.value+"</li>";
	}
	
	if(!prezime.value.match(rePrezime)){
		prezime.style.border="1px solid red";
		greske.push("Презиме није у добром формату!");
	}
	else{	
		prezime.style.border="1px solid silver";
		ispis+= "<li>Ваше презиме је: " +prezime.value+ "</li>";
	}
	
	if(!brojIndeksa.value.match(reBrojIndeksa)){
		brojIndeksa.style.border="1px solid red";
		greske.push("Број индекса није у добром формату!");
		
	}
	else{	
		brojIndeksa.style.border="1px solid silver";
		ispis+= "<li>Ваш број инекса је: " +brojIndeksa.value + "</li>";
	}
	var izabraniStatus = "";
	for(var i = 0; i < status.length; i++){
		if(status[i].checked){
			izabraniStatus = status[i].value;
		}
	}
	if(izabraniStatus == ""){
		greske.push("Изаберите пол!")
	}
	else{
		ispis+= "<li>Ваш пол је: " + izabraniStatus + "</li>";
	}
	if(!korisnicko.value.match(reKorisnicko)){
		korisnicko.style.border="1px solid red";
		greske.push("Корисничко име није у добром формату!");
	}
	else{	
		korisnicko.style.border="1px solid silver";
		ispis+= "<li>Ваше корисничко име је: " + korisnicko.value +"</li>";
	}
	if(!lozinka.value.match(reLozinka)){
		lozinka.style.border="1px solid red"
		greske.push("Лозинка није у добром формату!");
	}
	else{	
		lozinka.style.border="1px solid silver"
	}
	if(napomena !=""){
		ispis+= "<li>Напомена: " + napomena.value + "</li>";
	}
	
	if(greske.length == 0){
		ispis += "</ul></fieldset>" 	
		
		document.getElementById('hmm').innerHTML = ispis;
	}
	else{
		var listaGresaka = "";
		
		for(var i = 0; i < greske.length; i++){
			listaGresaka += greske[i] + "<br/>";
		}
		document.getElementById('hmm').innerHTML = listaGresaka;
	}	
}

//anketa


function kolacic(){
	var sajt = document.getElementById('ddlocena');
	var dizajn = document.getElementById('ddldizajn');
	var odgovor = document.getElementsByName('odgovor');
	var kolacic="";
	var izabranSajt = "";
	var izabranDizajn = "";
	var izabranOdgovor = "";
		
		for(var i = 0; i < sajt.length; i++){
			if(sajt[i].checked){
				izabranSajt = status[i].value;
			}
			kolacic += "Ocena za sajt je: " +izabranSajt;
		}
		for(var i = 0; i < dizajn.length; i++){
			if(dizajn[i].checked){
				izabranDizajn = dizajn[i].value;
			}
			kolacic += "Ocena za dizajn je: " +izabranDizajn;
		}
		for(var i = 0; i < odgovor.length; i++){
			if(odgovor[i].checked){
				izabranOdgovor = odgovor[i].value;
			}
			kolacic += "Да ли су информације које сте добили корисне? " +izabranOdgovor;
		}
		document.cookie="username=" + kolacic;
		alert("Uspesno ste glasali i kreirali kolacic!!!");
}