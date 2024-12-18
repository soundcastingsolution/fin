<?php include('includes/header.php'); ?>

<?php
$ownerType = ['own', 'person', 'asset'];
$bankingTypes = ['Bank Account', 'Mobile Banking'];
$mobileChannels = ['BKash', 'Nagad', 'Rocket', 'DBBL'];
?>

<h1>Add New Banking Info</h1>
<form method="POST">
  <div class="form-group">
    <label>Owner Type:</label>
    <select class="form-control" name="owner_type" id="ownerType">
      <?php foreach ($ownerType as $type): ?>
        <option><?= htmlspecialchars($type) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group" id="ownerSelection">
    <!-- Dynamically show dropdown with persons/assets -->
    <label>Select Owner:</label>
    <select class="form-control" name="owner_id">
      <option>John Doe</option> <!-- Dummy data for persons/assets -->
      <option>Apartment #10</option>
    </select>
  </div>

  <div class="form-group">
    <label>Banking Type:</label>
    <select class="form-control" name="banking_type" id="bankingType">
      <?php foreach ($bankingTypes as $type): ?>
        <option><?= htmlspecialchars($type) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div id="bankAccountFields">
    <div class="form-group">
      <label>Bank Name:</label>
      <input class="form-control" type="text" name="bank_name">
    </div>
    <div class="form-group">
      <label>Account Number:</label>
      <input class="form-control" type="text" name="account_number">
    </div>
    <div class="form-group">
      <label>Account Holder:</label>
      <input class="form-control" type="text" name="account_holder">
    </div>
  </div>

  <div id="mobileBankingFields" style="display:none;">
    <div class="form-group">
      <label>Mobile Channel:</label>
      <select class="form-control" name="mobile_channel">
        <?php foreach ($mobileChannels as $channel): ?>
          <option><?= htmlspecialchars($channel) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Account Number:</label>
      <input class="form-control" type="text" name="account_number">
    </div>
    <div class="form-group">
      <label>Account Type:</label>
      <select class="form-control" name="account_type">
        <option>Personal</option>
        <option>Agent</option>
      </select>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Save</button>
</form>

<script>
document.getElementById('bankingType').addEventListener('change', function() {
  const bankFields = document.getElementById('bankAccountFields');
  const mobileFields = document.getElementById('mobileBankingFields');
  if (this.value === 'Mobile Banking') {
    bankFields.style.display = 'none';
    mobileFields.style.display = 'block';
  } else {
    bankFields.style.display = 'block';
    mobileFields.style.display = 'none';
  }
});
</script>

<?php include('includes/footer.php'); ?>
