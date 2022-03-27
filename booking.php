<?php
include_once('configure.php');
$query="select * from book";
$result=mysqli_query($query);

?>
<!DOCTYPE html>
<html>
    <title>
        <head>Fetch Data From Database</head>
    </title>
    <body>
        <table align="center" boarder="1px" style="width:600px; line-height:40px;">
            <tr>
                <th colspan="4"><h2>Booking Record</h2></th>
            </tr>
            <t>
                <th> bookID </th>
                <th> name </th>
                <th> email </th>
                <th> number </th>
                <th> address </th>
                <th> arrivals </th>
                <th> leaving </th>
           </t>

           <?php
           while($row=mysql_fetch_assoc($result))
           {
           ?>
               <tr>
                   <td><?php echo $rows.['bookID'] $?</td>
                   <td><?php echo $rows.['name'] $?</td>
                   <td><?php echo $rows.['email'] $?</td>
                   <td><?php echo $rows.['number'] $?</td>
                   <td><?php echo $rows.['address'] $?</td>
                   <td><?php echo $rows.['arrivals'] $?</td>
                   <td><?php echo $rows.['leaving'] $?</td>
               </tr>
               <?php
                  }
                  ?>
        </table>
    </body>
</html>