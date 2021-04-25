<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <?php $idVentaTmp = uniqid(); ?>
            <form id="form_venta" name="form_venta" action=" <?php echo base_url() . '/ventas/guarda'; ?>" method="post" autocomplete="off">
                <input type="hidden" id="id_venta" name="id_venta" value="<?php echo $idVentaTmp ?>">
                <!--__FORMULARIO DE VENTA__-->
                <div class="form-group">
                    <div class="row">
                        <!--__****FORMULARIO 1****__-->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    Costo Base
                                </div>
                                <div class="card-body">
                                    <!--__cliente__-->
                                    <h6 class="card-title">Cliente</h6>
                                    <input type="hidden" id="id_cliente" name="id_cliente" class="id_cliente" value="3">
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-4">
                                                <input class="form-control" type="text" id="cliente" name="cliente" placeholder="Escribe el nombre del cliente" value="Público en general" onkeyup="" autocomplete="off" />
                                            </div>
                                            <div class="col-3">
                                                <input id="telefono_cliente" name="telefono_cliente" class="form-control " type="private" placeholder="teléfono cliente" disabled>
                                            </div>
                                            <div class="col-5">
                                                <input id="email_cliente" name="email_cliente" class="form-control " type="private" placeholder="email" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <!--__forma de pago__-->
                                            <div class="col-4">
                                                <label>
                                                    Forma de pago:
                                                </label>

                                                <select name="forma_pagos" id="forma_pagos" class="form-control custom-select">
                                                    <option value="001">Efectivo</option>
                                                    <option value="002">Credito</option>
                                                </select>
                                            </div>
                                            <!--__cantidad__-->
                                            <div class="col-4">
                                                <label class="label-ventas">
                                                    Cantidad:
                                                </label>
                                                <input class="form-control" class="text-center" id="cantidad" name="cantidad" value="1" type="number" step="any" placeholder="cantidad" required>
                                            </div>
                                            <div class="col-4">
                                                <label class="label-ventas">
                                                    Adicional:
                                                </label>
                                                <div class="input-group">
                                                    <input type="text" id="adicional" name="adicional" value="0" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <!--__nombre de producto__-->
                                            <div class="col-8">
                                                <label class="label-ventas">
                                                    Nombre de Producto:
                                                </label>
                                                <input type="hidden" id="id_producto" name="id_producto" />
                                                <input placeholder="Escribe nombre producto" class="form-control" id="nombre" name="nombre" type="text">
                                                <!--__*ERROR*__-->
                                                <label for="error" id="resultado_error" class="resultado_error" name="resultado_error" style="color:red">

                                                </label>
                                            </div>
                                            <!--__nombre de producto__-->
                                            <div class="col-4">
                                                <label class="stock_producto01" name="stock_producto01" id="stock_producto01">
                                                    Stock :
                                                </label>

                                                <input placeholder="stock" class="form-control" id="stock" name="stock" type="text">
                                            </div>
                                            
                                            <!-- <div class="col-3">
                                                <label for="error" id="resultado_error" class="resultado_error" name="resultado_error" style="color:red">

                                                </label>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--__****FORMULARIO ENVÍOS****__-->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                            <div class="card">
                                <div class="card-header">
                                    Costo Adicional
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <label for="">Envio</label>
                                                <input name="envio_nombre" id="envio_nombre" class="form-control form-control-sm" type="text" placeholder="nombre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <input name="envio_direccion" id="envio_direccion" class="form-control form-control-sm" type="text" placeholder="dirección">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-8">
                                                <input name="envio_telefono" id="envio_telefono" class="form-control form-control-sm" type="text" placeholder="teléfono">
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">$</span>
                                                    </div>
                                                    <input name="envio_costo" id="envio_costo" value="0" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="card-title">Otro</h6>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-8">
                                                <input name="otro_detalle" id="otro_detalle" class="form-control form-control-sm" type="text" placeholder="detalle">
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">$</span>
                                                    </div>
                                                    <input name="otro_detalle_costo" id="otro_detalle_costo" value="0" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--__$TOTAL$__-->


                <section class="container-fluid">
                    <table id="tablaProductos" class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Adisional</th>
                                <th scope="col">Total</th>
                                <th width="1%" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="col12">
                        <div class="row">
                            <div class="text-center mt-3 col-4">
                                <label class="label-ventas">
                                    descuento:
                                </label>
                                <div class="input-group">
                                    <input id='descuento' name="descuento" type="text" value="0" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                            <div class="mt-5 mb-0 text-center mr-auto ml-auto col-4">
                                <label style="font-weight: bold; font-size: 30px; text-align: center;"> Total $</label>
                                <input style="font-weight: bold; font-size: 30px; text-align: center;" size="7" readonly="true" type="text" id="total" name="total" value="0.00">
                            </div>

                            <div class="text-center mt-5 col-4">
                                <button type="button" id="completa_venta" name="completa_venta" class="btn btn-success ">
                                    <svg class="mr-2 " width="30" height="20" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white" />
                                    </svg>
                                    Completa venta
                                </button>
                            </div>

                        </div>
                    </div>

                    <!--__BOTÓN COMPRA__-->

                </section>

            </form>
        </div>
    </main>
</div>
<script src="<?php echo base_url(); ?>/js/jquery.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/js/jquery-ui.min.js" crossorigin="anonymous"></script>
<script>
    $("#cliente").autocomplete({
        source: "<?php echo base_url() . '/clientes/autocompleteData'; ?>",
        minLength: 3,
        select: function(event, ui) {
            event.preventDefault();
            $("#id_cliente").val(ui.item.id);
            $("#cliente").val(ui.item.value);
            $("#telefono_cliente").val(ui.item.telefono);
            $("#email_cliente").val(ui.item.email);
        }
    });
    $("#nombre").autocomplete({
        source: "<?php echo base_url() . '/productos/autocompleteData'; ?>",
        minLength: 3,
        select: function(event, ui) {
            event.preventDefault();
            $("#id_producto").val(ui.item.id);
            $("#nombre").val(ui.item.value);
            $("#stock").val(ui.item.stock);
            $("#stock_producto01").text("Stock de " + ui.item.value);
            setTimeout(
                function() {
                    e = jQuery.Event("keypress");
                    e.which = 13
                    agregarProducto(e, ui.item.id, cantidad.value, '<?php echo $idVentaTmp; ?>', adicional.value);
                }
            )
        }
    });


    function agregarProducto(e, id_producto, cantidad, id_venta, adicional) {
        let enterKey = 13;
        if (nombre != '') {
            if (e.which == enterKey) {
                if (id_producto != null && id_producto != 0 && cantidad > 0) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>/TemporalCompra/insertaVenta/' + id_producto + "/" + cantidad + "/" + id_venta + "/" + adicional,
                        success: function(resultado) {
                            if (resultado == 0) {
                                alert("No hay stock")
                            } else {
                                var resultado = JSON.parse(resultado);
                                if (resultado.error == '') {
                                    $("#tablaProductos tbody").empty();
                                    $("#tablaProductos tbody").append(resultado.datos);
                                    $("#total").val(resultado.total);
                                    $('#nombre').val('');
                                    $('#id_producto').val('');
                                    $('#cantidad').val('1');
                                    $('#adicional').val('0');
                                    $("#resultado_error").text("");
                                } else {
                                    $("#resultado_error").text(resultado.error);
                                }
                            }
                        }
                    });
                }
            }
        }
    }

    function eliminaProducto(id_producto, id_venta) {
        $.ajax({
            url: '<?php echo base_url(); ?>/TemporalCompra/eliminar/' + id_producto + "/" + id_venta,
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
    $(function() {
        $("#completa_venta").click(function() {
            let nFilas = $("#tablaProductos tr").length;
            if (nFilas < 2) {
                alert("Debe agregar un producto")
            } else {
                $("#form_venta").submit();
            }
        });
    });
</script>