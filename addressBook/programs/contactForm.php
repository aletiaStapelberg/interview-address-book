<script>
	function validateNumberlength(num)
	{
		var c_number = document.getElementById('contact_number'+num).value;
		if (c_number != '' && c_number.length != 10) {
		    alert("Please enter a valid contact number.");
		}
		if (c_number != '' && isNaN(c_number))
		{
			alert("A Valid contact number consist of only numbers.");
		}
		var numbers_exist = document.getElementById('contNr').value;
		var num_array = numbers_exist.split(",");
		if (num_array.indexOf(c_number) == 0)
		{
			alert("This contact number already exist for this contact");
		}
	}
	function validateEmail(num)
	{
		var e_address = document.getElementById('email_address'+num).value
		if (e_address != '' && !(/^.+@.+\..+$/.test(e_address)))
		{
			alert("The email address you entered seems to be invalid.")
		}
		var email_exist = document.getElementById('emailA').value;
		var email_array = email_exist.split(",");
		if (email_array.indexOf(e_address) == 0)
		{
			alert("This email address already exist for this contact");
		}
	}
</script>
<?php
include("../db.inc");
print "<form name='frmContacts' action='contactFormSave.php' method='POST'>";
print "<table width='100%' cellpadding='1' cellspacing='1'>";
if (isset($_GET['contactId']))
	$contactId = $_GET['contactId'];
else 
	$contactId = '';

$action = $_GET['action'];
if(isset($_GET['contactInfoId']))
	$contactInfoId = $_GET['contactInfoId'];
else 
	$contactInfoId = '';
if (isset($_GET['surname']))
	$surname = $_GET['surname'];
else 
	$surname = '';
if (isset($_GET['first_name']))
	$firstName = $_GET['first_name'];
else 
	$firstName = '';
if (isset($_GET['contact_number']))
	$contactNumber = $_GET['contact_number'];
else 
	$contactNumber = '';
if (isset($_GET['email_address']))
	$emailAddress = $_GET['email_address'];
else 
	$emailAddress = '';

$contactNumbers = '';
$emailAddresses = '';
if ($action == 'E' || $action == 'D' || $action == 'C')
{
	if($contactInfoId == ''){
		$qryContact = "SELECT first_name,surname,contact_number,email_address FROM contacts 
			LEFT JOIN contacts_info ON (contacts.id = contacts_info.contacts_id) 
		   	WHERE contacts.id = '$contactId'";
	}
	else {
		$qryContact = "SELECT first_name,surname,contact_number,email_address FROM contacts 
					LEFT JOIN contacts_info ON (contacts.id = contacts_info.contacts_id) 
				   	WHERE contacts.id = '$contactId' AND contacts_info.id = '$contactInfoId'";
	}			
	$rsContact  = mysqli_query($connM,$qryContact);
	if (mysqli_num_rows($rsContact) > 0)
	{
		$row = mysqli_fetch_assoc($rsContact);
	    $surname = $row['surname'];
	    $firstName = $row['first_name'];
	    $contactNumber = $row['contact_number'];
	    $emailAddress = $row['email_address'];
	}
	if ($action == 'E' || $action == 'C')
	{
		
		$qryAllContactInfoForContact = "SELECT contact_number,email_address FROM contacts_info WHERE contacts_id = '$contactId'";
		$rsAllContactInfoForContact = mysqli_query($connM,$qryAllContactInfoForContact);
		if (mysqli_num_rows($rsAllContactInfoForContact) > 0)
		{
			while($row = mysqli_fetch_assoc($rsAllContactInfoForContact)) {
			   $contactNumber = $row['contact_number'];
			   $emailAddress = $row['email_address'];
			   if ($contactNumbers == '')
			   		$contactNumbers = $contactNumber;
			   else 
					$contactNumbers = $contactNumbers.",".$contactNumber;
			   if ($emailAddresses == '')
			   		$emailAddresses = $emailAddress;
			   else 
					$emailAddresses = $emailAddresses.",".$emailAddress;	

		   }
		}
		
	}					
}

	print "";
	print "<tr>";
	print "<td colspan='5' bgcolor='#C0C0C0' align='center'><a href='front.php'>List</a>";
	if ($action == 'E')
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Edit Contact</p>";
	elseif ($action == 'D')
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Delete Contact</p>";
	elseif ($action == 'C')
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Add new Contact Detail</p>";		
	else
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Add new Contact</p>";
	print "</td></tr>";
	print "</font>";
	print "<tr>";
	print "<td colspan='5'><input type='hidden' name='contNr' id='contNr' value=$contactNumbers>";
	print "<input type='hidden' name='emailA' id='emailA' value=$emailAddresses>";
	print "<input type='hidden' name='action' id='action' value=$action>";
	print "<input type='hidden' name='contactId' id='contactId' value=$contactId>";
	print "<input type='hidden' name='contactInfoId' id='contactInfoId' value=$contactInfoId></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Surname</p></td>";
	print "<td><input type='text' name='surname' id='surname' value='$surname' size='40'><a href=''></a></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>First Name</p></td>";
	print "<td><input type='text' name='first_name' id='first_name' value='$firstName' size='40'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number' id='contact_number' value='$contactNumber' size='40' onBlur='validateNumberlength();'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address' id='email_address' value='$emailAddress' size='40' onBlur='validateEmail();'></td>";
	print "<td></td>";
	print "</tr>";
	if($action != 'E' && $action != 'D'){
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number2' id='contact_number2' value='' size='40' onBlur='validateNumberlength(2);'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address2' id='email_address2' value='' size='40' onBlur='validateEmail(2);'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number3' id='contact_number3' value='' size='40' onBlur='validateNumberlength(3);'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address3' id='email_address3' value='' size='40' onBlur='validateEmail(3);'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number4' id='contact_number4' value='' size='40' onBlur='validateNumberlength(4);'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address4' id='email_address4' value='' size='40' onBlur='validateEmail(4);'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number5' id='contact_number5' value='' size='40' onBlur='validateNumberlength(5);'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address5' id='email_address5' value='' size='40' onBlur='validateEmail(5);'></td>";
	print "<td></td>";
	print "</tr>";
	}
	print "<tr><td colspan='4'>&nbsp;</td></tr>";
	if ($action == 'E')
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='edit contact'></td></tr>";
	elseif ($action == 'D')
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='delete contact'></td></tr>";
	elseif ($action == 'C')
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='add new contact detail'></td></tr>";					
	else
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='add new contact'></td></tr>";					

print "</table>";
print "</form>";
?>