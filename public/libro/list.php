<?= $header ?>
<link rel="stylesheet" href="<?= base_url('public/assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                    Lista de Libro
                </h1>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3">
                    <a href="<?= site_url('Libro/create') ?>" class="btn btn-sm btn-alt-success">
                        <i class="fa fa-plus"></i> Nuevo Libro
                    </a>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

    <?php if ($Libro) { ?>

        <div class="block block-rounded">
            <div class="block-content pb-2">
                <!-- All Client Table -->
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter table-datatables mb-0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha Publicacion</th>
                                <th>Edicion</th>
                                <th>Autores</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Libro as $rew) {
                            ?>
                                <tr>
                                    <td class="fs-sm"><?= $rew['name'] ?><br></td>
                                    <td class="fs-sm"><?= $rew['Fecha_Publicacion'] ?><br></td>
                                    <td class="fs-sm"><?= $rew['Edicion'] ?><br></td>
                                    <td class="fs-sm"><?= $rew['Autores'] ?><br></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deleteLibro(<?= $rew['id'] ?>)" class="btn btn-alt-danger btn-sm"><i class="fa fa-trash"></i></a>

                                        <a href="<?= site_url('Libro/update/' . $rew['id']) ?>" class="btn btn-alt-success btn-sm"><i class="si si-pencil"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END All Book Table -->
            </div>
        </div>

    <?php } else { ?>

        <div class="alert alert-info">No hay libro registrado.</div>

    <?php } ?>

</div>
<!-- END Page Content -->

<script src="<?= base_url('public/assets5/js/oneui.app.min.js') ?>"></script>
<script src="<?= base_url('public/assets5/js/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('public/assets5/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?= base_url('public/assets5/js/plugins/es6-promise/es6-promise.auto.min.js') ?>"></script>
<script src="<?= base_url('public/assets5/js/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('.table-datatables').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });


    function deleteLibro(Libro) {
        Swal.fire({
            title: 'Eliminar Libro?',
            text: "Desea eleminar este libro? No se puede deshacer.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#82b54b',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.post("<?= site_url('Libro/delete') ?>/" + Libro, function(data) {
                    Swal.fire(
                        'Hecho!',
                        'El libro haz sido eliminado.',
                        'success'
                    )
                    location.reload();
                });
            }
        })
    }
</script>

<?= $footer ?>