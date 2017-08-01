<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?= $this->Url->build('home')?>">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active">Thanh toán</li>
    </ul>
    <h3>Thanh toán</h3>
    <p>

    </p>
    <hr class="soft"/>

    <form id="form-checkout">
        <table class="">
            <tr>
                <td>Tên khách hàng : </td>
                <td style="padding-left:52px;"><input type="text" name="name" value="<?= $loginUser['fullname'] ?>">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ giao hàng : </td>
                <td style="padding-left:52px;"><input type="text"  name="address" id="address"> (Ghi rõ số nhà, ngõ)
                </td>
            </tr>
            <tr>
                <td>Số điện thoại : </td>
                <td style="padding-left:52px;"><input type="text" onkeypress="return numberOnly(this, event);" value="<?=$loginUser['mobile']?>" name="mobile" id="mobile">
                </td>
            </tr>
            <tr>
                <td>Phương thức thanh toán : </td>
                <td style="padding-left:52px;">
                    <select name="tt">
                        <option value="Thanh toán trực tiếp">Thanh toán khi nhận hàng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-left:52px;"><input type="submit" value="Thanh toán"></td>
            </tr>
        </table>
    </form>
</div>
<?=Cake\Network\Session::read('total')?>
<script type="text/javascript">
    function numberOnly(myfield, e){
        var key,keychar;
        if (window.event){
            key = window.event.keyCode
        }else if (e){
            key = e.which
        }else{
            return true
        }
        keychar = String.fromCharCode(key);
        if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)){
            return true
        }else if (("0123456789").indexOf(keychar) > -1){
            return true
        }
        return false;
    }
    $(document).ready(function () {
        $('#form-checkout').validate({
            rules : {
                name : 'required',
                address : 'required',
                mobile : 'reqeuired'
            },
            messages : {
                name : "Không được để trống",
                address : "Không được để trống",
                mobile : "Không được để trống"
            },
            submitHandler : function (form) {
                $.ajax({
                    type: 'post',
                    data : $(form).serialize();
                    success : function (data) {

                    }
                });
            }
        });
    });
</script>