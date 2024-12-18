<?php include('includes/header.php'); ?>

<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'view';

// Dummy Fund Transfer Details
$dummyTransfer = [
  'id'=>1,
  'from'=>'Own Bank Account',
  'to'=>'John Doe Account',
  'amount'=>1000,
  'date'=>'2025-01-15',
  'notes'=>'Salary payment to John Doe.'
];
?>

<?php if ($action === 'add'): ?>
<h1>Add New Fund Transfer</h1>
<form method="POST">
  <div class="form-group">
    <label>From (Own Banking Info):</label>
    <select class="form-control" name="from_banking_info">
      <option>Own Bank Account</option>
      <option>Own Mobile Banking</option>
    </select>
  </div>
  <div class="form-group">
    <label>To (Person or Asset Beneficiary):</label>
    <select class="form-control" name="to_beneficiary">
      <option>John Doe Account</option>
      <option>House Asset Account</option>
    </select>
  </div>
  <div class="form-group">
    <label>Amount:</label>
    <input class="form-control" type="number" name="amount" required>
  </div>
  <div class="form-group">
    <label>Notes:</label>
    <textarea class="form-control" name="notes"></textarea>
  </div>
  <button class="btn btn-primary" type="submit">Save (Dummy)</button>
</form>
<?php else: ?>
<h1>Fund Transfer Details</h1>
<p><strong>From:</strong> <?= htmlspecialchars($dummyTransfer['from']) ?></p>
<p><strong>To:</strong> <?= htmlspecialchars($dummyTransfer['to']) ?></p>
<p><strong>Amount:</strong> $<?= number_format($dummyTransfer['amount'],2) ?></p>
<p><strong>Date:</strong> <?= htmlspecialchars($dummyTransfer['date']) ?></p>
<p><strong>Notes:</strong> <?= htmlspecialchars($dummyTransfer['notes']) ?></p>

<!-- Future functionality: Edit, Delete, or link to statements/related info -->
<?php endif; ?>

<?php include('includes/footer.php'); ?>
