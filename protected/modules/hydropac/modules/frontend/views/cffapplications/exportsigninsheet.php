<center>
<h2>SIGN IN SHEET</h2>
<h3><?php echo $event->title; ?></h3>    
<h4>***ALL ATTENDEES MUST SIGN BELOW***</h4>

<table>
    <tr>
        <th>Attendee</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Signature</th>
        <th>Time IN</th>
        <th>Time OUT</th>
    </tr>
    <?php
    $count = 0;
    foreach ($rs as $rw){
        $count++;
        ?>
        <tr>
            <td width = "5%"><?php echo $count ?></td>
            <td width = "15%"><?php echo $rw->last_name ?></td>
            <td width = "15%"><?php echo $rw->first_name ?></td>
            <td width = "35%"></td>
            <td width = "15%"></td>
            <td width = "15%"></td>
        </tr>
        <?php
    }
    ?>
</table>
<br><br>
<p style="font-family: Arial, Helvetica, sans-serif; font-size:11px; color: #333; text-align: justify;">By attending this class, I understand that the presenter and NACFF are not affiliated with any government agency, including, but not limited to the Department of Labor. This class is provided for educational purposes only and does not constitutes as advice. The information contained within this class is based on current laws and rules, which may change in the future. NACFF cannot be held responsible for any direct or incidental loss resulting from applying any of the information provided in this publication or from any other source mentioned.</p>
</center>
<style>
    h1,h2,h3,h4{margin:0px 0 10px 0; padding: 0px; line-height: normal; font-family: Arial, Helvetica, sans-serif;}
   h2{ font-size: 21px;}
   h3{ font-size: 18px;}
   h4{ font-size: 15px;}
    table { width: 100%;
    border-width: thin;
    border-spacing: 2px;
    border-style: none;
    border-color: black;
    border-collapse: collapse;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    letter-spacing: 0.5px;
}
th, td { border:solid 1px #333;
    padding: 10px;
    text-align: left;
}
th {
    height: 30px; background: #BCE774;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
