<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/scripts/redirect2.js"></script>
        <script src="/scripts/select.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <p class="navbar-brand">product add</p>
                <form method="post" action="" class="form-inline" id="test2">
                  <button class="btn btn-outline-success my-2 my-sm-0" id="add_button" type="submit">Save</button>
                  <button class="btn btn-outline-success my-2 my-sm-0" id="cancel_button" type="reset">Cancel</button>
                </form>
            </nav>
            <hr>
	    <div>
	        <label>SKU <input  placeholder="enter the sku of product" type="text" name="sku" id="sku" form="test2" required pattern="[A-Za-z0-9]{2,20}"> (must be unique)</label>
	    </div>
	    <div>
	        <label>Name <input placeholder="enter the name of product" type="text" name="name" id="name" form="test2" required pattern="[A-Za-z]{2,20}"></label>
	    </div>
	    <div>
	        <label>Price($) <input placeholder="enter the price of product" type="text" name="price" id="price" form="test2" pattern="\d+(\.\d{2})?" required></label>
	    </div>
	    <div>
	        <label>Product type <select id="productType" name="type" form="test2" required>
	            <option value="" selected>...</option>
	            <option value="DVD">DVD</option>
	            <option value="Book">Book</option>
	            <option value="Furniture">Furniture</option>
	        </select></label>
	    </div>
	    <div>
	    <div id="DVD" style="display:none;">
	        <label>Size(MB) <input placeholder="enter the disk space value in megabytes" type="text" name="size" form="test2" id="size" pattern="[0-9]{3,10}"></label>
	    </div>
	    <div id="Book" style="display:none;">
	        <label>Weight(KG) <input placeholder="enter the weight of the book in kg" type="text" id="weight" form="test2" name="weight" pattern="\d+(\.\d{2})?"></label>
	    </div>
	    <div id="Furniture" style="display:none;">
	        <div>
	            <label>Height(CM) <input placeholder="enter the height of furniture in cm" type="text" name="height" form="test2" id="height" pattern="\d+(\.\d{2})?"></label>
	        </div>
	        <div>
	            <label>Width(CM) <input placeholder="enter the width of furniture in cm" type="text" id="width" form="test2" name="width" pattern="\d+(\.\d{2})?"></label>
	        </div>
	        <div>
	            <label>Length(CM) <input placeholder="enter the length of furniture in cm" type="text" id="length" form="test2" name="length" pattern="\d+(\.\d{2})?"></label>
	        </div>
	    </div>
	    <div id="error"></div>
	    <div id="success"></div>          
            <hr>
            <p class="d-flex justify-content-center">test assigment</p>
        </div>
        <script src="/scripts/add.js"></script> 
    </body>
</html>