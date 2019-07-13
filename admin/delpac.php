<?php
    include '../lib/Session.php';
    Session::checkSession();
    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/Formate.php';

    $db = new Database();
?>

<?php 
	    if (!isset($_GET['pacId']) || $_GET['pacId'] == NULL) {
	        header("location:viewpackage.php");
	    }else {
	        $pacId = $_GET['pacId'];

	        $query = "SELECT * FROM tbl_package WHERE id = '$pacId'";
	        $getData = $db->select($query);
	        if ($getData) {
	        	while ($delimg = $getData->fetch_assoc()) {
	        	    $delink = $delimg['image'];
	        	    unlink($delink);
	        	}
	        }

	        $delquery = "DELETE FROM tbl_package WHERE id = '$pacId'";
	        $delpackage = $db->delete($delquery);
	        if ($delpackage) {
	        	echo "<script>alert('Data Delete Successfully');</script>";
	        	header('location:viewpackage.php');
	        }else {
	        	echo "<script>alert('Data Delete Not Successfully');</script>";
	        	header('location:viewpackage.php');
	        }

	    }

    ?>