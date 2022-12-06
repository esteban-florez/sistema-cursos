let html =
document.getElementById("time");
document.getElementById("date");

monthNames = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiemre", "octubre", "noviembre", "diciembre"];

setInterval(function(){
	time = new Date();

	day = time.getDate();
	month = time.getMonth();
	year = time.getFullYear();
	hours = time.getHours();
	minutes = time.getMinutes();
	day_night = "AM";	

	if(hours>12)
		day_night = "PM";
		hours = hours - 12;

	if(hours<10)
		hours = "0" + hours;

	if(minutes<10)
		minutes = "0" + minutes;

	html.innerHTML = hours + ":" + minutes + " " + day_night;
	date.innerHTML = day + " de " + monthNames[month] + " del " + year;
},1000);