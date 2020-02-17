<form action="Connect.php?action=AddInventory" method="post">

Make: <input name="Make" type="text" value=""><br />

Model: <select name="Model">
            <?php $Result = mysql_query("SELECT * From dropdown_Models", $Link);
	        while ($Row = mysql_fetch_array($Result)) { echo "<option value=". $Row[ID] . ">". $Row[Model]; } ?>	
        </select><br />
		  
SNum: <input name="SNum" type="text" value=""><br />
Allocate: <select name="Allocate">
               <?php $Result = mysql_query("SELECT * From dropdown_Allocate", $Link);
	           while ($Row = mysql_fetch_array($Result)) { echo "<option value=". $Row[ID] . ">". $Row[Name]; } ?>	
          </select><br />

<input value="Add Inventory" type="submit">

</form>