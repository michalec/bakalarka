<?php

$username = array(
        'name'	=> 'username',
	'id'	=> 'username',
	'value'	=> set_value('username'),    
);

$name = array(
        'name'	=> 'name',
	'id'	=> 'name',
	'value'	=> set_value('name'),    
);
$surname = array(
        'name'	=> 'surname',
	'id'	=> 'surname',
	'value'	=> set_value('surname'),
        'style' => 'margin-bottom: 25px;',      
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 5,
);
?>


<h1><?php echo form_label($this->lang->line('title_registration_client')); ?></h1>
<div id="auth" class="register">


	<?php 
                    echo form_open($this->uri->uri_string());
                    
                    echo form_label($this->lang->line('label_username'), $username['id']);
                    echo form_input($username),'<br />';
        
                    echo form_label($this->lang->line('label_name'), $name['id']); 
                    echo form_input($name),'<br />';
                    
                    echo form_label($this->lang->line('label_surname'), $surname['id']); 
                    echo form_input($surname),'<br />';
                    
                    echo form_label($this->lang->line('label_email'), $email['id']);
                    echo form_input($email),'<br />';
                    
                    echo form_label($this->lang->line('label_password'),$password['id']); 
                    echo form_password($password),'<br />';
                    
                    echo form_label($this->lang->line('label_password_again'), $confirm_password['id']);
                    echo form_password($confirm_password);
                    
        ?>
</div>
<div id="auth_cap">
     <?php                   
                    
           if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	
			<div id="recaptcha_image"></div>
		
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
	
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
		<?php echo form_error('recaptcha_response_field'); 
                      echo $recaptcha_html; 
                } else { 
                        echo form_label($this->lang->line('label_captcha')),'<br />';
			echo $captcha_html,'<br />'; 
	
                        echo form_label($this->lang->line('label_captcha_code'), $captcha['id']); 
                        echo form_input($captcha),'<br />'; 
	
                }
              } 
              echo form_submit('register', $this->lang->line('button_register'));
       
      echo form_close();?>
      <div class="errors">
            <?= validation_errors() ?>
            <p class="validation_error">' 
                <?php
                echo isset($errors[$username['name']])?$errors[$username['name']]:'';
                echo isset($errors[$email['name']])?$errors[$email['name']]:'';
                ?>
            </p>
      </div>
     
</div>


	

              