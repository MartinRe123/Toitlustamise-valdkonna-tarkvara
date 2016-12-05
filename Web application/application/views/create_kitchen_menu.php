<script type="text/javascript" src="<?php echo base_url(); ?>js/date_picker_kitchen.js"></script>


<div class="content">
<h1><?php echo $this->lang->line("menu_create_page"); ?></h1>
<a id="lingid" href="<?php base_url() ?>/index.php/kitchen_menu"><?php echo $this->lang->line("back_to_menus"); ?></a><br/><br/>
<h2><?php echo $this->lang->line("insert_ingrediens"); ?></h2>


<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>

<form onsubmit="return saveKitchenMenu('<?php echo $this->lang->line("kitchen_menu_notification"); ?>', '<?php echo $date_info ?>', '<?php echo $this->lang->line("kitchen_menu_notification2"); ?>')" method="post" accept-charset="utf-8" action="/index.php/kitchen_menu/save_menu">

	<b><label id="menu_date" for="date"><?php echo $this->lang->line("date"); ?>: </label></b>
	<!-- <input type="date" id="date" value="<?php echo date("Y-m-d"); ?>" name="date" min="<?php echo date("Y-m-d"); ?>"><br/> -->
		<input type="text" id="date" value="<?php echo date("Y-m-d"); ?>" name="date" readonly="readonly">
		
		<table>
			<td class="kitchen_menu_view">
				<table id="b">
					<b><p><?php echo $this->lang->line("breakfast"); ?></p></b>
					<b><?php echo $this->lang->line("food"); ?>: </b><input id="b_0" type="text"><br/> <b><?php echo $this->lang->line("ingredients"); ?>: </b><br/><textarea id="b_c_0" rows="4" cols="32"></textarea><br/>
				</table>
				<button type="button" onClick="oneMore('b');" >+</button><br/>
			</td>

			<td class="kitchen_menu_view">
				<table id="l">
					<b><p><?php echo $this->lang->line("lunch"); ?></p></b>
					<b><?php echo $this->lang->line("food"); ?>: </b><input id="l_0" type="text"><br/> <b><?php echo $this->lang->line("ingredients"); ?>: </b><br/><textarea id="l_c_0" rows="4" cols="32"></textarea><br/>
				</table>
				<button type="button" onClick="oneMore('l');" >+</button><br/>
			</td>


			<td class="kitchen_menu_view">
				<table id="s">
					<b><p><?php echo $this->lang->line("dinner"); ?></p></b>
					<b><?php echo $this->lang->line("food"); ?>: </b><input id="s_0" type="text"><br/> <b><?php echo $this->lang->line("ingredients"); ?>: </b><br/><textarea id="s_c_0" rows="4" cols="32"></textarea><br/>
				</table>
				<button type="button" onClick="oneMore('s');" >+</button><br/>
			</td>
		</table>

	<input id="breakfast_result" name="breakfast" type="hidden" value="">
	<input id="lunch_result" name="lunch" type="hidden" value="">
	<input id="supper_result" name="supper" type="hidden" value="">
	

	<input type="submit" value=<?php echo $this->lang->line("save"); ?>>
</form>

