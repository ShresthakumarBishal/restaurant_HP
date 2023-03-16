<?php  

session_start();//session is a way to store information (in variables) to be used across multiple pages.  
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['open_sucess'])) {
	header('Location: home.php');
	exit;
}
session_destroy();  
header("Location: index.php");//use for the redirection to some page  
?>  