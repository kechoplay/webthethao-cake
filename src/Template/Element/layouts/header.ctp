<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">
                <?php if ($loginUser): ?>
                    Xin chào!<strong> <?= $loginUser['username'] ?></strong> / <a
                            href="<?= $this->Url->build(['controller' => 'khachhang', 'action' => 'logout']) ?>">Đăng
                        xuất</a>
                <?php else: ?>
                    <a href="<?= $this->Url->build(['controller' => 'khachhang', 'action' => 'register']) ?>">Đăng
                        ký</a>
                <?php endif; ?>
            </div>
            <div class="span6">
                <div class="pull-right">
                    <a href="<?= $this->Url->build(['controller' => 'cart', 'action' => 'index']) ?>"><span
                                class="btn btn-mini btn-primary"><i
                                    class="icon-shopping-cart icon-white"></i> [ <span
                                    id="cart"><?= $countCart ?></span> ] sản phẩm trong giỏ hàng </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="<?= $this->Url->build(['controller' => 'home', 'action' => 'index']) ?>">
                    <?= $this->Html->image('logo/logoheader.png', ["alt" => "tungshop.esy.es", "style" => ['width:65%']]) ?>
                </a>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'index']) ?>">Sản
                            phẩm</a></li>
                    <li class=""><a href="<?= $this->Url->build('/search') ?>">Tìm kiếm</a></li>
                    <li class=""><a
                                href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'discount']) ?>">Giảm
                            giá</a></li>
                    <li class=""><a href="contact.php">Liên hệ</a></li>
                    <li class="">
                        <?php if (!$loginUser):?>
                        <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span
                                    class="btn btn-large btn-success">Đăng nhập</span></a>
                        <?php else: ?>
                            <a href="<?=$this->Url->build(['controller'=>'Khachhang','action'=>'mypage']) ?>">Tài khoản</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>