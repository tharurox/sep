<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title; ?></title>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


        <link href='http://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.css' rel='stylesheet' />
        <link href='http://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link href='http://fullcalendar.io/js/fullcalendar-scheduler-1.0.1/scheduler.min.css' rel='stylesheet' />
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
        <script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.js'></script>
        <script src='http://fullcalendar.io/js/fullcalendar-scheduler-1.0.1/scheduler.js'></script>


        <!-- DataTables Plugin -->
        <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css">
        <!-- Bootstrap -->
        <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-material-design.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/ripples.min.css"); ?>">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- <link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet"> -->
        <script type="text/javascript" language="javascript" src="http://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- SweetAlert -->
        <script src="<?php echo base_url("assets/plugins/sweetalert/sweetalert.min.js"); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/plugins/sweetalert/sweetalert.css"); ?>">

        <!-- Tooltip Init -->
        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

        <!-- colour box styles & script -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css" rel="stylesheet"/>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>

        <!-- Favicon -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

    </head>
    <body>
