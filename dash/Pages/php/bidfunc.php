<?php
// projfunc.php

function get_all_bid($conn) {
    $sql = "SELECT * FROM betproject";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $bid = array();
    while ($row = $result->fetch_assoc()) {
        $bid[] = $row;
    }

    $stmt->close();

    return $bid;
}
?>
