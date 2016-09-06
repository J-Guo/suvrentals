<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/15
 * Time: 16:53
 */
include "db/connections.php";
$book = new User();

$booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] : null ;

echo $book->deleteBooking($booking_id);