<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">

            <div class="span6"><a href="login.php">Đăng nhập</div>

            <div class="span6">
                <div class="pull-right">
                    <a href="cart.php"><span class="btn btn-mini btn-primary"><i
                                    class="icon-shopping-cart icon-white"></i> [ 0 ] sản phẩm trong giỏ hàng </span>
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
                    <li class=""><a href="<?=$this->Url->build(['controller'=>'sanpham','action'=>'index'])?>">Sản phẩm</a></li>
                    <li class=""><a href="<?=$this->Url->build('/search')?>">Tìm kiếm</a></li>
                    <li class=""><a href="<?=$this->Url->build(['controller'=>'sanpham','action'=>'discount'])?>">Giảm giá</a></li>
                    <li class=""><a href="contact.php">Liên hệ</a></li>
                    <li class="">
                        <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span
                                    class="btn btn-large btn-success">Đăng nhập</span></a>
                        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login"
                             aria-hidden="false">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Đăng nhập</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm" method="POST">
                                    <div class="control-group">
                                        <input type="text" id="inputEmail" name="inputUsername" placeholder="Username">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" id="inputPassword" name="inputPassword"
                                               placeholder="Password">
                                    </div>
                                    <div class="control-group">
                                        <button type="submit" name="login" class="btn btn-success">Đăng nhập</button>
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>