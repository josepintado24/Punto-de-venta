<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <h4 class="mt-4"><?php echo $titulo;?></h4>
                       <?php if (isset($validation)) {?>
                       <div class="alert alert-danger">
                         <?php echo $validation->listErrors(); ?>
                       </div>
                       <?php }?>

                            <form method="POST" action="<?php echo base_url();?>/productos/insertar" autocomplete="off">
                           
                                <div class="form-group">
                                    <div class="row">
                                        
                                        <div class="col-12 col-sm-6">
                                            <label for="">Nombre</label>
                                            <input value="<?php echo set_value('nombre');?>" class="form-control" id="nombre" name="nombre" typr="text" >
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Unidad</label>
                                            <Select class="form-control" id="id_unidad" name="id_unidad" typr="text"  >
                                                <option value="">  Seleccionar unidad </option> 
                                                <?php foreach($unidades as $unidad){ ?>
                                                    <option value="<?php echo $unidad['id'];?>" <?php  if (set_value('id_unidad')==$unidad['id']){ echo 'selected'; } ?> > 
                                                         <?php echo $unidad['nombre']; ?>  
                                                    </option> 
                                                <?php  }?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="">Precio compra</label>
                                            <input value="<?php echo set_value('precio_compra');?>" class="form-control" id="precio_compra" name="precio_compra" type="text" >
                                        </div>
                                        
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        

                                        <div class="col-12 col-sm-6">
                                            <label for="">Precio venta</label>
                                            <input  value="<?php echo set_value('precio_venta');?>" class="form-control" id="precio_venta" name="precio_venta" typr="text"  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">Stock minimo</label>
                                            <input  value="<?php echo set_value('stock_minimo');?>"  class="form-control" id="stock_minimo" name="stock_minimo" typr="text"  >
                                        </div>
                                    </div>    
                                </div>

                                
                                    <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                