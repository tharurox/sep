
<!DOCTYPE html>
<html id="dvContainer2">
    <head>
        <title>Staff Report</title>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <style>
            .btn-danger {
                color: #fff;
                background-color: #d9534f;
                border-color: #d43f3a;
            }
            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 24px;
                font-weight: normal;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            *{
                font-family: 'Open Sans', sans-serif;
                font-weight: 400;
            }
            h1, h2, h3{
                text-align: center;
            }
            .report{
            }
            .report, .report th, .report td{
                /*text-align: justify;*/
                border: 1px solid black;
                border-collapse: collapse;
            }
            .report .headerRow{
                height:300px;
            }
            .report .salary{
                text-align: right;
            }
            .report .center{
                text-align: center;
            }
            .numbers td{
                text-align: center;
            }
            .secret td{
                border-top: 1px solid white;
                border-left: 1px solid white;
                border-right: 1px solid white;
            }
            .numberCol{
                text-align: left;
                white-space: nowrap;
                text-overflow: ellipsis;
                min-width: 25px;
                max-width: 25px;

                writing-mode: bt-rl;
                text-indent: -7.5em;
                padding: 0px 0px 0px 0px;
                margin: 0px;
            }
            .upcol{
                position: relative;
                text-align: left;
                white-space: nowrap;
                top: 50px;
                text-overflow: ellipsis;
                min-width: 25px;
                max-width: 25px;
                /*display: block;*/
                /*background-color: white;*/
                /*border-bottom: 1px solid black;*/

                writing-mode: bt-rl;
                /*text-indent: -7.5em;*/
                padding: 0px 0px 0px 0px;
                margin: 0px;

            }
            .upcol1{
                position: relative;
                text-align: left;
                white-space: nowrap;
                top: 265px;
                left: 0px;
                text-overflow: ellipsis;
                min-width: 25px;
                max-width: 25px;
                /*display: block;*/
                /*background-color: white;*/
                /*border-bottom: 1px solid black;*/

                writing-mode: bt-rl;
                /*text-indent: -7.5em;*/
                padding: 0px 0px 0px 0px;
                margin: 0px;

            }

            .whiteBox{
                display: block;
                position: relative;
                z-index: 3;
                background-color: #ffffff;
                left:1px;
                top:15px;
                padding-top: 10px;
                padding-bottom: 20px;
                width: 74px;
                height: 32px;
                border-bottom: 1px solid #000000;
            }
            .whiteBoxdown{
                display: block;
                position: relative;
                z-index: 1;
                /*background-color: #ffffff;*/
                text-indent:1em;
                left:-5px;
                top:0px;

                /*padding-top: 10px;*/

                width: 247px;
                border-left: 1px solid #000000;
                border-top: 5px solid #ffffff;
            }
            .whiteBoxup{
                display: block;
                position: relative;
                z-index: 1;
                /*background-color: #ffffff;*/
                text-indent:1em;
                left:-5px;
                top:0px;

                /*padding-top: 10px;*/

                width: 230px;
                border-left: 1px solid #000000;
                border-bottom: 1px solid #ffffff;
            }
            #col_0{
                text-indent: -6.5em;
                max-width: 50px;
                min-width: 50px;
            }
            #col_1{
                max-width: 300px;
                min-width: 300px;
                padding-left: 10px;
                padding-right: 10px;
            }
            #col_26{
                max-width: 180px;
                min-width: 180px;
                /*padding-left: 8px;*/
                /*padding-right: 8px;*/
            }
            #col_27{
                text-align: justify;
                padding-left: 14px;
                padding-right: 14px;

                max-width: 200px;
                min-width: 200px;
            }
            .rotate { /*http://css-tricks.com/snippets/css/text-rotation/ */
                /* Safari */
                -webkit-transform: rotate(-90deg);
                /* Firefox */
                -moz-transform: rotate(-90deg);
                /* IE */
                -ms-transform: rotate(-90deg);
                /* Opera */
                -o-transform: rotate(-90deg);
                /* Internet Explorer */
                filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

                /*vertical-align: top;*/
            }
        </style>
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <br>
        <h2>
        <?php
        $today = date('Y-m-d');
        $day = explode("-", $today);
        echo $day[0];
          if($day[1] == '01'){ echo  ' ජනවාරි ';}
        else if($day[1] == '02'){ echo  ' පෙබරවාරි '; }
        else if($day[1] == '03'){ echo  ' මාර්තු ' ;}
        else if($day[1] == '04'){ echo  ' අප්රේල්' ; }
        else if($day[1] == '05'){ echo  ' මැයි ' ;}
        else if($day[1] == '06'){ echo  ' ජූනි ' ;}
        else if($day[1] == '07'){ echo  ' ජුලි ' ;}
        else if($day[1] == '08'){ echo  ' අගෝස්තු ' ;}
        else if($day[1] == '09'){ echo ' සැප්තැම්බර් '; }
        else if($day[1] == '10'){ echo  ' ඔක්තෝබර් ' ;}
        else if($day[1] == '11'){ echo ' නොවැම්බර් '; }
        else if($day[1] == '12'){ echo  ' දෙසැම්බර් ' ;}
        echo $day[2];
        ?> දිනට පාසලේ අධ්‍යයන කාර්ය මණ්ඩලවල තොරතුරු</h2>
        <input id="btnPrint" style="margin-left: 50em" class="btn btn-danger" type="button" value="Print Report" />
        <h3>සැම විදුහල්පති තනතුරු ධාරියකු හා ගුරුවරයකු සඳහා ම සියලුම තීරු සම්පුර්ණ කිරීම අනිවාර්යය වේ. මුල් පිටුවේ උපදෙස් හොදින් කියවන්න.</h3>
        <div id="dvContainer">
        <table class="report">
            <tr class="secret">
                <td></td>
                <td></td>
                <td class="upcol"><div class="whiteBox">උපන් දිනය</div></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="upcol1 rotate"><div class="whiteBoxup">විදුහල්පති ධුරයට හෝ ගුරු සේවය</div></td>
                <td class="upcol1 rotate"><div class="whiteBoxdown">පනවූ වර්ෂය හා මාසය </div></td>
                <td class="upcol1 rotate"><div class="whiteBoxup">මෙම විදුහලේ මන්වීම භාරගත</div></td>
                <td class="upcol1 rotate"><div class="whiteBoxdown">වර්ෂය හා මාසය</div></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="10"></td>
            </tr>
            <tr></tr>
            <tr class="headerRow">
                <td id="col_0" class="rotate numberCol">අනුක්‍රමික අංකය</td>
                <td id="col_1"><p>විදුහල්පතිගේ නම මුලින්ම ලියන්න. මුලකුරු මුලට සිටින සේ ගුරුහවතුන්ගේ නම් ඉංග්‍රීසි කැපිටල් අකුරින් ලියන්න.</p><p>(විදුහල්පතිධුරය දරන්නේ පිරිමි අයෙකු නම් පිරිමින්ගේ විස්තර මුලින් ලියා කාන්තාවන්ගේ විස්තර දෙවනුව ලියන්න. විදුහල්පතිධුරය දරන්නේ ගැහැනු  අයෙකු නම් කාන්තාවන්ගේ විස්තර මුලින් ලියා පිරිමින්ගේ විස්තර දෙවනුව ලියන්න.) (පළමු පිටුවේ සඳහන් උපදෙස් පිළිපදින්න)</p></td>
                <td id="col_2" class="rotate numberCol">වර්ෂය (අවසන් අංකය දෙක)</td>
                <td id="col_3" class="rotate numberCol">මාසය</td>
                <td id="col_4" class="rotate numberCol">දිනය</td>
                <td id="col_5" class="rotate numberCol">ස්ත්‍රී / පුරුෂ භාවය</td>
                <td id="col_6" class="rotate numberCol">ජනවර්ගය</td>
                <td id="col_7" class="rotate numberCol">ආගම</td>
                <td id="col_8" class="rotate numberCol">විවාහක / අවිවාහක බව</td>
                <td id="col_9" class="rotate numberCol">අවු</td>
                <td id="col_10" class="rotate numberCol">මාස</td>
                <td id="col_11" class="rotate numberCol">අවු</td>
                <td id="col_12" class="rotate numberCol">මාස</td>
                <td id="col_13" class="rotate numberCol">පාසලට පත්වීමේ ස්වභාවය</td>
                <td id="col_14" class="rotate numberCol">පැනවීමේ ලද මාධ‍යය</td>
                <td id="col_15" class="rotate numberCol">පාසලේ දරන තනතුර</td>
                <td id="col_16" class="rotate numberCol">ඉහලම අධ්‍යාපන සුදුසුකම</td>
                <td id="col_17" class="rotate numberCol">ඉහලම වෘත්තීය  සුදුසුකම</td>
                <td id="col_18" class="rotate numberCol">වර්තමාන පත්වීමේ වර්ගීකරණය</td>
                <td id="col_19" class="rotate numberCol">නිරතවන කාර්යය</td>
                <td id="col_20" class="rotate numberCol">වැඩිම කාලයක් උගන්වන විෂයය</td>
                <td id="col_21" class="rotate numberCol">දෙවනුව වැඩි කාලයක් උගන්වන විෂයය</td>
                <td id="col_22" class="rotate numberCol">අදාළ සේවය / ශ්‍රේණීය</td>
                <td id="col_23" class="rotate numberCol">අනියම් / විවේක</td>
                <td id="col_24" class="rotate numberCol">රාජකාරි / අධ්‍යයන</td>
                <td id="col_25" class="rotate numberCol">ප්‍රසූත නිවාඩු</td>
                <td id="col_26" class="rotate">2013 මැයි මස මුළු වැටුප (සියලුම දීමනා ඇතුලත් කළ යුතු අතර අඩු කිරීම නොසලකන්න. පැරණි හිඟ මුදල් ශත ගණන් ඇතුලත් නොකරන්න)</td>
                <td id="col_27" class="" colspan="10"><p>සාම නිලධාරියකු සඳහාම අනිවාර්යයෙන් ම ජාතික හැඳුනුම් පත් අංකය සඳහන් කල යුතුය</p><p>ජාතික හැඳුනුම් පත් අංකය </p><p>උදා 583021007 V</p></td>
            </tr>
            <tr class="numbers">
                <td></td>
                <td>01</td>
                <td>02</td>
                <td>03</td>
                <td>04</td>
                <td>05</td>
                <td>06</td>
                <td>07</td>
                <td>08</td>
                <td>09</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td colspan="10">27</td>
            </tr>
            <?php  foreach ($result as $row) { ?>
                <tr class="numbers">
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->full_name ?></td>
                    <td><?php
                                          $bday = explode("-", $row->dob)  ;
                                          echo substr($bday[0], 2);?>
                    </td>
                    <td><?php echo $bday[1]; ?></td>
                    <td><?php echo $bday[2]; ?></td>
                    <td><?php if($row->gender == 'm'){echo '1';} else{    echo '2';}; ?></td>
                    <td><?php echo $row->nationality_id; ?></td>
                    <td><?php echo $row->religion_id; ?></td>
                    <td><?php if($row->civil_status == 's'){ echo '1';} else if($row->civil_status == 'm'){ echo '2'; } else if($row->civil_status == 'w'){     echo '3'; } else if($row->civil_status == 'o'){     echo '4'; }; ?></td>
                    <td><?php
                                          $regDate = explode("-", $row->first_appointment_date)  ;
                                          echo substr($regDate[0], 2);?>
                    </td>
                    <td><?php echo $regDate[1] ?></td>
                  
                    <td>11</td>
                    <td>12</td>
                    <td><?php echo $row->nature_of_appointment ?></td>
                    <td><?php if($row->medium == 's'){     echo '1';} else if($row->medium == 'e'){    echo '2';} else if($row->medium == 't'){    echo '3';}else{    echo '0';} ?></td>
                    <td><?php echo $row->designation_id ?></td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>19</td>
                    <td><?php echo $row->main_subject_id ?></td>
                    <td>1</td>
                    <td><?php echo $row->grade ?></td>
                    <td><?php echo $applied_casual_leaves; ?></td>
                    <td><?php echo $applied_duty_leaves; ?></td>
                    <td><?php echo $applied_maternity_leaves; ?></td>
                    <td>24500.00</td>
                    <td colspan="10"><?php echo $row->nic_no ?></td>
                </tr>

            <?php } ?>
        </table>
        </div>

        <br />
<script type="text/javascript">
    $("#btnPrint").on('click', function (e){
        var divContents = $("#dvContainer").html();
        var printWindow = window.open('', '', 'height=760,width=1300');
        printWindow.document.write('<html><head><link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">');
        printWindow.document.write('<style>.btn-danger {color: #fff; background-color: #d9534f; border-color: #d43f3a;}');
        printWindow.document.write('*{font-family: "Open Sans", sans-serif;font-weight: 400;}');
        printWindow.document.write('h1, h2, h3{ text-align: center;}');
        printWindow.document.write('.report, .report th, .report td{/*text-align: justify;*/border: 1px solid black;border-collapse: collapse;}');
        printWindow.document.write('.report .headerRow{height:300px;}');
        printWindow.document.write('.report .salary{text-align: right;}');
        printWindow.document.write('.report .center{text-align: center;}');
        printWindow.document.write('.numbers td{text-align: center;}');
        printWindow.document.write('#col_0{text-indent: -6.5em;max-width: 50px;min-width: 50px;}');
        printWindow.document.write('#col_1{max-width: 300px;min-width: 300px;padding-left: 10px;padding-right: 10px;}');
        printWindow.document.write('#col_26{max-width: 180px;min-width: 180px;}');
        printWindow.document.write('#col_27{text-align: justify;padding-left: 14px;padding-right: 14px;max-width: 200px;min-width: 200px;}');
        printWindow.document.write('.secret td{border-top: 1px solid white;border-left: 1px solid white;border-right: 1px solid white;}');
        printWindow.document.write('.numberCol{text-align: left;white-space: nowrap;text-overflow: ellipsis; min-width: 25px;max-width: 25px;writing-mode: bt-rl;text-indent: -7.5em;padding: 0px 0px 0px 0px;margin: 0px;}');
        printWindow.document.write('.upcol{position: relative;text-align: left;white-space: nowrap;top: 50px;text-overflow: ellipsis;min-width: 25px;max-width: 25px;writing-mode: bt-rl;padding: 0px 0px 0px 0px;margin: 0px;}');
        printWindow.document.write('.rotate { -webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);-o-transform: rotate(-90deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);}');
        printWindow.document.write('</style></head><body ><h2 style="text-align: center">2013 ජුනි 01 දිනට පාසලේ අධ්‍යයන කාර්ය මණ්ඩලවල තොරතුරු</h2><h3 style="text-align: center">සැම විදුහල්පති තනතුරු ධාරියකු හා ගුරුවරයකු සඳහා ම සියලුම තීරු සම්පුර්ණ කිරීම අනිවාර්යය වේ. මුල් පිටුවේ උපදෙස් හොදින් කියවන්න.</h3>');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
</script>
    </body>
</html>
