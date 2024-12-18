<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $person_type = $_POST['person_type'];
    $salary = ($person_type === 'Employee') ? $_POST['salary'] : NULL;

    // File Upload
    $profile_picture = $_FILES['profile_picture']['name'] ? time() . '_' . $_FILES['profile_picture']['name'] : NULL;
    $attachment = $_FILES['attachment']['name'] ? time() . '_' . $_FILES['attachment']['name'] : NULL;

    // Move uploaded files
    if ($profile_picture) move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/$profile_picture");
    if ($attachment) move_uploaded_file($_FILES['attachment']['tmp_name'], "uploads/$attachment");

    // Insert into database
    $sql = "INSERT INTO persons (name, phone, email, address, person_type, salary, profile_picture, attachment)
            VALUES (:name, :phone, :email, :address, :person_type, :salary, :profile_picture, :attachment)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':address' => $address,
        ':person_type' => $person_type,
        ':salary' => $salary,
        ':profile_picture' => $profile_picture,
        ':attachment' => $attachment
    ]);

    header("Location: person.php");
    exit;
}
?>
