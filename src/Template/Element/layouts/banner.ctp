<div id="carouselBlk">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php
            //             echo "<pre>";
            //             print_r($slideimage);
            //             die();
            for ($i = 0; $i < count($slideimage); $i++) {
                if ($i == 0) {
                    ?>
                    <div class="item active">
                        <div class="container" style="width:100%;">
                            <a href="">
                                <?= $this->Html->image('slide/' . $slideimage[$i]['sli_image'], ['style' => 'width:100%']) ?>
                            </a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="item">
                        <div class="container" style="width:100%;">
                            <a href="">
                                <?= $this->Html->image('slide/' . $slideimage[$i]['sli_image'], ['style' => 'width:100%']) ?>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>