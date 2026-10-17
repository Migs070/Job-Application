<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Senior Full Stack Engineer - Application Form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <h1>Job Application System</h1>
    <h2>Position: Senior Full Stack Software Engineer</h2>

    <!-- Application Form -->
    <div class="form-container">
        <h3>Submit Application</h3>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required>
            </p>
            <p>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required>
            </p>
            <p>
                <label for="email">Email Address:</label>
                <input type="email" name="email" required>
            </p>
            <p>
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" required>
            </p>
            <p>
                <label for="years_experience">Years of Experience:</label>
                <input type="number" name="years_experience" min="0" required>
            </p>
            <p>
                <label for="primary_tech_stack">Primary Tech Stack (e.g., Node.js, React, PHP, MySQL):</label>
                <input type="text" name="primary_tech_stack" required>
            </p>
            <p>
                <label for="portfolio_url">Portfolio / GitHub Link:</label>
                <input type="url" name="portfolio_url" placeholder="https://github.com/username" required>
            </p>
            <p>
                <input type="submit" name="insertApplicantBtn" value="Submit Application">
            </p>
        </form>
    </div>

    <hr>

    <!-- Submitted Applications Table -->
    <h3>Submitted Applications</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Experience (Yrs)</th>
                <th>Tech Stack</th>
                <th>Portfolio</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $allApplicants = getAllApplicants($pdo);
            if (!empty($allApplicants)) {
                foreach ($allApplicants as $row) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['applicant_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['years_experience']); ?></td>
                        <td><?php echo htmlspecialchars($row['primary_tech_stack']); ?></td>
                        <td><a href="<?php echo htmlspecialchars($row['portfolio_url']); ?>" target="_blank">View Link</a></td>
                        <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                        <td>
                            <a href="edit.php?applicant_id=<?php echo $row['applicant_id']; ?>">Edit</a> | 
                            <a href="delete.php?applicant_id=<?php echo $row['applicant_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="10" style="text-align:center;">No applications found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
