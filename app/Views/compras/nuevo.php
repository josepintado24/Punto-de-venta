<div id="layoutSidenav_content">
                <main>


                <!-- ____Button Regresar____ -->
                <a href="<?php echo base_url();?>/compras" class="btn btn-info m-4">
                <svg class="mr-2" width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.3125 18.4375L0.5 10.625L0.5 8.4375L8.3125 0.624999L10.5313 2.8125L5.40625 7.96875L22.8125 7.96875L22.8125 11.0938L5.40625 11.0937L10.5625 16.25L8.3125 18.4375Z" fill="#E0E0E0"/>
                </svg>      
                Regresar
                </a>


                    <div class="container-fluid">
                       
                    <form method="POST" id="form_compra" name="form_compra"action="<?php echo base_url();?>/compras/guarda" autocomplete="off">

                            <!-- ____CÓDIGO AGREGAR COMPRA____ -->
                            <div class="container">

                                <h2 class="mt-2 mb-5">AGREGAR COMPRA</h2>
                            
                                <!-- ____agregar items____ -->
                                <div class="row mb-3">

                                        <!-- ____Nombre de Producto____ -->
                                        <div class="col-4 col-sm-4">
                                        <input class="form-control" type="hidden" id="id_producto" name="id_producto" />
                                            <label for="">Nombre de Producto</label>
                                            <input onkeyup="buscarProducto(event,this,this.value)" placeholder="Escribe el producto y enter" class="form-control" id="nombre" name="nombre" type="text" autofocus required  >
                                            <label for="nombre" id="resultado_error" style="color: red"></label>
                                        </div>

                                        <!-- ____Precio de Compra____ -->
                                        <div class="col-4 col-sm-4">
                                            <label for="">Precio de Compra</label>
                                            <input class="form-control" id="precio_compra" name="precio_compra" type="number" step="any" required disabled>
                                        </div>

                                         <!-- ____Cantidad____ -->
                                         <div class="cantidad-compra col-2 ml-0">
                                            <label for="">Cantidad</label>
                                            <input onkeyup="subtotalProducto(event,this,this.value)"  class="form-control" id="cantidad" name="cantidad" type="number" step="any" required >
                                        </div>
                                </div>

                                <div class="row d-flex align-items-end mb-5">
                                        
                                       <!-- ____Precio de Venta____ -->
                                        <div class="col-4 col-sm-4">
                                            <label for="">Subtotal</label>
                                            <input class="form-control" id="subtotal" name="subtotal" type="number" step="any" required disabled>
                                        </div>

                                        <!-- ____Button Agregar____ -->
                                        <button type="button" id="agregar_producto" name="agregar_producto" class="btn btn-warning mr-3 ml-auto">
                                            Agregar
                                        </button>
                                </div>

                            </div>

                            <div class="dropdown-divider mt-4 mb-4"></div>

                        <!-- ____Tabla de Compra____ -->

                            <section class="container-fluid">
                                <table id="tablaProductos" class="table table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Código</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Total</th>
                                            <th width ="1%" scope="col"></th>
                                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                                    
                                    </tbody>
                                </table>
                            </section>
                            <div>
                                <div class="col-12 col-sm-6 offset-md-6"> 
                                    <label style="font-weight: bold; font-size: 30px; text-align: center;"> Total $</label>
                                    <input style="font-weight: bold; font-size: 30px; text-align: center;" size="7" readonly="true" type="text" id="total" name="total" value="0.00">
                                       
                                     <!-- ____Button Guardar____ -->
                                    <button type="button" id="completa_compra" name="completa_compra"  class="btn btn-success">
                                        <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white"/>
                                        </svg>
                                        Confirmar 
                                    </button>
                                </div>
                            </div>  
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                <script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
                <script>
                var precio_compra;
                     $(document).ready(function(){
                            $("#completa_compra").click(function(){
                                let nFila=$("#tablaProductos tr").length;
                                if(nFila<2){
                                    
                                }else{
                                    $("#form_compra").submit();
                                }
                            });
                           
                        });

                    function buscarProducto(e, tagNombre, nombre){
                        var enterkey=13;
                        if(nombre !=''){
                            if(e.which==enterkey){
                                
                                
                                $.ajax({
                                    url: '<?php echo base_url(); ?>/productos/buscarPorNombre/'+nombre,
                                    dataType: 'json',
                                    success: function(resultado){
                                        if (resultado ==0){
                                            $(tagNombre).val('');
                                        }else{
                                            $(tagNombre).removeClass('has-error');
                                            $('#resultado_error').html(resultado.error);
                                            if(resultado.existe){
                                                $('#id_producto').val(resultado.datos.id);
                                                $('#cantidad').val(1);
                                                $('#precio_compra').val(resultado.datos.precio_compra);
                                                $('#subtotal').val(resultado.datos.precio_compra);
                                                $('#cantidad').focus();
                                                precio_compra=resultado.datos.precio_compra;
                                            
                                            }else{
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
                    }
                    function subtotalProducto(e, tagCantidad, cantidad){
                        var enterkey=13;
                        if(cantidad !=''){
                            if(e.which==enterkey){
                                $('#subtotal').val(cantidad*precio_compra);
                            }
                        }
                    }

                </script>
                