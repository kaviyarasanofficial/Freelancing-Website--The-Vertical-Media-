<?php
// projfunc.php

function get_all_user($conn) {
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    $stmt->close();

    return $users;
}
?>
