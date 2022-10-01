<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        .seccion1{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #d1d1d1;
            height: 50vh;
        }
        .seccion1 h1{
            font-size: 3rem;
            color: #000;
            margin-bottom: 1rem;
        }
        .seccion1 p{
            font-size: 1.5rem;
            color: #000;
            margin-bottom: 1rem;
            text-align: center;
        }

        a{
            padding: 1rem 2rem;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.5rem;
            cursor: pointer;
            text-decoration: none;
        }
        a:hover{
            background-color: #fff;
            color: #000;
        }

        .seccion2{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            height: 50vh;
        }
        .seccion2 h1{
            font-size: 3rem;
            color: #000;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .seccion2  a{
            padding: 1rem 2rem;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.5rem;
            cursor: pointer;
            text-decoration: none;
        }
        .seccion2 a:hover{
            background-color: #d1d1d1;
            color: #000;
        }


    </style>
</head>
<body>
    <div class="seccion1">
        <h1>Gracias por Reservar con Nosotros</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam doloribus corporis cumque at qui necessitatibus ipsam atque distinctio reprehenderit molestiae quibusdam delectus, harum, impedit sit dolorum ut odio assumenda! Aspernatur!</p>
        <div>
            <br>
            <a href="tel:12345679" type="button">Llamar 123456789</a>
        </div>
    </div>
    <div class="seccion2">
        <h1>Nos contactaremos pronto contigo</h1>
        <div>
            <a href="./home.php"><img src="#" alt="">Ir al Home</a>
            <a href="https://web.whatsapp.com/"><img src="#" alt="">Whatsapp</a>
        </div>
    </div>
</body>
</html>