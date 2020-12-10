
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4 mb-3"><?php echo $titulo;?></h4>
                            <div>

                                <p class="mb-5">
                                    <a href="<?php echo base_url();?>/compras/nuevo" class="btn btn-success">
                                    <svg class="mr-2" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.2239 0L19.5999 3.376L7.1519 15.84L0.399902 9.08L3.7759 5.704L7.1519 9.08L16.2239 0ZM16.2239 2.24L7.1519 11.328L3.7759 7.992L2.6479 9.08L7.1519 13.576L17.3519 3.376L16.2239 2.24Z" fill="white"/>
                                        </svg>
                                    Agregar</a>
                                    <a href="<?php echo base_url();?>/compras/eliminados" class="btn btn-danger">
                                    <svg class="mr-2" width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1ZM1 16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H11C11.5304 18 12.0391 17.7893 12.4142 17.4142C12.7893 17.0391 13 16.5304 13 16V4H1V16Z" fill="#F2F2F2"/>
                                        </svg>
                                    Eliminados</a>
                                </p>
                                
                            </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Folio</th>
                                                <th>Total</th>
                                                <th>Fecha Alta</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           <?php  
                                                foreach ($datos as $dato){?>
                                                    <tr>
                                                        <td><?php echo $dato['id']; ?> </td>
                                                        <td><?php echo $dato['folio']; ?> </td>
                                                        <td><?php echo $dato['total']; ?> </td>
                                                        <td><?php echo $dato['fecha_alta']; ?> </td>

                                                        <td class="text-center">
                                                            <a href="<?php  echo base_url().'/compras/muestraCompraPdf/'. $dato['id']; ?>" class="btn btn-primary">
                                                            <i class="fas fa-info-circle"></i>
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
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea eliminar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a class="btn btn-danger btn-ok">Si</a>
                    </div>
                    </div>
                </div>
                </div>