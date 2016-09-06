<?php

$doc = null;
$query = null;


if(isset($_POST['btnDelete']))
{
    $rid = $_POST['rid'];
    $updateComments = $book -> deleteRequest($rid,'Admin');
    $arrerrors['delRequest']= 'You have removed a record now!!!';
}

?>


<div class="panel" data-fill-color="true" id="panel-datatableTools">
    <div class="panel-heading mb-2x">
        <div class="panel-control-input pull-right  mt-2x" id="tt-actions"></div>
        <h3 class="panel-title mt-2x"><i class="fa fa-filter fa-fw"></i>SUV BOOKING REQUESTS</h3><hr class="mb-2x">
    </div><!-- /.panel-heading -->

    <?php if(isset($arrerrors['delRequest']) && count($arrerrors['delRequest']) !=0){
                ?><p class="alert alert-success mt-2x"><?php echo $arrerrors['delRequest']; ?></p><?php } ?></h3><hr class="mb-1x">

    <!-- datatables2 -->
    <table id="datatables2" class="table table-condensed table-noborder table-striped bordered-top">
        <thead>
            <tr>
                <th width="40%">Date &amp; Time</th>
                <th width="30%">Name</th>
                <th width="15%">Contact</th>
                <th width="5%"><i class="fa fa-car"></i> </th>
                <th width="5%"><i class="fa fa-edit"></i> </th>
                <th width="5%"><i class="fa fa-remove pull-right" style="color: red;"></i> </th>
            </tr>
        </thead>

        <tbody>
            <?php
            $query = $book -> selectBookingRequest();
            foreach ($query as $row)
            {
                $rid = $row['id'];
                if($row['view']==0){
                ?>
                    <tr style="color:red;">
                <?php
            }
            else
            {
                ?>

                    <tr>

                        <?php
                        }
                        ?>
                        <form name="form" method="post" action="">
                            <td><?php echo $row['timestamp']; ?></td>
                            <td><?php if( $row['geoAddress']!=null){ ?> <i class="fa fa-globe text-blue" rel="popover" data-placement="left" data-context="info" data-trigger="hover" title="Approximately From" data-content="<?php echo $row['geoAddress']; ?>"></i> <?php } ?><?php echo $row['name']; ?></td>
                            <td style="text-align: center;"><a href="?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&contact=<?php echo $row['phone']; ?>">
                                <?php echo 'View'; ?></a></td>
                            <td><?php if($row['status']=='Contacted'){?> <strong>C</strong> <?php }else{ ?> <strong>B</strong> <?php }?></td>
                            <td><?php if($row['comments']!=null){?> <i class="fa fa-commenting-o" rel="popover" data-placement="left" data-context="info" data-trigger="hover" title="Comment..." data-content="<?php echo $row['comments']; ?>"></i> <?php }?></td>
                            <td>
                                <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                                <button type="submit" name="btnDelete" class="btn btn-link" style="color: red;padding: 0;"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </form>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table><!-- /.table -->
</div><!-- /.panel -->