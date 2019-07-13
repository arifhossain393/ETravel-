<?php
    include '../lib/Session.php';
    Session::checkSession();
    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/Formate.php';

    $db = new Database();
?>

<?php 
	    if (!isset($_GET['delId']) || $_GET['delId'] == NULL) {
	        header("location:destinationlist.php");
	    }else {
	        $delId = $_GET['delId'];

	        $query = "SELECT * FROM tbl_destination WHERE id = '$delId'";
	        $getData = $db->select($query);
	        if ($getData) {
	        	while ($delimg = $getData->fetch_assoc()) {
	        	    $delink = $delimg['place_img'];
	        	    unlink($delink);
	        	}
	        }

	        $delquery = "DELETE FROM tbl_destination WHERE id = '$delId'";
	        $deldestination = $db->delete($delquery);
	        if ($deldestination) {
	        	echo "<script>alert('Data Delete Successfully');</script>";
	        	header('location:destinationlist.php');
	        }else {
	        	echo "<script>alert('Data Delete Not Successfully');</script>";
	        	header('location:destinationlist.php');
	        }

	    }

    ?>