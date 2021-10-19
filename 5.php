<html>
    <body>
        <?php
            if(!@mysql_connect("134.74.112.19", "liu20f", "shuoxin")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d218");
            ?>
<h2>Search Customer</h2>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Customer</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Telephone</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if($_REQUEST['date'] == ""){
                        $date = "NULL";
                        }
                else{
                        $date ="'".mysql_real_escape_string($_REQUEST['date'])."'";
                        }
                $CD = mysql_real_escape_string($_REQUEST['title4']);

		                $result = mysql_query("SELECT customer_name,telephone FROM Customers NATURAL JOIN Rent where title='$CD' and DATE_ADD(date,INTERVAL period day)=$date");
			echo "SELECT customer_name,telephone FROM Customers NATURAL JOIN Rent where title='$CD' and DATE_ADD(date,INTERVAL period day)=$date";
		                $i = 0;
		                while ($row = mysql_fetch_array($result)) {
					                    echo "<tr valign='middle'>";
							                        echo "<td>".$row['customer_name']."</td>";
							                        echo "<td>".$row['telephone']."</td>";
										                    echo "</td>";
										                    echo "</tr>";
												                        $i++;
												                    }
				            ?>
        </table>
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>CD:</td><td> <input type="text" size="50" name="title4"></td></tr>
                <tr><td>Date(xxxx-xx-xx):</td><td> <input type="text" size="10" name="date"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Search"></td></tr>
           </table>
        </form>
    </body>
</html>

<a href="http://www-cs.ccny.cuny.edu/~lius7767/proj2/proj2_menu.html">Return Home</a>
