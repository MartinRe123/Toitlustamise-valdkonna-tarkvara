

<div class="sidebar">  

<br>
<table id="sidebar_table" >
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/kitchen_menu">'.$this->lang->line("kitchen_menus").'</a></td>';
   }
   ?>
  </tr>
   <?php if($this->session->userdata('logged_in') && ($this->session->userdata('role') == 'kokk' || $this->session->userdata('role') == 'admin')){
		echo '<tr><td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/kitchen_menu/create">'.$this->lang->line("add_menu").'</a></td></tr>';
   }
   ?>
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/raport">'.$this->lang->line("raports").'</a></td>';
   }
   ?>
  </tr>
   <tr>
   <?php if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'admin'){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/register">'.$this->lang->line("register").'</a></td>';
   }
   ?>
  </tr>
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/my_account/change_password">'.$this->lang->line("change_password").'</a></td>';
   }
   ?>
  </tr>
   <tr>
   <?php if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'admin'){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/my_account/change_department">'.$this->lang->line("change_department").'</a></td>';
   }
   ?>
  </tr>
   <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/about">'.$this->lang->line("about_page").'</a></td>';
   }
   ?>
  </tr>
</table>



 

</div>