<?php 
	setcookie("control_account","",time()-3600);
	setcookie("control_password","",time()-3600);
	header('Location: /');
	exit;
?>