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
	new_contains_box.cols = 50;
	new_contains_box.id = meal + "_c_" + i;
	var text1 = document.createTextNode("Toit:");
	var text2 = document.createTextNode("Koostis:");
	
	new_row.appendChild(text1);
	new_row.appendChild(new_food_box);
	new_row.appendChild(document.createElement("br"));
	new_row.appendChild(text2);
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

function saveKitchenMenu(message){
	var date = document.getElementById("menu_date").value;
	var breakfast = getFoods("b");
	var lunch = getFoods("l");
	var supper = getFoods("s");
	var breakfast_result = document.getElementById("breakfast_result");
	var lunch_result = document.getElementById("lunch_result");
	var supper_result = document.getElementById("supper_result");
	if(breakfast == "" || lunch == "" || supper == ""){
		alert(message);
		return false;
	}else{

		breakfast_result.value = breakfast;
		lunch_result.value = lunch;
		supper_result.value = supper;
		return true;
	}
}
