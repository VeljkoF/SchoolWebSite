var x = document.getElementById("demo"); function getLocation() { if (navigator.geolocation) { navigator.geolocation.getCurrentPosition(prikaziPoziciju); } else { x.innerHTML = "Geolocation nije podržana od strane browser-a."; } } function prikaziPoziciju(pozicija) { x.innerHTML = "Latitude: " + pozicija.coords.latitude + "<br/>Longitude: " + pozicija.coords.longitude; } 