<?php
require_once 'dbConfig.php';
require_once 'models.php';

// Handle Insertion
if (isset($_POST['insertApplicantBtn'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $years_experience = trim($_POST['years_experience']);
    $primary_tech_stack = trim($_POST['primary_tech_stack']);
    $portfolio_url = trim($_POST['portfolio_url']);

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone_number) && !empty($primary_tech_stack)) {
        $query = insertApplicant($pdo, $first_name, $last_name, $email, $phone_number, $years_experience, $primary_tech_stack, $portfolio_url);
        if ($query) {
            header("Location: ../index.php?status=success");
        } else {
            header("Location: ../index.php?status=failed");
        }
    }
}

// Handle Update
if (isset($_POST['editApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $years_experience = trim($_POST['years_experience']);
    $primary_tech_stack = trim($_POST['primary_tech_stack']);
    $portfolio_url = trim($_POST['portfolio_url']);

    if (!empty($applicant_id)) {
        $query = updateApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $phone_number, $years_experience, $primary_tech_stack, $portfolio_url);
        if ($query) {
            header("Location: ../index.php?status=updated");
        } else {
            header("Location: ../index.php?status=failed");
        }
    }
}

// Handle Delete
if (isset($_POST['deleteApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    $query = deleteApplicant($pdo, $applicant_id);
    if ($query) {
        header("Location: ../index.php?status=deleted");
    } else {
        header("Location: ../index.php?status=failed");
    }
}
?>
