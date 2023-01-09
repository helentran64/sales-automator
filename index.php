<?php 
    session_start();
    //draft
    $cookie_draft = "draft";
    $cookie_draft_value = 8;
    setcookie($cookie_draft, $cookie_draft_value, time() + 86400);
    //domestic
    $cookie_domestic = "domestic";
    $cookie_domestic_value = 7;
    setcookie($cookie_domestic, $cookie_domestic_value, time() + 86400);
    //non-alcoholic drink
    $cookie_nonAlc = "nonAlcoholic";
    $cookie_nonAlc_value = 6;
    setcookie($cookie_nonAlc, $cookie_nonAlc_value, time() + 86400);
    //liquor
    $cookie_liquor = "liquor";
    $cookie_liquor_value = 10;
    setcookie($cookie_liquor, $cookie_liquor_value, time() + 86400);
    //House wine
    $cookie_hwine = "housewine";
    $cookie_hwine_value = 10;
    setcookie($cookie_hwine, $cookie_hwine_value, time() + 86400);
    //Premium wine
    $cookie_pwine = "premiumwine";
    $cookie_pwine_value = 12;
    setcookie($cookie_pwine, $cookie_pwine_value, time() + 86400);
    //Single Malt 10
    $cookie_singlemalt10 = "singlemalt10";
    $cookie_singlemalt10_value = 20;
    setcookie($cookie_singlemalt10, $cookie_singlemalt10_value, time() + 86400);
    //Single Malt 15
    $cookie_singlemalt15 = "singlemalt15";
    $cookie_singlemalt15_value = 25;
    setcookie($cookie_singlemalt15, $cookie_singlemalt15_value, time() + 86400);
    //Juice
    $cookie_juice = "juice";
    $cookie_juice_value = 6;
    setcookie($cookie_juice, $cookie_juice_value, time() + 86400);
    //Pop
    $cookie_pop = "pop";
    $cookie_pop_value = 4;
    setcookie($cookie_pop, $cookie_pop_value, time() + 86400);
    //Total sales
    $cookie_sales = "sales";
    $cookie_sales_value = 0;
    setcookie($cookie_sales, $cookie_sales_value, time() + 86400);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="icon" href="./Images/favicon.ico">
    <link rel="stylesheet" href="./stylesheet.css">
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
            <form action="" method="post">
                <?php
                    $prices = array(8, 7, 6, 10, 10, 12, 20, 25, 6, 4);
                    $drinkNames = array("Draft Pint", "Domestic bottle", "Non-alcoholic",
                    "Liquor", "House wine", "Premium wine", "Single malt (10 years)", 
                    "Single malt (15 years)", "Juice", "Pop");
                    $idAndName = array("pint", "domestic", "nonalc", "liquor", "hwine",
                    "pwine", "malt10", "malt15", "juice", "pop");

                    for ($i = 0; $i < count($prices); $i++){
                        echo "<label for='" . $idAndName[$i] . "'>(&dollar;" . $prices[$i] . ") " . $drinkNames[$i] . ": </label>";
                        echo "<input type='number' id='" . $idAndName[$i] . "' name='" . $idAndName[$i] . "'></br>";
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
                $costPint = 8;
                $costDomestic = 7;
                $costNonAlc = $costJuice = 6;
                $costLiquor = $costHWine = 10;
                $costPWine = 12;
                $costSingleMalt10 = 20;
                $costSingleMalt15 = 25;
                $costPop = 4;
                $sumTotal = $sumTotalSales = 0;

                if (isset($_POST['submit'])) {
                    //Getting the total amount that the customer paid
                    $total = ($_POST['pint'] * 8) + ($_POST['domestic'] * 7) + ($_POST['nonalc'] * 6) +
                    ($_POST['liquor'] * 10) + ($_POST['hwine'] * 10) + ($_POST['pwine'] * 12) + ($_POST['malt10'] * 20) +
                    ($_POST['malt15'] * 25) + ($_POST['juice'] * 6) + ($_POST['pop'] * 4);

                    //validating if payment was sufficient
                    if ($_POST['amountReceived'] >= $total) {
                        if ($_POST['pint'] != ""){
                            $currentCost = $costPint * $_POST['pint'];
                            $sumPint += $currentCost;
                            $sumTotal += $sumPint;
                        }
                        if ($_POST['domestic'] != ""){
                            $currentCost = $costDomestic * $_POST['domestic'];
                            $sumDomestic += $currentCost;
                            $sumTotal += $sumDomestic;
                        }
                        if ($_POST['nonalc'] != ""){
                            $currentCost = $costNonAlc * $_POST['nonalc'];
                            $sumNonAlc += $currentCost;
                            $sumTotal += $sumNonAlc;
                        }
                        if ($_POST['liquor'] != ""){
                            $currentCost = $costLiquor * $_POST['liquor'];
                            $sumLiquor += $currentCost;
                            $sumTotal += $sumLiquor;
                        }
                        if ($_POST['hwine'] != ""){
                            $currentCost = $costHWine * $_POST['hwine'];
                            $sumHWine += $currentCost;
                            $sumTotal += $sumHWine;
                        }
                        if ($_POST['pwine'] != ""){
                            $currentCost = $costPWine * $_POST['pwine'];
                            $sumPWine += $currentCost;
                            $sumTotal += $sumPWine;
                        }
                        if ($_POST['malt10'] != ""){
                            $currentCost = $costSingleMalt10 * $_POST['malt10'];
                            $sumSingleMalt10 += $currentCost;
                            $sumTotal += $sumSingleMalt10;
                        }
                        if ($_POST['malt15'] != ""){
                            $currentCost = $costSingleMalt15 * $_POST['malt15'];
                            $sumSingleMalt15 += $currentCost;
                            $sumTotal += $sumSingleMalt15;
                        }
                        if ($_POST['juice'] != ""){
                            $currentCost = $costJuice * $_POST['juice'];
                            $sumJuice += $currentCost;
                            $sumTotal += $sumJuice;
                        }
                        if ($_POST['pop'] != ""){
                            $currentCost = $costPop * $_POST['pop'];
                            $sumPop += $currentCost;
                            $sumTotal += $sumPop;
                        }
                        $diffPayment = $_POST['amountReceived'] - $sumTotal;
                        echo "<p style='color: green'>Change: $" . $diffPayment . "</p>";
                    }
                    else{
                        $diffPayment = $_POST['amountReceived'] - $total;
                        echo "<p style='color: red'>Payment insufficient by $" . $diffPayment . "</p>";
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
                <th>Pint</th>
                <?php
                    for ($i = 1; $i < count($drinkNames); $i++){
                        echo "<th>" . $drinkNames[$i] . "</th>";
                    }
                ?>
            </tr>
            <tr>
                <th>Amount &dollar;</th>
                <?php
                    //draft pint
                    if (isset($_COOKIE[$cookie_draft])){
                        $sumPint += $_COOKIE[$cookie_draft];
                        setcookie($cookie_draft, $sumPint);
                    }
                    else{
                        $sumPint = 0;
                        setcookie($cookie_draft, $sumPint);
                        $_COOKIE[$cookie_draft] = $sumPint;
                    }
                    //domestic beer
                    if (isset($_COOKIE[$cookie_domestic])){
                        $sumDomestic += $_COOKIE[$cookie_domestic];
                        setcookie($cookie_domestic, $sumDomestic);
                    }
                    else{
                        $sumDomestic = 0;
                        setcookie($cookie_domestic, $sumDomestic);
                        $_COOKIE[$cookie_domestic] = $sumDomestic;
                    }
                    //non-alcoholic drink
                    if (isset($_COOKIE[$cookie_nonAlc])){
                        $sumNonAlc += $_COOKIE[$cookie_nonAlc];
                        setcookie($cookie_nonAlc, $sumNonAlc);
                    }
                    else{
                        $sumNonAlc = 0;
                        setcookie($cookie_nonAlc, $sumNonAlc);
                        $_COOKIE[$cookie_nonAlc] = $sumNonAlc;
                    }
                    //liquor
                    if (isset($_COOKIE[$cookie_liquor])){
                        $sumLiquor += $_COOKIE[$cookie_liquor];
                        setcookie($cookie_liquor, $sumLiquor);
                    }
                    else{
                        $sumLiquor = 0;
                        setcookie($cookie_liquor, $sumLiquor);
                        $_COOKIE[$cookie_liquor] = $sumLiquor;
                    }
                    //House wine
                    if (isset($_COOKIE[$cookie_hwine])){
                        $sumHWine += $_COOKIE[$cookie_hwine];
                        setcookie($cookie_hwine, $sumHWine);
                    }
                    else{
                        $sumHWine = 0;
                        setcookie($cookie_hwine, $sumHWine);
                        $_COOKIE[$cookie_hwine] = $sumHWine;
                    }
                    //Premium wine
                    if (isset($_COOKIE[$cookie_pwine])){
                        $sumPWine += $_COOKIE[$cookie_pwine];
                        setcookie($cookie_pwine, $sumPWine);
                    }
                    else{
                        $sumPWine = 0;
                        setcookie($cookie_pwine, $sumPWine);
                        $_COOKIE[$cookie_pwine] = $sumPWine;
                    }
                    //Single malt 10
                    if (isset($_COOKIE[$cookie_singlemalt10])){
                        $sumSingleMalt10 += $_COOKIE[$cookie_singlemalt10];
                        setcookie($cookie_singlemalt10, $sumSingleMalt10);
                    }
                    else{
                        $sumSingleMalt10 = 0;
                        setcookie($cookie_singlemalt10, $sumSingleMalt10);
                        $_COOKIE[$cookie_singlemalt10] = $sumSingleMalt10;
                    }
                    //Single malt 15
                    if (isset($_COOKIE[$cookie_singlemalt15])){
                        $sumSingleMalt15 += $_COOKIE[$cookie_singlemalt15];
                        setcookie($cookie_singlemalt15, $sumSingleMalt15);
                    }
                    else{
                        $sumSingleMalt15 = 0;
                        setcookie($cookie_singlemalt15, $sumSingleMalt15);
                        $_COOKIE[$cookie_singlemalt15] = $sumSingleMalt15;
                    }
                    //Juice
                    if (isset($_COOKIE[$cookie_juice])){
                        $sumJuice += $_COOKIE[$cookie_juice];
                        setcookie($cookie_juice, $sumJuice);
                    }
                    else{
                        $sumJuice = 0;
                        setcookie($cookie_juice, $sumJuice);
                        $_COOKIE[$cookie_juice] = $sumJuice;
                    }
                    //Pop
                    if (isset($_COOKIE[$cookie_pop])){
                        $sumPop += $_COOKIE[$cookie_pop];
                        setcookie($cookie_pop, $sumPop);
                    }
                    else{
                        $sumPop = 0;
                        setcookie($cookie_pop, $sumPop);
                        $_COOKIE[$cookie_pop] = $sumPop;
                    }

                    $drinkSums = array($sumPint, $sumDomestic, $sumNonAlc, $sumLiquor, 
                    $sumHWine, $sumPWine, $sumSingleMalt10, $sumSingleMalt15, $sumJuice, $sumPop);

                    foreach($drinkSums as $value){
                        echo "<td>" . $value . "</td>";
                    }
                ?>
            </tr>
            <tr>
                    <th>Quantity</th>
                    <?php
                        for ($i = 0; $i < count($prices); $i++){
                            echo "<td>" . $drinkSums[$i]/$prices[$i] . "</td>";
                        }
                    ?>
            </tr>
        </table>

        <?php
            if (isset($_COOKIE[$cookie_sales])){
                $sumTotalSales = $_COOKIE[$cookie_sales] + $sumTotal;
                setcookie($cookie_sales, $sumTotalSales);
            }
            else{
                $sumTotalSales = 0;
                setcookie($cookie_sales, $sumTotalSales);
                $_COOKIE[$cookie_sales] = $sumTotalSales;
            }
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
            setcookie($cookie_draft, 0);
            setcookie($cookie_domestic, 0);
            setcookie($cookie_nonAlc, 0);
            setcookie($cookie_liquor, 0);
            setcookie($cookie_hwine, 0);
            setcookie($cookie_pwine, 0);
            setcookie($cookie_singlemalt10, 0);
            setcookie($cookie_singlemalt15, 0);
            setcookie($cookie_juice, 0);
            setcookie($cookie_pop, 0);
            setcookie($cookie_sales, 0);
        }
        echo "<p class='resetNote'>Please click the Reset button <span class='italic'>twice</span> to comfirm data reset</p>";
        echo "<p id='count'></p>"

    ?>
    <footer>
        <p>&copy; Built and Designed by Helen Tran</p>
    </footer>
</body>
</html>