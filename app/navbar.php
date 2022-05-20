<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Scripts/navbar.css">
</head>

<body>

    <button id="button"> &#x2630;</button>

    <nav id="nav">
        <ul>
        <   <li><a href="index.php">Home</a></li>
            <li><a href="signup.php" target="_blank">SignUp</a></li>
            <li><a href="loginM.php" target="_blank">Login</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>




    <script>

        const btn = document.getElementById('button');
        const nav = document.getElementById('nav');

        btn.addEventListener('click', () => {

            nav.classList.toggle('active');
            btn.classList.toggle('active');

        })

       
        
        



    </script>

</body>

</html>