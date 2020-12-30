<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4 mb-3"><strong><?php echo $titulo; ?></strong></h4>
            <!-- <?php //if (isset($validation)) {
                    ?>
                            <div class="alert alert-danger">
                                <?php //echo $validation->listErrors(); 
                                ?>
                            </div>
                        <//?php }?> -->

            <form method="POST" action="<?php //echo base_url();
                                        ?>/unidades/actualizar" autocomplete="off">
                <input type="hidden" value="<?php //echo $datos['id']; 
                                            ?>" name="id">
                <div class="form-group">
                    <div class="row">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre Corto</th>
                                    <th scope="col">Precio Compra</th>
                                    <th scope="col">Precio Venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($datos as $dato) { ?>
                                    <tr>
                                        <td><?php echo $dato['nombre']; ?></td>
                                        <td><input value="<?php echo $dato['precio_compra']; ?> " class="form-control" id="nombre_corto" name="nombre_corto" typr="text"></td>
                                        <td><input value="<?php echo $dato['precio_venta']; ?> " class="form-control" id="nombre_corto" name="nombre_corto" typr="text"></td>
                                        
                                    </tr>
                                <?php }
                                ?>
                        </table>





                    </div>
                </div>

                <!--**___BOTONES REGRESAR Y GUARDAR___**-->

                <a href="<?php //echo base_url();
                            ?>/configuracion" class="btn btn-info mt-3">
                    <svg class="mr-2" width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.3125 18.4375L0.5 10.625L0.5 8.4375L8.3125 0.624999L10.5313 2.8125L5.40625 7.96875L22.8125 7.96875L22.8125 11.0938L5.40625 11.0937L10.5625 16.25L8.3125 18.4375Z" fill="#E0E0E0" />
                    </svg>
                    Regresar
                </a>

                <button type="submit" class="btn btn-success float-right mt-3">
                    <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white" />
                    </svg>
                    Guardar
                </button>


            </form>




        </div>
    </main>