<script type="text/javascript">
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
</script>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?=$this->Url->build('/')?>">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active">Tìm kiếm</li>
    </ul>
    <div>
        <form method="GET" action="<?=$this->Url->build('/search')?>">
            <table class="">
                <tr>
                    <td>Tìm theo danh mục :</td>
                    <td style="padding-left:52px">
                        <select class="srchTxt" name="category">
                            <option value="0">All</option>
                            <?php
                            foreach ($danhmuc as $key => $value) {
                                ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tìm kiếm theo tên :</td>
                    <td style="padding-left:52px;"><input type="text" name="name">

                    </td>
                </tr>
                <tr>
                    <td>Tìm kiếm theo giá :</td>
                    <td>Giá min :<input type="text" onkeypress="return numberOnly(this, event);" name="minprice"
                                        id="minprice"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Giá max:<input type="text" onkeyup="mixMoney(this)" onkeypress="return numberOnly(this, event);"
                                       value="" name="maxprice" id="maxprice"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="search" value="Search"></td>
                </tr>
            </table>
        </form>
    </div>
</div>