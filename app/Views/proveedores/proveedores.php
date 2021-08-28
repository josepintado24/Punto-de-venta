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
                    <a href="<?php echo base_url(); ?>/proveedores/nuevo" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Agregar</a>
                    <a href="<?php echo base_url(); ?>/proveedores/eliminados" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i> Eliminados</a>
                </div>
                <!-- Light table -->
                <div class="table-responsive mt-4 p-4">
                    <table class="table table-sm  able-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>direccion</th>
                                <th>Telefono</th>
                                <th>Whatsapp</th>
                                <th>correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($datos as $dato) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $dato['id']; ?> </td>
                                    <td><?php echo $dato['nombre']; ?> </td>
                                    <td><?php echo $dato['direccion']; ?> </td>
                                    <td><?php echo $dato['telefono']; ?> </td>
                                    <td><?php echo $dato['wp']; ?> </td>
                                    <td><?php echo $dato['correo']; ?> </td>

                                    <td class="text-center">
                                        <a href="<?php echo base_url() . '/proveedores/editar/' . $dato['id']; ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" data-href="<?php echo base_url() . '/proveedores/eliminar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
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