<?php    
	// unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1);
        setcookie($name, '', time()-3, '');
		setcookie('', null, -1, '');
    }
}
	header("Refresh:0.9, ../index.php");

 ?>