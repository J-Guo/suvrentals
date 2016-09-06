<?php
//include "admin/db/connections.php";
//$book = new User();
?>
<link href="assets/css/themes/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!--<link href="assets/css/themes/bootstrap.min.css" rel="stylesheet">-->
<link href="assets/css/themes/simple.min.css" rel="stylesheet">
<!--<link href="css/themes/style-newsticker.css" rel="stylesheet" type="text/css"/>-->

<!--<link href='assets/css/font-awesome.css' rel='stylesheet' type='text/css'>-->

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="assets/js/jquery.marquee.js"></script>-->

<style>



</style>


<div class="block-hdnews" style="width:100%;border:1px solid rgba(255,255,255,0.3)">
    <div class="list-wrpaaer" style="height:278px">
        <ul class="list-aggregate" style="width:100%;list-style: none" id="marquee-vertical">
            <?php
            /*$select = mysql_query("SELECT * FROM tbldoc");
            while($row = mysql_fetch_array($select))*/
            $querys = $book -> selectVehicleDetails();
            foreach ($querys as $row)
            {
               ?>
                <li style="width:100%; height:140px;">
                    <div style="padding:0 10px;">
                        <p><strong><?php echo $row['brand']." ".$row['vname']; ?></strong></p>
                        <span style="padding:0;color:#99002f;">
                        <div class="thumb100"> <img src="admin/photos/vehicles/<?php echo $row['image']; ?>" width="100"></div>

                            <p><?php echo $row['description']; ?></p>
                    	&nbsp;</span>


                    </span></div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div><!-- list-wrpaaer -->
</div> <!-- block-hdnews -->



