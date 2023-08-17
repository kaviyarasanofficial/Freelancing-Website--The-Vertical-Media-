<?php
// projfunc.php

function get_all_contact($conn) {
    $sql = "SELECT * FROM contact";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $contact = array();
    while ($row = $result->fetch_assoc()) {
        $contact[] = $row;
    }

    $stmt->close();

    return $contact;
}
?>
