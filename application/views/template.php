<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $judul ?></title>
    <link href="<?= base_url().'assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/vendor/metisMenu/metisMenu.min.css' ?>" rel="stylesheet">
    <link href="<?= base_url().'assets/css/sb-admin-2.css' ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css/style.css' ?>">
    <link href="<?= base_url().'assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url().'assets/js/jquery-3.3.1.min.js' ?>"></script>
    <script type="text/javascript">
        var BaseUrl = "<?php echo base_url(); ?>";
    </script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php echo $_header; ?>
            
            <?php echo $_sidebar ?>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <?php echo $_content ?>
            </div>
        </div>

    </div>

    <script src="<?= base_url().'assets/vendor/bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= base_url().'assets/vendor/metisMenu/metisMenu.min.js' ?>"></script>
    <script src="<?= base_url().'assets/js/sb-admin-2.js' ?>"></script>
    <script src="<?= base_url().'assets/js/custom.js' ?>"></script>
</body>
</html>