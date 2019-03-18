<?php
include("../db.inc");
print "<form name='frmContacts' action='contactFormSave.php' method='POST'>";
print "<table width='100%' cellpadding='1' cellspacing='1'>";
$contactId = $_GET['contactId'];
$action = $_GET['action'];
$contactInfoId = $_GET['contactInfoId'];
$surname = $_GET['surname'];
$firstName = $_GET['first_name'];
$contactNumber = $_GET['contact_number'];
$emailAddress = $_GET['email_address'];
if ($action == 'E' || $action == 'D')
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
	$rsContact  = mysql_query($qryContact,$connM);
	if (mysql_num_rows($rsContact) > 0)
	{
		$firstName = trim(mysql_result($rsContact,0,"first_name"));
		$surname = trim(mysql_result($rsContact,0,"surname"));
		$contactNumber = trim(mysql_result($rsContact,0,"contact_number"));
		$emailAddress = trim(mysql_result($rsContact,0,"email_address"));
	}					
}


	print "";
	print "<tr>";
	print "<td colspan='5' bgcolor='#C0C0C0' align='center'><a href='front.php'>List</a>";
	if ($action == 'E')
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Edit Contact</p>";
	elseif ($action == 'D')
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Delete Contact</p>";		
	else
		print "<p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Add new Contact</p>";
	print "</td></tr>";
	print "</font>";
	print "<tr>";
	print "<td colspan='5'><input type='hidden' name='action' id='action' value=$action><input type='hidden' name='contactId' id='contactId' value=$contactId><input type='hidden' name='contactInfoId' id='contactInfoId' value=$contactInfoId></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Surname</p></td>";
	print "<td><input type='text' name='surname' id='surname' value='$surname' size='40'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>First Name</p></td>";
	print "<td><input type='text' name='first_name' id='first_name' value='$firstName' size='40'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number' id='contact_number' value='$contactNumber' size='40'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address' id='email_address' value='$emailAddress' size='40'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number2' id='contact_number2' value='$contactNumber2' size='40'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address2' id='email_address2' value='$emailAddress2' size='40'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number3' id='contact_number3' value='$contactNumber3' size='40'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address3' id='email_address3' value='$emailAddress3' size='40'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number4' id='contact_number4' value='$contactNumber4' size='40'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address4' id='email_address4' value='$emailAddress4' size='40'></td>";
	print "<td></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td><input type='text' name='contact_number5' id='contact_number5' value='$contactNumber5' size='40'></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>E-mail address</p></td>";
	print "<td><input type='text' name='email_address5' id='email_address5' value='$emailAddress5' size='40'></td>";
	print "<td></td>";
	print "</tr>";

	print "<tr><td colspan='4'>&nbsp;</td></tr>";
	if ($action == 'E')
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='edit contact'></td></tr>";
	elseif ($action == 'D')
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='delete contact'></td></tr>";					
	else
		print "<tr><td colspan='4' align='center'><input type='submit' name='stoor' id='stoor' value='add new contact'></td></tr>";					

print "</table>";
print "</form>";
?>