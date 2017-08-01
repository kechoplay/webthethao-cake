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
                <input type="text" id="inputEmail" name="username" placeholder="Username">
            </div>
            <div class="control-group">
                <input type="password" id="inputPassword" name="password"
                       placeholder="Password">
            </div>
            <div class="control-group">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#resetpass" data-dismiss="modal" style="text-decoration:none">Quên mật khẩu
                    ?</a>
            </div>
            <div class="control-group">
                <input type="submit" class="btn btn-success" value="Đăng nhập">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
            </div>
        </form>
    </div>
</div>
<?php $urlLogin = Cake\Routing\Router::Url(['controller' => 'Khachhang', 'action' => 'login']) ?>
<script type="text/javascript">
    var urlLogin = "<?=$urlLogin?>";
    $(document).ready(function () {
        $('#form-login').validate({
            rules: {
                username: "required",
                password: "required"
            },
            messages: {
                username: "Bạn hãy điền đủ thông tin",
                password: "Bạn hãy điền đủ thông tin"
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
                        } else {
                            $('#message').html(obj.message);
                        }
                    }
                });
            }
        });
    });
</script>