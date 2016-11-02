<!doctype html>
<html lang="en">
<head>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(function(){ $('#date').datepicker({ 
  dateFormat: 'yy-mm-dd',
  minDate: 0
  }).val();});
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="date"></p>
 
 
</body>
</html>