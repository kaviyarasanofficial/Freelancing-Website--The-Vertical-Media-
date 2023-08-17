<?php
include "php/conn.php"; // Include database connection

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["viewproposal"])) {
    if (isset($_POST["id"])) {
        $proj_id = $_POST["id"];

        // Fetch project details using $proj_id
        $query = "SELECT * FROM newproj WHERE id = $proj_id";
        // Execute the query and fetch the project details
        $result = mysqli_query($conn, $query);
        $proj = mysqli_fetch_assoc($result);

        // Fetch proposal details from the betproject table for the specified project ID
        $proposalQuery = "SELECT * FROM betproject WHERE proj_id = $proj_id";
        $proposalResult = mysqli_query($conn, $proposalQuery);

        if ($proposalResult && mysqli_num_rows($proposalResult) > 0) {
            // Loop through proposal data and display details
           // Loop through proposal data and display details
while ($proposal = mysqli_fetch_assoc($proposalResult)) {
    echo "Name: " . $proposal['freelancername'] . "<br>";
    echo "Freelancer Email: " . $proposal['freelanceremail'] . "<br>";
    echo "Project Title: " . $proposal['projtitle'] . "<br>";
    echo "Your Budget : " . $proposal['sellamount'] . "<br>";
    echo "Bid Amount is: " . $proposal['bidamount'] . "<br>";
    echo "Within Deliver Days: " . $proposal['deliverdayscount'] . "<br>";
    echo "Proposal Details: " . $proposal['proposal'] . "<br>";
    echo "Country: " . $proposal['country'] . "<br>";
    // Display other relevant proposal details here

    echo "<form action='php/bitstatus.php' method='post'>";
    echo "<input type='hidden' name='bid_id' value='" . $proposal['bid_id'] . "'>";
    echo "<input type='hidden' name='proj_id' value='" . $proj_id . "'>";

    // Check the status of the proposal and display appropriate button
    if ($proposal['status'] === 'Approved') {
        echo "<button type='submit' name='approve' disabled>Approved</button>";
        echo "<button type='submit' name='decline'>Decline</button>"; // Show the Decline button
    } elseif ($proposal['status'] === 'Declined') {
        echo "<button type='submit' name='approve'>Approve</button>"; // Show the Approve button
        echo "<button type='submit' name='decline' disabled>Declined</button>";
    } else {
        echo "<button type='submit' name='approve'>Approve</button>";
        echo "<button type='submit' name='decline'>Decline</button>";
    }
    

    echo "</form>";
    echo "<hr>"; // Adding a horizontal line between proposals
}

        } else {
            echo "No proposals found for this project.";
        }
    } else {
        echo "Project ID not provided.";
    }
}
?>
