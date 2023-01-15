<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Lancer Group - Biblioteca</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= base_url('public/assets5/media/favicons/apple-touch-icon-180x180.png') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= base_url('public/assets5/js/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets5/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') ?>">
    <link rel="stylesheet" id="css-main" href="<?= base_url('public/assets5/css/oneui.min.css') ?>">
    <link rel="stylesheet" id="css-theme" href="<?= base_url('public/assets5/css/themes/modern.min.css') ?>">

    <script src="<?= base_url('public/assets5/js/lib/jquery.min.js') ?>"></script>
    <script>
        $(function() {
            $("body").on("click", '[data-bs-toggle="modal"]', function() {
                $($(this).data("bs-target") + " .modal-dialog").load($(this).data("bs-remote"))
            })
        });
    </script>
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed page-header-dark">

        <nav id="sidebar" aria-label="Main Navigation">
            <div class="content-header bg-white-5">
                <a class="font-w600 text-dual" href="<?= site_url('dashboard') ?>">

                    <span class="smini-hide font-size-h5 tracking-wider">
                        Biblioteca<span class="font-w400"></span>
                    </span>
                </a>

                <div>
                    <a class="d-lg-none btn btn-sm btn-alt-secondary ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="js-sidebar-scroll">
                <div class="content-side">
                    <?php if (isset($navigation)) {
                        echo $navigation;
                    } else { ?>
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= $menu['dashboard'] ?>" href="<?= site_url('/') ?>">
                                    <i class="nav-main-link-icon si si-speedometer"></i>
                                    <span class="nav-main-link-name">Inicio</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= $menu['dashboard'] ?>" href="<?= site_url('autor') ?>">
                                    <i class="nav-main-link-icon si si-layers"></i>
                                    <span class="nav-main-link-name">Autor</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= $menu['dashboard'] ?>" href="<?= site_url('libro') ?>">
                                    <i class="nav-main-link-icon si si-layers"></i>
                                    <span class="nav-main-link-name">Libro</span>
                                </a>
                            </li>

                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>

        <header id="page-header">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>

                    <a type="button" class="btn btn-sm btn-alt-secondary me-2" href="<?= site_url('/') ?>">
                        <i class="fa fa-fw fa-home"></i> Inicio
                    </a>
                </div>


            </div>

            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
        </header>

        <main id="main-container">

        