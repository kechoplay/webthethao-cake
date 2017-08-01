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

$description = 'Shop thể thao';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->element('head'); ?>
</head>
<body>
<?php echo $this->element('layouts/header') ?>

<?php echo ($this->request->here == '/home' || $this->request->here == '/') ? $this->element('layouts/banner') : '' ?>

<?php echo $this->element('layouts/slidebar') ?>

<?php echo $this->fetch('content'); ?>

<?= $this->Html->script('addcart.js') ?>

<?php echo $this->element('layouts/footer') ?>

<?php echo $this->element('Popup/login') ?>

<?php echo $this->element('Popup/resetpass') ?>

</body>
</html>