<?php
require_once 'dbConfig.php';

// Create (Insert new job application)
function insertApplicant($pdo, $first_name, $last_name, $email, $phone_number, $years_experience, $primary_tech_stack, $portfolio_url) {
    $sql = "INSERT INTO job_applications (first_name, last_name, email, phone_number, years_experience, primary_tech_stack, portfolio_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $phone_number, $years_experience, $primary_tech_stack, $portfolio_url]);
}

// Read (Fetch all applications)
function getAllApplicants($pdo) {
    $sql = "SELECT * FROM job_applications ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Read (Fetch single applicant by ID)
function getApplicantByID($pdo, $applicant_id) {
    $sql = "SELECT * FROM job_applications WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicant_id]);
    return $stmt->fetch();
}

// Update (Edit applicant details)
function updateApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $phone_number, $years_experience, $primary_tech_stack, $portfolio_url) {
    $sql = "UPDATE job_applications 
            SET first_name = ?, last_name = ?, email = ?, phone_number = ?, years_experience = ?, primary_tech_stack = ?, portfolio_url = ? 
            WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $email, $phone_number, $years_experience, $primary_tech_stack, $portfolio_url, $applicant_id]);
}

// Delete (Remove record)
function deleteApplicant($pdo, $applicant_id) {
    $sql = "DELETE FROM job_applications WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$applicant_id]);
}
?>
