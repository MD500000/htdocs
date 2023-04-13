<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="JS/main.js?version=2"></script> 
    <title>Product list</title>
</head>
<body>






<div class="main-navbar">

    <div>

       <h1> Product List </h1>

    </div>

    <div>
    
     

       <button id="AddButton">ADD</button>


       <button id="delete-product-btn">MASS DELETE</button>


    </div>

</div>



<hr>



<div class='DisplayForm'>



<?php include 'display.php';
?>


</div>




<hr>


<p class="scandiweb-p">Scandiweb Test Assignment </p>





    
</body>
</html>