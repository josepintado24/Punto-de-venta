 <!-- Header -->
 <div class="header bg-primary pb-6">
     <div class="container-fluid">
         <div class="header-body">
             <div class="row align-items-center py-4">
                 <div class="col-lg-6 col-7">
                     <h6 class="h2 text-white d-inline-block mb-0"><?php echo $titulo; ?></h6>
                     <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                         <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                             <li class="breadcrumb-item"><a><?php echo $titulo; ?></a></li>
                         </ol>
                     </nav>
                 </div>
                 <div class="col-lg-6 col-5 text-right">
                     <!-- <a href="#" class="btn btn-sm btn-neutral">New</a> -->
                     <a href="<?php echo base_url() . '/ventas'; ?>" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i> Ventas</a>
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
                 <br>
                 <div class="container-fluid">
                     <?php $idVentaTmp = uniqid(); ?>
                     <form id="form_venta" name="form_venta" action=" <?php echo base_url() . '/ventas/guarda'; ?>" method="post" autocomplete="off">
                         <input type="hidden" id="id_venta" name="id_venta" value="<?php echo $idVentaTmp ?>">
                         <!--__FORMULARIO DE VENTA__-->
                         <div>
                             <div class="row">
                                 <!--__****FORMULARIO 1****__-->
                                 <div class=" col-sm-12  col-xl-8">
                                     <div class="card">
                                         <div class="card-header border-0">
                                             <h3 class="mb-0">Costo base</h3>
                                         </div>
                                         <div class="card-body">
                                             <!--__cliente__-->
                                             <h3 class="">Cliente</h3>
                                             <input type="hidden" id="id_cliente" name="id_cliente" class="id_cliente" value="3">

                                             <div class="row">
                                                 <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                     <div class="form-group input-group-sm">
                                                         <input class="form-control" type="text" id="cliente" name="cliente" placeholder="Escribe el nombre del cliente" value="Público en general" onkeyup="" autocomplete="off" />
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                                     <div class="form-group input-group-sm">
                                                         <input id="telefono_cliente" name="telefono_cliente" class="form-control " type="private" placeholder="teléfono cliente" disabled>
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-6 col-md-5 col-lg-5 col-xl-5">
                                                     <div class="form-group input-group-sm">
                                                         <input id="email_cliente" name="email_cliente" class="form-control " type="private" placeholder="email" disabled>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <!--__forma de pago__-->
                                                 <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                     <div class="form-group input-group-sm">
                                                         <label>
                                                             Forma de pago:
                                                         </label>

                                                         <select name="forma_pagos" id="forma_pagos" class="form-control custom-select">
                                                             <option value="001">Efectivo</option>
                                                             <option value="002">Credito</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                                 <!--__cantidad__-->
                                                 <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                     <div class="form-group input-group-sm">
                                                         <label class="label-ventas">
                                                             Cantidad:
                                                         </label>
                                                         <input class="form-control" class="text-center" id="cantidad" name="cantidad" value="1" type="number" step="any" placeholder="cantidad" required>
                                                     </div>
                                                 </div>
                                                 <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                     <div class="form-group input-group-sm">
                                                         <label class="label-ventas">
                                                             Adicional:
                                                         </label>
                                                         <div class="input-group input-group-sm">
                                                             <div class="input-group-prepend">
                                                                 <span class="input-group-text" id="inputGroup-sizing-sm">$</span>
                                                             </div>
                                                             <input id="adicional" name="adicional" value="0" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

                                                         </div>
                                                     </div>
                                                 </div>

                                             </div>
                                             <div class="row">
                                                 <!--__nombre de producto__-->
                                                 <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                                     <div class="form-group">
                                                         <label class="label-ventas">
                                                             Nombre de Producto:
                                                         </label>
                                                         <input type="hidden" id="id_producto" name="id_producto" />
                                                         <input placeholder="Escribe nombre producto" class="form-control" id="nombre" name="nombre" type="text">
                                                         <!--__*ERROR*__-->
                                                         <label for="error" id="resultado_error" class="resultado_error" name="resultado_error" style="color:red">
                                                         </label>
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                                     <div class="form-group">
                                                         <label class="stock_producto01" name="stock_producto01" id="stock_producto01">
                                                             Stock :
                                                         </label>
                                                         <input placeholder="stock" class="form-control" id="stock" name="stock" type="private" disabled>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>

                                 <!--__****FORMULARIO ENVÍOS****__-->
                                 <div class="col-sm-12  col-xl-4">
                                     <div class="card">
                                         <div class="card-header border-0">
                                             <h3 class="mb-0">Costo Adicional</h3>
                                         </div>
                                         <div class="card-body">
                                             <h5>Otro</h5>
                                             <div class="row">
                                                 <div class="col-12 col-sm-6 col-md-6 col-xl-12">
                                                     <div class="form-group">
                                                         <input name="envio_nombre" id="envio_nombre" class="form-control form-control-sm" type="text" placeholder="nombre">
                                                     </div>
                                                 </div>

                                                 <div class="col-12 col-sm-6 col-md-6 col-xl-12">
                                                     <div class="form-group">
                                                         <input name="envio_direccion" id="envio_direccion" class="form-control form-control-sm" type="text" placeholder="dirección">
                                                     </div>
                                                 </div>


                                                 <div class="col-12 col-sm-8">
                                                     <div class="form-group">
                                                         <input name="envio_telefono" id="envio_telefono" class="form-control form-control-sm" type="text" placeholder="teléfono">
                                                     </div>

                                                 </div>
                                                 <div class="col-12 col-sm-4">
                                                     <div class="input-group input-group-sm mb-3">
                                                         <div class="input-group-prepend">
                                                             <span class="input-group-text" id="inputGroup-sizing-sm">$</span>
                                                         </div>
                                                         <input name="envio_costo" id="envio_costo" value="0" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                     </div>
                                                 </div>
                                             </div>
                                             <h5>Otro</h5>

                                             <div class="row">
                                                 <div class="col-12 col-sm-8">
                                                     <div class="form-group">
                                                         <input name="otro_detalle" id="otro_detalle" class="form-control form-control-sm" type="text" placeholder="detalle">
                                                     </div>
                                                 </div>
                                                 <div class="col-12 col-sm-4">
                                                     <div class="form-group">
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
                 </div>
                 <!--__$TOTAL$__-->


                 <section class="container-fluid">
                     <table id="tablaProductos" class="table table-striped table-responsive table-sm ">
                         <thead class="thead-light">
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Nombre</th>
                                 <th scope="col">Precio</th>
                                 <th scope="col">Cantidad</th>
                                 <th scope="col">Adisional</th>
                                 <th scope="col">Total</th>
                                 <th width="1%" scope="col">Acción</th>
                             </tr>
                         </thead>
                         <tbody>
                         </tbody>
                     </table>

                     <div class="col-12">
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
                             <div class="text-center mt-3 col-12 col-md-3">
                                 <div class="input-group input-group-sm ">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text" id="inputGroup-sizing-sm"> Descontar $</span>
                                     </div>
                                     <input id='descuento' name="descuento" type="text" value="0" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

                                 </div>
                             </div>
                         </div>


                         <div class="row">

                             <div class="mt-3 mb-3  col-12 col-sm-12 col-md-4">
                                 <button type="button" id="completa_venta" name="completa_venta" class="btn btn-success btn-sm">
                                     <i class="fas fa-check"></i>
                                     Completa venta
                                 </button>
                             </div>
                         </div>

                     </div>
             </div>

             <!--__BOTÓN COMPRA__-->

             </section>

             </form>
         </div>

     </div>

     <script src="<?php echo base_url(); ?>/public/assets/js/jquery.js" crossorigin="anonymous"></script>
     <script src="<?php echo base_url(); ?>/public/assets/js/jquery-ui.min.js" crossorigin="anonymous"></script>
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