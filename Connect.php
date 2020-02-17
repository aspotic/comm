<html>
<head>
     <title>Comm Center Tracker</title>
</head>
<body>
<?php
     require ('DBLink.php');
	 
	       if ($_GET["action"] == "AddAllocation") { $Query = "INSERT INTO dropdown_Allocate VALUES ('', '$_POST[Name]')";
	 } elseif ($_GET["action"] == "AddModel") { $Query = "INSERT INTO dropdown_Models VALUES ('', '$_POST[Model]', '$_POST[Description]', '$_POST[Price]')";
	 } elseif ($_GET["action"] == "AddCustomer") { $Query = "INSERT INTO Customer VALUES ('', '$_POST[Name]', '$_POST[Contact]', '$_POST[Street1]', '$_POST[Street2]', '$_POST[City]', '$_POST[Province]', '$_POST[Country]', '$_POST[PostalCode]', '$_POST[Phone1]', '$_POST[Phone2]', '$_POST[Fax]', '$_POST[ShipContact]', '$_POST[ShipStreet1]', '$_POST[ShipStreet2]', '$_POST[ShipCity]', '$_POST[ShipProvince]', '$_POST[ShipCountry]', '$_POST[ShipPostal]', '$_POST[EMail]', '$_POST[Website]')";
	 } elseif ($_GET["action"] == "AddFrequency") { $Query = "INSERT INTO Frequency VALUES ('', '$_POST[Name]', '$_POST[FPosition]', '$_POST[Rx]', '$_POST[Tx]', '$_POST[CSQ]', '$_POST[TPL]', '$_POST[DPL]', '$_POST[Area]', '$_POST[BW]', '$_POST[Unit]', '$_POST[Comments]')";
	 } elseif ($_GET["action"] == "AddImpact21") { $Query = "INSERT INTO Impact21 VALUES ('', '$_POST[Customer]', '$_POST[Contact]', '$_POST[SNum]', '$_POST[Invoice]', '$_POST[Price]', '$Date')";
	 } elseif ($_GET["action"] == "AddInventory") { $Query = "INSERT INTO Inventory VALUES ('', '$_POST[Make]', '$_POST[Model]', '$_POST[SNum]', '$_POST[Allocate]')";
	 } elseif ($_GET["action"] == "AddRental") { $Query = "INSERT INTO Rental VALUES ('', '$_POST[Customer]', '$_POST[Contact]', '$_POST[SNum]', '$_POST[StartDate]', '$_POST[EndDate]')";
	 
	 } elseif ($_GET["action"] == "EditAllocation") { $Query = "UPDATE dropdown_Allocate SET Name = '$_POST[Name]' WHERE ID = '$_GET[EditRow]'";
	 } elseif ($_GET["action"] == "EditModel") { $Query = "UPDATE dropdown_Models SET Model='$_POST[Model]', Descr='$_POST[Description]', Price='$_POST[Price]' WHERE ID='$_GET[EditRow]'";
	 } elseif ($_GET["action"] == "EditCustomer") { $Query = "UPDATE Customer SET Name='$_POST[Name]', Contact='$_POST[Contact]', Street1='$_POST[Street1]', Street2='$_POST[Street2]', City='$_POST[City]', Prov='$_POST[Province]', Country='$_POST[Country]', Postal='$_POST[PostalCode]', Phone1='$_POST[Phone1]', Phone2='$_POST[Phone2]', Fax='$_POST[Fax]', ShipContact='$_POST[ShipContact]', ShipStreet1='$_POST[ShipStreet1]', ShipStreet2='$_POST[ShipStreet2]', ShipCity='$_POST[ShipCity]', ShipProv='$_POST[ShipProvince]', ShipCountry='$_POST[ShipCountry]', ShipPostal='$_POST[ShipPostal]', Email='$_POST[EMail]', Website='$_POST[Website]' WHERE ID = $_GET[EditRow]";
	 } elseif ($_GET["action"] == "EditFrequency") { $Query = "UPDATE Frequency SET Name='$_POST[Name]', FPosition='$_POST[FPosition]', Rx='$_POST[Rx]', Tx='$_POST[Tx]', CSQ='$_POST[CSQ]', TPL='$_POST[TPL]', DPL='$_POST[DPL]', Area='$_POST[Area]', BW='$_POST[BW]', Units='$_POST[Unit]', Comments='$_POST[Comments]' WHERE ID = $_GET[EditRow]";

	 } elseif ($_GET["action"] == "EditImpact21") { $Query = "UPDATE Impact21 SET Cust = '$_POST[Customer]', Contact = '$_POST[Contact]', SNum = '$_POST[SNum]', Invoice = '$_POST[Invoice]', Price = '$_POST[Price]' WHERE ID = $_GET[EditRow]";
	
	 } elseif ($_GET["action"] == "EditInventory") { $Query = "UPDATE Inventory SET Make='$_POST[Make]', Model='$_POST[Model]', SNum='$_POST[SNum]', Allocate='$_POST[Allocate]' WHERE ID = $_GET[EditRow]";

	 } elseif ($_GET["action"] == "EditRental") { $Query = "UPDATE Rental SET Cust='$_POST[Customer]', Contact='$_POST[Contact]', SNum='$_POST[SNum]', Start='$_POST[StartDate]', End='$_POST[EndDate]' WHERE ID = $_GET[EditRow]";
	 
	 } else {
	      $PH = 1;
	 }

	 //Send Query 
	 if (!mysql_query($Query,$Link)) {echo 'Could not send query: ' . mysql_error();}
	 
	 //Close Connection
	 mysql_close($Link);
	 
	 if ($PH == 1) {
	      echo "<br />The action was not recognized<br />";
	 } elseif ($PH == 0) {
	      echo "<br />The action was successful<br />";
	 }
?>
<br />
<a href="<?php echo $Homepage; ?>">Return to tracker</a>
</body>
</html>