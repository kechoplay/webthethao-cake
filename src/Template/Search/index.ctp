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
        <form method="get" action="<?=$this->Url->build(['controller'=>'search','action'=>'index'])?>">
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
                    <td style="padding-left:52px;">
                        <input id="ex2" type="text" class="span2" name="price" data-slider-min="<?=$minprice['pro_price']?>" data-slider-max="<?=$maxprice['pro_price']?>"
                               data-slider-step="10000" data-slider-value="[<?=$minprice['pro_price']?>,<?=$maxprice['pro_price']?>]"/> 
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left:52px;">
                        <span id="min"><?=$minprice['pro_price']?></span>
                        <span id="max" style="float: right;"><?=$maxprice['pro_price']?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="search" value="Search"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
        if(isset($sanpham)) {
            echo "<pre>";
            print_r($sanpham);
//            die();
        }
    ?>
</div>
<script>
    $(document).ready(function () {
        $("#ex2").slider({
            tooltip:'show',
        });
        $("#ex2").on('slide',function(slideEvt) {
                $('#max').text(slideEvt.value[1]);
                $('#min').text(slideEvt.value[0]);
            }
        );
    });
</script>