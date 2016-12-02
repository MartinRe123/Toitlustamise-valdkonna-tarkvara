function oneMore(meal){
	var i = 0;
	while (document.getElementById(meal+"_"+i) != null){
		i++;
	}
	
	var table = document.getElementById(meal);
	var new_row = document.createElement("tr");
	var new_food_box = document.createElement("input");
	new_food_box.id = meal + "_" + i;
	var new_contains_box = document.createElement("textarea");
	new_contains_box.rows = 4;
	new_contains_box.cols = 35;
	new_contains_box.id = meal + "_c_" + i;
	var text1 = document.createTextNode("Toit: ");
	var text2 = document.createTextNode("Koostis: ");
	var bold1 = document.createElement("B");
	var bold2 = document.createElement("B");
	bold1.appendChild(text1);
	bold2.appendChild(text2);
	
	new_row.appendChild(bold1);
	new_row.appendChild(new_food_box);
	new_row.appendChild(document.createElement("br"));
	new_row.appendChild(bold2);
	new_row.appendChild(document.createElement("br"));
	new_row.appendChild(new_contains_box);
	new_row.appendChild(document.createElement("br"));
	table.appendChild(new_row);
}

function getFoods(meal){
	var m = "";
	var i = 0;
	while (document.getElementById(meal+"_"+i) != null){
		var temp = document.getElementById(meal+"_"+i).value;
		if (temp == ""){
			i++;
			continue;
		}
		if(m == ""){
			m += temp;
		}else{
			m += ";" + temp;
		}
		m += "=" + document.getElementById(meal+"_c_"+i).value.replace(/\n/g, ",");
		i++;
	}
	return m;
}

function saveKitchenMenuEdit(message_fill_meals, dates){
	var used_dates = dates.split(";");
	var date = document.getElementById("date").value;
	var breakfast = getFoods("b");
	var lunch = getFoods("l");
	var supper = getFoods("s");
	var breakfast_result = document.getElementById("breakfast_result");
	var lunch_result = document.getElementById("lunch_result");
	var supper_result = document.getElementById("supper_result");
	if(breakfast == "" || lunch == "" || supper == ""){
		alert(message_fill_meals);
		return false;
	}else{
		breakfast_result.value = breakfast;
		lunch_result.value = lunch;
		supper_result.value = supper;
		if(isInArray(date, used_dates)){
			return confirm("Valitud kuupäevaks on juba menüü koostatud. Kas soovite teise menüü kustutada ja asendada sellega?");
		}
	}		
	
}

function saveKitchenMenu(message_fill_meals, dates, message_date_used){
	var used_dates = dates.split(";");
	var date = document.getElementById("date").value;
	
	if(isInArray(date, used_dates)){
			alert(message_date_used);
			return false;
	}else{
		var breakfast = getFoods("b");
		var lunch = getFoods("l");
		var supper = getFoods("s");
		var breakfast_result = document.getElementById("breakfast_result");
		var lunch_result = document.getElementById("lunch_result");
		var supper_result = document.getElementById("supper_result");
		if(breakfast == "" || lunch == "" || supper == ""){
			alert(message_fill_meals);
			return false;
		}else{

			breakfast_result.value = breakfast;
			lunch_result.value = lunch;
			supper_result.value = supper;
			return true;
		}		
	}	
}

function isInArray(value, array) {
  return array.indexOf(value) > -1;
}
