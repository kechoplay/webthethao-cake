</div>
</div>
</div>
<!-- Footer ================================================================== -->
<div id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="acount.php">YOUR ACCOUNT</a>
                <a href="#">PERSONAL INFORMATION</a>
                <a href="#">ADDRESSES</a>
                <a href="#">DISCOUNT</a>
                <a href="#">ORDER HISTORY</a>
            </div>
            <div class="span3">
                <h5>THÔNG TIN</h5>
                <a href="contact.php">LIÊN HỆ</a>
                <a href="register.php">ĐĂNG KÍ THÀNH VIÊN</a>
            </div>
            <div class="span3">
                <h5>OUR OFFERS</h5>
                <a href="index.php">SẢN PHẨM MỚI</a>
                <a href="index.php">BÁN CHẠY NHẤT</a>
                <a href="special_offer.php">GIẢM GIÁ ĐẶC BIỆT</a>
            </div>
            <div id="socialMedia" class="span3 pull-right">
                <h5>SOCIAL MEDIA </h5>
                <a href="https://www.facebook.com/kieusontung">
                    <?= $this->Html->image('facebook.png', [
                        'alt' => 'facebook',
                        'title' => 'facebook',
                        'style' => ['width:60', 'height:60']
                    ]) ?>
                </a>
                <a href="#">
                    <?= $this->Html->image('twitter.png', [
                        'alt' => 'twitter',
                        'title' => 'twitter',
                        'style' => ['width:60', 'height:60']
                    ]) ?>
                </a>
                <a href="https://www.youtube.com/channel/UCwIvGjnD7dPo6KTKNn_wMhA">
                    <?= $this->Html->image('youtube.png', [
                        'alt' => 'youtube',
                        'title' => 'youtube',
                        'style' => ['width:60', 'height:60']
                    ]) ?>
                </a>
            </div>
        </div>
        <p class="pull-right">&copy; Bootshop</p>
    </div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('prettify.js') ?>
<?= $this->Html->script('bootshop.js') ?>
<?= $this->Html->script('jquery.lightbox-0.5.js') ?>

