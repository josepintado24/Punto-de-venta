<div id="layoutSidenav_content">
                <main>

                <a href="<?php echo base_url();?>/clientes" class="btn btn-info m-4">
                <svg class="mr-2" width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.3125 18.4375L0.5 10.625L0.5 8.4375L8.3125 0.624999L10.5313 2.8125L5.40625 7.96875L22.8125 7.96875L22.8125 11.0938L5.40625 11.0937L10.5625 16.25L8.3125 18.4375Z" fill="#E0E0E0"/>
                </svg>      
                Regresar</a>



                    <div class="container-fluid">
                       <h4 class="mt-4 mb-4"><?php echo $titulo;?></h4>
                       <?php if (isset($validation)) {?>
                            <div class="alert alert-danger">
                                <?php echo $validation->listErrors(); ?>
                            </div>
                       <?php }?>

                            <form method="POST" action="<?php echo base_url();?>/clientes/insertar" autocomplete="off">
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Nombre</label>
                                            <input value="<?php echo set_value('nombre');?>" class="form-control" id="nombre" name="nombre" typr="text" autofocus require>
                                        </div>

                                        <div class="col-12 col-sm-6 mb-3">
                                            <label for="">Direccion</label>
                                            <input value="<?php echo set_value('direccion');?>" class="form-control" id="direccion" name="direccion" typr="text" require>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="">telefono</label>
                                            <input  value="<?php echo set_value('telefono');?>" class="form-control" id="telefono" name="telefono" typr="text" require>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="">Correo</label>
                                            <input value="<?php echo set_value('correo');?>" class="form-control" id="correo" name="correo" typr="text" require>
                                        </div>
                                    </div>    
                                </div>
                                    
                                <button type="submit" class="btn btn-success float-right">
                                    <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white"/>
                                    </svg>
                                    Guardar </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                