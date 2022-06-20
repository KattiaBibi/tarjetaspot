<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    iframe {
      border-radius: 10px;
      height: 700px;
      width: 500px;
    }


    .contenedor {
    margin: 2rem auto;
    border: 1px solid #aaa;
    height: 300px;
    width:90%;
    max-width: 400px;
    background: #f1f2f3;
    overflow:auto;
    box-sizing: border-box;
    padding:0 1rem;
}

/* Estilos para motores Webkit y blink (Chrome, Safari, Opera... )*/

.contenedor::-webkit-scrollbar {
    -webkit-appearance: none;
}

.contenedor::-webkit-scrollbar:vertical {
    width:10px;
}

.contenedor::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
    display: none;
} 

.contenedor::-webkit-scrollbar:horizontal {
    height: 10px;
}

.contenedor::-webkit-scrollbar-thumb {
    background-color: #797979;
    border-radius: 20px;
    border: 10px solid #f1f2f3;
}

.contenedor::-webkit-scrollbar-track {
    border-radius: 10px;  
}

  </style>
</head>

<body>        
  <iframe src="http://tarjetaspot.local/compusistel/bibiana-cruzado" frameborder="0" class="contenedor"></iframe>
</body>

</html>