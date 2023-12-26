<?php include ('db.php'); ?>

<?php 
function updatedDrinkQuantity(){
    $conn = oci_connect('user', 'pass', '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))'); 
    if (!$conn) { $m = oci_error(); 
        echo $m['message']; 
    } 
    // Get the updated quantity from the database
    $drinkQuantities = [];
    $getUpdatedQuantity = "SELECT Quantity FROM drinkTransaction";
    $stid = oci_parse($conn, $getUpdatedQuantity);
    $result = oci_execute($stid);

    // Store results into the resultUpdatedQuantity array
    if ($result) {
        while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
            array_push($drinkQuantities, $row['QUANTITY']);
        }
    }
    return $drinkQuantities;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="icon" href="./Images/favicon.ico">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header>
        <a>
            <img id="logo" src="./Images/logo.png" alt="">
            Total Sales
        </a>
    </header>
    <div class="box">
        <div id="barForm">
            <form id="submit" action="" method="post">
                <?php
                    $idAndName = array("pint", "domestic", "nonalc", "liquor", "hwine",
                    "pwine", "malt10", "malt15", "juice", "pop");
                    $sql = "SELECT * FROM drink";
                    $stid = oci_parse($conn, $sql);
                    $result = oci_execute($stid);
                    $i = 0;
                    if ($result){
                        while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)){
                            echo "<label for='" . $idAndName[$i] . "'>(&dollar;" . $row['PRICE'] . ") " . $row['DRINKNAME'] . ": </label>";
                            echo "<input type='number' id='" . $idAndName[$i] . "' name='" . $idAndName[$i] . "'></br>";
                            $i++;
                        }
                    }
                    else{
                        echo "No results. <br>";
                        $e = oci_error($stid);
                        echo htmlentities($e['message']);
                    }    
                    echo "<hr>";
                    echo "<label for='amountReceived'>Amount received: </label>";
                    echo "<input type='number' id='amountReceived' name='amountReceived'><br>";
                ?>
                <div id="submitButton">
                    <input type="submit" class="button" name="submit" value="Submit">
                </div>
            </form>
        </div>
        <div id="calculation">
            <?php
                $sumTotal = $sumTotalSales = 0;
                $prices = [];
                $getPrices = "SELECT price FROM drink";
                $stid = oci_parse($conn, $getPrices);
                $result = oci_execute($stid);
                if($result){
                    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)){
                        array_push($prices, $row["PRICE"]);
                    }
                }
                else{
                    echo "failed";
                }

                $drinkNamesVar = ["costPint", "costDomestic", "costNonAlc", "costLiquor", "costHWine", "costPWine", "costSingleMalt10", "costSingleMalt15", "costJuice", "costPop"];

                for ($i = 0; $i < count($drinkNamesVar); $i++) {
                    ${$drinkNamesVar[$i]} = $prices[$i];
                }

                // Retrieving quantity of the current drink from the database
                $drinkQuantities = [];
                $getQuantity = "SELECT Quantity FROM drinkTransaction";
                $connectToConn = oci_parse($conn, $getQuantity);
                $resultQuantity = oci_execute($connectToConn);

                // Store results into the drinkQuantities array
                if ($resultQuantity) {
                    while ($row = oci_fetch_array($connectToConn, OCI_RETURN_NULLS+OCI_ASSOC)) {
                        array_push($drinkQuantities, $row['QUANTITY']);
                    }
                }

                // Handles the transaction and stores the information in the database
                if (isset($_POST['submit'])) {
                    //Getting the total amount that the customer paid
                    $total = ($_POST['pint'] * $costPint) + ($_POST['domestic'] * $costDomestic) + ($_POST['nonalc'] * $costNonAlc) +
                    ($_POST['liquor'] * $costLiquor) + ($_POST['hwine'] * $costHWine) + ($_POST['pwine'] * $costPWine) + ($_POST['malt10'] * $costSingleMalt10) +
                    ($_POST['malt15'] * $costSingleMalt15) + ($_POST['juice'] * $costJuice) + ($_POST['pop'] * $costPop);

                    //validating if payment was sufficient
                    if ($_POST['amountReceived'] >= $total) {
                        $currentCost = 0;
                        for ($i = 0; $i < count($idAndName); $i++){
                            $amount = $_POST[$idAndName[$i]];
                            $drinkPrice = ${$drinkNamesVar[array_search($idAndName[$i], $idAndName)]};
                            if ($amount != "" ){
                                $currentCost += $amount * $drinkPrice;
                                $currentAmount = $amount + $drinkQuantities[$i];

                                // Updating data into database
                                $sql = "UPDATE drinkTransaction SET Quantity = $currentAmount WHERE DrinkId = $i";
                                $stid = oci_parse($conn, $sql);
                            }
                            // Execute the prepared statement
                            $result = oci_execute($stid);
                        }
                        $diffPayment = $_POST['amountReceived'] - $total;
                        echo "<p style='color: green'>Change: $" . $diffPayment . "</p>";
                    }
                    else{
                            $diffPayment = $_POST['amountReceived'] - $total;
                            echo "<p style='color: red'>Payment insufficient by: $" . $diffPayment . "</p>";
                    }
                }
            ?>
        </div>
    </div>
    <div class="salesAmountAndQuantity">
        <table id="total">
            <caption class="tableCaption"></caption>
            <tr>
                <th> </th>
                <?php
                    $drinkNames = ["Pint", "Domestic", "NonAlc", "Liquor", "Hwine", "PWine", "SingleMalt10", "SingleMalt15", "Juice", "Pop"];
                    for ($i = 0; $i < count($drinkNames); $i++){
                        echo "<th>" . $drinkNames[$i] . "</th>";
                    }
                ?>
            </tr>
            <tr>
                <th>Amount &dollar;</th>
                <?php
                    
                    $drinksAmount = updatedDrinkQuantity();
                    $sumDrinks = [];
                    // Display the amount of drinks sold
                    for ($i = 0; $i < count($drinksAmount); $i++){
                        $currentSum = $prices[$i] * $drinksAmount[$i];
                        echo "<td>" . $currentSum . "</td>";
                        array_push($sumDrinks, $currentSum);
                    }
                ?>
            </tr>
            <tr>
                    <th>Quantity</th>
                    <?php
                        $drinkQuantities = updatedDrinkQuantity();
                        // Display the quantity of drinks sold
                        for ($i = 0; $i < count($drinkQuantities); $i++){
                            echo "<td>" . $drinkQuantities[$i] . "</td>";
                        }
                    ?>
            </tr>
        </table>

        <?php
            $sumTotalSales = array_sum($sumDrinks);
            echo "<p style='text-align:center;font-weight:600;'> Total amount: $" . $sumTotalSales . "</p>";
        ?>
    </div>
    <form action="" method="post">
        <div id="resetButton">
            <input type="submit" class="button" id="reset" name="reset" value="Reset" onclick=countClicks()>
        </div>
    </form>

    <?php
        if (isset($_POST['reset'])) {
            $sql = "UPDATE drinkTransaction SET Quantity = 0";
            $stid = oci_parse($conn, $sql);
            $result = oci_execute($stid);   
            if ($result) {
                // Redirect to the same page to refresh it
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
        }

    ?>
    <footer>
        <p>&copy; Built and Designed by Helen Tran</p>
    </footer>
</body>
</html>

