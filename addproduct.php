<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <?php 
    include 'database.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="JS/main.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>


<form action="database.php" method="post" id="product_form">

<div class="main-navbar">

    <div>

       <h1> Product Add </h1>

    </div>

    <div>
    
     

       <input type ="submit" name = "Save" value="Save" style="margin-right:10px;">


       <button type="button" onclick="location.href='index.php'">Cancel</button>

    </div>




</div>

<hr>


<div>

    <div class="MainForm">


        <label for ="sku">SKU</label>
        <input type="textbox" id="sku" name="sku">
    
        <label for="Name">Name</label>
        <input type="textbox" id="name" name="name">

        <label for="Price">Price ($)</label>
        <input type="textbox" id="price" name="price">

    </div>




    <div class="dropdown" id="dropdown">



        <label for="TypeDropDown">Type Switcher</label>
        <select name="productType" id="productType">

            <option value="" selected="selected" hidden="hidden">Type Switcher</option>
            <option value="DVD" name="dvd">DVD</option>
            <option value="Furniture" name="furniture">Furniture</option>
            <option value="Book" name="book">Book</option>

        </select>

    </div>


    <div class="size-weight" id="DVDForm">


        <label for="size">Size (MB)</label>

        <input type="textbox" id="size" name="size">
    

    </div>

    <p id="DVDdesc">**Please specify the DVD size in MB</p>

    <div class="MainForm" id="FurnitureForm">

        <label for ="height">Height (CM)</label>
        <input type="textbox" id="height" name="height">

        <label for="width">Width (CM)</label>
        <input type="textbox" id="width" name="width">

        <label for="length">Length (CM) </label>
        <input type="textbox" id="length" name="length">

    </div>


    
    <p id="FurnitureDesc">**Please specify the product dimensions in CM</p>


    <div class="size-weight" id="BookForm">

        <label for="Weight">Weight (KG)</label>
        <input type="textbox" id="weight" name="weight">

    </div>


    <p id="BookDesc">**Please specify the book weight in KG</p>


</div>

</form>






<hr>

<p class="scandiweb-p">Scandiweb Test Assignment </p>


    
</body>
</html>