<?php include('includes/header.php'); ?>

<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'view';

// Dummy person data
$dummyPerson = [
    'id' => 1,
    'name' => 'John Doe',
    'phone' => '123-456-7890',
    'email' => 'john.doe@example.com',
    'address' => '123 Main St',
    'type' => 'Employee',
    'salary' => 5000, // Only if type = Employee
    'balance' => 2000, // Calculated balance placeholder
    'profile_image' => 'uploads/default_avatar.png', // Default image
    'transactions' => [
        ['date' => '2024-06-01', 'type' => 'Salary Payment', 'amount' => 5000],
        ['date' => '2024-06-15', 'type' => 'Loan Taken', 'amount' => -2000]
    ]
];
?>

<!-- Profile Interface -->
<div class="card mb-4">
    <div class="card-header text-center">
        <h2>Profile: <?= htmlspecialchars($dummyPerson['name']) ?></h2>
    </div>
    <div class="card-body text-center">
        <img src="<?= $dummyPerson['profile_image'] ?>" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
        <p><strong>Phone:</strong> <?= htmlspecialchars($dummyPerson['phone']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($dummyPerson['email']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($dummyPerson['address']) ?></p>
        <p><strong>Type:</strong> <?= htmlspecialchars($dummyPerson['type']) ?></p>
        <?php if ($dummyPerson['type'] === 'Employee'): ?>
            <p><strong>Salary:</strong> $<?= number_format($dummyPerson['salary'], 2) ?></p>
        <?php endif; ?>
        <p><strong>Balance:</strong> $<?= number_format($dummyPerson['balance'], 2) ?></p>
        <a href="?action=edit" class="btn btn-primary">Edit Person</a>
        <a href="?action=add_transaction" class="btn btn-success">Add Transaction</a>
    </div>
</div>

<!-- Transactions Section -->
<h3>Transactions</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dummyPerson['transactions'] as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['date']) ?></td>
                <td><?= htmlspecialchars($t['type']) ?></td>
                <td><?= $t['amount'] >= 0 ? '$' . number_format($t['amount'], 2) : '-$' . number_format(abs($t['amount']), 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add Transaction Form -->
<?php if ($action === 'add_transaction'): ?>
<h3>Add New Transaction</h3>
<form method="POST">
    <div class="form-group">
        <label>Transaction Type:</label>
        <select class="form-control" name="transaction_type">
            <option>Salary Payment</option>
            <option>Loan Taken</option>
            <option>Loan Repaid</option>
            <option>Due Collection</option>
        </select>
    </div>
    <div class="form-group">
        <label>Amount:</label>
        <input class="form-control" type="number" name="amount" required>
    </div>
    <div class="form-group">
        <label>Transfer To Account:</label>
        <input class="form-control" type="text" name="account_details" placeholder="Select account" required>
    </div>
    <button class="btn btn-primary" type="submit">Add Transaction</button>
</form>
<?php endif; ?>

<!-- Edit Person Form -->
<?php if ($action === 'edit'): ?>
<h3>Edit Person</h3>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name:</label>
        <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($dummyPerson['name']) ?>" required>
    </div>
    <div class="form-group">
        <label>Phone:</label>
        <input class="form-control" type="text" name="phone" value="<?= htmlspecialchars($dummyPerson['phone']) ?>">
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input class="form-control" type="email" name="email" value="<?= htmlspecialchars($dummyPerson['email']) ?>">
    </div>
    <div class="form-group">
        <label>Address:</label>
        <input class="form-control" type="text" name="address" value="<?= htmlspecialchars($dummyPerson['address']) ?>">
    </div>
    <div class="form-group">
        <label>Person Type:</label>
        <select class="form-control" name="type">
            <option <?= $dummyPerson['type'] == 'Employee' ? 'selected' : '' ?>>Employee</option>
            <option <?= $dummyPerson['type'] == 'Friend' ? 'selected' : '' ?>>Friend</option>
            <option <?= $dummyPerson['type'] == 'Family' ? 'selected' : '' ?>>Family</option>
            <option <?= $dummyPerson['type'] == 'Sponsorship' ? 'selected' : '' ?>>Sponsorship</option>
            <option <?= $dummyPerson['type'] == 'Vendor' ? 'selected' : '' ?>>Vendor</option>
            <option <?= $dummyPerson['type'] == 'Business' ? 'selected' : '' ?>>Business</option>
        </select>
    </div>
    <?php if ($dummyPerson['type'] === 'Employee'): ?>
        <div class="form-group">
            <label>Salary:</label>
            <input class="form-control" type="number" name="salary" value="<?= $dummyPerson['salary'] ?>">
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label>Profile Picture:</label>
        <input type="file" class="form-control" name="profile_image">
    </div>
    <div class="form-group">
        <label>Additional Documents:</label>
        <input type="file" class="form-control" name="documents">
    </div>
    <button class="btn btn-success" type="submit">Save Changes</button>
</form>
<?php endif; ?>

<?php include('includes/footer.php'); ?>
