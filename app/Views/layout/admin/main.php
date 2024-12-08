<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" href="<?=base_url('favicon.ico')?>" type="image/x-icon">
    <title><?= $this->renderSection('title') ?></title>


    <link href="<?=base_url('resources/css/bootstrap-admin.css')?>" rel="stylesheet" />
    <link href="<?=base_url('resources/css/grid/mermaid.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('resources/css/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('resources/css/bootstrap-admin.css')?>" rel="stylesheet" />

    <!-- Development tipy -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="<?=base_url('resources/js/custom-admin.js')?>"></script>
    <script src="<?=base_url('resources/js/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('resources/js/grid/gridjs.umd.js')?>"></script>
    <script src="<?=base_url('resources/js/sweet-alert/sweetalert2.min.js')?>"></script>


</head>
<body>

<?=$this->include('layout/admin/sidebar')?>

<div id="admin-content">
    <?=$this->include('layout/admin/header')?>

    <div id ="admin-main-content" class="p-4 min-vh-100 w-100">


        <?=$this->include('layout/_message')?>

        <div class="container-fluid">
            <?= $this->renderSection('content') ?>
        </div>

    </div>

</div>

</body>

</html>
