<div class="header">
    
<table id="langs" >
<tr>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/estonian'><img src="/images/estonian.png" width="30" height="16" border="0"></a></td>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/english'><img src="/images/english.png" width="30" height="16" border="0"></a></td>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/russian'><img src="/images/russian.png" width="30" height="16" border="0"></a></td>
</tr>
</table>
<br><br>
<p id="logindata">
<?php         	
if($this->session->userdata('logged_in')){
     	$session_data = $this->session->userdata('username');
     	echo 'Oled sisse loginud kasutajaga <b>'.$session_data.'</b>';
        echo '<br/><a id ="logivalja" href="'.base_url().'index.php/login/logout">Logi välja</a>';
 } ?>
</p>
<a id="logo" href="<?php echo base_url(); ?>index.php/home"><img src="/images/haigla_logo.png"></a>
<br>
</div>
<div class="content">




