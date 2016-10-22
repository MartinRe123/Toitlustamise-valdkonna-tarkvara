function sectionBox(dropdown){
	if(dropdown.value == "osakond"){
		document.getElementById("section_box").disabled = false;
	}else{
		var b = document.getElementById("section_box");
		b.disabled = true;
		b.value = "";
	}
}