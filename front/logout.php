<?php 
	setcookie("member_account","",time()-600);
	setcookie("member_password","",time()-600);
	header('Location: index.php');
	exit;
?>
