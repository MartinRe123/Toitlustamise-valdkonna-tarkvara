function showTextbox(cbox) { //cbox on checkboxi objekt mis antakse onClickiga kaasa
      if (cbox.checked) { //kui on checked
        var input = document.createElement("input"); //loob inputi <input>
        input.type = "text"; //inputi tüüp
		input.name = (cbox.name.replace("[]","") + "_count");
		input.id = cbox.id + "_c";
		input.value = 1; //vaikeväärtus textboxile
        var div = document.createElement("div"); //loob divi
        div.id = (cbox.name.replace("[]","") + "_" + cbox.id); //div id-ks panakse checkboxi nimi.
        div.innerHTML = "Kogus: ";
        div.appendChild(input);
        document.getElementById(cbox.id.split("_", 1)[0] + "_" + cbox.value.split("=", 1)[0] + "_count[]").appendChild(div);
      } else {
        document.getElementById(cbox.name.replace("[]","") + "_" + cbox.id).remove();
      }
}


//helper function for addCount(arg1). Removes recurrences.
//meal = breakfast ("b"), lunch ("l"), supper ("s")
function addCount(meal){
	var i = 0;
	while (document.getElementById(meal+"_"+i) != null){
		var b = document.getElementById(meal+"_"+i);
		var b_c = document.getElementById(meal+"_"+i+"_c");
		if (b.checked){
			b.value = b.value + "=" + b_c.value;
		}
		i++;
	}
}

//adds amount to every food selected with checkbox. <food name>=<desc>=<count>.
function addAllCount(){
	addCount("b");
	addCount("l");
	addCount("s");
}


//Fills all selected foods with data.
//b_i - breakfast information.
//l_i - lunch information.
//s_i - supper information.
function fillSelected (b_i, l_i, s_i){
	fillMeal("b", b_i);
	fillMeal("l", l_i);
	fillMeal("s", s_i);
}


//helper function for fillSelected(arg1, arg2, arg3). Created to remove recurrences.
//meal = breakfast ("b"), lunch ("l"), supper ("s")
//selection_info contains info about selected foods in meal. <name>=<description>=<count>;<name>=<description>=<count>;...
function fillMeal (meal, selection_info){
	var i = 0;
	while (document.getElementById(meal+"_"+i) != null){
		var t = document.getElementById(meal+"_"+i);
		var value = t.value;	
		var array = selection_info.split(";");
		for (var j = 0; j < array.length; j++) {
			var food = array[j];
			var split_info = food.split("=");
			if(split_info[0] + "=" + split_info[1] == value){
				t.checked = true;
				showTextbox(t);
				var b_c = document.getElementById(meal+"_"+i+"_c");
				b_c.value = split_info[2]
			}
		}
		i++;
	}
}

function deleteConfirmation(a, url){
	var result = confirm("Kas soovite kindlalt kustutada?");
	if (result) {
		a.href = url;
	}
}