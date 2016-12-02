$(function(){ $('#date_from').datepicker({ 
dateFormat: 'yy-mm-dd',
maxDate: 0,
onSelect: update
}).val();});

$(function(){ $('#date_to').datepicker({ 
dateFormat: 'yy-mm-dd',
minDate: parseDate(document.getElementById('date_from').value),
maxDate: 0
}).val();}); //see annab muudel lehtedel errorit...
  
function parseDate(str) {
    var mdy = str.split('-');
    return new Date(mdy[0], mdy[1]-1, mdy[2]);
}

function update(){
	$('#date_to').datepicker('option', 'minDate', parseDate(document.getElementById('date_from').value));
}