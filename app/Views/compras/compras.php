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
                <div class="col-lg-6 col-5 text-right">
                    <!-- <a href="#" class="btn btn-sm btn-neutral">New</a> -->
                    <!-- <a href="<?php echo base_url(); ?>/ventas/eliminados" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i> Eliminados</a> -->
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
                <!-- <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div> -->
                <!-- Light table -->
                <div class="table-responsive mt-4 p-4">
                    <table class="table table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fecha Alta</th>
                                <th>Folio</th>
                                <th>Proveedor</th>
                                <th>Total</th>
                                <th>Cajero</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['fecha_alta']; ?> </td>
                                    <td><?php echo $dato['folio']; ?> </td>
                                    <td><?php echo $dato['proveedor']; ?> </td>
                                    <td><?php echo number_format($dato['total'], 2, '.', ','); ?> </td>
                                    <td><?php echo $dato['cajero']; ?> </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url() . '/compras/muestraCompraPdf/' . $dato['id']; ?>" class="btn btn-sm btn-primary">
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
    </div>

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