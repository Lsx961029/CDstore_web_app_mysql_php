<html>
    <body>
        <?php
            if(!@mysql_connect("134.74.112.19", "liu20f", "shuoxin")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d218");
        ?>
        <h2>Producers</h2>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Name</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Address</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if ($_REQUEST['producer_name'] != "") {
                    $address = mysql_real_escape_string($_REQUEST['address']);
                    $producer_name = mysql_real_escape_string($_REQUEST['producer_name']);
                    mysql_query("INSERT INTO Producers (producer_name,address) VALUES('$producer_name','$address')");
                    echo "INSERT INTO Producers (producer_name,address) VALUES('$producer_name','$address')";
                }

		                if ($_REQUEST['action'] == "del") {
					                    $producer_name = mysql_real_escape_string($_REQUEST['name']);
							                        mysql_query("DELETE FROM Producers WHERE producer_name ='$producer_name'");
							                        echo "DELETE FROM Producers WHERE producer_name ='$producer_name'";
										                }

		                $result = mysql_query("SELECT * FROM Producers ORDER BY producer_name");
		                $i = 0;
				                while ($row = mysql_fetch_array($result)) {
							                    echo "<tr valign='middle'>";
									                        echo "<td>".$row['producer_name']."</td>";
									                        echo "<td>".$row['address']."</td>";
												                    echo "<td><a onclick=\"return confirm('Are you sure?');\" href='1.php?action=del&amp;name=".$row['producer_name']."'><span class='red'>Delete_Producer</span></a></td>";
												                    echo "</td>";
														                        echo "</tr>";
														                        $i++;
																	                }
				            ?>
        </table>
        <h4>Add Producer</h4>
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Name:</td><td><input type="text" size="50" name="producer_name"></td></tr>
                <tr><td>Address:</td><td> <input type="text" size="100" name="address"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add Producer"></td></tr>
           </table>
        </form>
    </body>
</html>


<a href="http://www-cs.ccny.cuny.edu/~lius7767/proj2/proj2_menu.html">Return Home</a>
