<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body { font-family: CHAMARA, CHAMARA; }
</style>
<img src="<?php echo base_url('assets/img/dslogo.jpg'); ?>" width="128px" height="128px" style="margin-left: 19em">
<h3 style="margin-bottom: 0; margin-left: 14em"><?php echo $school_name; ?></h3>
<h5 style="margin-top: 0; margin-left: 14em">Teacher Salary Report</h5>

<div class="row" style="margin-left: 5em">
    <h3><u>Income</u></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th align="left" width="250px"> </th>
                <th align="left" width="250px"> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Consolidated salary</td>
                <td><?php echo $result->value1; ?></td>
            </tr>
            <tr>
                <td>Cost-of-living allowance</td>
                <td><?php echo $result->value2; ?></td>
            </tr>
            <tr>
                <td>Arrears of salaries</td>
                <td><?php echo $result->value3; ?></td>
            </tr>
            <tr>
                <td>Principal Allowances</td>
                <td><?php echo $result->value4; ?></td>
            </tr>
            <tr>
                <td>Other offers</td>
                <td><?php echo $result->value5;?>
                </td>
            </tr>
            <tr>
                <td>Festival Advance</td>
                <td><?php echo $result->value6;?>
                </td>
            </tr>
        </tbody>
    </table>

    
    <h3><u>Expenses</u></h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th align="left" width="250px"> </th>
                <th align="left" width="250px"> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>වැ.අ.වි.වැ.</td>
                <td><?php echo $result->subvalue1; ?></td>
            </tr>
            <tr>
                <td>සී.ස.අ.සේ.ස.ණ.ස</td>
                <td><?php echo $result->subvalue2; ?></td>
            </tr>
            <tr>
                <td>Festival Cost</td>
                <td><?php echo $result->subvalue3; ?></td>
            </tr>
            <tr>
                <td>Special Advance</td>
                <td><?php echo $result->subvalue4; ?></td>
            </tr>
            <tr>
                <td>Distress loan installment</td>
                <td><?php echo $result->subvalue5; ?></td>
            </tr>
            <tr>
                <td>Insurance premium</td>
                <td><?php echo $result->subvalue6; ?></td>
            </tr>
            <tr>
                <td>Property loan</td>
                <td><?php echo $result->subvalue7; ?></td>
            </tr>
            <tr>
                <td>Houses rent</td>
                <td><?php echo $result->subvalue8; ?></td>
            </tr>
               <tr>
                <td>Electricity bills</td>
                <td><?php echo $result->subvalue9; ?></td>
            </tr>
               <tr>
                <td>Stamp duty</td>
                <td><?php echo $result->subvalue10; ?></td>
            </tr>
               <tr>
                <td>Government Bonds Association</td>
                <td><?php echo $result->subvalue11; ?></td>
            </tr>
               <tr>
                <td>Premium rate of public servants</td>
                <td><?php echo $result->subvalue12; ?></td>

    </table>

</div>
