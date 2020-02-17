 <?php
          echo "<center><br /><h3>Rental History of Radio</h3><table border=1 width='75%>'";
		  echo "<tr><td>Serial Number</td><td>User History</td></tr>";

		  $LastSerial = "";
		  
		  $Result = mysql_query("SELECT * FROM Rental ORDER BY SNum Asc", $Link);
		  while ($Row = mysql_fetch_array($Result)) {
		  
		       $Result2 = mysql_query("SELECT * FROM Customer", $Link);
			   while ($Row2 = mysql_fetch_array($Result2)) {
			        if ($Row[Cust] == $Row2[ID]) { $Cust = $Row2[Name]; }
			   }
		  
		           if ($LastSerial != $Row[SNum]) {echo "</td></tr><tr><td valign='top'>". $Row[SNum]. "</td><td>". $Cust. "<br />";}
			   elseif ($LastSerial == $Row[SNum]) {echo $Cust. "<br />";}
			   
	      $LastSerial = $Row[SNum];
		  }
		  
	      echo "</td></tr></table></center>"; 
		  
?>
		  
		  
		  
		  
		  
		  
		  