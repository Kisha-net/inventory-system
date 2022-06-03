<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/navbar.css"> -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/base.css">
</head>
<body>
    <?php
        // if (isset($_GET["error"])) {
        //     echo '
        //         <div class="alert alert-danger" role="alert">'.$_GET["error"].'</div>';
        // }else if (isset($_GET["error"])) {
        //     echo '
        //         <div class="alert alert-danger" role="alert">'.$_GET["error"].'</div>';
        // }
        

        if (isset($_GET["error"])){
            if($_GET["error"] == "Duplicate email"){
                echo '
                <div class="alert alert-danger" role="alert">'.$_GET["error"].'</div>';
            }else if($_GET["error"] == "Incorrect Password"){
                echo '
                <div class="alert alert-danger" role="alert">'.$_GET["error"].'</div>';
        }else if($_GET["error"] == "unknown user"){
            echo '
            <div class="alert alert-danger" role="alert">'.$_GET["error"].'</div>';
        }
    }
    ?>