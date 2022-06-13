<head>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<section class="container-fluid bg row justify-content-center format"> 
    <?php
    
        if (isset($_GET["error"])){
            echo '
                <div class="alert alert-danger" role="alert">'.$_GET["error"].'</div>';
        }

        if (isset($_GET["success"])){
            echo '
                <div class="alert alert-success" role="alert">'.$_GET["success"].'</div>';
        }


        // session_start();

    
    ?>