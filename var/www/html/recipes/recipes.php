<!DOCTYPE html>
<html lang="en">
<head>
<title>Ohashisan</title>
<style>
table, th, td {
  border: 0px solid black;
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

<?php

$mysql_server = "";
$mysql_user = "";
$mysql_pass = '';
$mysql_db = "";

                    /* ---------- Function to list all recipes ----------*/
function listAllRecipes($mysql_server, $mysql_user, $mysql_pass, $mysql_db) {
    $conn = new mysqli($mysql_server, $mysql_user, $mysql_pass, $mysql_db);

    $query = "SELECT * FROM recipes";
    $recipes = mysqli_query($conn, $query);

    if (!$recipes) {
        printf("Error in connection: %s\n", mysqli_error($conn));
        exit();
    }

    echo ("<table border=\"1\">\n");
    echo ("\t<td><strong>Recipe#</td><td><strong>Recipe Name</td><td><strong>Description</td><td><strong>Image</td>");
    $recipeNumbers = array();
    $i = 1;
    while ($eachRow = mysqli_fetch_assoc($recipes)) {
        $table[] = $eachRow; // Add each row into the $table array
        if ($table) {
           foreach ($table as $d_eachRow) {
                echo ("\t<tr>\n\t\t<td>" . $d_eachRow["RecipeNumber"] . "</td><td>" . $d_eachRow["RecipeName"] . "</td><td>" . $d_eachRow["Description"] . 
                        "<td><img src=\"pics/" . $d_eachRow["Picture"] . "\" width=\"40%\"></td></tr>\n");
                unset($table); // Added this to prenent the issue of having the first row returned twice...
            }
        } 
    array_push($recipeNumbers, $d_eachRow["RecipeNumber"]);
    }
    echo ("</table>");
    echo ("<br>Number of recipes: " . count($table) . " <br />");
    print_r ($recipeNumbers);

    mysql_close($mysqli);
}                   /* ---------- End listAllRecipes() ---------- */



                    /* ---------- Function to add a recipe ---------- */
function addRecipe() {
    echo ("Add Recipe");
}                   /* ---------- End addRecipe() ---------- */



                    /* ---------- Function to list a recipe ---------- */
function listRecipe() {
    echo ("List Recipe");
}                   /* ---------- End listRecipe() ---------- */

$recipeNumbers = array();

?>


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
            Under construction<p>
            This page uses php with a MySQL database for my favorite recipes. Right now it's a work-in-progress...

            <?php
                echo ("<strong>Ohashisan Recipes</strong><p>\n");
                if (isset($_POST['name'])) {
                    $run_function = $_POST['name'];
                }
            ?>

                                        <!-- /* ---------- Form to display all recipes, display one recipe, or add new recipe ---------- */ -->
            <form method="POST" action="">
                All Recipes:<input type="radio" name="whichRecipes" id="allRecipes" value="allRecipes" /> | 
                Add Recipe:<input type="radio" name="addRecipe" id="addRecipe" value="addNewRecipe"> | 
                List Recipe:<input type="radio" name="listRecipe" id="listRecipe" value="listRecipe"><br />
                <input type="submit" value="Submit"><i> Select an option, then click Submit.
            </form>

        </td>
    </tr>
    <tr>
        <td valign="top" align="center" width="100" colspan="1">
            <img src="../pics/me_and_pezz_round.jpg" width="100%"><br>
                Road Dog Pebbs
        </td>
        <td colspan="1">

<?php
    $whichRecipes = $_POST['whichRecipes'];
    if (isset($_POST['whichRecipes'])) {
        echo ("<center><strong>Recipes</strong></center><p>");
        listAllRecipes($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
    } elseif (isset($_POST['addRecipe'])) {
        echo ("<center><strong>Add Recipe</strong></center><p>");
        addRecipe($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
    } elseif (isset($_POST['listRecipe'])) {
        echo ("<center><strong>List Recipe</strong></center><p>");
        listRecipe($mysql_server, $mysql_user, $mysql_pass, $mysql_db);
    } else {
        echo ("Ohashisan Recipes is a database of amazing foods from all over the world. You can use the options in the
                form above to display all recipes, search for a certain recipe, or add one of your own recipes to the collection.");
    }
?>
            <p>
        </td>
    </tr>
</table>
</center>
</body>
</html>
