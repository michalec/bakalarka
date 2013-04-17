
	<h1 style="margin-bottom: 15px;">Pridaj awesome stuff</h1>
	
	<?php 
		echo validation_errors();
		
		echo form_open('notes');
		echo form_textarea('text', '');
		echo form_submit('submit', 'pridaj');
		echo form_close();
	?>
	
	<ul>
	
	</ul>