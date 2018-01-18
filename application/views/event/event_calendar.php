<div class="container">

    <div class="row">

        <div class="col-md-3">
            <?php
            if ($user_type == 'A') {
                $this->view('event/admin_sidebar_nav');
            }else {
                $this->view('event/sidebar_nav_teacher');
            }
            ?>
        </div>

        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Event Calendar</strong>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div id='calendar'></div>
                    </div>
                    <div style='clear:both'></div>
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
            editable: false,
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
    $edate;
    if ($row->status == 'rejected') {
        $color = 'red';
    } else if ($row->status == 'approved') {
        $color = 'green';
    } else {
        $color = 'blue';
    }
    $edate = explode("-", $row->end_date);
    if($row->start_date != $row->end_date){
        $edate[2] = $edate[2]+1;
    }
    $end_day = $edate[0].'-'.$edate[1]. '-'. $edate[2];
    echo "{id: '$row->id', start: '$row->start_date', end: '$end_day', title: '$row->title', color: '$color' , url: '" . base_url('index.php/event/view_event_details') .'/'. $row->id."'},";
}
?>
            ]
        });

    });


</script>
