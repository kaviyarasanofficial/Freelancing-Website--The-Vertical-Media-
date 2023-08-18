<?php
// projfunc.php

function get_all_payments($conn) {
    $sql = "SELECT * FROM payments";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $payments = array();
    while ($row = $result->fetch_assoc()) {
        $payments[] = $row;
    }

    $stmt->close();

    return $payments;
}
?>
