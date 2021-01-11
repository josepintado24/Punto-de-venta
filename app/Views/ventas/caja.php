<div id="layoutSidenav_content">
    <main>
    
        <div class="container-fluid">
            <?php $idVentaTmp = uniqid(); ?>
            <br>


            <form id="form_venta" name="form_venta" class="form-horizontal" action=" <?php echo base_url().'/ventas/guarda'; ?>" method="post" autocomplete="off">
                <input type="hidden" id="id_venta" name="id_venta" value="<?php echo $idVentaTmp ?>">
            


            <!--__FORMULARIO DE VENTA__-->
            <div class="form-group">
                <div class="row">
                    <!--__****FORMULARIO 1****__-->
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-8">

                        <h3 class="mb-5">Costo Base</h3>

                        <!--__cliente__-->
                        <div>
                            <label class="label-ventas"> <p>Cliente:</p> </label>
                            <input type="hidden" id="id_cliente" name="id_cliente" class="id_cliente" value="1">
                            <input class="form-control-2" type="text" id="cliente" name="cliente" placeholder="Escribe el nombre del cliente" value="Público en general" onkeyup="" autocomplete="off" />
                        </div>
                        <!--__forma de pago__-->
                        <div>
                            <label class="label-ventas"> <p>Forma de pago:</p> </label>
                            <select name="forma_pago" id="forma_pago">
                                <option value="001">Efectivo</option>
                                <option value="002">Credito</option>
                            </select>
                        </div>
                        <!--__cantidad__-->
                        <div>
                            <label class="label-ventas"> <p>Cantidad:</p> </label>
                            <input class="form-control-3" value="1" class="text-center" id="cantidad" name="cantidad" type="number" step="any" required>
                        </div> 

                        <!--__nombre de producto__-->
                        <div>
                            <label class="label-ventas"> <p>Nombre de Producto:</p> </label>
                            <input type="hidden" id="id_producto" name="id_producto" />
                            <input onkeyup="agregarProducto(event,id_producto.value,cantidad.value, '<?php echo $idVentaTmp ?>')" placeholder="Escribe nombre producto" class="form-control-2" id="nombre" name="nombre" type="text">
                        </div>
                        <!--__*ERROR*__-->
                        <div class="col-sm-2">
                            <label for="codigo" id="resultado_error" style="color:red"></label>
                        </div>

                        <!--__BOTÓN COMPRA__-->
                        <div class="text-center mt-4">
                            <button type="button" id="completa_venta" name="completa_venta" class="btn btn-success">
                            <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white" />
                            </svg>
                            Completa venta
                            </button>
                        </div>
                    </div>

                    <!--__****FORMULARIO ENVÍOS****__-->
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                        
                            <h3 class="mb-5">Costo Adicional</h3>
                            
                        <div class="costo_envio">
                            <p><strong>ENVÍO</strong><p>
                            <!--|COSTO ADICIONAL/ENVÍO|-->
                            <!--__nombre__-->
                            <div>
                                <label class="label-ca"> <p>Nombre:</p> </label>
                                <input>
                            </div>
                            <!--__dirección__-->
                            <div>
                                <label class="label-ca"> <p>Dirección:</p> </label>
                                <input>
                            </div>
                            <!--__costo__-->
                            <div>
                                <label class="label-ca"> <p>Costo:</p> </label>
                                <input>
                            </div>
                        </div>

                    <!--|COSTO ADICIONAL/OTRO|-->
                        <div class="costo_adicional">
                            <p><strong>OTRO</strong><p>

                            <!--__detalle__-->
                            <div>
                                <label class="label-ca"> <p>Detalle:</p> </label>
                                <input>
                            </div>
                            <!--__costo__-->
                            <div>
                                <label class="label-ca"> <p>Costo:</p> </label>
                                <input>
                            </div>
                        <div>
                    </div>

                </div>
            </div>   
                <!--__$TOTAL$__-->
                <div class="mt-5 mb-5 text-center mr-auto ml-auto">
                    <label style="font-weight: bold; font-size: 30px; text-align: center;"> Total $</label>
                    <input style="font-weight: bold; font-size: 30px; text-align: center;" size="7" readonly="true" type="text" id="total" name="total" value="0.00">
                </div>

                <section class="container-fluid">
                    <table id="tablaProductos" class="table table-sm">
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
                    </table>
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
        }
    });
    $("#nombre").autocomplete({
        source: "<?php echo base_url() . '/productos/autocompleteData'; ?>",
        minLength: 3,
        select: function(event, ui) {
            event.preventDefault();
            $("#id_producto").val(ui.item.id);
            $("#nombre").val(ui.item.value);
            setTimeout(
                function() {
                    e = jQuery.Event("keypress");
                    e.which = 13
                    agregarProducto(e, ui.item.id, cantidad.value, '<?php echo $idVentaTmp; ?>');
                }
            )
        }
    });

    function agregarProducto(e, id_producto, cantidad, id_venta) {
        let enterKey = 13;
        if (nombre != '') {
            if (e.which == enterKey) {
                if (id_producto != null && id_producto != 0 && cantidad > 0) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>/TemporalCompra/insertaVenta/' + id_producto + "/" + cantidad + "/" + id_venta,
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
                                    $('#cantidad').val('1');
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
    $(function(){
        $("#completa_venta").click(function(){
            let nFilas=$("#tablaProductos tr").length;
            if(nFilas<2){
                alert("Debe agregar un producto")
            }else{
                $("#form_venta").submit();
            }
        });
    });
</script>