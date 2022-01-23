<?php
include_once 'dbconn.php';
$sql = "DELETE FROM admin_booking WHERE username='" . $_GET["username"] . "'";
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
?>