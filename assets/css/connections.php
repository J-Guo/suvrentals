<?php
/*session_start();
*/
//include_once 'admin/db/cong.php';

class User
{
    var $connection = null;
    var $result = null;
    var $yr = null;
    var $select = null;
    var $booking_id = null;

    function __construct()
    {
        // Create connection
        $this->connection = new mysqli('localhost', 'root', '','dbsuvbooking');
        //$this->connection = new mysqli('localhost', 'suvrentals', 'SuvRent@2016','suvrenta_dbsuvbooking');
        $this->connection = new mysqli('localhost', 'suvrenta_suvrent', 'SuvRent@2016','suvrenta_newsuvretals');


// Check connection
        if ( $this->connection->connect_error) {
            die("Connection failed: " .  $this->connection->connect_error);
        }
        //echo "Connected successfully";
    }

    function userCount()
    {
        $select = mysqli_query($this->connection,"SELECT * FROM tbluser");
        $rowUser = mysqli_num_rows($select);
        return $rowUser;
    }

    function loginUser($userid, $password)
    {
        /*echo "hello";*/
        $selectUser = mysqli_query($this->connection,"SELECT * FROM tbluser WHERE email='$userid' && password='$password'");
        $rowUser = mysqli_num_rows($selectUser);
        return $rowUser;

        /*$rows= mysql_fetch_array($selectUser);

        $_SESSION['username']=$rows['uname'];
        $_SESSION['userid']= $rows['uid'];*/
    }

    function selectUserDeatails($userid)// login.php
    {
        //echo "hello";
        $selectUser = mysqli_query($this->connection,"SELECT * FROM tbluser WHERE email='$userid' AND status='Active'");
        $row_users = mysqli_fetch_array($selectUser);
        return  $row_users;
    }


    function deleteRequest($rid,$user){

        $sql = "UPDATE tblrequest SET status='Deleted', modified_by='$user' WHERE id='$rid'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
    }

    function selectBookingRequest()
    {
        $result =[];
        $select = mysqli_query($this->connection,"SELECT * FROM tblrequest WHERE status != 'Deleted' ORDER BY id DESC");
        while($row = mysqli_fetch_array($select))
        {
            $result[] = $row;
        }
        return $result;
    }

    function selectBookingDetails()
    {
        //"SELECT * FROM tblbooking INNER JOIN tblcustomer ON tblbooking.mobile = tblcustomer.mobile JOIN tbldelivery ON tblbooking.bid = tbldelivery.bid JOIN tblreturn ON tblbooking.bid = tblreturn.bid WHERE tblbooking.status != 'DropBack' ORDER BY tblbooking.bid DESC"
        $result =[];

        $select = mysqli_query($this->connection,"SELECT * FROM tblbooking INNER JOIN tblcustomer ON tblbooking.mobile = tblcustomer.mobile WHERE tblbooking.status != 'DropBack' ORDER BY tblbooking.bid DESC");

        //$select = mysqli_query($this->connection,"SELECT * FROM tblbooking WHERE status != 'DropBack' ORDER BY bid DESC");
        while($row = mysqli_fetch_array($select))
        {
            $result[] = $row;
        }
        return $result;
    }

    function viewBookedRecords($get_bid){
        $selBooking = mysqli_query($this->connection,"SELECT * FROM tblbooking INNER JOIN tbldelivery ON tblbooking.bid = tbldelivery.bid JOIN tblreturn ON tblbooking.bid = tblreturn.bid JOIN tblcustomer ON tblbooking.mobile = tblcustomer.mobile JOIN tblvehicle ON tblbooking.vrego = tblvehicle.vrego JOIN tblpayment ON tblbooking.bid = tblpayment.bid WHERE tblbooking.bid = '$get_bid'");

        $rowSel = mysqli_fetch_array($selBooking);

        return $rowSel;

    }

    function selectViewRequest($id)
    {
        $select_id = mysqli_query($this->connection,"SELECT * FROM  tblrequest WHERE id = '$id'");
        $row_user_details = mysqli_fetch_array($select_id);
        return $row_user_details;
    }



    function contactBooking($datetime,$name,$phone,$company,$latitude,$longitude,$geoAddress)
	{
        //echo "INSERT INTO tblrequest(timestamp, name, phone,latitude) values ('$datetime', '$name','$phone')";
		$sql = "INSERT INTO tblrequest(timestamp,name,phone,company,latitude,longitude,geoAddress,status) values ('$datetime','$name','$phone','$company','$latitude','$longitude','$geoAddress','Contacted')";
		var_dump($sql);
		$sqlQuery = mysqli_query($this->connection,$sql);
		//var_dump($sqlQuery);

	}

    function  saveCustomerAddress($mobile,$street,$suburb,$pcode,$state,$createdon){
        //echo "INSERT INTO tblcustomer(mobile,fullname,idno,idtype,dob,createdon,status) values ('$get_contact','$fullname','$idno','$doctype','$dob','$createdon','Active')";
        $sql = "INSERT INTO tbladdress(mobile,street,suburb,pcode,state,createdon,status) values ('$mobile','$street','$suburb','$pcode','$state','$createdon','Active')";
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);

    }

    function saveBooking($booking_id,$get_contact,$vrego,$vrate,$pickupbase,$ddate,$dtime,$dropbase,$rdate,$rtime,$log_user){
        //echo "INSERT INTO tblbooking(bid,mobile,vtype,vrego,rate,pickupbase,dropbase,status)
        //values ('$bookid','$get_contact','$vtype','$vrego','$vrate','$pickupbase','$dropbase','Active')";
        $sql = "INSERT INTO tblbooking(bid,mobile,vrego,rate,pickupbase,delivery_date,delivery_time,dropbase,drop_date,drop_time,createdby,status)
        values ('$booking_id','$get_contact','$vrego','$vrate','$pickupbase','$ddate','$dtime','$dropbase','$rdate','$rtime','$log_user','Active')";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function editBooking($booking_id,$vrego,$vrate,$pickupbase,$ddate,$dtime,$dropbase,$rdate,$rtime,$log_user){
        //echo "INSERT INTO tblbooking(bid,mobile,vtype,vrego,rate,pickupbase,dropbase,status)
        //values ('$bookid','$get_contact','$vtype','$vrego','$vrate','$pickupbase','$dropbase','Active')";
        $sql = "UPDATE tblbooking SET vrego = '$vrego',rate = '$vrate',pickupbase = '$pickupbase',delivery_date = '$ddate',delivery_time='$dtime',dropbase='$dropbase',drop_date='$rdate',drop_time='$rtime',modifedby='$log_user',status='Active' WHERE bid = '$booking_id'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function savePayment($booking_id,$paymethod,$inideposit,$bookfare,$totalpay){
        //echo "INSERT INTO tblbooking(bid,mobile,vtype,vrego,rate,pickupbase,dropbase,status)
        //values ('$bookid','$get_contact','$vtype','$vrego','$vrate','$pickupbase','$dropbase','Active')";
        $sql = "INSERT INTO tblpayment(bid,paymethod,deposit,totalfare,totalpay,status) values ('$booking_id','$paymethod','$inideposit','$bookfare','$totalpay','Paid')";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function editPayment($booking_id,$paymethod,$inideposit,$bookfare,$totalpay){
        //echo "INSERT INTO tblbooking(bid,mobile,vtype,vrego,rate,pickupbase,dropbase,status)
        //values ('$bookid','$get_contact','$vtype','$vrego','$vrate','$pickupbase','$dropbase','Active')";
        $sql = "UPDATE tblpayment SET paymethod = '$paymethod',deposit = '$inideposit',totalfare = '$bookfare', totalpay ='$totalpay' WHERE bid = '$booking_id'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function saveCustomerDetails($name,$get_contact,$email){
        $sql = "INSERT INTO tblcustomer(name, mobile, email) VALUES ('$name','$get_contact','$email')";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this -> connection,$sql);
        //var_dump($sqlQuery);
    }

    function editCustomerDetails($get_contact,$name,$email){
        $sql = "UPDATE tblcustomer SET name = '$name', email ='$email' WHERE mobile = '$get_contact'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this -> connection,$sql);
        //var_dump($sqlQuery);
    }

    function updateComments($mobile,$get_id,$comments,$user){
        $sql = "UPDATE tblrequest SET comments='$comments', modified_by= '$user' WHERE id='$get_id' AND phone='$mobile'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function updateStatus($mobile,$get_id,$comments,$user){
        $sql = "UPDATE tblrequest SET status='Booked', comments='$comments', view='1', modified_by = '$user' WHERE id='$get_id' AND phone='$mobile'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function updateViewStatus($mobile,$get_id){
        $sql = "UPDATE tblrequest SET view='1' WHERE id='$get_id' AND phone='$mobile'";
        //var_dump($sql);
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function saveDelivery($bookid,$dstreet,$dsuburb,$dpcode,$dstate){
        //echo "INSERT INTO tbldelivery(bid,delivery_date,delivery_time,ampm,	delivery_street,delivery_suburb,delivery_pcode,delivery_state) values ('$bookid','$ddate','$dtime',
         //   '$dampm','$dstreet','$dsuburb','$dpcode','$dstate')";

        $sql = "INSERT INTO tbldelivery(bid,delivery_street,delivery_suburb,delivery_pcode,delivery_state) values ('$bookid','$dstreet','$dsuburb','$dpcode','$dstate')";

        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function editDelivery($bookid,$dstreet,$dsuburb,$dpcode,$dstate){
        //echo "INSERT INTO tbldelivery(bid,delivery_date,delivery_time,ampm,	delivery_street,delivery_suburb,delivery_pcode,delivery_state) values ('$bookid','$ddate','$dtime',
        //   '$dampm','$dstreet','$dsuburb','$dpcode','$dstate')";
        $sql = "UPDATE tbldelivery SET delivery_street='$dstreet',delivery_suburb='$dsuburb',delivery_pcode='$dpcode',delivery_state='$dstate' WHERE bid = '$bookid'";
        $sqlQuery = mysqli_query($this->connection,$sql);
        //var_dump($sqlQuery);
    }

    function delDelivery($get_bid){
        $sql = "DELETE FROM tbldeliver WHERE bid = '$get_bid'";
        $sqlQuery = mysqli_query($this->connection,$sql);
        var_dump($sqlQuery);
    }

    function saveReturn($bookid,$rstreet,$rsuburb,$rpcode,$rstate){
        //echo "INSERT INTO tblreturn(bid,return_date,return_time,ampm,return_street,return_suburb,return_pcode,return_state) values ('$bookid','$rdate','$rtime',
        //'$rampm','$rstreet','$rsuburb','$rpcode','$rstate')";

        $sql = "INSERT INTO tblreturn(bid,return_street,return_suburb,return_pcode,return_state) values ('$bookid','$rstreet','$rsuburb','$rpcode','$rstate')";

        $sqlQuery = mysqli_query($this->connection,$sql);

        //var_dump($sqlQuery);
    }


    function editReturn($bookid,$rstreet,$rsuburb,$rpcode,$rstate){
        //echo "INSERT INTO tblreturn(bid,return_date,return_time,ampm,return_street,return_suburb,return_pcode,return_state) values ('$bookid','$rdate','$rtime',
        //'$rampm','$rstreet','$rsuburb','$rpcode','$rstate')";

        $sql = "UPDATE tblreturn SET return_street ='$rstreet',return_suburb = '$rsuburb',return_pcode ='$rpcode',return_state = '$rstate' WHRER bid = '$bookid'";
        $sqlQuery = mysqli_query($this->connection,$sql);

        //var_dump($sqlQuery);
    }

    function delReturn($get_bid){
        $sql = "DELETE FROM tblreturn WHERE bid = '$get_bid'";
        $sqlQuery = mysqli_query($this->connection,$sql);
    }


    function generateNoticeID()
    {
        $y = date("y");
        $m = date('m');
        $d = date('d');
        //$booking_id = null;

//        $startDate = today();
//        $endDate = today();

        $select = mysqli_query($this->connection,"SELECT count(bid) AS 'CROW' FROM tblbooking WHERE DATE(createon) = CURDATE()");
        //var_dump($select);
        if(mysqli_num_rows($select) == 0)
        {
            $booking_id = $y.$m.$d.'0001';
        }
        else
        {
            $row = mysqli_fetch_array($select);
            $crow = $row['CROW'];
            $crow = $crow+1;
            if($crow<=9){
                $crow = '0'.$crow;
            }
//            elseif($crow>=10 && $crow<=99){
//                $crow = '00'.$crow;
//            }
//            elseif($crow>=100 && $crow<=999){
//                $crow = '0'.$crow;
//            }
            $booking_id = $y.$m.$d.$crow;
            //$booking_id = "BID".$booking_id;
        }
        return $booking_id;
    }



	function addUser($userid, $username, $email, $password) // adduser.php
	{
	
		$insertUser = mysql_query("INSERT INTO tbluser(userid, username, emailid, password, status) values ('$userid', '$username', '$email', '$password', 'Active')");
		return $insertUser;
	}




	function adddoc($month, $year, $title, $type,$datetime,$description,$filename)
	{

		//echo "INSERT INTO tbldoc(month, year, title, type, datetime, description, file) values ('$month', '$year', '$title', '$type','$datetime','$description','$filename')";
		$insert= mysql_query("INSERT INTO tbldoc(month, year, title, type, datetime, description, file) values ('$month', '$year', '$title', '$type','$datetime','$description','$filename')");
		return $insert;
	}
	
	function delete($hid_id)
	{
		$delete = mysql_query("DELETE FROM tbldoc  WHERE did ='$hid_id'");
		return $delete;
	}


    function selectVehicle()
    {
        $result =[];
        $select = mysqli_query($this->connection,"SELECT * FROM  tblvehicle");
        while($row = mysqli_fetch_array($select))
        {
            $result[] = $row;
        }
        return $result;
    }

    function selectVehicleDetails()
    {
        $result =[];
        $selectDetails = mysqli_query($this->connection,"SELECT * FROM  tblvehicle INNER JOIN tblvehicle_details ON tblvehicle.vrego = tblvehicle_details.rego");
        while($row = mysqli_fetch_array($selectDetails))
        {
            $result[] = $row;
        }
        return $result;
    }

    function selTwoVehicle()
    {
        $result =[];
        $selectDetails = mysqli_query($this->connection,"SELECT * FROM tblvehicle INNER JOIN tblvehicle_details ON tblvehicle.vrego = tblvehicle_details.rego ORDER BY tblvehicle_details.id DESC LIMIT 0,2");
        while($row = mysqli_fetch_array($selectDetails))
        {
            $result[] = $row;
        }
        return $result;
    }

    function selectTestimonials()
    {
        $result =[];
        $selectDetails = mysqli_query($this->connection,"SELECT * FROM tbltestimonials WHERE STATUS =  'Approved' ORDER BY tid DESC LIMIT 2");
        while($row = mysqli_fetch_array($selectDetails))
        {
            $result[] = $row;
        }
        return $result;
    }


    function sel_booking_name($phone){
        $sel_name = null;
        $sel_name = mysqli_query($this->connection,"SELECT * FROM tblrequest WHERE phone='$phone'");
        $row_name = mysqli_fetch_array($sel_name);
        return $row_name;
    }
}