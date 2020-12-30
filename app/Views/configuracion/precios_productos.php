<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4 mb-3"><strong><?php echo $titulo;?></strong></h4>
                       <!-- <?php //if (isset($validation)) {?>
                            <div class="alert alert-danger">
                                <?php //echo $validation->listErrors(); ?>
                            </div>
                        <//?php }?> -->
                       
                            <form method="POST" action="<?php //echo base_url();?>/unidades/actualizar" autocomplete="off">
                                <input type="hidden" value="<?php //echo $datos['id']; ?>" name="id">
                                <div class="form-group">
                                    <div class="row">

                                    <?php  
                                    foreach ($datos as $dato){?>
                                                    <div class="col-12 col-sm-6">
                                            <label for="">Nombre corto: <?php echo $dato['nombre']; ?></label>
                                            <label for="">precio Venta: </label><input value="<?php echo $dato['precio_venta'];?> " class="form-control" id="nombre_corto" name="nombre_corto" typr="text" >
                                            <label for= "">precio compra:</label><input value="<?php echo $dato['precio_compra'];?> " class="form-control" id="nombre_corto" name="nombre_corto" typr="text" >
                                        </div>
                                                       

                                         <?php }
                                            ?>

                                        
                                    </div>    
                                </div>
                                    <a href="<?php //echo base_url();?>/configuracion" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                