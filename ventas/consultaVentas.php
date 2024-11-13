<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');


include ('../app/controllers/ventas/listado_de_ventas.php');
include ('../app/controllers/clientes/listado_de_clientes.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Ventas realizadas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ventas registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro de venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Cliente</center></th>
                                        <th><center>Total Pagado</center></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($ventas_datos as $ventas_datos){
                                        $id_venta = $ventas_datos['id_venta']; 
                                        $id_cliente = $ventas_datos['id_cliente']; 
                                        $contador = $contador +1;
                                        ?>                                        
                                        <tr>
                                            <td><center><?php echo $contador;?></center></td>
                                            <td><center><?php echo $ventas_datos['nro_venta'];?></center></td>
                                            <td>
                                                <center>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_productos<?php echo $id_venta;?>">
                                                Productos
                                                </button>

                                                    <!-- Modal -->
                                                <div class="modal fade" id="Modal_productos<?php echo $id_venta;?>" tabindex="-1" role="dialog"             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Productos de la venta <?php echo $ventas_datos['nro_venta'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="table-responsive">
                                                            <table class="table table-bordered table-sm table-hover table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="background-color: #e7e7e7; text-align: center">Nro.</th>
                                                                        <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                                                        <th style="background-color: #e7e7e7; text-align: center">Descripción</th>
                                                                        <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                                                        <th style="background-color: #e7e7e7; text-align: center">Precio Unitario</th>
                                                                        <th style="background-color: #e7e7e7; text-align: center">Subtotal</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php

                                                                $contador_de_carrito= 0;
                                                                $cantidad_total=0;
                                                                $precio_unitario_total=0;
                                                                $precio_total = 0;

                                                                $nro_venta = $ventas_datos['nro_venta'];
                                                                $sql_carrito = "SELECT *,pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta, pro.stock as stock, pro.id_producto as id_producto FROM tb_carrito AS carr INNER JOIN tb_almacen AS pro ON carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta' ";
                                                                $query_carrito = $pdo->prepare($sql_carrito);
                                                                $query_carrito->execute();
                                                                $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach($carrito_datos as $carrito_dato) {
                                                                    $id_carrito =$carrito_dato['id_carrito'];
                                                                    $contador_de_carrito= $contador_de_carrito +1;
                                                                    $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                                                    $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
                                                                    ?>
                                                                    
                                                                    <tr>
                                                                    <td>
                                                                        <center><?php echo $contador_de_carrito;?></center>
                                                                        <input type="text" value="<?php echo $carrito_dato['id_producto'];?>" id="id_producto<?php echo $contador_de_carrito;?>" hidden>
                                                                    </td>
                                                                    <td><center><?php echo $carrito_dato['nombre_producto'];?></center></td>
                                                                    <td><center><?php echo $carrito_dato['descripcion'];?></center></td>
                                                                    <td>
                                                                        <center><span id="cantidad_carrito<?php echo $contador_de_carrito?>"><?php echo $carrito_dato['cantidad'];?></span></center>
                                                                        <input type="text" value="<?php echo $carrito_dato['stock']; ?>" id="stock_de_inventario<?php echo $contador_de_carrito;?>" hidden>
                                                                    </td>
                                                                    <td><center><?php echo $carrito_dato['precio_venta'];?></center></td>
                                                                    <td>
                                                                        <center>
                                                                        <?php 
                                                                        $cantidad =floatval($carrito_dato['cantidad']);
                                                                        $precio_venta = floatval($carrito_dato['precio_venta']);
                                                                        echo $subtotal = $cantidad * $precio_venta;
                                                                        $precio_total=$precio_total+$subtotal;
                                                                        ?>
                                                                        </center>
                                                                    </td>
                                                                    
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                                    <tr>
                                                                        <th colspan="3" style="background-color: #e7e7e7; text-align: center">Total</th>
                                                                        <th><center><?php echo $cantidad_total;?></center></th>
                                                                        <th><center><?php echo $precio_unitario_total?></center></th>
                                                                        <th style="background-color: yellow;"><center><?php echo $precio_total?></center></th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_clientes<?php echo   $id_venta;?>">
                                                    <?php echo $ventas_datos["nombre_cliente"];?>
                                                    </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modal_clientes<?php echo   $id_venta;?>">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #ffc107; color: black">
                                                                    <h4 class="modal-title">Clientes </h4> 

                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <?php
                                                                   $sql_clientes = "SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente'";
                                                                   $query_clientes = $pdo->prepare($sql_clientes);
                                                                   $query_clientes->execute();
                                                                   $clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach($clientes_datos as $clientes_dato){
                                                                        $nombre_cliente = $clientes_dato['nombre_cliente'];
                                                                        $nit_ci_cliente = $clientes_dato['nit_ci_cliente'];
                                                                        $celular_cliente = $clientes_dato['celular_cliente'];
                                                                        $email_cliente = $clientes_dato['email_cliente'];
                                                                    }
                                                                ?>
                                                                <div class="modal-body">
                                                                    
                                                                        <div class="form-group">
                                                                        <label for="">Nombre del cliente</label>
                                                                        <input type="text" value= "<?php echo $nombre_cliente; ?>" name="nombre_cliente" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label for="">Documento del cliente</label>
                                                                        <input type="text" value= "<?php echo $nit_ci_cliente; ?>" name="nit_ci_cliente" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label for="">Celular del cliente</label>
                                                                        <input type="text" value= "<?php echo $celular_cliente; ?>" name="celular_cliente" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label for="">Correo del cliente</label>
                                                                        <input type="email" value= "<?php echo $email_cliente; ?>" name="email_cliente" class="form-control" disabled>
                                                                        </div>
                                                                        
                                                                    
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center><button class="btn btn-primary" disabled><?php echo "$".$ventas_datos['total_pagado'];?></button></center>
                                            </td>
                                            <td>
                                                
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</script>
