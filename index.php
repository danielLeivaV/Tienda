<?php
//desde interno
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">Logo de la empresa</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Carrito(0) <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Item 2</a>
                </li>
            </ul>
        </div>
    </nav>
    <br />
    <br />
    <div class="container">
        <br />
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
            <a href="#" class="badge badge-success">Ver carrito</a>


        </div>

        <div class="row">

            <?php
            $sentencia = $pdo->prepare("SELECT * FROM tblproductos ");
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            ?>

            <?php foreach ($listaProductos as $producto) { ?>
                <div class="col-3">
                    <div class="card">
                        <img title="<?php echo $producto['Nombre'];  ?>" alt="<?php echo $producto['Nombre'];  ?>" class="card-img-top" src="<?php echo $producto['Imagen']; ?>" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="<?php echo $producto['Descripcion']; ?>">
                        <div class="card-body">
                            <span><?php echo $producto['Nombre'];  ?></span>
                            <h5 class="card-title">U$s <?php echo $producto['Precio'];  ?></h5>
                            <p class="card-text">Descripcion</p>

                            <form action="" method="post">
                                <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                <input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY);  ?>">
                                <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY);  ?>">
                                <input type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                <button class="btn btn-primary" name="btnAction" value="Agregar" type="submit">
                                    Agregar al carrito
                                </button>

                            </form>


                        </div>
                    </div>

                </div>


            <?php } ?>


        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</body>

</html>