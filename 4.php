<html>
    <body>
        <?php
            if(!@mysql_connect("134.74.112.19", "liu20f", "shuoxin")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d218");
            ?>

        <h2>VIP</h2>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Customer</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>SSN</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Telephone</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>CD</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Date(xxxx-xx-xx)</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Period(days)</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Discount(%)</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>VIP_starting_date(xxxx-xx-xx)</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if ($_REQUEST['SSN2'] != "" and $_REQUEST['title2'] != "") {
                        if ($_REQUEST['period'] ==""){
                                $period = "NULL";}
                        else {$period = intval($_REQUEST['period']);}
                        if ($_REQUEST['discount'] ==""){
                                $discount = "NULL";}
                        else {$discount = intval($_REQUEST['discount']);}
                        if($_REQUEST['date'] == ""){
                                $date = "NULL";}
                        else{$date ="'".mysql_real_escape_string($_REQUEST['date'])."'";}
                        if($_REQUEST['starting_date'] == ""){
                                $starting_date = "NULL";}
                        else{$starting_date ="'".mysql_real_escape_string($_REQUEST['starting_date'])."'";}
                    $customer = mysql_real_escape_string($_REQUEST['customer_name']);
                    $SSN = mysql_real_escape_string($_REQUEST['SSN2']);
                    $telephone = mysql_real_escape_string($_REQUEST['telephone']);
                    $CD = mysql_real_escape_string($_REQUEST['title2']);
                    mysql_query("INSERT INTO Customers (customer_name, telephone, SSN) VALUES('$customer','$telephone','$SSN')");
                    mysql_query("INSERT INTO Rent (title, SSN, date, period) VALUES('$CD','$SSN',$date,$period)");
                    mysql_query("INSERT INTO VIPs (SSN, discount, starting_date) VALUES('$SSN',$discount,$starting_date)");
                    echo "INSERT INTO VIPs (SSN, discount, starting_date) VALUES('$SSN',$discount,$starting_date)";
                    echo "INSERT INTO Rent (title, SSN, date, period) VALUES('$CD','$SSN',$date,$period)";
                    echo "INSERT INTO Customers (customer_name, telephone, SSN) VALUES('$customer','$telephone','$SSN')";
                }

			if ($_REQUEST['action'] == "del") {
				                    $SSN = mysql_real_escape_string($_REQUEST['name4']);
						                        mysql_query("DELETE FROM VIPs WHERE SSN = '$SSN'");
						                        echo "DELETE FROM VIPs WHERE SSN = '$SSN'";
									                }

		                $result = mysql_query("SELECT * FROM Customers NATURAL JOIN Rent NATURAL JOIN VIPs ORDER BY SSN");
		                $i = 0;
				                while ($row = mysql_fetch_array($result)) {
							                    echo "<tr valign='middle'>";
									                        echo "<td>".$row['customer_name']."</td>";
									                        echo "<td>".$row['SSN']."</td>";
												                    echo "<td>".$row['telephone']."</td>";
												                    echo "<td>".$row['title']."</td>";
														                        echo "<td>".$row['date']."</td>";
														                        echo "<td>".$row['period']."</td>";
																	                    echo "<td>".$row['discount']."</td>";
																	                    echo "<td>".$row['starting_date']."</td>";
																			                        echo "<td><a onclick=\"return confirm('Are you sure?');\" href='4.php?action=del&amp;name4=".$row['SSN']."'><span class='red'>Delete_VIP</span></a></td>";
																			                        echo "</td>";
																						                    echo "</tr>";
																						                    $i++;
																								                    }
				            ?>
        </table>

        <h4>Add VIP</h4>
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Customer:</td><td><input type="text" size="50" name="customer_name"></td></tr>
                <tr><td>SSN:</td><td> <input type="text" size="20" name="SSN2"></td></tr>
                <tr><td>Telephone:</td><td> <input type="text" size="20" name="telephone"></td></tr>
                <tr><td>CD:</td><td> <input type="text" size="50" name="title2"></td></tr>
                <tr><td>Date(xxxx-xx-xx):</td><td> <input type="text" size="10" name="date"></td></tr>
                <tr><td>Period(days):</td><td> <input type="text" size="20" name="period"></td></tr>
                <tr><td>Discount(%):</td><td> <input type="text" size="5" name="discount"></td></tr>
                <tr><td>VIP_starting_date(xxxx-xx-xx):</td><td> <input type="text" size="10" name="starting_date"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add Customer"></td></tr>
           </table>
        </form>

    </body>
</html>

<a href="http://www-cs.ccny.cuny.edu/~lius7767/proj2/proj2_menu.html">Return Home</a>
