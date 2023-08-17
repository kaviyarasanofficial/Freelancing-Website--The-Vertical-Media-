<?php
// projfunc.php

function get_all_proj($conn) {
    $sql = "SELECT * FROM newproj";
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



function get_all_myproj($conn, $user_email) {
    // Use the user's email to filter projects
    $sql = "SELECT * FROM newproj WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();

    $result = $stmt->get_result();

    $projects = array();
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }

    $stmt->close();

    return $projects;
}



function get_proj($con, $id){
    $sql  = "SELECT * FROM newproj WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $proj = $result->fetch_assoc();
    } else {
        $proj = null;
    }

    return $proj;
}
?>

