<div class="block">



<h1><?php echo $this->lang->line("page_content"); ?></h1>

<div class="notification"> <?php if(isset($notification_message)){ echo $notification_message; } ?> </div>

<a href="<?php echo base_url(); ?>index.php/register">Regamine</a> 
<a href="<?php echo base_url(); ?>index.php/login">Sisse logimine</a>

<!-- $rows = array_map('str_getcsv', explode("\n", $csvData)); -->
<?php
echo "<html><body><table>\n\n";
$f = fopen(base_url()."other/data.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>"; ?>




</div>