<div class="container">
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
            <!-- Recent News -->
            <div class="row">
                <div class="col-md-12">
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
                                    <?php if ($cnt < 5) { ?>
                                        <li>
                                            <div class = "media">

                                                <div class = "media-body">
                                                    <strong><a target="_blank" href="<?php echo base_url("index.php/news/view_news/".$row->id ); ?>"><?php echo substr($row->name,0,60)."..."; ?></strong></a><span class="pull-right"><small>Published on <?php echo $row->create_at ?></small></span>
                                                    <p class="news-item-preview"><?php echo strip_tags(substr($row->description,0,150))."..."; ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Events -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <strong><i class="fa fa-calendar" style="margin-right:10px"></i> UPCOMING EVENTS</strong>
                        </div>
                        <div class="panel-body">
                            <ul class="news-items">
            <?php foreach ($count as $row) { ?>
                                    <li>
                                        <div class="news-item-date"> <span class="news-item-day">
                                                <?php
                                                $day = $row->start_date;
                                                $get_date = explode("-", $day);
                                                echo $get_date[2];
                                                ?>
                                            </span> <span class="news-item-month">
                                                <?php
                                                if ($get_date[1] == 1) {
                                                    echo 'Jan';
                                                } else if ($get_date[1] == 2) {
                                                    echo 'Feb';
                                                } else if ($get_date[1] == 3) {
                                                    echo 'Mar';
                                                } else if ($get_date[1] == 4) {
                                                    echo 'Apr';
                                                } else if ($get_date[1] == 5) {
                                                    echo 'may';
                                                } else if ($get_date[1] == 6) {
                                                    echo 'Jun';
                                                } else if ($get_date[1] == 7) {
                                                    echo 'Jul';
                                                } else if ($get_date[1] == 8) {
                                                    echo 'Aug';
                                                } else if ($get_date[1] == 9) {
                                                    echo 'Sep';
                                                } else if ($get_date[1] == 10) {
                                                    echo 'Oct';
                                                } else if ($get_date[1] == 11) {
                                                    echo 'Nov';
                                                } else {
                                                    echo 'Dec';
                                                }
                                                ?>
                                            </span> </div>
                                        <div class="news-item-detail"> <a href="<?php echo base_url("index.php/event/view_upcoming_event_details") . "/" . $row->id; ?>" class="news-item-title" target="_blank"><?php echo $row->title; ?></a>
                                            <p class="news-item-preview"><?php echo $row->description; ?></p>
                                        </div>
                                    </li>
            <?php } ?>

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
        <!-- Right Column -->
        <div class="col-md-6">
            <!-- SHORTCUTS -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <strong><i class="fa fa-bookmark" style="margin-right:10px"></i> SHORTCUTS</strong>
                        </div>
                        <div class="panel-body">
                            <div class="shortcuts">
                                <a href="<?php echo base_url("index.php/year"); ?>" class="shortcut">
                                    <i class="shortcut-icon fa fa-2x fa-calendar"></i>
                                    <span class="shortcut-label">Year Plan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- calender -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <strong><i class="fa fa-calendar" style="margin-right:10px"></i> ONGOING MONTH</strong>
                        </div>
                        <div class="panel-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(function () { // document ready

        $('#calendar').fullCalendar({
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            now: '<?php echo date('Y-m-d'); ?>',
            editable: true,
            aspectRatio: 1.5,
            scrollTime: '00:00',
            header: {
                left: 'today prev,next',
                center: 'title',
                right: 'month'
            },
            defaultView: 'month',
            views: {
                timelineThreeDays: {
                    type: 'timeline',
                    duration: {days: 3}
                }
            },
            events: [
<?php
foreach ($details as $row) {
    $color;
    if ($row->status == 'rejected') {
        $color = 'red';
    } else if ($row->status == 'approved') {
        $color = 'green';
    } else {
        $color = 'blue';
    }
    echo "{id: '$row->id', start: '$row->start_date', end: '$row->end_date', title: '$row->title', color: '$color' , url: '" . base_url('index.php/event/view_event_details') .'/'. $row->id."'},";
}
?>
            ]
        });

    });


</script>
