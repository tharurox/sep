<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title; ?></title>

        <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
        <style>
            * {
                font-family: sans-serif;
            }
            header {
                text-align: center;
                font-size: 2em;
            }
            header img {
                display: block;
                width: 200px;
                height: 200px;
                margin-left: auto;
                margin-right: auto;
            }
            header span {
                display: block;
                font-size: 0.75em;
            }
            .container {
                max-width: 960px;
                margin-left: auto;
                margin-right: auto;
            }
            table {
                width: 100%;
            }
            .datagrid table { 
                border-collapse: collapse; 
                text-align: left; 
                width: 100%; 
            } 
            .datagrid {
                background: #fff; 
                overflow: hidden; 
                border: 1px solid #A65B1A; 
            }
            .datagrid table td, .datagrid table th { 
                padding: 3px 10px; 
            }
            .datagrid table thead th {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #A65B1A), color-stop(1, #7F4614) );
                background:-moz-linear-gradient( center top, #A65B1A 5%, #7F4614 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#A65B1A', endColorstr='#7F4614');
                background-color:#A65B1A; 
                color:#FFFFFF; 
                font-size: 15px; 
                font-weight: bold; 
                border-left: 1px solid #BF691E; 
            }
            .datagrid table thead th:first-child { 
                border: none; 
            }
            .datagrid table tbody td { 
                color: #7F4614; 
                border-left: 1px solid #D9CFB8;
                font-size: 12px;font-weight: normal; 
            }
            .datagrid table tbody .alt td { 
                background: #F0E5CC; color: #7F4614; 
            } 
            .datagrid table tbody td:first-child { 
                border-left: none; 
            }
            .datagrid table tbody tr:last-child td { 
                border-bottom: none; 
            }
            .datagrid table tfoot td div { 
                border-top: 1px solid #A65B1A;
                background: #F0E5CC;
            } 
            .datagrid table tfoot td { 
                padding: 0; 
                font-size: 12px 
            } 
            .datagrid table tfoot td div { 
                padding: 2px; 
            }
            .datagrid table tfoot td ul { 
                margin: 0; 
                padding:0; 
                list-style: none; 
                text-align: right; 
            }
            .datagrid table tfoot  li { 
                display: inline; 
            }
            .datagrid table tfoot li a { 
                text-decoration: none; 
                display: inline-block;  
                padding: 2px 8px; 
                margin: 1px;
                color: #FFFFFF;
                border: 1px solid #A65B1A;
                -webkit-border-radius: 3px; 
                -moz-border-radius: 3px; 
                border-radius: 3px; 
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #A65B1A), color-stop(1, #7F4614) );
                background:-moz-linear-gradient( center top, #A65B1A 5%, #7F4614 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#A65B1A', endColorstr='#7F4614');
                background-color:#A65B1A; 
            }
            .datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { 
                text-decoration: none;
                border-color: #7F4614; color: #FFFFFF; 
                background: none; background-color:#A65B1A;
            }
            div.dhtmlx_window_active, div.dhx_modal_cover_dv { 
                position: fixed !important;
            }
            table, th, td {
                border: 1px solid black;
                padding: 0px;
                margin: 0px;
            }
        </style>
    </head>
    <body>
        <A HREF="javascript:window.print()"><i class="fa fa-file-pdf-o"></i> Print Report</a>
        <header>
            <img style="display: block;" src="<?php echo base_url('assets/img/dslogo.jpg'); ?>" width="200" height="200" />
            D. S. SENANAYAKE COLLEGE
            <span style="display: block;">
                <?php
                if ($report_type == "AB") :
                    echo "Absent List For:";
                else:
                    echo "Attendance Report For:";
                endif;
                echo $date;
                ?>
            </span>
        </header>
        <div class="container">
            <div class="datagrid">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Signature #</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->signature_no; ?></td>
                                <td><?php echo $row->name_with_initials; ?></td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>


                </table>
            </div>

        </div>

    </body>
</html>
