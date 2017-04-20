<?php

/*
Method to create or retrieve session and implements timeout functionality
*/
function getSession()
{
	session_start();
	$time = $_SERVER['REQUEST_TIME'];
	/**
	 * for a 30 minute timeout, specified in seconds
	 */
	$timeout_duration = 300;

	/**
	 * Here we look for the user’s LAST_ACTIVITY timestamp. If
	 * it’s set and indicates our $timeout_duration has passed, 
	 * blow away any previous $_SESSION data and start a new one.
	 */
	if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
	  session_unset();     
	  session_destroy();
	  session_start();    
	}
	    
	/**
	 * Finally, update LAST_ACTIVITY so that our timeout 
	 * is based on it and not the user’s login time.
	 */
	$_SESSION['LAST_ACTIVITY'] = $time;
}

/*
Method to redirect to a different page
*/
function redirect($url)
{
    header('Location: '.$url);
    exit();
}

/*function console_log( $data ){
  echo '<script>';
  echo 'console.log(err in '. json_encode( $data ) .')';
  echo '</script>';
}*/

function validate_input($input)
{
	if (!empty($input)) 
	{
	    $input = filter_var($input, FILTER_SANITIZE_STRING);
	    if ($input != "") 
	    {
	        //$errmsg .= 'Please enter a valid name.<br/><br/>';
	    	return true;	
	    }
	} else {
	    //$errmsg .= 'Please enter your name.<br/>';
	}
	return false;
}

function validImageType($mimeType)
{
	$isvalid = false;
	if(!empty($mimeType) && isset($mimeType))
	{
		switch ($mimeType)
		{
			case 'image/jpg':
			case 'image/png':
			case 'image/gif':
			case 'image/jpeg':
				$isvalid = true;
				break;
			default:
				$isvalid = false;
		}
	}
	return $isvalid;
}

function validCaption($cap)
{
	if(!empty($cap))
	{
		if(! (strlen($cap) >= 1 && strlen($cap) <= 75))
		{
			return false;
		}
		if(preg_match('/^(?=[A-Za-z])[A-Za-z\d]{1,75}$/',$cap))
		{
			return true;
		}
	}
	return false;

}

/**
 * Escape all HTML, JavaScript, and CSS
 * 
 * @param string $input The input string
 * @param string $encoding Which character encoding are we using?
 * @return string
 */
function noHTML($input, $encoding = 'UTF-8')
{
    return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);
}

?>