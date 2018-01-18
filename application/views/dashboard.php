<div class="container">

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img style="width: 100%; height:100%; " src="http://udara.info/sep/uploads/2.jpg" alt="">
                    </div>

                    <div class="item">
                      <img style="width: 100%; height:100%;" src="http://udara.info/sep/uploads/1.jpg" alt="">
                    </div>

                    <div class="item">
                      <img style="width: 100%; height:100%;" src="http://udara.info/sep/uploads/3.jpg" alt="">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
    <div class="row" style="margin-top:10px">

    <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong><i class="fa fa-newspaper-o" style="margin-right:10px"></i> RECENT NEWS</strong>
                </div>
                <div class="panel-body">
                    <ul class="news-items">
                        <?php
                        $cnt = 0;
                        foreach ($news as $row) {
                            $cnt = $cnt + 1;
                            ?>
                            <?php if ($cnt < 3) { ?>
                                <li>
                                    <div class = "media">
                                        <div class="pull-right">
                                            <small>Published on <?php echo $row->create_at ?></small>
                                        </div>
                                        <div class = "media-body">
                                            <strong><?php echo $row->name ?></strong>
                                            <p class="news-item-preview"><?php echo $row->description ?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li>
                            <a href=""  id="fillgrid" title='view'>view more</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


	    <div class="col-md-6">
	    	<div class="panel panel-info">
	            <div class="panel-heading">
	                <strong><i class="fa fa-calendar" style="margin-right:10px"></i> UPCOMING EVENTS</strong>
	            </div>
	            <div class="panel-body">
                    <ul class="news-items">
                        <?php foreach ($eventslist as $row) {?>
                        <li>

                            <div class="news-item-date">
                                <span class="news-item-day">
                                    <?php
                                        $day=$row->start_date;
                                        $get_date = explode("-",$day);
                                        echo $get_date[2];
                                    ?>
                                </span>
                                <span class="news-item-month">
                                    <?php
                                    if($get_date[1] == 1){
                                        echo 'Jan';
                                    }
                                    else if($get_date[1] == 2){
                                        echo 'Feb';
                                    }
                                    else if($get_date[1] == 3){
                                        echo 'Mar';
                                    }
                                    else if($get_date[1] == 4){
                                        echo 'Apr';
                                    }
                                    else if($get_date[1] == 5){
                                        echo 'May';
                                    }
                                    else if($get_date[1] == 6){
                                        echo 'Jun';
                                    }
                                    else if($get_date[1] == 7){
                                        echo 'Jul';
                                    }
                                    else if($get_date[1] == 8){
                                        echo 'Aug';
                                    }
                                    else if($get_date[1] == 9){
                                        echo 'Sep';
                                    }
                                    else if($get_date[1] == 10){
                                        echo 'Oct';
                                    }
                                    else if($get_date[1] == 11){
                                        echo 'Nov';
                                    }
                                    else{
                                        echo 'Dec';
                                    }
                                ?>
                                </span>
                            </div>
                            <div class="news-item-detail"> <a href="<?php echo base_url("index.php/event/view_upcoming_event_details")."/".$row->id; ?>" class="news-item-title" target="_blank"><?php echo $row->title; ?></a>
                                <p class="news-item-preview"><?php echo $row->description; ?></p>
                            </div>

                        </li>
                        <?php }?>


                        <li>

                            <div class="news-item-date"> <span class="news-item-day"></span> <span class="news-item-month"></span> </div>
                            <div class="news-item-detail"> <i class="news-item-title" target="_blank">No more events</i>
                                <p class="news-item-preview"></p>
                            </div>

                        </li>
                    </ul>
	            </div>
	    	</div>
	    </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var btnedit = '';
        btnedit = $("#fillgrid");
        btnedit.on('click', function (e) {
            e.preventDefault();
            $.colorbox({
                href: "<?php echo base_url() ?>index.php/dashboard/get_news",
                top: 50,
                width: 700,
                onClosed: function () {
                    fillgrid();
                }
            });
        });

    });
</script>
