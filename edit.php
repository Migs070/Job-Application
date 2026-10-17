<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Application</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Edit Application Record (ID: <?php echo $_GET['applicant_id']; ?>)</h2>

    <form action="core/handleForms.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
        <p>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($getApplicantByID['first_name']); ?>" required>
        </p>
        <p>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($getApplicantByID['last_name']); ?>" required>
        </p>
        <p>
            <label for="email">Email Address:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($getApplicantByID['email']); ?>" required>
        </p>
        <p>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo htmlspecialchars($getApplicantByID['phone_number']); ?>" required>
        </p>
        <p>
            <label for="years_experience">Years of Experience:</label>
            <input type="number" name="years_experience" value="<?php echo htmlspecialchars($getApplicantByID['years_experience']); ?>" required>
        </p>
        <p>
            <label for="primary_tech_stack">Primary Tech Stack:</label>
            <input type="text" name="primary_tech_stack" value="<?php echo htmlspecialchars($getApplicantByID['primary_tech_stack']); ?>" required>
        </p>
        <p>
            <label for="portfolio_url">Portfolio / GitHub Link:</label>
            <input type="url" name="portfolio_url" value="<?php echo htmlspecialchars($getApplicantByID['portfolio_url']); ?>" required>
        </p>
        <p>
            <input type="submit" name="editApplicantBtn" value="Save Changes">
            <a href="index.php">Cancel</a>
        </p>
    </form>
</body>
</html>
