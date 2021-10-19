<html>
    <body>
        <?php
            if(!@mysql_connect("134.74.112.19", "liu20f", "shuoxin")) {
                echo "<h2>Connection Error.</h2>";
                die();
            }
            mysql_select_db("d218");
            ?>
  <h2>Search Producer</h2>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr bgcolor="#f87820">
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Producer</b></td>
                <td class=tabhead><img src="img/blank.gif" alt="" width="200" height="6"><br><b>Address</b></td>
                <td><img src="img/blank.gif" alt="" width="10" height="25"></td>
            </tr>
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                $artist = mysql_real_escape_string($_REQUEST['artist']);
                $year = mysql_real_escape_string($_REQUEST['year']);

		                $result = mysql_query("SELECT * FROM Producers where producer_name IN (SELECT producer_name FROM Songs NATURAL JOIN CDs NATURAL JOIN Produce WHERE artist='$artist' and year='$year')");
			echo "SELECT * FROM Producers where producer_name IN (SELECT producer_name FROM Songs NATURAL JOIN CDs NATURAL JOIN Produce WHERE artist='$artist' and year='$year')";
		                $i = 0;
		                while ($row = mysql_fetch_array($result)) {
					                    echo "<tr valign='middle'>";
							                        echo "<td>".$row['producer_name']."</td>";
							                        echo "<td>".$row['address']."</td>";
										                    echo "</td>";
										                    echo "</tr>";
												                        $i++;
												                    }
				            ?>
        </table>
	<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="get">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr><td>Artist:</td><td> <input type="text" size="25" name="artist"></td></tr>
                <tr><td>Year:</td><td> <input type="text" size="4" name="year"></td></tr>
                <tr><td>&nbsp;</td><td><input type="submit" value="Search"></td></tr>
           </table>
        </form>

<a href="http://www-cs.ccny.cuny.edu/~lius7767/proj2/proj2_menu.html">Return Home</a>
