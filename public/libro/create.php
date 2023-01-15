<?= $header ?>
<link rel="stylesheet" href="<?= base_url('public/assets5/js/plugins/flatpickr/flatpickr.min.css') ?>">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                    Nuevo libro
                </h1>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3">
                <a href="<?= site_url('libro') ?>" class="btn btn-sm btn-alt-primary">
                    <i class="fa fa-arrow-left mr-2"></i> Volver
                </a>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

    <form action="" method="post">

        <?php echo validation_errors(); ?>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Informacion Libro</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="mb-4">
                            <label class="form-label" for="name">Nombre<span class="text-danger"></span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-6">
                        <div class="mb-4">
                            <label class="form-label" for="Fecha_Publicacion">Fecha Publicacion</label>
                            <input type="text" class="form-control js-flatpickr" id="Fecha_Publicacion" name="Fecha_Publicacion" value="<?= set_value('Fecha_Publicacion') ?>">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="Edicion">Edicion<span class="text-danger"></span></label>
                                <input type="text" class="form-control" id="Edicion" name="Edicion" value="<?= set_value('Edicion') ?>">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="Autores">Autores</label>
                                <select class="js-select2 form-select" id="Autores" name="Autores">
                                    <option></option>
                                    <?php
                                    if ($autor) {
                                        foreach ($autor as $autor) {
                                            echo '<option value="' . $autor['name'] . '">' . $autor['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="mb-4 text-end">
                                <input type="submit" class="btn btn-success" value="Registrar libro">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </form>

</div>
<!-- END Page Content -->

<script src="<?= base_url('public/assets5/js/oneui.app.min.js') ?>"></script>
<script src="<?= base_url('public/assets5/js/plugins/flatpickr/flatpickr.min.js') ?>"></script>
<script>
    jQuery(function() {
        One.helpers(['js-flatpickr']);
        $('input[name=reward-type]').change(function() {
            var tipo = $(this).val();
            if (tipo == 2) {
                $('input[name=reward-amount]').val('');
                $('input[name=reward-amount]').attr('disabled', 'disabled');
            } else {
                $('input[name=reward-amount]').removeAttr('disabled');
            }
        });
    });
</script>
<?= $footer ?>