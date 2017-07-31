<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">

            <div class="span6">
            <?php if($loginUser): ?>
                Xin chào!<strong> <?=$loginUser['username'] ?></strong> / <a href="<?= $this->Url->build(['controller' => 'khachhang', 'action' => 'logout'])?>">Đăng xuất</a></div>
            <?php else: ?>
                <a href="<?= $this->Url->build(['controller' => 'khachhang', 'action' => 'register']) ?>">Đăng ký</a>
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
                                <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span
                                    class="btn btn-large btn-success">Đăng nhập</span></a>
                                    <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login"
                                    aria-hidden="false">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3>Đăng nhập</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal loginFrm" id="form-login">
                                            <p id="message"></p>
                                            <div class="control-group">
                                                <input type="text" id="inputEmail" name="inputUser" placeholder="Username">
                                            </div>
                                            <div class="control-group">
                                                <input type="password" id="inputPassword" name="inputPass"
                                                placeholder="Password">
                                            </div>
                                            <div class="control-group">
                                                <input type="submit" name="login" class="btn btn-success" value="Đăng nhập">
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
        <?php $urlLogin = Cake\Routing\Router::Url(['controller' => 'khachhang', 'action' => 'login']) ?>
        <script type="text/javascript">
            var urlLogin = "<?=$urlLogin?>";
            $(document).ready(function () {
                $('#form-login').validate({
                    rules: {
                        inputUser: "required",
                        inputPass: "required"
                    },
                    messages: {
                        inputUser: "Bạn hãy điền đủ thông tin",
                        inputPass: "Bạn hãy điền đủ thông tin"
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            type: 'post',
                            url: urlLogin,
                            data: $(form).serialize(),
                            success: function (data) {
                                console.log(data);
                                var obj = JSON.parse(data);
                                if (obj.success) {
                                    location.reload();
                                }else{
                                    $('#message').html(obj.message);
                                }
                            }
                        });
                    }
                });
            });
        </script>