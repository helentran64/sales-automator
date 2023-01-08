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
                <label for="pint">(&dollar;8) Draft Pint: </label>
                <input type="number" id="pint" name="pint">
                <br>
                <label for="domestic">(&dollar;7) Domestic bottle: </label>
                <input type="number" id="domestic" name="domestic">
                <br>
                <label for="nonalc">(&dollar;6) Non-alcoholic: </label>
                <input type="number" id="nonalc" name="nonalc">
                <br>
                <label for="liquor">(&dollar;10) Liquor: </label>
                <input type="number" id="liquor" name="liquor">
                <br>
                <label for="hwine">(&dollar;10) House wine: </label>
                <input type="number" id="hwine" name="hwine">
                <br>
                <label for="pwine">(&dollar;12) Premium wine: </label>
                <input type="number" id="pwine" name="pwine">
                <br>
                <label for="malt10">(&dollar;20) Single malt (10 years): </label>
                <input type="number" id="malt10" name="malt10">
                <br>
                <label for="malt15">(&dollar;25) Single malt (15 years): </label>
                <input type="number" id="malt15" name="malt15">
                <br>
                <label for="juice">(&dollar;6) Juice: </label>
                <input type="number" id="juice" name="juice">
                <br>
                <label for="pop">(&dollar;4) Pop: </label>
                <input type="number" id="pop" name="pop">
                <br>
                <hr>
                <label for="amountReceived">Amount received: </label>
                <input type="number" id="amountReceived" name="amountReceived">
                <br>
                <div id="submitButton">
                    <input type="submit" id="button" name="submit" value="Submit">
                </div>
            </form>
        </div>
        <div id="calculation">
            <?php
                $costPint = 8;
                $costDomestic = 7;
                $costNonAlc = 6;
                $costLiquor = 10;
                $costHWine = 10;
                $costPWine = 12;
                $costSingleMalt10 = 20;
                $costSingleMalt15 = 25;
                $costJuice = 6;
                $costPop = 4;
                $sumTotal = 0;
                $sumTotalSales = 0;

                if (isset($_POST['submit'])) {
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
                    $diffPint = $_POST['amountReceived'] - $sumTotal;
                    echo "<p style='color: green'>Change: $" . $diffPint . "</p>";
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
                <th>Domestic Bottle</th>
                <th>Non-alcoholic</th>
                <th>Liquor</th>
                <th>House wine</th>
                <th>Premium wine</th>
                <th>Single malt (10 years)</th>
                <th>Single malt (15 years)</th>
                <th>Juice</th>
                <th>Pop</th>
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

                    echo "<td>" . $sumPint . "</td>";
                    echo "<td>" . $sumDomestic . "</td>";
                    echo "<td>" . $sumNonAlc . "</td>";
                    echo "<td>" . $sumLiquor . "</td>";
                    echo "<td>" . $sumHWine . "</td>";
                    echo "<td>" . $sumPWine . "</td>";
                    echo "<td>" . $sumSingleMalt10 . "</td>";
                    echo "<td>" . $sumSingleMalt15 . "</td>";
                    echo "<td>" . $sumJuice . "</td>";
                    echo "<td>" . $sumPop . "</td>";
                ?>
            </tr>
            <tr>
                    <th>Quantity</th>
                    <?php
                    echo "<td>" . $sumPint/8 . "</td>";
                    echo "<td>" . $sumDomestic/7 . "</td>";
                    echo "<td>" . $sumNonAlc/6 . "</td>";
                    echo "<td>" . $sumLiquor/10 . "</td>";
                    echo "<td>" . $sumHWine/10 . "</td>";
                    echo "<td>" . $sumPWine/12 . "</td>";
                    echo "<td>" . $sumSingleMalt10/20 . "</td>";
                    echo "<td>" . $sumSingleMalt15/25 . "</td>";
                    echo "<td>" . $sumJuice/6 . "</td>";
                    echo "<td>" . $sumPop/4 . "</td>";
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
            echo "<p style='text-align:center;'> Total: " . $sumTotalSales . "</p>";
        ?>
    </div>
    <footer>
        <p>&copy; Built and Designed by Helen Tran</p>
    </footer>
</body>
</html>