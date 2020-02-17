<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Comm Center Tracker</title>
</head>

<body>

<center>

<?php require ('DBLink.php'); ?>

<table width="100%" align="center" border="1">
	   <tr>
	   	   <td align="center" width="150">
		        Actions
		   </td>
		   <?php if ((substr($_GET["action"], 0, 4) == "Edit")||($_GET["action"] == "SearchModels")) { ?>
		   <td align="center" width="200">
		   	   List
		   </td>
		   <?php } ?>
	   	   <td align="center">
		        Data
		   </td>
	   </tr>
	   <tr>
	   	   <td align="left" valign="top" width="200">
		   	   <!--Link List-->
			   
			   <a href="?action=AddCustomer">Add Customer</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditCustomer">Edit Customer</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=SearchCustomers">Customer Search</a><br />
			   <br />
			   <a href="?action=AddModel">Add Model</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditModel">Edit Model</a><br />
               &nbsp;&nbsp;&nbsp;<a href="?action=SearchModels">Lookup Model</a><br />
			   <br />
			   <a href="?action=AddAllocation">Add Allocation</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditAllocation">Edit Allocation</a><br />
			   <br />
			   <a href="?action=AddFrequency">Add Frequency</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditFrequency">Edit Frequency</a><br />
			   <br />
			   <a href="?action=AddInventory">Add Inventory</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditInventory">Edit Inventory</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=SearchInventory">View Rentals</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=SearchInventoryImpact">View Stock</a><br />
			   <br />
			   <a href="?action=AddRental">Add Rental</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditRental">Edit Rental</a><br />
			   <br />
			   <a href="?action=AddImpact21">Add Impact21</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=EditImpact21">Edit Impact21</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=SearchCustImpact">Customer Search</a><br />
			   &nbsp;&nbsp;&nbsp;<a href="?action=SearchModelPricesImpact">Model Price Search</a><br />
			   
			   <br />
			   <br />
			   View Reports<br />
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=ViewInventorySold">Inventory Sold</a><br />
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=ViewRentalsInUser">Rentals in Use</a><br />
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=ViewRentalsNotInUse">Rentals not in Use</a><br />
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=ViewCustomerHistory">Customer History</a><br />
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=SearchRadioHistory">Search Radio History</a><br />
			                                                                                                                                                                              <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?action=ViewRadioRentalHistory">Rental History of Radio</a><br />-->
		   </td>
		   
		   <?php if ((substr($_GET["action"], 0, 4) == "Edit")||($_GET["action"] == "SearchModels")) { ?>
		   <td width="200" valign="top" align="center">
		   	   <div style="width:198; height:650; overflow:auto; text-align:left;">
			   		<?php	
					     $EditingDB = substr($_GET["action"], 4);
						 if ($EditingDB == "Model") {$EditingDB = "dropdown_Models";} elseif ($EditingDB == "Allocation") {$EditingDB = "dropdown_Allocate";}

						 //Display list 
					               
						      if (($EditingDB == "Frequency")||($EditingDB == "Customer")||($EditingDB == "dropdown_Allocate")) {   
							       $Result = mysql_query("SELECT * From $EditingDB ORDER BY Name ASC", $Link);
							       while ($Row = mysql_fetch_array($Result)) {   
							            echo "<a href='?action=". $_GET[action]. "&EditRow=". $Row[ID]. "' >". $Row[Name]. "</a><br />"; 
							       }
							  } elseif (($EditingDB == "Inventory")||($EditingDB == "Impact21")||($EditingDB == "Rental")) {
							       $Result = mysql_query("SELECT * From $EditingDB ORDER BY SNum ASC", $Link);
							       while ($Row = mysql_fetch_array($Result)) {   
							            echo "<a href='?action=". $_GET[action]. "&EditRow=". $Row[ID]. "' >". $Row[SNum]. "</a><br />"; 
							       }
							  } elseif ($EditingDB == "dropdown_Models") {
							       $Result = mysql_query("SELECT * From $EditingDB ORDER BY Model ASC", $Link);
							       while ($Row = mysql_fetch_array($Result)) {   
							            echo "<a href='?action=". $_GET[action]. "&EditRow=". $Row[ID]. "' >". $Row[Model]. "</a><br />"; 
							       }	  
							  } elseif ($EditingDB == "chModels") {
							       $Result = mysql_query("SELECT * From dropdown_Models ORDER BY Model ASC", $Link);
							       while ($Row = mysql_fetch_array($Result)) {   
							            echo "<a href='?action=". $_GET[action]. "&ViewModel=". $Row[ID]. "' >". $Row[Model]. "</a><br />"; 
							       }
							  }
	
					?>
			   </div>
		   </td>
		   <?php } ?>
		   
	   	   <td align="left" valign="top">
		   	   <?php   

			   //Check for an action
			   
			   if (($_GET["action"] == "AddCustomer")||($_GET["action"] == "AddModel")||($_GET["action"] == "AddAllocation")||($_GET["action"] == "AddFrequency")||($_GET["action"] == "AddInventory")||($_GET["action"] == "AddRental")||($_GET["action"] == "AddImpact21")) {
			   	    include ('forms/'. $_GET["action"]. '.php');
			   
			   } elseif (($_GET["action"] == "ViewInventorySold")||($_GET["action"] == "ViewRentalsInUser")||($_GET["action"] == "ViewRentalsNotInUse")||($_GET["action"] == "ViewCustomerHistory")||($_GET["action"] == "ViewRadioRentalHistory")) {
			   	    include ('reports/'. $_GET["action"]. '.php');
			   
			   } elseif (($_GET["action"] == "EditCustomer")||($_GET["action"] == "EditModel")||($_GET["action"] == "EditAllocation")||($_GET["action"] == "EditFrequency")||($_GET["action"] == "EditInventory")||($_GET["action"] == "EditRental")||($_GET["action"] == "EditImpact21")) { 
			        include ('editforms/'. $_GET["action"]. '.php');
			   
			   } elseif (($_GET["action"] == "SearchCustImpact")||($_GET["action"] == "SearchRadioHistory")||($_GET["action"] == "SearchModels")||($_GET["action"] == "SearchCustomersImpact")||($_GET["action"] == "SearchInventory")||($_GET["action"] == "SearchCustomers")||($_GET["action"] == "SearchInventoryImpact")||($_GET["action"] == "SearchModelPricesImpact")) {
			        include ('searchforms/'. $_GET["action"]. '.php');

			   } elseif ($_GET["action"] == "ResultModelPricesImpact") {
					$Result = mysql_query("SELECT * From dropdown_Models", $Link);
					while ($Row = mysql_fetch_array($Result)) {   
					     if ($Row[Model] == $_POST[Model]) {
						      echo $_POST[Model]. "=". $Row[Price]. "<br />";
							  $Set = 1; 
						 }  
				    } if ($Set == 0) {echo "No Match Found<br />";} 	

			   } elseif ($_GET["action"] == "SearchCustomerImpact") {
			        $Result = mysql_query("SELECT ID FROM Customer WHERE Name = '$_POST[Name]'", $Link);
					if ($Row = mysql_fetch_array($Result)) {$Cust = $Row[ID];}    

					echo "<center><br /><table border=1 width='75%'><tr><td colspan=5 align='center'>Customer: ". $_POST[Name]. "</td></tr>";
					echo "<tr><td valign=top>Contact</td><td valign=top>Serial Number</td><td valign=top>Invoice</td><td valign=top>Price</td><td valign=top>Date</td></tr>";
			        
					$Result = mysql_query("SELECT * From Impact21", $Link);
					while ($Row = mysql_fetch_array($Result)) { 
					     if ($Row[Cust] == $Cust) {
						      echo "<tr><td valign=top>$Row[Contact]</td><td valign=top>$Row[SNum]</td><td valign=top>$Row[Invoice]</td><td valign=top>$Row[Price]</td><td valign=top>$Row[Date]</td></tr>";
						 }
					}   
			   
			   } elseif ($_GET["action"] == "ResultSearchCustomers") {
					$Result = mysql_query("SELECT * From Customer", $Link);
					while ($Row = mysql_fetch_array($Result)) {   
					     if (strtolower($Row[Name]) == strtolower($_POST[Name])) {
						      echo "<h2>Contact</h2>";
						      echo "Name: ". $Row[Name]. "<br />";
							  echo "Contact: ". $Row[Contact]. "<br />";
							  echo "Street 1: ". $Row[Street1]. "<br />";
							  echo "Street 2: ". $Row[Street2]. "<br />";
							  echo "City: ". $Row[City]. "<br />";
							  echo "Province: ". $Row[Prov]. "<br />";
							  echo "Country: ". $Row[Country]. "<br />";
							  echo "Postal Code: ". $Row[Postal]. "<br />";
							  echo "Phone 1: ". $Row[Phone1]. "<br />";
							  echo "Phone 2: ". $Row[Phone2]. "<br />";
							  echo "Fax: ". $Row[Fax]. "<br />";
							  echo "Shipping Contact: ". $Row[ShipContact]. "<br />";
							  echo "Shipping Street 1: ". $Row[ShipStreet1]. "<br />";
							  echo "Shipping Street 2: ". $Row[ShipStreet2]. "<br />";
							  echo "Shipping City: ". $Row[ShipCity]. "<br />";
							  echo "Shipping Province: ". $Row[ShipProv]. "<br />";
							  echo "Shipping Country: ". $Row[ShipCountry]. "<br />";
							  echo "Shipping Postal Code: ". $Row[ShipPostal]. "<br />";
							  echo "E-mail: ". $Row[Email]. "<br />";
							  echo "Website: ". $Row[Website]. "<br />";
							  
							  $Result2 = mysql_query("SELECT * From Frequency", $Link);
					          while ($Row2 = mysql_fetch_array($Result2)) {   
                                   if (($Fin == 0) && (strtolower($Row[Name]) == strtolower($Row2[Name]))) {
								        echo "<h2>Frequecy</h2>";
								        echo "FPosition: ". $Row2[FPosition]. "<br />";
										echo "Rx: ". $Row2[Rx]. "<br />";
										echo "Tx: ". $Row2[Tx]. "<br />";
										echo "CSQ: ". $Row2[CSQ]. "<br />";
										echo "TPL: ". $Row2[TPL]. "<br />";
										echo "DPL: ". $Row2[DPL]. "<br />";
										echo "Area: ". $Row2[Area]. "<br />";
										echo "BW: ". $Row2[BW]. "<br />";
										echo "Units: ". $Row2[Units]. "<br /><br />";
										echo "Comments:<br />". $Row2[Comments];
								   
								        $Fin = 1;
								   }
							  }
							  
							  $Set = 1; 
						 }  
				    } if ($Set == 0) {echo "No Match Found<br />";} 	
						
			   } elseif ($_GET["action"] == "SellInventoryImpact") {
			        $Query = "UPDATE Inventory SET Allocate = '3' WHERE ID = '$_GET[Row]'";
				    if (!mysql_query($Query,$Link)) {echo 'Could not send query: ' . mysql_error();} else {echo "Allocation changed to Sold";}
			   
			   } elseif ($_GET["action"] == "ResultSearchRadioHistory") {		
			        echo "<center><br /><table border=1 width='75%'><tr><td colspan=4 align='center'>Serial Number: ". $_POST[SNum]. "</td></tr>";
					echo "<tr><td valign=top>Customer</td><td valign=top>Contact</td><td valign=top>Start Date</td><td valign=top>End Date</td></tr>";
					
					$Result = mysql_query("SELECT * From Rental", $Link);
					while ($Row = mysql_fetch_array($Result)) {   
					     if ($Row[SNum] == $_POST[SNum]) {
						      $Result2 = mysql_query("SELECT Name From Customer WHERE ID = $Row[Cust]", $Link);
							  if ($Row2 = mysql_fetch_array($Result2)) {$Cust = $Row2[Name];}
						      echo "<tr><td valign=top>$Cust</td><td valign=top>$Row[Contact]</td><td valign=top>$Row[Start]</td><td valign=top>$Row[End]</td></tr>";
						 }
					}
					
					echo "</table></center>";
					
					
			   } else {
			   	 	echo "<center>Select an action</center>";
				 
			   }

			   ?>
		   </td>
	   </tr>
</table>

<?php mysql_close($Link); ?>

</center>
</body>
</html>
