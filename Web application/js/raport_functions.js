function addDates() { //cbox on checkboxi objekt mis antakse onClickiga kaasa
	var f = document.getElementById("date_from").value;
	var t = document.getElementById("date_to").value;
	var d = document.getElementById("department").value;
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

function ingredientsToTop(){
	var MyDiv1 = document.getElementById('swap_bottom');
	var MyDiv2 = document.getElementById('swap_top');
	MyDiv2.innerHTML = MyDiv1.innerHTML;
	MyDiv1.innerHTML = null;
}
