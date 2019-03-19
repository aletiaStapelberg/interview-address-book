<?php
include("../db.inc");
print "<table width='100%' cellpadding='1' cellspacing='1'>";
$qryContacts = "SELECT contacts.id AS contacts_id,first_name,surname,contact_number,email_address,contacts_info.id AS contacts_info_id FROM contacts 
				LEFT JOIN contacts_info ON (contacts.id = contacts_info.contacts_id) 
			   ORDER BY surname ASC";
$rsContacts  = mysqli_query($connM,$qryContacts);
if (mysqli_num_rows($rsContacts) > 0)
{
	print "";
	print "<tr>";
	print "<td colspan='5' bgcolor='#C0C0C0' align='center'><p style='font: 20pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contacts in Address Book</p></td>";
	print "</tr>";
	print "</font>";
	print "<tr>";
	print "<td colspan='4'>&nbsp;</td>";
	print "<td colspan='1'><form action='search.php' method='GET'><input name='searchPhrase' type='text'><input type='submit' value='Search'></form></td>";
	print "</tr>";
	print "<tr>";
	print "<td colspan='5' bgcolor='#C0C0C0' align='left'><p style='font: 12pt Garamond, Georgia, serif;color:#000000;'><a href='contactForm.php?action=A'>Add new contact</a></p></td>";
	print "</tr>";
	print "<tr>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Surname</p></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>First Name</p></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Contact Number</p></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Email Address</p></td>";
	print "<td bgcolor='#C0C0C0'><p style='font: 14pt Garamond, Georgia, serif;color:#000000;weight:bold'>Action</p></td>";
	print "</tr>";
	$u = 0;
	$nrU = mysqli_num_rows($rsContacts);
	// while ($u < $nrU)
	// {
		while($row = mysqli_fetch_assoc($rsContacts)) {
		   $contacts_id = $row['contacts_id'];
		   $contacts_info_id = $row['contacts_info_id'];
		   $surname = $row['surname'];
		   $firstName = $row['first_name'];
		   $contactNumber = $row['contact_number'];
		   $emailAddress = $row['email_address'];
			if ($u%2 == 0)
			{
				$colours = "bgcolor='#F0F0F0'";	
			}
			else
			{
				$colours = "bgcolor='#FFFFFF'";	
			}
			print "<tr $colours>";
			print "<td>$surname<span style='float:right'><a href='contactForm.php?action=C&contactId=".$contacts_id."&contactInfoId=".$contacts_info_id."'>Add More Contact Info</a></span></td>";
			print "<td>$firstName</td>";
			print "<td>$contactNumber</td>";
			print "<td>$emailAddress</td>";
			print "<td><a href='contactForm.php?action=E&contactId=".$contacts_id."&contactInfoId=".$contacts_info_id."'>[Edit]</a>
					   <a href='contactForm.php?action=D&contactId=".$contacts_id."&contactInfoId=".$contacts_info_id."'>[Delete]</a></td>";
			print "</tr>";	
			$u++;
	}	
}						

print "</table>";
?>