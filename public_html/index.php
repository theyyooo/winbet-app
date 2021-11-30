<?php

session_start();

/**
 * Controllers imports
 */
require_once '../src/Controllers/SportController.php';
require_once '../src/Controllers/BetController.php';
require_once '../src/Controllers/AuthController.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WinBet | Pari sportifs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script defer src="/script.js"></script>
    <link href="/css/styles.css" rel="stylesheet">
</head>

<body>

    <?php

    if (isset($_SERVER["PATH_INFO"])) {
        $path = trim($_SERVER["PATH_INFO"], "/");
    } else {
        $path = "";
    }

    $fragments = explode("/", $path);

    $control = array_shift($fragments);

    switch ($control) {
        case '': {
                call_user_func_array(["SportController", "display"], $fragments);
                break;
            }
        case "sport": {
                call_user_func_array(["SportController", "displaySport"], $fragments);
                break;
            }
        case "user": {
                userRoutes_get($fragments);
                break;
            }
        case "bet": {
                call_user_func_array(["BetController", "createBet"], $fragments);
                break;
            }
        default: {
                call_user_func_array(["PageController", "notFound"], $fragments);
                break;
            }
    }

    function sportRoutes_get($fragments)
    {

        $action = array_shift($fragments);

        switch ($action) {
            case '': {
                    call_user_func_array(["SportController", "displaySport"], $fragments);
                    break;
                }
            default: {
                    call_user_func_array(["SportController", "displaySportByCompetition"], $fragments);
                    break;
                }
        }
    }

    function userRoutes_get($fragments)
    {

        $action = array_shift($fragments);

        switch ($action) {
            case "signup": {
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        call_user_func_array(["AuthController", "displaySignup"], $fragments);
                    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        call_user_func_array(["AuthController", "actionSignup"], $fragments);
                    }
                    break;
                }
            case "login": {
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        call_user_func_array(["AuthController", "displayLogin"], $fragments);
                    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        call_user_func_array(["AuthController", "actionLogin"], $fragments);
                    }
                    break;
                }
            case "bets": {
                    call_user_func_array(["AuthController", "displayBets"], $fragments);
                    break;
                }
            case "logout": {
                    call_user_func_array(["AuthController", "actionLogout"], $fragments);
                    break;
                }
            default: {
                    call_user_func_array(["PageController", "notFound"], $fragments);
                    break;
                }
        }
    }

    ?>

</body>

</html>