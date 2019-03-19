<?php
include("../db.inc");
$action = $_POST['action'];
$contactId = $_POST['contactId'];
$contactInfoId = $_POST['contactInfoId'];
$surname = $_POST['surname'];
$first_name = $_POST['first_name'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
if (isset($_POST['contact_number2']))
	$contact_number2 = $_POST['contact_number2'];
else 
	$contact_number2 = '';
if (isset($_POST['email_address2']))
	$email_address2 = $_POST['email_address2'];
else 
	$email_address2 = '';
if (isset($_POST['contact_number3']))
	$contact_number3 = $_POST['contact_number3'];
else 
	$contact_number3 = '';
if (isset($_POST['email_address3']))
	$email_address3 = $_POST['email_address3'];
else 
	$email_address3 = '';
if (isset($_POST['contact_number4']))
	$contact_number4 = $_POST['contact_number4'];
else 
	$contact_number4 = '';
if (isset($_POST['email_address4']))
	$email_address4 = $_POST['email_address4'];
else 
	$email_address4 = '';
if (isset($_POST['contact_number5']))
	$contact_number5 = $_POST['contact_number5'];
else 
	$contact_number5 = '';
if (isset($_POST['email_address5']))
	$email_address5 = $_POST['email_address5'];
else 
	$email_address5 = '';


if ($action == 'E' || $action == 'C')
{
	$qryCheck = "SELECT id FROM contacts WHERE id = '$contactId' AND surname = '$surname' AND first_name = '$first_name'";
	$rsCheck = mysqli_query($connM,$qryCheck);
	if (mysqli_num_rows($rsCheck) > 0)
	{
		echo "Blah";
		if ($contactInfoId == '')
			$qryExist = "SELECT * FROM contacts_info WHERE contacts_id = '$contactId'";
		else	
			$qryExist = "SELECT * FROM contacts_info WHERE contacts_id = '$contactId' AND id = '$contactInfoId'";
		$rsExist = mysqli_query($connM,$qryExist);
		if (mysqli_num_rows($rsExist) > 0)
		{
			$qryContactInfo = "UPDATE contacts_info
								SET contact_number = '$contact_number',
								    email_address = '$email_address'
							WHERE id = '$contactInfoId' AND contacts_id = '$contactId'";
			$rsContactInfo = mysqli_query($connM,$qryContactInfo);
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$contactId')";
				$rsContactInfo2 = mysqli_query($connM,$qryContactInfo2);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$contactId')";
				$rsContactInfo3 = mysqli_query($connM,$qryContactInfo3);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$contactId')";
				$rsContactInfo4 = mysqli_query($connM,$qryContactInfo4);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$contactId')";
				$rsContactInfo5 = mysqli_query($connM,$qryContactInfo5);
			}
		}
		else
		{
			if ($contact_number != '' || $email_address != '')
			{
				$qryContactInfo = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number','$email_address','$contactId')";
				$rsContactInfo = mysqli_query($connM,$qryContactInfo);
			}
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$contactId')";
				$rsContactInfo2 = mysqli_query($connM,$qryContactInfo2);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$contactId')";
				$rsContactInfo3 = mysqli_query($connM,$qryContactInfo3);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$contactId')";
				$rsContactInfo4 = mysqli_query($connM,$qryContactInfo4);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$contactId')";
				$rsContactInfo5 = mysqli_query($connM,$qryContactInfo5);
			}
		}	
		header('Location: front.php');
	}
	else {
		echo "Here";
		$qryContact = "UPDATE contacts
							SET surname = '$surname',
							    first_name = '$first_name'
						WHERE id = '$contactId'";
						echo $qryContact;
		$rsContact = mysqli_query($connM,$qryContact);
		$qryExist = "SELECT * FROM contacts_info WHERE contacts_id = '$contactId' AND id = '$contactInfoId'";
		$rsExist = mysqli_query($connM,$qryExist);
		if (mysqli_num_rows($rsExist) > 0)
		{
			$qryContactInfo = "UPDATE contacts_info
								SET contact_number = '$contact_number',
								    email_address = '$email_address'
							WHERE id = '$contactInfoId' AND contacts_id = '$contactId'";
			$rsContactInfo = mysqli_query($connM,$qryContactInfo);
		}
		else
		{
			if ($contact_number != '' || $email_address != '')
			{
				$qryContactInfo = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number','$email_address','$contactId')";
				$rsContactInfo = mysqli_query($connM,$qryContactInfo);
			}
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$contactId')";
				$rsContactInfo2 = mysqli_query($connM,$qryContactInfo2);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$contactId')";
				$rsContactInfo3 = mysqli_query($connM,$qryContactInfo3);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$contactId')";
				$rsContactInfo4 = mysqli_query($connM,$qryContactInfo4);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$contactId')";
				$rsContactInfo5 = mysqli_query($connM,$qryContactInfo5);
			}	
		}
		header('Location: front.php');
		
	}					
}
elseif($action == 'D')
{
	$qryDelete = "DELETE FROM contacts_info WHERE id = '$contactInfoId' AND contacts_id = '$contactId'";
	$rsDelete = mysqli_query($connM,$qryDelete);
	$checkQuery = "SELECT id FROM contacts_info WHERE contacts_id = '$contactId'";
	$rsCheck = mysqli_query($connM,$checkQuery);
	if (mysqli_num_rows($rsCheck) > 0)
	{
		header('Location: front.php');
		
	}
	else {
		$qryDeleteContact = "DELETE FROM contacts WHERE id = '$contactId'";
		$rsDeleteContact = mysqli_query($connM,$qryDeleteContact);
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
		$rsContact	 = mysqli_query($connM,$qryContact);	
		$qryId = "SELECT id FROM contacts WHERE surname = '$surname' AND first_name = '$first_name'";	
		$rsId = mysqli_query($connM,$qryId);
		if (mysqli_num_rows($rsId) > 0)
		{
			$row = mysqli_fetch_assoc($rsId);
		    $id = $row['id'];

			if ($contact_number != '' || $email_address != '')
			{
				$qryContactsInfo = "INSERT INTO contacts_info (contacts_id,contact_number,email_address) VALUES ('$id','$contact_number','$email_address')";
				$rsContactsInfo = mysqli_query($connM,$qryContactsInfo);
			}
			if ($contact_number2 != '' || $email_address2 != '')
			{
				$qryContactInfo2 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number2','$email_address2','$id')";
				$rsContactInfo2 = mysqli_query($connM,$qryContactInfo2);
			}
			if ($contact_number3 != '' || $email_address3 != '')
			{
				$qryContactInfo3 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number3','$email_address3','$id')";
				$rsContactInfo3 = mysqli_query($connM,$qryContactInfo3);
			}
			if ($contact_number4 != '' || $email_address4 != '')
			{
				$qryContactInfo4 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number4','$email_address4','$id')";
				$rsContactInfo4 = mysqli_query($connM,$qryContactInfo4);
			}
			if ($contact_number5 != '' || $email_address5 != '')
			{
				$qryContactInfo5 = "INSERT INTO contacts_info (contact_number,email_address,contacts_id) VALUES ('$contact_number5','$email_address5','$id')";
				$rsContactInfo5 = mysqli_query($connM,$qryContactInfo5);
			}
			header('Location: front.php');
		}	
	}
	else 
	{echo "NOthing";header('Location: front.php');}	
}
?>