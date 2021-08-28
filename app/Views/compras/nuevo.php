<?php $id_compra = uniqid(); ?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"><?php echo $titulo; ?></h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <!-- <a href="#" class="btn btn-sm btn-neutral">New</a>  -->
                    <a href="<?php echo base_url() . '/compras'; ?>" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i> Compras</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <form method="POST" id="form_compra" name="form_compra" action="<?php echo base_url(); ?>/compras/guarda" autocomplete="off">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" id="id_proveedor" name="id_proveedor" class="id_proveedor" value="1">
                                            <label for="proveedor"></label>
                                            <input class="form-control form-control-sm" id="proveedor" name="proveedor" type="text" placeholder="Proveedor en general" value="Proveedor en general" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="wp"></label>
                                            <input class="form-control form-control-sm" id="wp" name="wp" type="text" disabled placeholder="Whatsapp">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="correo"></label>
                                            <input class="form-control form-control-sm" id="correo" name="correo" type="text" disabled placeholder="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12  col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" id="id_producto" name="id_producto" />
                                            <input type="hidden" id="id_compra" name="id_compra" value="<?php echo $id_compra; ?>" />
                                            <label for="">Nombre de Producto</label>
                                            <input onkeyup="buscarProducto(event,this,id_producto.value)" placeholder="Escribe nombre producto" class="form-control" id="nombre" name="nombre" type="text" required>
                                            <label for="nombre" id="resultado_error" style="color: red"></label>
                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-4 col-md-3">
                                        <div class="form-group">
                                            <label for="">Precio de Compra</label>
                                            <input class="form-control" id="precio_compra" name="precio_compra" type="number" step="any" required disabled>
                                        </div>
                                    </div>
                                    <div class="col-5 col-sm-4 col-md-2">
                                        <div class="form-group">
                                            <label for="">Cantidad</label>
                                            <input onkeyup="subtotalProducto(event,this,this.value)" class="form-control" id="cantidad" name="cantidad" step="any" required>
                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-4 col-md-3">
                                        <div class="form-group">
                                            <label for="">Subtotal</label>
                                            <input class="form-control" id="subtotal" name="subtotal" type="number" step="any" required disabled>
                                        </div>
                                    </div>
                                </div>
                                <!-- ____Button Agregar____ -->
                                <button onclick="agregarProducto(id_producto.value,cantidad.value, '<?php echo $id_compra; ?>' )" id="agregar_producto" name="agregar_producto" type="button" class="btn btn-warning btn-sm mr-3 ml-auto">
                                <i class="fas fa-plus-circle"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>

                    <section class="container-fluid">
                        <table id="tablaProductos" class="table table-striped table-responsive table-sm ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th width="1%" scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="mt-3  text-center col-12 col-sm-12 col-md-3">
                                <div class="input-group input-group-sm ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Total $</span>
                                    </div>
                                    <input id="total" name="total" value="0.00" type="text" type="text" readonly="true" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-3 mb-3  col-12 col-sm-12 col-md-4">
                                <button type="button" id="completa_compra" name="completa_compra" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i>
                                    Completa compra
                                </button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->

<script src="<?php echo base_url(); ?>/public/assets/js/jquery.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/public/assets/js/jquery-ui.min.js" crossorigin="anonymous"></script>
<script>
    $("#proveedor").autocomplete({
        source: "<?php echo base_url() . '/proveedores/autocompleteData'; ?>",
        minLength: 3,
        select: function(event, ui) {
            event.preventDefault();
            $("#id_proveedor").val(ui.item.id);
            $("#proveedor").val(ui.item.value);
            $("#wp").val(ui.item.wp);
            $("#correo").val(ui.item.email);
        }
    });
    $("#nombre").autocomplete({
        source: "<?php echo base_url() . '/productos/autocompleteData'; ?>",
        minLength: 3,
        select: function(event, ui) {
            event.preventDefault();
            $("#id_producto").val(ui.item.id);
            $("#nombre").val(ui.item.value);
        }
    });
    var precio_compra;
    $(document).ready(function() {
        $("#completa_compra").click(function() {
            let nFila = $("#tablaProductos tr").length;
            if (nFila < 2) {

            } else {
                $("#form_compra").submit();
            }
        });

    });

    function buscarProducto(e, tagNombre, id_producto) {
        var enterkey = 13;
        if (nombre != '') {
            if (e.which == enterkey) {
                $.ajax({
                    url: '<?php echo base_url(); ?>/productos/buscarPorId/' + id_producto,
                    dataType: 'json',
                    success: function(resultado) {
                        if (resultado == 0) {
                            $(tagNombre).val('');
                        } else {
                            $(tagNombre).removeClass('has-error');
                            $('#resultado_error').html(resultado.error);
                            if (resultado.existe) {
                                $('#id_producto').val(resultado.datos.id);
                                $('#cantidad').val(1);
                                $('#precio_compra').val(resultado.datos.precio_compra);
                                $('#subtotal').val(resultado.datos.precio_compra);
                                $('#cantidad').focus();
                                precio_compra = resultado.datos.precio_compra;
                            } else {
                                $('#id_producto').val('');
                                $('#nombre').val('');
                                $('#cantidad').val('');
                                $('#precio_compra').val('');
                                $('#subtotal').val('');
                            }
                        }
                    }
                });
            }
        }
    }

    function agregarProducto(id_producto, cantidad, id_compra) {

        if (id_producto != null && id_producto != 0 && cantidad > 0) {
            $.ajax({
                url: '<?php echo base_url(); ?>/TemporalCompra/inserta/' + id_producto + "/" + cantidad + "/" + id_compra + "/compra",
                success: function(resultado) {
                    if (resultado == 0) {

                    } else {
                        var resultado = JSON.parse(resultado);
                        if (resultado.error == '') {
                            $("#tablaProductos tbody").empty();
                            $("#tablaProductos tbody").append(resultado.datos);
                            $("#total").val(resultado.total);
                            $('#nombre').val('');
                            $('#id_producto').val('');
                            $('#cantidad').val('');
                            $('#precio_compra').val('');
                            $('#subtotal').val('');

                        }
                    }
                }
            });
        }

    }

    function subtotalProducto(e, tagCantidad, cantidad) {
        var enterkey = 13;
        if (cantidad != '') {
            if (e.which == enterkey) {
                $('#subtotal').val(cantidad * precio_compra);
            }
        }
    }


    function eliminaProducto(id_producto, id_compra) {

        $.ajax({
            url: '<?php echo base_url(); ?>/TemporalCompra/eliminar/' + id_producto + "/" + id_compra + "/compra",
            dataType: 'json',
            success: function(resultado) {
                if (resultado == 0) {
                    $(tagNombre).val('');
                } else {
                    $("#tablaProductos tbody").empty();
                    $("#tablaProductos tbody").append(resultado.datos);
                    $("#total").val(resultado.total);
                }
            }
        });

    }
</script>