<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('admin/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/metisMenu.min.css') ?>
    <?= $this->Html->css('admin/sb-admin-2.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/dataTables.bootstrap.css') ?>
    <?= $this->Html->css('admin/dataTables.responsive.css') ?>
    <?= $this->Html->script('admin/jquery.min.js') ?>
    <?= $this->Html->script('jquery.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<?= $this->element('layoutadmin/header') ?>
    <?= $this->fetch('content') ?>
<?= $this->element('layoutadmin/footer') ?>
</body>
</html>
