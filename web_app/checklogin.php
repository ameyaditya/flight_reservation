<?php
	session_start();
	if(isset($_SESSION['uid']))
		echo "true";
	else
		echo "false";
?>