<?php

require_once __DIR__.'/functions.php';

session_start();

$password = '';
$password_length = isset($_GET['password-length']) ? $_GET['password-length'] : 0;
$repeat = isset($_GET['repeat']) ? $_GET['repeat'] : 1;
$characters = isset($_GET['characters']) ? $_GET['characters'] : [];

if(!empty($password_length)){

    $password = generatePassword($password_length, $repeat, $characters);
    $_SESSION['password'] = $password;
    header('location: ./result.php'); 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Password Generator</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Password Generator</h1>
        <form action="index.php" method="GET">
            <div class="mb-3">
                <label for="password-length" class="form-label">Password Length</label>
                <input type="number" value="<?php echo $password_length; ?>" name="password-length" class="form-control" id="password-length" min="8" max="24">
            </div>
            <hr>
            <h3>Scegli i caratteri</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="characters[]" value="a">
                <label class="form-check-label" for="flexCheckDefault">
                    Lettere Maiuscole
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="characters[]" value="b">
                <label class="form-check-label" for="flexCheckChecked">
                        Lettere Minuscole
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="characters[]" value="c">
                <label class="form-check-label" for="flexCheckChecked">
                        Numeri
                </label>
            </div>
             <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="characters[]" value="d">
                <label class="form-check-label" for="flexCheckChecked">
                        Caratteri Speciali
                </label>
            </div>
            <hr>
            <h3>Ripeti caratteri</h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="repeat" id="flexRadioDefault1" value="0">
                <label class="form-check-label" for="flexRadioDefault1">
                Non ripetere caratteri
                </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="repeat" id="flexRadioDefault2" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Ripeti caratteri
            </label>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Genera</button>
        </form>
    </div>
</body>
</html>