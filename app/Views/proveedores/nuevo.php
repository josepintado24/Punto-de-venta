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
                <div class="card-header border-0">
                    <a href="<?php echo base_url(); ?>/proveedores" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Regresar</a>
                    <?php if (isset($validation)) { ?>
                      
                        <div class="alert alert-danger mt-2 text-ligh">
                           <p class="text-ligh"> <?php echo $validation->listErrors(); ?></p> 
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url(); ?>/proveedores/insertar" autocomplete="off">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input value="<?php echo set_value('nombre'); ?>" class="form-control" id="nombre" name="nombre" typr="text" autofocus require>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">

                                    <label for="">Direccion</label>
                                    <input value="<?php echo set_value('direccion'); ?>" class="form-control" id="direccion" name="direccion" typr="text" require>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="">telefono</label>
                                    <input value="<?php echo set_value('telefono'); ?>" class="form-control" id="telefono" name="telefono" typr="text" require>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">

                                    <label for="">Whatsapp</label>
                                    <input value="<?php echo set_value('wp'); ?>" class="form-control" id="wp" name="wp" typr="text" require>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">

                                    <label for="">Correo</label>
                                    <input value="<?php echo set_value('correo'); ?>" class="form-control" id="correo" name="correo" typr="text" require>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success btn-sm float-right">
                            <i class="fas fa-check"></i>
                            Guardar </button>


                    </form>
                </div>


            </div>
        </div>
    </div>