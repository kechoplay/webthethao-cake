<div id="resetpass" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="resetpass"
     aria-hidden="false">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Reset Password</h3>
    </div>
    <div class="modal-body">
        Hãy nhập email tài khoản của bạn. Chúng tôi sẽ gửi mật khẩu mới đến cho bạn. Xin cảm ơn<br/><br/>
        <form method="POST">
            <div class="control-group">
                <p id="message"></p>
                <label class="control-label" for="inputEmail1">Tên đăng nhập</label>
                <div class="controls">
                    <input class="span3" type="text" id="inputUsername" placeholder="Username" name="user">
                </div>
                <label class="control-label" for="inputEmail1">Địa chỉ email</label>
                <div class="controls">
                    <input class="span3"  type="email" id="inputEmail1" placeholder="Email" name="email">
                </div>

            </div>
            <div class="controls">
                <button type="submit" name="guiemail" class="btn block">Gửi</button>
            </div>
        </form>
    </div>
</div>