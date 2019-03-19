<?php
include("../db.inc");
$action = $_POST['action'];
$contactId = $_POST['contactId'];
$contactInfoId = $_POST['contactInfoId'];
$surname = $_POST['surname'];
$first_name = $_POST['first_name'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$contact_number2 = $_POST['contact_number2'];
$email_address2 = $_POST['email_address2'];
$contact_number3 = $_POST['contact_number3'];
$email_address3 = $_POST['email_address3'];
$contact_number4 = $_POST['contact_number4'];
$email_address4 = $_POST['email_address4'];
$contact_number5 = $_POST['contact_number5'];
$email_address5 = $_POST['email_address5'];

if ($action == 'E' || $action == 'C')
{
	$qryCheck = "SELECT id FROM contacts WHERE id = '$contactId' AND surname = '$surname' AND first_name = '$first_name'";
	$rsCheck = mysql_query($qryCheck,$connM);
	if (mysql_num_rows($rsCheck) > 0)
	{
		if ($contactInfoId == '')
			$qryExist = "SELECT * FROM contacts_info WHERE contacts_id = '$contactId'";
		else	
			$qryExist = "SELECT * FROM contacts_info WHERE contacts_id = '$contactId' AND id = '$contactInfoId'";
		$rsExist = mysql_query($qryExist,$connM);
		if (mysql_num_rows($rsExist) > 0)
		{
			$qryContactInfo = "UPDATE contacts_info
								SET contact_number = '$contact_number',
								    email_address = '$email_address'
							WHERE id = '$contactInfoId' AND contacts_id = '$contactId'";
			$rsContactInfo = mysql_query($qryContactInfo,$connM);
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$contactId')";
				$rsContactInfo2 = mysql_query($qryContactInfo2,$connM);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$contactId')";
				$rsContactInfo3 = mysql_query($qryContactInfo3,$connM);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$contactId')";
				$rsContactInfo4 = mysql_query($qryContactInfo4,$connM);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$contactId')";
				$rsContactInfo5 = mysql_query($qryContactInfo5,$connM);
			}
		}
		else
		{
			if ($contact_number != '' || $email_address != '')
			{
				$qryContactInfo = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number','$email_address','$contactId')";
				$rsContactInfo = mysql_query($qryContactInfo,$connM);
			}
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$contactId')";
				$rsContactInfo2 = mysql_query($qryContactInfo2,$connM);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$contactId')";
				$rsContactInfo3 = mysql_query($qryContactInfo3,$connM);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$contactId')";
				$rsContactInfo4 = mysql_query($qryContactInfo4,$connM);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$contactId')";
				$rsContactInfo5 = mysql_query($qryContactInfo5,$connM);
			}
		}	
		header('Location: front.php');
	}
	else {
		$qryContact = "UPDATE contacts
							SET surname = '$surname',
							    first_name = '$first_name',
						WHERE id = $contactId";
		$rsContact = mysql_query($qryContact,$connM);
		$qryExist = "SELECT * FROM contacts_info WHERE contacts_id = '$contactId' AND id = '$contactInfoId'";
		$rsExist = mysql_query($qryExist,$connM);
		if (mysql_num_rows($rsExists) > 0)
		{
			$qryContactInfo = "UPDATE contacts_info
								SET contact_number = '$contact_number',
								    email_address = '$email_address'
							WHERE id = '$contactInfoId' AND contacts_id = '$contactId'";
			$rsContactInfo = mysql_query($qryContactInfo,$connM);
		}
		else
		{
			if ($contact_number != '' || $email_address != '')
			{
				$qryContactInfo = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number','$email_address','$contactId')";
				$rsContactInfo = mysql_query($qryContactInfo,$connM);
			}
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$contactId')";
				$rsContactInfo2 = mysql_query($qryContactInfo2,$connM);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$contactId')";
				$rsContactInfo3 = mysql_query($qryContactInfo3,$connM);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$contactId')";
				$rsContactInfo4 = mysql_query($qryContactInfo4,$connM);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$contactId')";
				$rsContactInfo5 = mysql_query($qryContactInfo5,$connM);
			}	
		}
		header('Location: front.php');
		
	}					
}
elseif($action == 'D')
{
	$qryDelete = "DELETE FROM contacts_info WHERE id = '$contactInfoId' AND contacts_id = '$contactId'";
	$rsDelete = mysql_query($qryDelete,$connM);
	$checkQuery = "SELECT id FROM contacts_info WHERE contacts_id = '$contactId'";
	$rsCheck = mysql_query($checkQuery,$connM);
	if (mysql_num_rows($rsCheck) > 0)
	{
		header('Location: front.php');
		
	}
	else {
		$qryDeleteContact = "DELETE FROM contacts WHERE id = '$contactId'";
		$rsDeleteContact = mysql_query($qryDeleteContact,$connM);
		header('Location: front.php');
	}
}
else
{
	if ($surname != '' && $first_name != ''){
		$qryContact = "INSERT INTO contacts 
							(surname,first_name)
							VALUES
							('$surname','$first_name')";
		$rsContact	 = mysql_query($qryContact,$connM);	
		$qryId = "SELECT id FROM contacts WHERE surname = '$surname' AND first_name = '$first_name'";	
		$rsId = mysql_query($qryId,$connM);
		if (mysql_num_rows($rsId) > 0)
		{
			$id = trim(mysql_result($rsId,0,"id"));
			if ($contact_number != '' || $email_address != '')
			{
				$qryContactsInfo = "INSERT INTO contacts_info (contacts_id,contact_number,email_address) VALUES ('$id','$contact_number','$email_address')";
				$rsContactsInfo = mysql_query($qryContactsInfo,$connM);
			}
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$id')";
				$rsContactInfo2 = mysql_query($qryContactInfo2,$connM);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$id')";
				$rsContactInfo3 = mysql_query($qryContactInfo3,$connM);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$id')";
				$rsContactInfo4 = mysql_query($qryContactInfo4,$connM);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$id')";
				$rsContactInfo5 = mysql_query($qryContactInfo5,$connM);
			}
			header('Location: front.php');
		}	
	}
	else 
	{header('Location: front.php');}	
}
?>