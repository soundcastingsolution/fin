<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $specification = $_POST['specification'];
    $status = $_POST['status'];
    $unit_name = ($status === 'Won') ? $_POST['unit_name'] : NULL;
    $initial_amount = $_POST['initial_amount'];
    $installment_amount = $_POST['installment_amount'];
    $manager_name = $_POST['manager_name'];
    $manager_number = $_POST['manager_number'];
    $engineer_name = $_POST['engineer_name'];
    $engineer_number = $_POST['engineer_number'];

    // File Upload
    $attachment = $_FILES['attachment']['name'] ? time() . '_' . $_FILES['attachment']['name'] : NULL;
    if ($attachment) move_uploaded_file($_FILES['attachment']['tmp_name'], "uploads/$attachment");

    // Insert into database
    $sql = "INSERT INTO assets (name, address, specification, status, unit_name, initial_amount, installment_amount, 
            manager_name, manager_number, engineer_name, engineer_number, attachment)
            VALUES (:name, :address, :specification, :status, :unit_name, :initial_amount, :installment_amount, 
            :manager_name, :manager_number, :engineer_name, :engineer_number, :attachment)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':address' => $address,
        ':specification' => $specification,
        ':status' => $status,
        ':unit_name' => $unit_name,
        ':initial_amount' => $initial_amount,
        ':installment_amount' => $installment_amount,
        ':manager_name' => $manager_name,
        ':manager_number' => $manager_number,
        ':engineer_name' => $engineer_name,
        ':engineer_number' => $engineer_number,
        ':attachment' => $attachment
    ]);

    header("Location: asset.php");
    exit;
}
?>
