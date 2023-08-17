<?php
include "conn.php"; // Include database connection

// Handle project approval
// Handle bid approval and decline
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["approve"])) {
        if (isset($_POST["bid_id"])) {
            $bid_id = $_POST["bid_id"];

            // Update the approval_status for the proposal with the specified bid_id
            $approveQuery = "UPDATE betproject SET status = 'Approved' WHERE bid_id = ?";
            $stmtApprove = $conn->prepare($approveQuery);
            $stmtApprove->bind_param("i", $bid_id);
            $stmtApprove->execute();

            // Redirect back to the myjobs.php page after the action
            header("Location: ../bedprojects.php");
            exit();
        } else {
            echo "Bid ID not provided.";
        }
    } elseif (isset($_POST["decline"])) {
        if (isset($_POST["bid_id"])) {
            $bid_id = $_POST["bid_id"];

            // Update the approval_status for the proposal with the specified bid_id
            $declineQuery = "UPDATE betproject SET status = 'Declined' WHERE bid_id = ?";
            $stmtDecline = $conn->prepare($declineQuery);
            $stmtDecline->bind_param("i", $bid_id);
            $stmtDecline->execute();

            // Redirect back to the myjobs.php page after the action
            header("Location: ../bedprojects.php");
            echo "Action submitted.";
            exit();
        } else {
            // echo "Bid ID not provided.";
        }
    } else {
        // echo "Action not recognized.";
    }
} else {
    // echo "Form not submitted.";
    

}

// Display bid status message if set

?>
