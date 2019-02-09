

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dunmore Boat Trips - Accomodation in Dunmore East, Co Waterford - Hotels, B and B's, Self Catering</title>
<link rel="stylesheet" href="css/deepsea.css" type="text/css" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript">
<!--
function validate(){
		if(document.contact_us.name.value == ''){
			alert("You Must Enter Your Name");
			return false;
			}
		else if(document.contact_us.email.value == ''){
			alert("You Must Enter Your Email Address");
			return false;
			}
		else if(document.contact_us.message.value == ''){
			alert("You Must Enter A Message");
			return false;
			}
		else{
			return true;
			}
		
	}
//-->
</script>
</head>

<body>
<?php
require_once('header.php');
require_once('db_inc.php');
echo "<h1>Welcome to Deep Sea Charters at Dunmore East</h1>";
require_once('header_post_h1.php');
function validate($email){
//------------ EMAIL ADDRESS SYNTAX CHECK ------------------------------------------------
if (!eregi("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$", $email)) { 
        return false;
}
//------------ DOMAIN "MX" RECORDS CHECK -------------------------------------------------- 
    list ( $user, $domain ) = split ("@",$email,2); 
    if ( (!checkdnsrr ( $domain, "MX" )) || (!checkdnsrr ( $domain, "ANY" )) || (!getmxrr ($domain, $MXHost)))  { 
        return false;
	}
return true;
}
?>
<div class="page_content_box_center">
<div class="page_content_box">
<table border="0" cellpadding="0" cellspacing="0" class="contact-us">
<tr><td class="table_left"><img src="images/contact-us-top-left.jpg" width="377" height="220" alt="" /></td>
<td class="table_right">
<div class="right_container">
<!--h1 class="contact_h">Deep Sea Charters at Dunmore East</h1-->
<br><br>
<h2 style="color: white">Skipper: Brendan Glody</h1>
<div class="contact-us-text">+353 (0)51 383520</div>
<div class="contact-us-text">+353 (0)87 636 9164 </div>
<div class="contact-us-text">+353 (0)87 260 8917</div>
<div class="contact-us-text">
<script type="text/javascript">
<!-- 
var username = "info";
var hostname = "dunmoreboatrips.ie"; 
var classtype = "white";
var linktext = username + "@" + hostname;
document.write("<a href=" + "mail" + "to:" + linktext + " class=" + classtype + ">" + linktext + "<" + "/a>");
 //-->
</script><br /><a href="http://www.dunmoreboatrips.ie" class="white">www.dunmoreboatrips.ie</a></div>
</div>
</td>
</tr>
<tr><td colspan="2">
<div class="contact-us-center">
<div class="submit-header"><img src="images/submit-form.jpg" width="158" height="24" alt="Submit Form" /></div>
<?php
if($_POST["submit"] || $_POST["submit_x"] || $_POST["submit_y"]){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$message = $_POST["message"];
	if($message && !$phone && $name && $email){
		if(validate($email)){
			
			$to_name = "Brendan and Mary Glody";
			$to = "info@dunmoreboatrips.ie";
			$subject = "Enquiry Form From dunmoreboatrips.ie";
			$body = "Name:\t\t\t$name\n\n";
			$body = $body."Email:\t\t\t$email\n\n";
			$body = $body."$name has the following enquiry:\n\n";
			$body = $body.$message;
			$headers = "From: $name<$email>\n";
			$headers .= "Reply-To: $email\n";
			$headers .= "MIME-Version: 1.0\n";
		
			if(mail("$to_name<$to>", $subject, $body,$headers)){
				$success = true;
				}
			
			}
		} 
	}
if($success){
	echo "<h2 class=\"contact_s\">You Have Successfully Submitted Your Enquiry</h2>";
	echo "<h2 class=\"contact_s\">Please allow up to 2 working days for a response</h2>";
	echo "<div class=\"contact_s_footer\">Although we will try to respond much quicker</div>";
	}
else{
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="contact_us" onsubmit="return validate();">
<table border="0" cellpadding="0" cellspacing="0" class="form_table">
<tr><td>Name:</td><td><input type="text" name="name" size="25" maxlength="200" class="submit-inputs" /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>eMail:</td><td><input type="text" name="email" size="25" maxlength="200" class="submit-inputs" /></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr class="contact-us2"><td>Phone:</td><td><input type="text" name="phone" size="25" maxlength="200" class="submit-inputs" /></td></tr>
<tr class="contact-us2"><td colspan="2">&nbsp;</td></tr>
<tr><td valign="top">Your Message:</td><td><textarea name="message" class="submit-inputs" rows="10" cols="19"></textarea></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
</table>
<div class="submit-footer"><input type="image" src="images/submit.jpg" name="submit" /></div>
</form>
<?php
}
?>
</div>
</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
</table>
</div>
</div>
<?php
require_once('footer.php');
?>
</body>
</html>
