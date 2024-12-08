<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" id="meta-url-value-og" content="">
    <meta property="og:title" id="meta-title-value-og" content="">
    <meta name="description" id="meta-description-value" content="">

    <link rel="icon" href="<?=base_url('favicon.ico')?>" type="image/x-icon">

    <link rel="stylesheet" href="<?=base_url('resources/css/bootstrap.css')?>">

    <title><?= $this->renderSection('title') ?></title>

    <script src="<?=base_url('resources/js/bootstrap/bootstrap.bundle.min.js')?>"></script>


</head>

<body>


<div class="min-vh-100">
    <?= $this->renderSection('content') ?>
</div>



</body>
</html>