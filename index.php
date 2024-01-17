<?php

$ropani = $aana = $feet = $meter = $paisa = $daam = $bigha = $kattha = $dhur = "";

function ropaniSystem($feet) {

    $result = array("bigha" => 0, "kattha" => 0, "dhur" => 0); // Initialize result array

    if ($feet !== null && is_numeric($feet)) {
        

        // Convert feet to meter
        // $meter = $feet / 10.76;
        // echo "<p>{$feet} feet is equal to {$meter} meter.</p>";

        // Convert feet to bigha system
        // Convert feet to dhur
        $dhur = $feet /182.25;
        $dhur = round($dhur, 3);

        // Initialize to 0
        $kattha = 0;
        $bigha = 0;

        // for kattha
        while ($dhur >= 20) {
            $kattha += 1;   
            $dhur -= 20; // subtract 20 from $dhur
        }

        // for bigha
        while ($kattha >= 20) {
            $bigha += 1;
            $kattha -= 20; // subtract 20 from $kattha
        }

        $dhur=round($dhur, 3);

        echo "<p>{$feet} feet is equal to {$bigha} bigha, {$kattha} kattha, and {$dhur} dhur.</p>";

        // return array("bigha" => $bigha, "kattha" => $kattha, "dhur" => $dhur);
    }
    // return $result;
}

function bighaSystem($feet) {


    $result = array("ropani" => 0, "aana" => 0, "paisa" => 0, "daam" => 0); // Initialize result array

    if ($feet !== null && is_numeric($feet)) {

        // Convert feet to meter
        // $meter = $feet / 10.76;
        // echo "<p>{$feet} feet is equal to {$meter} meter.</p>";

        // Convert feet to daam
        $daam = $feet /21.39;
        $daam = round($daam, 3);

        // Initialize to 0
        $paisa = 0;
        $aana = 0;
        $ropani = 0;

        // for paisa
        while ($daam >= 4) {
            $paisa += 1;
            $daam -= 4; // subtract 4 from $daam
        }

        // for aana
        while ($paisa >= 4) {
            $aana += 1;
            $paisa -= 4; // subtract 4 from $paisa
        }

        // for ropani
        while ($aana >= 16) {
            $ropani += 1;
            $aana -= 16; // subtract 16 from $aana
        }
        $daam=round($daam, 3);

        echo "<p>{$feet} feet is equal to {$ropani} ropani, {$aana} aana, {$paisa} paisa, and {$daam} daam.</p>";


        // return array("ropani" => $ropani, "aana" => $aana, "paisa" => $paisa, "daam" => $daam);
    }
    else{
        echo"error";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit"])) {
    
        $ropani = isset($_POST["ropani"]) ? $_POST["ropani"] : null;
        $feet = isset($_POST["feet"]) ? $_POST["feet"] : null;
        $meter = isset($_POST["meter"]) ? $_POST["meter"] : null;
        $aana = isset($_POST["aana"]) ? $_POST["aana"] : null;
        $paisa = isset($_POST["paisa"]) ? $_POST["paisa"] : null;
        $daam = isset($_POST["daam"]) ? $_POST["daam"] : null;


        // feet to other system

        if ($feet !== null && is_numeric($feet)) {
                // Convert feet to meter
        (float)$meter = (float)$feet *0.092903 ;
        
        $meter=round($meter, 2);

            echo "<p>{$feet} feet is equal to {$meter} meter.</p>";
        
            bighaSystem($feet);
            ropaniSystem($feet);
        }else{

            // Initialize $feet to 0
            $feet = 0;

            // Check if Ropani is not empty
            if (!empty($_POST["ropani"])) {
                $ropani = $_POST["ropani"];
                // Convert Ropani to square feet and add to $feet
                $feet += (float)$ropani * 5476;
            }
            
            // Check if Aana is not empty
            if (!empty($_POST["aana"])) {
                $aana = $_POST["aana"];
                // Convert Aana to square feet and add to $feet
                $feet += (float)$aana * 342.295;
            }
            
            // Check if Paisa is not empty
            if (!empty($_POST["paisa"])) {
                $paisa = $_POST["paisa"];
                // Convert Paisa to square feet and add to $feet
                $feet += (float)$paisa * 85.574;
            }
            
            // Check if Daam is not empty
            if (!empty($_POST["daam"])) {
                $daam = $_POST["daam"];
                // Convert Daam to square feet and add to $feet
                $feet += (float)$daam * 21.420;
            }
            
            // At this point, $feet contains the sum of square feet from Ropani, Aana, Paisa, and Daam
            
            // Output the total square feet
        $feet=round($feet, 3);

            echo "<p>Total Square Feet: {$feet}</p>";
            // Convert feet to meter
        (float)$meter = (float)$feet *0.092903 ;
        // $meter = $feet / 10.76;
        $meter=round($meter, 2);

        echo "<p>{$feet} feet is equal to {$meter} meter.</p>";


            ropaniSystem($feet);



            // Check if bigha is not empty
            if (!empty($_POST["bigha"])) {
                $bigha = $_POST["bigha"];
                // Convert bigha to square feet and add to $feet
                $feet += (float)$bigha * 72900.589;
            }
            
            // Check if kattha is not empty
            if (!empty($_POST["kattha"])) {
                $kattha = $_POST["kattha"];
                // Convert kattha to square feet and add to $feet
                $feet += (float)$kattha * 3645.013;
            }
            
            // Check if dhur is not empty
            if (!empty($_POST["dhur"])) {
                $dhur = $_POST["dhur"];
                // Convert dhur to square feet and add to $feet
                $feet += (float)$dhur * 182.25;
            }
            
            
            
            // Output the total square feet
            echo "<p>Total Square Feet: {$feet}</p>";
            // Convert feet to meter
        (float)$meter = (float)$feet *0.092903 ;
        // $meter = $feet / 10.76;
        $meter=round($meter, 2);

        echo "<p>{$feet} feet is equal to {$meter} meter.</p>";


            bighaSystem($feet);

            // Check if the result is not empty before using the values
            if (!empty($result)) {
            $bigha = $result["bigha"];
            $kattha = $result["kattha"];
            $dhur = $result["dhur"];
            }

    }
 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 

</head>
<body>

    <form action=""method="post">
        <div class="container">
    <h1>Land Converter</h1>
            <h3>Ropani System</h3>
            <div class="form-group">
                <label for="Ropani">Ropani:</label>
                <input type="number" class="form-control"placeholder="Ropani" name="ropani" value="<?php echo $ropani; ?>">
            </div>
            <div class="form-group">
                <label for="Aana">Aana: </label>
                <input type="number" class="form-control"placeholder="Aana" name="aana" value="<?php echo $aana; ?>">
            </div>
            <div class="form-group">
                <label for="paisa">Paisa:</label>
                <input type="number" class="form-control"placeholder="Paisa" name="paisa" value="<?php echo $paisa; ?>">
            </div>
            <div class="form-group">
                <label for="Daam">Daam:</label>
                <input type="number" class="form-control" placeholder="Daam" name="daam" value="<?php echo $daam; ?>">
            </div>
            <br>
    
            <h3>Bigha System</h3>
            <div class="form-group">
                <label for="Bigha">Bigha: </label>
                <input type="number" class="form-control" placeholder="Bigha" name="bigha" value="<?php echo $bigha; ?>">
            </div>
            
            <div class="form-group">
                <label for="kattha">Kattha: </label>
                <input type="number" class="form-control" placeholder="Kattha" name="kattha" value="<?php echo $kattha; ?>">
            </div>
    
            <div class="form-group">
                <label for="dhur">Dhur: </label>
                <input type="number" class="form-control" placeholder="Dhur" name="dhur" value="<?php echo $dhur; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-danger">Convert</button>

    
            <h3>Square Feet </h3>
            <div class="result-section">
                <label for="sq.feet">Square Feet: </label>
                <input type="text" class="form-contrl" placeholder="sq. feet" name="feet" value="<?php echo $feet; ?>">
            <h3>Square Meter </h3>
                <label for="sq.meter">Square Meter: </label>
                <input type="text" placeholder="sq. meter" name="meter" value="<?php echo $meter; ?>">
            </div>
            <br>
        </div>
    
        </form>

</body>
</html>
