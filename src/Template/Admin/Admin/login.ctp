<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?= $this->Flash->render('auth') ?>

                <form id="loginform" class="form-horizontal" role="form" action="<?php echo $this->Url->build(["controller" => "Admin", "action" => "login"]) ?>" method="POST">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name='username' required="required" placeholder="username or email"/>
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name='password' required="required" placeholder="password"/>
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <input type="submit" name="submit_dangnhap" id="btn-login" class="btn btn-success" value="Login"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account!
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" role="form" method="POST" action="xuly.php">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Tên đăng nhập</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="user_dangki" placeholder="Tên đăng nhập" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Mật khẩu</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="pass_dangki" placeholder="Mật khẩu" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Nhập lại mật khẩu</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="repass_dangki" placeholder="Nhập lại mật khẩu" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Họ và tên</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="fullname_dangki" placeholder="Họ và tên" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email_dangki" placeholder="Email" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Mobile</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="mobile_dangki" placeholder="Mobile" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Địa chỉ</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address_dangki" placeholder="Địa chỉ" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <input id="btn-signup" type="submit" class="btn btn-info" name="submit_dangki" value="Sign Up" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>