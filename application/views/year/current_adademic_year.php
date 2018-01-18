<div class="container">
    <div class="row">
        <!-- Right Column -->
        <div class="col-md-12">
            <!-- calender -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <strong><i class="fa fa-calendar" style="margin-right:10px"></i> Current Academic Year</strong>
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
foreach ($final as $row => $value) {
    $color;
    $title;
    if ($value == 0) {
        continue;
    } elseif ($value == 1) {
        $color = '#4FC3F7';
        $title = "School Holiday";
        echo "{id: '$row', start: '$row', end: '$row', title: '$title', color: '$color',allDay: true },";
    } elseif ($value == 2) {
        $color = '#F44336';
        $title = "Poya Holiday";
        echo "{id: '$row', start: '$row', end: '$row', title: '$title', color: '$color',allDay: true },";
    }elseif ($value == 3) {
        $color = '#4CAF50';
        $title = "Religious Holiday";
        echo "{id: '$row', start: '$row', end: '$row', title: '$title', color: '$color',allDay: true },";
    }elseif ($value == 4) {
        $color = '#8BC34A';
        $title = "Special Holiday";
        echo "{id: '$row', start: '$row', end: '$row', title: '$title', color: '$color',allDay: true },";
    }else {
        $color = '#FFEB3B';
        $title = "Special School Day";
        echo "{id: '$row', start: '$row', end: '$row', title: '$title', color: '$color',allDay: true },";
    }


}
?>
            ]
        });

    });


</script>
