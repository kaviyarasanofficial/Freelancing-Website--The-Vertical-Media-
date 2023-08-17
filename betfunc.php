<?php

include "php/conn.php";

if (!isset($_GET['id'])) {
    echo "Project ID not provided.";
    exit();
}

$proj_id = $_GET['id'];

// Retrieve proposal details from the betproject table for the specified project ID
$selectQuery = "SELECT * FROM betproject WHERE proj_id = ?";
$stmtSelect = $conn->prepare($selectQuery);
$stmtSelect->bind_param("i", $proj_id);
$stmtSelect->execute();
$result = $stmtSelect->get_result();

if ($result && $result->num_rows > 0) {
    $proposalData = $result->fetch_all(MYSQLI_ASSOC); 

    // Display the proposal details

// Query to count the number of proposals for the current project
$proposalCountQuery = "SELECT COUNT(*) as count FROM betproject WHERE proj_id = ?";
$stmtProposalCount = $conn->prepare($proposalCountQuery);
$stmtProposalCount->bind_param("i", $proj['id']);
$stmtProposalCount->execute();
$resultProposalCount = $stmtProposalCount->get_result();
$proposalCountData = $resultProposalCount->fetch_assoc();
$proposalCount = $proposalCountData['count'];
$stmtProposalCount->close();



   
    // Display other relevant details here
} else {
    // echo "Proposal details not found for the specified project.";
}

$stmtSelect->close();
?>
