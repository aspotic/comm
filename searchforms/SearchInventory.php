			        <?php echo "<center><br /><h3>Rental Inventory</h3><table border=1 width='75%>'";
			        echo "<tr><td>Make</td><td>Model</td><td>Serial Number</td><td>Allocation</td></tr>";
					$Result = mysql_query("SELECT * FROM Inventory ORDER BY Make Asc", $Link);
					while ($Row = mysql_fetch_array($Result)) {
					     if ($Row[Allocate] == "2") {
					          echo "<tr><td>";
			                       echo $Row[Make];
		                      echo "</td><td>";
							       $Result2 = mysql_query("SELECT * From dropdown_Models", $Link);
	           				       while ($Row2 = mysql_fetch_array($Result2)) {
					     	       if ($Row[Model] == $Row2[ID]) {echo $Row2[Model]; $Set = 1;  }} 
		    
		                      echo "</td><td>";
		                           echo $Row[SNum];
		                      echo "</td><td>";
		                           echo "Rental";
		                      echo "</td></tr>";
					     }
					}
					
					if ($Set == 0) {echo "<tr><td align='center' colspan=4>No Match Found</center></td></tr>";}
					
					echo "</table></center>"; 

					 ?>