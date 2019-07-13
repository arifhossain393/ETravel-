<?php
    include '../lib/Session.php';
    Session::checkSession();
    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/Formate.php';

    $db = new Database();
?>

<?php 
	    if (!isset($_GET['galId']) || $_GET['galId'] == NULL) {
	        header("location:viewgallery.php");
	    }else {
	        $galId = $_GET['galId'];

	        $query = "SELECT * FROM tbl_gallery WHERE id = '$galId'";
	        $getData = $db->select($query);
	        if ($getData) {
	        	while ($delimg = $getData->fetch_assoc()) {
	        	    $delink = $delimg['gallery_image'];
	        	    unlink($delink);
	        	}
	        }

	        $delquery = "DELETE FROM tbl_gallery WHERE id = '$galId'";
	        $delgallery = $db->delete($delquery);
	        if ($delpackage) {
	        	echo "<script>alert('Gallery Image Delete Successfully');</script>";
	        	header('location:viewgallery.php');
	        }else {
	        	echo "<script>alert('Gallery Image Delete Not Successfully');</script>";
	        	header('location:viewgallery.php');
	        }

	    }

    ?>