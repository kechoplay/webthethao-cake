<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?=$this->Url->build(['controller'=>'home'])?>">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active">Đăng kí</li>
    </ul>
    <h3> Đăng kí</h3>
    <div class="well">

        <!-- <div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
         </div>-->
        <div class="alert fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
         </div>
        <div class="alert alert-block fade in" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>

        </div>
        <form class="form-horizontal" id="form-register">
            <h4>Thông tin cá nhân</h4>
            <div class="control-group">
                <label class="control-label" for="username">Username <sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="username" name="username" placeholder="Username">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password <sup>*</sup></label>
                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="Password" pattern="/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="repassword">Re-Password <sup>*</sup></label>
                <div class="controls">
                    <input type="password" id="repassword" name="repassword" placeholder="Re-Password">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="fullname">Fullname <sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="fullname" name="fullname" placeholder="Full name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email">Email <sup>*</sup></label>
                <div class="controls">
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="mobile">Mobile <sup>*</sup></label>
                <div class="controls">
                    <input type="text" id="mobile" name="mobile" onkeypress="return numberOnly(this, event);" placeholder="Mobile">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="address">Address <sup>*</sup></label>
                <div class="controls">
                    <textarea id="address" name="address" placeholder="Address"></textarea>
                </div>
            </div>

            <p><sup>*</sup>Điền đầy đủ thông tin </p>

            <div class="control-group">
                <div class="controls">
                    <input class="btn btn-large btn-success" type="submit" value="Đăng ký"/>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function numberOnly(myfield, e) {
        var key, keychar;
        if (window.event) {
            key = window.event.keyCode
        } else if (e) {
            key = e.which
        } else {
            return true
        }
        keychar = String.fromCharCode(key);
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
            return true
        } else if (("0123456789").indexOf(keychar) > -1) {
            return true
        }
        return false;
    }
    $(document).ready(function () {
        $('#form-register').validate({
            rules : {
                username : "required",
                password : {
                    required : true,
                    minlength : 6
                },
                repassword : {
                    required : true,
                    equalTo : "#password",
                    minlength : 6
                },
                email : {
                    required : true,
                    email : true
                },
                fullname : "required",
                mobile : "required",
                address : "required",
            },
            messages : {
                username : "Bạn hãy nhập thông tin",
                password : {
                    required : "Bạn hãy nhập thông tin",
                    minlength : "Mật khẩu phải có ít nhất 6 kí tự"
                },
                repassword : {
                    required : "Bạn hãy nhập thông tin",
                    minlength : "Mật khẩu phải có ít nhất 6 kí tự",
                    equalTo : "Mật khẩu nhập lại không chính xác"
                },
                email : {
                    required : "Bạn hãy nhập thông tin",
                    email : "Email không đúng định dạng"
                },
                fullname : "Bạn hãy nhập thông tin",
                mobile : "Bạn hãy nhập thông tin",
                address : "Bạn hãy nhập thông tin"
            },
            submitHandler : function (form) {
                console.log($(form).serialize());
                $.ajax({
                    type:'post',
                    url:'/khachhang/register',
                    data:$(form).serialize(),
                    success: function (data) {
                        var data=JSON.parse(data);
                        console.log(data);
                        if (data.success){

                        }
                    }
                });
            }
        });
    });
</script>