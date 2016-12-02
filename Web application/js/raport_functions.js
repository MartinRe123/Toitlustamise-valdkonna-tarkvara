function addDates() { //cbox on checkboxi objekt mis antakse onClickiga kaasa
	var f = document.getElementById("date_from").value;
	var t = document.getElementById("date_to").value;
	var d = document.getElementById("department").value;
	console.log("Haha: " + f + "   " + t + "  " + d);
	console.log("/index.php/raport/view/" + f + "/" + t + "/" + d);
	document.getElementById("search_form").action = "/index.php/raport/view/" + f + "/" + t + "/" + d;
}

function isNumeric(str) {
    var reg = new RegExp('^[1-9][0-9]*$');
    return reg.test(str);
}


function printRaport(){
   var contents = document.getElementById("print").innerHTML;     
   var page = document.body.innerHTML;       
   document.body.innerHTML = contents;      
   window.print();      
   document.body.innerHTML = page;
}
