<?php
    echo "<img src='" . base_url('assets/img/dslogo.jpg') . "' width='128px' height='128px' style='margin-left: 4em' align='center'>";
            echo "<h3 style='margin-bottom: 0; margin-left: 3em'>D.S Senanayake College</h3>";
            echo "<h5 style='margin-top: 0; margin-left: 5em'>Student Leaving Certificate - $result->name_with_initials</h5>";
            echo "<div class='row' style='margin-left: 5em'>
                    <h3><u>Basic Details</u></h3>
                    <table class='table table-hover'>
                    <thead>
                    <tr>
                        <th align='left' width='90%'></th>
                        <th align='left' width='90%'></th>
                    </tr>
                </thead>
                <tbody>";
            echo "<tr align='left' width='50%'>
                    <td>Full Name</td>
                    <td>$result->full_name</td>
                </tr>
                <tr align='left' width='50%'>
                    <td>Name with Initials</td>
                    <td>$result->name_with_initials</td>
                </tr>
                <tr align='left' width='50%'>
                    <td>Birthday</td>
                    <td>$result->dob</td>
                </tr>
                    <tr align='left' width='50%'>
                        <td>Religion</td>
                        <td>";
            if ($result->religion == 1) {
                echo "Buddhism";
            } else if ($result->religion == 2) {
                echo "Hindunism";
            } else if ($result->religion == 3) {
                echo "Islam";
            } else if ($result->religion == 4) {
                echo "Catholicism";
            } else if ($result->religion == 5) {
                echo "Christianity";
            } else {
                echo "Other";
            }
            echo "</td>
                    
                    </tr>
                    <tr align='left' width='50%'>
                    <td>Admission Date</td>
                    <td>$result->admission_date</td>
                </tr>
        </tbody>
    </table>
    <br>
    <p>$description</p>
    
        </div>";
?>