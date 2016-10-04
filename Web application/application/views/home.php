<div class="block">

</p>

<h1><?php echo $this->lang->line("page_content"); ?></h1>
<a href="http://valgahaiglacatering.rf.gd/index.php/register">Regamine</a> 
<a href="http://valgahaiglacatering.rf.gd/index.php/login">Sisse logimine</a>


<?php
echo "<html><body><table>\n\n";
$f = fopen("http://valgahaiglacatering.rf.gd/other/data.csv", "r");
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