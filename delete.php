<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Application</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Are you sure you want to delete this applicant?</h2>
    <div style="border: 1px solid black; padding: 15px; width: 400px;">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($getApplicantByID['first_name'] . ' ' . $getApplicantByID['last_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($getApplicantByID['email']); ?></p>
        <p><strong>Tech Stack:</strong> <?php echo htmlspecialchars($getApplicantByID['primary_tech_stack']); ?></p>

        <form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
            <input type="submit" name="deleteApplicantBtn" value="Yes, Delete Record" style="background-color: red; color: white;">
            <a href="index.php">Cancel</a>
        </form>
    </div>
</body>
</html>
