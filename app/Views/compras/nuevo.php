<?php $id_compra = uniqid(); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <form method="POST" id="form_compra" name="form_compra" action="<?php echo base_url(); ?>/compras/guarda" autocomplete="off">
                <div class="form-group">
                    <div class="row">
                        <!--__****FORMULARIO 1****__-->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    Compras
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-4 col-md-6">
                                                <input type="hidden" id="id_proveedor" name="id_proveedor" class="id_proveedor" value="1">
                                                <label for="proveedor"></label>
                                                <input class="form-control form-control-sm" id="proveedor" name="proveedor" type="text" placeholder="Proveedor en general" value="Proveedor en general" required>
                                                
                                            </div>
                                            <div class="col-sm-12 col-lg-4 col-md-6">
                                                <label for="wp"></label>
                                                <input class="form-control form-control-sm" id="wp" name="wp" type="text" disabled placeholder="Whatsapp">
                                            </div>
                                            <div class="col-sm-12 col-lg-4 col-md-6">
                                                <label for="correo"></label>
                                                <input class="form-control form-control-sm" id="correo" name="correo" type="text" disabled placeholder="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-4 col-md-6">
                                                <input type="hidden" id="id_producto" name="id_producto" />
                                                <input type="hidden" id="id_compra" name="id_compra" value="<?php echo $id_compra; ?>" />
                                                <label for="">Nombre de Producto</label>
                                                <input onkeyup="buscarProducto(event,this,id_producto.value)" placeholder="Escribe nombre producto" class="form-control" id="nombre" name="nombre" type="text" required>
                                                <label for="nombre" id="resultado_error" style="color: red"></label>
                                            </div>
                                            <div class="col-sm-12 col-lg-3 col-md-6">
                                                <label for="">Precio de Compra</label>
                                                <input class="form-control" id="precio_compra" name="precio_compra" type="number" step="any" required disabled>
                                            </div>
                                            <div class="col-sm-12 col-lg-2 col-md-6">
                                                <label for="">Cantidad</label>
                                                <input onkeyup="subtotalProducto(event,this,this.value)" class="form-control" id="cantidad" name="cantidad" step="any" required>
                                            </div>
                                            <div class="col-sm-12 col-lg-3 col-md-6">
                                                <label for="">Subtotal</label>
                                                <input class="form-control" id="subtotal" name="subtotal" type="number" step="any" required disabled>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- ____Button Agregar____ -->
                                    <button onclick="agregarProducto(id_producto.value,cantidad.value, '<?php echo $id_compra; ?>' )" id="agregar_producto" name="agregar_producto" type="button" class="btn btn-warning mr-3 ml-auto">
                                        Agregar
                                    </button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- <div class="dropdown-divider mt-4 mb-4"></div> -->

                <!-- ____Tabla de Compra____ -->

                <section class="container-fluid">
                    <table id="tablaProductos" class="table ">
                    <div class="table-responsive">
                    <div class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Total</th>
                                <th width="1%" scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        </div>
                        </div>
                    </table>
                </section>
                <div>
                    <div class="col-12 col-sm-6 offset-md-6">
                        <label style="font-weight: bold; font-size: 30px; text-align: center;"> Total $</label>
                        <input style="font-weight: bold; font-size: 30px; text-align: center;" size="7" readonly="true" type="text" id="total" name="total" value="0.00">

                        <!-- ____Button Guardar____ -->
                        <button type="button" id="completa_compra" name="completa_compra" class="btn btn-success">
                            <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white" />
                            </svg>
                            Confirmar
                        </button>
                    </div>
                </div>
            </form>





        </div>
    </main>
    <!-- <script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
    <script src="<?php echo base_url(); ?>/js/jquery.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/js/jquery-ui.min.js" crossorigin="anonymous"></script>
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
                    url: '<?php echo base_url(); ?>/TemporalCompra/inserta/' + id_producto + "/" + cantidad + "/" + id_compra,
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
                url: '<?php echo base_url(); ?>/TemporalCompra/eliminar/' + id_producto + "/" + id_compra,
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