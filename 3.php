<html>
    <body>
        <?php
            if(!@mysql_connect("134.74.112.19", "liu20f", "shuoxin")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d218");
            ?>
        
<h2>Customers</h2>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Customer</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>SSN</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Telephone</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>CD</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Date(xxxx-xx-xx)</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Period(days)</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if ($_REQUEST['SSN'] != "" and $_REQUEST['title3'] != "") {
                        if($_REQUEST['period'] == ""){
                                $period= "NULL";}
                        else{$period = intval($_REQUEST['period']);}
                        if($_REQUEST['date'] == ""){
                                $date = "NULL";}
                        else{$date ="'".mysql_real_escape_string($_REQUEST['date'])."'";}
                    $customer = mysql_real_escape_string($_REQUEST['customer_name']);
                    $SSN = mysql_real_escape_string($_REQUEST['SSN']);
                    $telephone = mysql_real_escape_string($_REQUEST['telephone']);
                    $CD = mysql_real_escape_string($_REQUEST['title3']);
                    mysql_query("INSERT INTO Customers (customer_name, telephone, SSN) VALUES('$customer','$telephone','$SSN')");
                    mysql_query("INSERT INTO Rent (title, SSN, date, period) VALUES('$CD','$SSN',$date,$period)");
                    echo "INSERT INTO Rent (title, SSN, date, period) VALUES('$CD','$SSN',$date,$period)";
                    echo "INSERT INTO Customers (customer_name, telephone, SSN) VALUES('$customer','$telephone','$SSN')";
                }

		                if ($_REQUEST['action'] == "del") {
					                    $SSN = mysql_real_escape_string($_REQUEST['name3']);
							                        mysql_query("DELETE FROM Customers WHERE SSN = '$SSN'");
							                        mysql_query("DELETE FROM Rent WHERE SSN = '$SSN'");
										                    mysql_query("DELETE FROM VIPs WHERE SSN='$SSN'");
										                    echo "DELETE FROM Customer WHERE SSN='$SSN'";
												                        echo "DELETE FROM Rent WHERE SSN='$SSN'";
												                        echo "DELETE FROM VIPs WHERE SSN='$SSN'";
															                }

		                $result = mysql_query("SELECT * FROM Customers NATURAL JOIN Rent ORDER BY SSN");
		                $i = 0;
				                while ($row = mysql_fetch_array($result)) {
							                    echo "<tr valign='middle'>";
									                        echo "<td>".$row['customer_name']."</td>";
									                        echo "<td>".$row['SSN']."</td>";
												                    echo "<td>".$row['telephone']."</td>";
												                    echo "<td>".$row['title']."</td>";
														                        echo "<td>".$row['date']."</td>";
														                        echo "<td>".$row['period']."</td>";
																	                    echo "<td><a onclick=\"return confirm('Are you sure?');\" href='3.php?action=del&amp;name3=".$row['SSN']."'><span class='red'>Delete_Customer</span></a></td>";
																	                    echo "</td>";
																			                        echo "</tr>";
																			                        $i++;
																						                }
				            ?>
 </table>

        <h4>Add Customer</h4>
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Customer:</td><td><input type="text" size="50" name="customer_name"></td></tr>
                <tr><td>SSN:</td><td> <input type="text" size="20" name="SSN"></td></tr>
                <tr><td>Telephone:</td><td> <input type="text" size="20" name="telephone"></td></tr>
                <tr><td>CD:</td><td> <input type="text" size="50" name="title3"></td></tr>
                <tr><td>Date(xxxx-xx-xx):</td><td> <input type="text" size="10" name="date"></td></tr>
                <tr><td>Period(days):</td><td> <input type="text" size="20" name="period"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add Customer"></td></tr>
           </table>
        </form>

    </body>
</html>

<a href="http://www-cs.ccny.cuny.edu/~lius7767/proj2/proj2_menu.html">Return Home</a>
