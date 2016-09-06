<?php
include "../db/user.php";

//include "../db/user.php";
//include "../db/validation.php";

$user = new User();

if(isset($_POST['signin']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //$controller = new Controller();   

    $x = 0;
    
    if($username == NULL)
    {
        $msgUsername = "Username and password are required";
        $x++;
    }
    else
    {
        if(!get_magic_quotes_gpc())
        {
            $username = addslashes($username);
        }        
    }
    if($password == NULL)
    {
        $msgPassword = "Enter Password";
        $x++;
    }
    else
    {
        $encryptedPassword = md5($password);
    }
        
    if($x == 0)
    {
        $resultUser = $user->selectUser($username, $encryptedPassword);
		if(count($resultUser) == 0)
		{
				$msgUsername = "Username or Password Incorrect";
		}
		else
		{
				$_SESSION['admin_username'] = $resultUser['user_name'];
				$_SESSION['admin_userid'] = $resultUser['user_id'];
				?>
				<script>window.location.href='../dashboard/'</script>
				<?php			
		}
    }
	
	
	
	
}

if(isset($_POST['signup']))
{
		
	$uid = $_POST['userid'];
	$uname = $_POST['username'];
	$email = $_POST['emailid'];
	$password = $_POST['password'];
	$cpassword = $_POST['repassword'];
	
	
	$y = 0;
	if($uid == NULL)
	{
		$uid_msg = "Enter your User ID";
		$y++;
	}
	if($uname == NULL)
	{
		$uname_msg = 'Enter your Name';
		$y++;
	}
	if($email == NULL)
	{
		$email_msg = 'Enter your E-Mail ID';
		$y++;
	}
	elseif(emailvalidation($email) == false)  
	{
	  $emailmsg ="Enter a valid E-Mail.";
	  $y++;
	}
	if($password == NULL)
	{
		$password_msg = 'Enter your Password';
		$y++;
	}
	 if($cpassword == NULL)
	{
		$msgRepassword = "Re-write the Password.";
		$y++;
	}
	 if(($password != NULL && $cpassword != NULL) && $password != $cpassword)
	{
		$msgRepassword = "Confirm password mismatch";
		$y++;
	}
	
	
	if($y == 0)
	{
	$resultUser = $user -> addUser($uid, $uname, $email, md5($password), $status);
	$message="you are succesfully signup.Refresh your browser for login.";
	
	$to = $email;
	$from = "info@nphasis.com.au";
	$subject = "Login Userid and Password";
	$server_name = $_SERVER['SERVER_NAME'];
	$php_self = $_SERVER['PHP_SELF'];
	$body = "Hi ".$uname.",<br><br>Your are successfully signed up with Lo Surdo Braithwaite website control panel. You can use the following details to login to the cpanel. <br><br> Login Userid: ".$uid."<br>Password: ".$password."<br><br>Thank you.<br><br>NPHASIS Technology Ltd.<br>Sydney, Australia.";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'To: ' .$to. "\r\n";
	$headers .= 'From: '.$from . "\r\n";
	mail($to, $subject, $body, $headers); 
	
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Control Panel - Lo Surdo Braithwaite</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<link rel="shortcut icon" type="image/ico" href="../assets/img/favicon.ico" />

</head>
<body>

</body>
</html>
