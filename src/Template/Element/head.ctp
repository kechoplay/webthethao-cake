<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
    <?= $title ?>
</title>
<?= $this->Html->css('base2.css') ?>
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('bootstrap-responsive.min.css') ?>
<?= $this->Html->css('font-awesome.css') ?>
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('jquery.validate.min.js') ?>
<!--<link id="callCss" rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>-->
<!--<link href="css/base2.css" rel="stylesheet" media="screen"/>-->
<!--<!-- Bootstrap style responsive -->
<!--<link href="css/bootstrap-responsive.min.css" rel="stylesheet"/>-->
<!--<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/> -->
<!---->
<!--<link href="css/font-awesome.css" rel="stylesheet" type="text/css">-->
<!--<script src="themes/js/jquery.js" type="text/javascript"></script>-->
<!--<script src="js/jquery.min.js" type="text/javascript"></script>-->
<!--<!-- Google-code-prettify -->
<!--<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>-->

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>