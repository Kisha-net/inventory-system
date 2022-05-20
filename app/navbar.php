<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>

    <button id="button"> &#x2630;</button>

    <nav id="nav">
        <ul>
        <   <li><a href="#">Home</a></li>
            <li><a href="#">SignUp</a></li>
            <li><a href="#">Login</a></li>
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