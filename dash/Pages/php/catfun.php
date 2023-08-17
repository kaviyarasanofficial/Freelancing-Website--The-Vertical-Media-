<?php
// projfunc.php

function get_all_cat($conn) {
    $sql = "SELECT * FROM catagorie";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $projects = array();
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }

    $stmt->close();

    return $projects;
}
?>
