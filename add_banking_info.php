<?php include('includes/header.php'); ?>

<?php
// Dummy Data: Persons and Assets
$persons = [
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Smith'],
    ['id' => 3, 'name' => 'Mike Johnson']
];

$assets = [
    ['id' => 1, 'name' => 'Apartment #10'],
    ['id' => 2, 'name' => 'Office Unit #12']
];

// Mobile Banking Options
$mobileBanks = ['Bkash', 'Nagad', 'Rocket', 'DBBL'];
?>

<script>
    function handleOwnerType() {
        const ownerType = document.getElementById('owner_type').value;
        const ownerField = document.getElementById('owner_div');
        const ownerDropdown = document.getElementById('owner');

        ownerDropdown.innerHTML = '<option value="">-- Select Owner --</option>';

        if (ownerType === 'Own') {
            ownerField.style.display = 'none';
        } else {
            ownerField.style.display = 'block';

            let options = '';
            if (ownerType === 'Person') {
                const persons = <?= json_encode($persons) ?>;
                persons.forEach(person => options += `<option value="${person.id}">${person.name}</option>`);
            } else if (ownerType === 'Asset') {
                const assets = <?= json_encode($assets) ?>;
                assets.forEach(asset => options += `<option value="${asset.id}">${asset.name}</option>`);
            }
            ownerDropdown.innerHTML += options;
        }
    }

    function handleBankingType() {
        const bankingType = document.getElementById('banking_type').value;
        const bankFields = document.getElementById('bank_fields');
        const mobileFields = document.getElementById('mobile_fields');

        if (bankingType === 'Bank Account') {
            bankFields.style.display = 'block';
            mobileFields.style.display = 'none';
        } else if (bankingType === 'Mobile Banking') {
            bankFields.style.display = 'none';
            mobileFields.style.display = 'block';
        } else {
            bankFields.style.display = 'none';
            mobileFields.style.display = 'none';
        }
    }
</script>

<div class="container mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Add New Banking Info</h2>

        <form method="POST" action="process_banking_info.php">
            <!-- Owner Type -->
            <div class="form-group mb-3">
                <label for="owner_type">Owner Type</label>
                <select name="owner_type" id="owner_type" class="form-control" onchange="handleOwnerType()" required>
                    <option value="">-- Select Owner Type --</option>
                    <option value="Own">Own</option>
                    <option value="Person">Person</option>
                    <option value="Asset">Asset</option>
                </select>
            </div>

            <!-- Select Owner -->
            <div id="owner_div" class="form-group mb-3" style="display: none;">
                <label for="owner">Select Owner</label>
                <select name="owner" id="owner" class="form-control">
                    <option value="">-- Select Owner --</option>
                </select>
            </div>

            <!-- Banking Type -->
            <div class="form-group mb-3">
                <label for="banking_type">Banking Type</label>
                <select name="banking_type" id="banking_type" class="form-control" onchange="handleBankingType()" required>
                    <option value="">-- Select Banking Type --</option>
                    <option value="Bank Account">Bank Account</option>
                    <option value="Mobile Banking">Mobile Banking</option>
                </select>
            </div>

            <!-- Bank Account Fields -->
            <div id="bank_fields" style="display: none;">
                <div class="form-group mb-3">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name">
                </div>
                <div class="form-group mb-3">
                    <label for="account_number">Account Number</label>
                    <input type="text" name="account_number" id="account_number" class="form-control" placeholder="Enter Account Number" required>
                </div>
                <div class="form-group mb-3">
                    <label for="account_holder">Account Holder</label>
                    <input type="text" name="account_holder" id="account_holder" class="form-control" placeholder="Enter Account Holder Name" required>
                </div>
            </div>

            <!-- Mobile Banking Fields -->
            <div id="mobile_fields" style="display: none;">
                <div class="form-group mb-3">
                    <label for="mobile_bank_name">Mobile Bank Name</label>
                    <select name="mobile_bank_name" id="mobile_bank_name" class="form-control" required>
                        <option value="">-- Select Mobile Bank --</option>
                        <?php foreach ($mobileBanks as $bank): ?>
                            <option value="<?= $bank ?>"><?= $bank ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="mobile_account_number">Account Number</label>
                    <input type="text" name="mobile_account_number" id="mobile_account_number" class="form-control" placeholder="Enter Account Number" required>
                </div>
                <div class="form-group mb-3">
                    <label for="mobile_account_type">Account Type</label>
                    <select name="mobile_account_type" id="mobile_account_type" class="form-control" required>
                        <option value="Personal">Personal</option>
                        <option value="Agent">Agent</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success">Add Banking Info</button>
                <a href="banking_info_list.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>
