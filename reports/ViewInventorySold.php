<?php
          echo "<center><br /><h3>Inventory Sold</h3><table border=1 width='75%>'";
		  echo "<tr><td>Customer</td><td>Contact</td><td>Serial Number</td><td>Invoice</td><td>Price</td><td>Date</td></tr>";
	      $Result = mysql_query("SELECT * FROM Impact21 ORDER BY Cust Asc", $Link);
		  while ($Row = mysql_fetch_array($Result)) {
		       echo "<tr><td>";
			        $Result2 = mysql_query("SELECT Name From Customer WHERE ID = $Row[Cust]", $Link);
		       	    if ($Row2 = mysql_fetch_array($Result2)) { echo $Row2[Name]; }
		       echo "</td><td>";
		            echo $Row[Contact];
		       echo "</td><td>";
		            echo $Row[SNum];
		       echo "</td><td>";
		            echo $Row[Invoice];
		       echo "</td><td>";
		            echo $Row[Price];
		       echo "</td><td>";
		            echo $Row[Date];
		       echo "</td></tr>";
		  }
	      echo "</table></center>"; ?>