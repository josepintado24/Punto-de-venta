
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                    <div>
                                <p>
                                    <a href="<?php echo base_url();?>/compras" class="btn btn-info">
                                    <svg class="mr-2" width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.3125 18.4375L0.5 10.625L0.5 8.4375L8.3125 0.624999L10.5313 2.8125L5.40625 7.96875L22.8125 7.96875L22.8125 11.0938L5.40625 11.0937L10.5625 16.25L8.3125 18.4375Z" fill="#E0E0E0"/>
                                    </svg>
                                    Regresar</a>
                                   
                                </p>
                            </div>
                        <h4 class="mt-5 mb-4"><?php echo $titulo;?></h4>
                            
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Nombre Corto</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php  
                                                foreach ($datos as $dato){?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $dato['id']; ?> </td>
                                                        <td><?php echo $dato['nombre']; ?> </td>
                                                        <td><?php echo $dato['nombre_corto']; ?> </td>

                                                    
                                                        <td class="text-center">
                                                            <a href="#" data-href="<?php echo base_url().'/unidades/reingresar/'. $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Reingresar registro" >
                                                                <i class="fas fa-arrow-circle-up"></i>
                                                            </a>
                                                        </td>
                                                        
                                                    </tr>

                                         <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                        </div>
                    </div>
                </main>
                 <!-- Modal -->
                 <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reingresar Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea reingresar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a class="btn btn-danger btn-ok">Si</a>
                    </div>
                    </div>
                </div>
                </div>