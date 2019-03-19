<?php 
//-- Connection to mySQL --//

$mysqli = @new mysqli("127.0.0.2","root",""); //use mysqli to catch error and error code
if (mysqli_connect_error()) 
{
	$err_code = mysqli_connect_errno();
	$err_mssg = mysqli_connect_error();
	$errMsg = "(" . $err_code . ") " . $err_mssg;
	if($err_code==1045) //if password or username is incorrect
	{
		print "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=update_sql_ftp.php\">";
	}
    else //if any other error code occurs
	{
		print "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=err_page.php?errMsg=$errMsg\">";
	}
	exit;
}
else
{
	$mysqli->close();
	$connM = mysqli_connect("127.0.0.1","root","");
}

$dbdbM = mysqli_select_db($connM,"interview");

if (!$dbdbM) 
{
	$errMsg = "Connection to Interview failed";
	$errMsg.= "<br>" . mysqli_error($connM);
	print "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=err_page.php?errMsg=$errMsg\">";
	exit; 
}


?>