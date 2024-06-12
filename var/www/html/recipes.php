<!DOCTYPE html>
<html lang="en">
<head>
<title>Ohashisan</title>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

th, td {
  padding: 5px;
}

table.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body>
<center>
<table width="800">
    <tr>
        <td align="center">
            <hr width="800">
            <h3><b>Ohashisan - Recipes</h3>
                <a href="/">Home</a> |
                <!-- a href="/bloghts/">Bloghts</a> | --> 
                <a href="/certs/">Certifications</a> |
                <!-- <a href="/commo/">Commo</a> | --> 
                <a href="/google/">Google</a> |
                <a href="/scripts/">Scripts</a> |
                <a href="/tech/">Tech</a> |
                <a href="http://t7mdxxegiaz3jxbk3n6j44eujasg2pjydfqoivm7ekwvcrouje3jucid.onion/thedarkside.html">The Dark Side</a>
                <hr width="800">
        </td>
    </tr>
</table>
<p>
<table width="800">
    <tr>
        <td valign="top" width="100" colspan="1">
            <a href="../pics/ohashi.jpg"><img src="../pics/ohashi.jpg" width="100%"></a>
        </td>
        <td valign="top" colspan="2">
        </td>
    </tr>
    <tr>
        <td valign="top" align="center" width="100" colspan="1">
            <img src="../pics/me_and_pezz_round.jpg" width="100%"><br>
                Road Dog Pebbs
        </td>
        <td colspan="1">
            <?php
            function listAllRecipes() {
                $mysql_server = "database";
                $mysql_user = "user";
                $mysql_pass = 'password';
                $mysql_db = "ohashisan";

                $conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

                $query = "SELECT * FROM recipes";
                $recipes = mysqli_query($conn, $query);

                if (!$recipes) {
                    printf("Error in connection: %s\n", mysqli_error($conn));
                    exit();
                }

                echo ("<table border=\"0\">\n");
                $i = 1;
                while ($eachRow = mysqli_fetch_assoc($recipes)) {
                    $table[] = $eachRow; // Add each row into the $table array
                    if ($table) {
                        foreach ($table as $d_eachRow) {
                            echo ("\t<tr>\n\t\t<td>" . $i++ . "</td><td>" . $d_eachRow["RecipeName"] . "</td><td>" .$d_eachRow["Description"] . 
                            "</td></tr>\n");
                        }
                    } 
                }
                echo ("</table>");
                echo ("<br>Number of recipes: " . count($table));

                mysql_close($mysqli);
            }

            listAllRecipes();
                ?>
            <p>
        </td>
    </tr>
</table>
</center>
</body>
</html>
