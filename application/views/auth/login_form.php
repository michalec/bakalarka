<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',

);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:10px;padding:0',
);

?>

<div id="auth" class="login">
            <h1>Login</h1>
            <?php 
                 echo form_open($this->uri->uri_string()); 

		 echo form_label($this->lang->line('label_email'), $login['id']); 
		 echo form_input($login); 
		 
                 echo form_label($this->lang->line('label_password'), $password['id']); 
		 echo form_password($password);
                 
                 echo '<div style="color:red;">',isset($errors[$login['name']])?$errors[$login['name']]:'','</div>';
                 echo '<div style="color:red;">',isset($errors[$password['name']])?$errors[$password['name']]:'','</div>';
                 
                 echo '<div>'; 
                    echo form_label($this->lang->line('label_remember'), $remember['id']);
                    echo form_checkbox($remember);
                 echo '</div>';
                 echo anchor('/auth/register_client/', 'Registrácia klienta', array('class'=>'small_link'));
                 echo anchor('/auth/register_restaurant/', 'Registrácia reštaurácie', array('class'=>'small_link'));
                 
                 echo form_submit('submit', $this->lang->line('label_login'));
                 echo anchor('/auth/forgot_password/', 'Zabudol som heslo', array('class'=>'small_link'));
                 
                 echo form_close(); 
            ?>
            
      <div class="errors">
            <?= validation_errors() ?>
      </div>
</div>