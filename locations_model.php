<?php
require("db.php");

if(isset($_GET['add_location'])) {
    add_location();
}


function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','jctry');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    $query = sprintf("INSERT INTO locations " .
        " (id, lat, lng) " .
        " VALUES (NULL, '%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng));

    $result = mysqli_query($con,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_saved_locations(){
    $con=mysqli_connect ("localhost", 'root', '','jctry');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }

    $sqldata = mysqli_query($con,"select lng,lat from locations ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);



    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>