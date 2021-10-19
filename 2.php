<html>
    <body>
        <?php
            if(!@mysql_connect("134.74.112.19", "liu20f", "shuoxin")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
	    mysql_select_db("d218");
		?>
	 <h2>CDs</h2>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Title</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Type</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Year</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Producer</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Supplier</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="50" height="6"><br><b>Command</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if ($_REQUEST['title'] != "" and $_REQUEST['producer_name2'] != "" and $_REQUEST['supplier_name'] != "") {
                    $year = mysql_real_escape_string($_REQUEST['year']);
                    $type = mysql_real_escape_string($_REQUEST['type']);
                    $title = mysql_real_escape_string($_REQUEST['title']);
                    $producer = mysql_real_escape_string($_REQUEST['producer_name2']);
                    $supplier = mysql_real_escape_string($_REQUEST['supplier_name']);
                    mysql_query("INSERT INTO CDs (title, type, year) VALUES('$title','$type','$year')");
                    mysql_query("INSERT INTO Produce (title, producer_name) VALUES('$title','$producer')");
                    mysql_query("INSERT INTO Supply (title, supplier_name) VALUES('$title','$supplier')");
                    echo "INSERT INTO CDs (title, type, year) VALUES('$title','$type','$year')";
                    echo "INSERT INTO Produce (title, producer_name) VALUES('$title','$producer')";
                    echo "INSERT INTO Supply (title, supplier_name) VALUES('$title','$supplier')";
                }

		                if ($_REQUEST['action'] == "del") {
					                    $title = mysql_real_escape_string($_REQUEST['name2']);
							                        mysql_query("DELETE FROM CDs WHERE title ='$title'");
							                        mysql_query("DELETE FROM Produce WHERE title='$title'");
										                    mysql_query("DELETE FROM Supply WHERE title='$title'");
										                    echo "DELETE FROM CDs WHERE title ='$title'";
												                        echo "DELETE FROM Produce WHERE title='$title'";
												                        echo "DELETE FROM Supply WHERE title='$title'";
															                }

		                $result = mysql_query("SELECT * FROM CDs NATURAL JOIN Produce NATURAL JOIN Supply ORDER BY title");
		                $i = 0;
				                while ($row = mysql_fetch_array($result)) {
							                    echo "<tr valign='middle'>";
									                        echo "<td>".$row['title']."</td>";
									                        echo "<td>".$row['type']."</td>";
												                    echo "<td>".$row['year']."</td>";
												                    echo "<td>".$row['producer_name']."</td>";
														                        echo "<td>".$row['supplier_name']."</td>";
														                        echo "<td><a onclick=\"return confirm('Are you sure?');\" href='2.php?action=del&amp;name2=".$row['title']."'><span class='red'>Delete_CD</span></a></td>";
																	                    echo "</td>";
																	                    echo "</tr>";
																			                        $i++;
																			                    }
				            ?>
        </table>
<h4>Add CD</h4>
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Title:</td><td><input type="text" size="50" name="title"></td></tr>
                <tr><td>Type:</td><td> <input type="text" size="20" name="type"></td></tr>
                <tr><td>Year:</td><td> <input type="text" size="4" name="year"></td></tr>
                <tr><td>Producer:</td><td> <input type="text" size="50" name="producer_name2"></td></tr>
                <tr><td>Supplier:</td><td> <input type="text" size="50" name="supplier_name"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Add Producer"></td></tr>
           </table>
        </form>
    </body>
</html>

<a href="http://www-cs.ccny.cuny.edu/~lius7767/proj2/proj2_menu.html">Return Home</a>
