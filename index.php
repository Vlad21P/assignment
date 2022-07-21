<?php
session_start();
require_once 'php/classes/Product.php';
require_once 'php/classes/ProductAppearance.php';

$appearance = new ProductAppearance();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/scripts/redirect1.js"></script>
    </head>
    <body>
        <div class="container">
            <form id="test" method="POST" action="">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <p class="navbar-brand">product list</p>
                <div class="form-inline">
                  <button class="btn btn-outline-success my-2 my-sm-0" id="add_but" type="button">ADD</button>
                  <button class="btn btn-outline-success my-2 my-sm-0" id="delete-product-btn" type="submit">MASS DELETE</button>
                </div>
            </nav>
            <hr>
            <div class="row">
                <?php
                if ($appearance->select()) :
                    foreach ($_SESSION['products'] as $i => $v) :
                ?>
                <div class="col-sm-3">
                    <div class="card text-center">
                        <div class="form-check text-left">
                            <input type="checkbox" name="d<?=$i?>" value="<?=$v['sku']?>" class="form-check-input delete-checkbox dvd">
                            <br/>
                        </div>
                        <div class="card-block">
                            <p class="card-text"><?= $v['sku'].'<br/>'.$v['name'].'<br/>'.$v['price'] ?></p>
                            <p class="card-text"><small class="text-muted"><?=$v['size'].$v['weight'].$v['height'].$v['width'].$v['length']?></small></p>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <hr>
            <p class="d-flex justify-content-center">test assigment</p>
            </form>
        </div>
        <script src="/scripts/delete.js"></script>
    </body>
</html>

