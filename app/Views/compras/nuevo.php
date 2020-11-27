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
                       <?php if (isset($validation)) {?>
                       <div class="alert alert-danger">
                         <?php echo $validation->listErrors(); ?>
                       </div>
                       <?php }?>



                            <form method="POST" action="<?php echo base_url();?>/compras/guarda" autocomplete="off">

                            <!-- ____CÓDIGO AGREGAR COMPRA____ -->
                            <div class="container">

                                <h2 class="mt-2 mb-5">AGREGAR COMPRA</h2>
                            
                                <!-- ____agregar items____ -->
                                <div class="row mb-3">

                                        <!-- ____Nombre de Producto____ -->
                                        <div class="col-4 col-sm-4">
                                            <label for="">Nombre de Producto</label>
                                            <input value="<?php echo set_value('nombre');?>" class="form-control" id="nombre" name="nombre" type="text" autofocus required  >
                                        </div>

                                        <!-- ____Precio de Compra____ -->
                                        <div class="col-4 col-sm-4">
                                            <label for="">Precio de Compra</label>
                                            <input value="<?php echo set_value('nombre_corto');?>" class="form-control" id="nombre_corto" name="nombre_corto" type="number" step="any" required >
                                        </div>

                                        <!-- ____Precio de Venta____ -->
                                        <div class="col-4 col-sm-4">
                                            <label for="">Precio de Venta</label>
                                            <input value="<?php echo set_value('nombre_corto');?>" class="form-control" id="nombre_corto" name="nombre_corto" type="number" step="any" required >
                                        </div>
                                </div>

                                <div class="row d-flex align-items-end mb-5">
                                        
                                        <!-- ____Cantidad____ -->
                                        <div class="cantidad-compra col-2 ml-0">
                                            <label for="">Cantidad</label>
                                            <input value="<?php echo set_value('nombre_corto');?>" class="form-control" id="nombre_corto" name="nombre_corto" type="number" step="any" required >
                                        </div>

                                        <!-- ____Button Agregar____ -->
                                        <button type="button" class="btn btn-warning mr-3 ml-auto">
                                            Agregar
                                        </button>
                                </div>

                            </div>

                            <div class="dropdown-divider mt-4 mb-4"></div>

                        <!-- ____Tabla de Compra____ -->

                            <section class="container-fluid">
                                <table class="table">
                                        <thead class="thead-dark">
                                              <tr class="row">
                                                  <th class="col-6" scope="col">Producto</th>
                                                  <th class="col-3 text-center" scope="col">Cantidad</th>
                                                  <th class="col-3 text-center" scope="col">Precio</th>
                                              </tr>
                                        </thead>
                                  <tbody>
                                    <tr class="row">
                                      <th class="col-6" scope="row">Producto de ejemplo 1</th>
                                      <td class="col-3 text-center">37</td>
                                      <td class="col-3 text-center">$100.000</td>
                                      
                                    </tr>
                                    <tr class="row">
                                      <th class="col-6" scope="row">Producto de ejemplo 2</th>
                                      <td class="col-3 text-center">90</td>
                                      <td class="col-3 text-center">$100.000</td>
                                      
                                    </tr>
                                    <tr class="row">
                                      <th class="col-6" scope="row">Producto de ejemplo 3</th>
                                      <td class="col-3 text-center">25</td>
                                      <td class="col-3 text-center">$50.000</td>
                                      
                                    </tr>
                                        
                                    <tr class="row">
                                        <th class="col-10 d-flex justify-content-end" scope="row">TOTAL</th>
                                        <td class="col-2 text-center"><strong>$250.000</strong></td>
                                    </tr>

                                  </tbody>
                                </table>
                               
                            </section>
                           
                            
                            
                            <!-- ____Button Guardar____ -->
                            <button type="submit" class="mt-5 btn btn-success float-right">
                                <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white"/>
                                </svg>
                                Confirmar 
                            </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                