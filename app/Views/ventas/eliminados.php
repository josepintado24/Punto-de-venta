
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4 mb-3"><?php echo $titulo;?></h4>

                            <div>
                                <p class="mb-5">
                                    <a href="<?php echo base_url();?>/ventas" class="btn btn-success">
                                    Ventas</a>
                                </p>
                            </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Fechas</th>
                                                <th>Folio</th>
                                                <th>cliente</th>
                                                <th>Total</th>
                                                <th>Cajero</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php  
                                                foreach ($datos as $dato){?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $dato['fecha_alta']; ?> </td>
                                                        <td><?php echo $dato['folio']; ?> </td>
                                                        <td><?php echo $dato['cliente']; ?> </td>
                                                        <td><?php echo $dato['total']+ $dato['envio_costo']+$dato['otro_detalle_costo']; ?> </td>
                                                        <td><?php echo $dato['cajero']; ?> </td>
                                                        <td class="text-center">
                                                            <a href="<?php echo base_url().'/ventas/muestraTicketPdf/'. $dato['id']; ?>" class="btn btn-primary">
                                                                <i class="fas fa-list-alt"></i>
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