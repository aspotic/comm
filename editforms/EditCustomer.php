<?php 

     if ($_GET[EditRow] != "") {
	 
	      $Query = "SELECT * FROM ". $EditingDB. " WHERE ID =". $_GET[EditRow];	
		  $Result = mysql_query($Query,$Link);
		   
		  if ($Row = mysql_fetch_array($Result)) {

		       echo '<form action="Connect.php?action=EditCustomer&EditRow='. $_GET[EditRow]. '" method="post">';
		       echo 'Name: <input name="Name" type="text" value="'. $Row[Name]. '"><br />';
		       echo 'Contact: <input name="Contact" type="text" value="'. $Row[Contact]. '"><br />';
		       echo 'Street 1: <input name="Street1" type="text" value="'. $Row[Street1]. '"><br />';
		       echo 'Street 2: <input name="Street2" type="text" value="'. $Row[Street2]. '"><br />';
		       echo 'City : <input name="City" type="text" value="'. $Row[City]. '"><br />';
		       echo 'Province: <input name="Province" type="text" value="'. $Row[Prov]. '"><br />';
		       echo 'Country: <input name="Country" type="text" value="'. $Row[Country]. '"><br />';
		       echo 'Postal Code: <input name="PostalCode" type="text" value="'. $Row[Postal]. '"><br />';
		       echo 'Phone Number 1: <input name="Phone1" type="text" value="'. $Row[Phone1]. '"><br />';
		       echo 'Phone Number 2: <input name="Phone2" type="text" value="'. $Row[Phone2]. '"><br />';
		       echo 'Fax: <input name="Fax" type="text" value="'. $Row[Fax]. '"><br />';
		       echo 'Shipping Contact: <input name="ShipContact" type="text" value="'. $Row[ShipContact]. '"><br />';
		       echo 'Shipping Street1: <input name="ShipStreet1" type="text" value="'. $Row[ShipStreet1]. '"><br />';
		       echo 'Shipping Street2: <input name="ShipStreet2" type="text" value="'. $Row[ShipStreet2]. '"><br />';
		       echo 'Shipping City: <input name="ShipCity" type="text" value="'. $Row[ShipCity]. '"><br />';
		       echo 'Shipping Province: <input name="ShipProvince" type="text" value="'. $Row[ShipProv]. '"><br />';
		       echo 'Shipping Country: <input name="ShipCountry" type="text" value="'. $Row[ShipCountry]. '"><br />';
		       echo 'Shipping Postal Code: <input name="ShipPostal" type="text" value="'. $Row[ShipPostal]. '"><br />';
		       echo 'E-Mail: <input name="EMail" type="text" value="'. $Row[Email]. '"><br />';
		       echo 'Website: <input name="Website" type="text" value="'. $Row[Website]. '"><br />';
		       echo '<input value="Edit Customer" type="submit">';
		       echo '</form>';

			   
		  } else {die('Could not send query: ' . mysql_error());}

	 }
	 
?>