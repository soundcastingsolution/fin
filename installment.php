<?php include('includes/header.php'); ?>

<?php
// Dummy Asset Data
$assets = [
    ['id' => 1, 'name' => 'Apartment #10', 'installment_amount' => 2000],
    ['id' => 2, 'name' => 'Apartment #15', 'installment_amount' => 3000],
];

// Asset Banking Information
$assetBankingInfo = [
    ['asset_id' => 1, 'bank_name' => 'City Bank', 'account_number' => '123456789'],
    ['asset_id' => 1, 'bank_name' => 'AB Bank', 'account_number' => '987654321'],
    ['asset_id' => 2, 'bank_name' => 'Bkash', 'account_number' => '01752701707']
];

// Pending Installment Months
$pendingInstallments = [
    ['month' => 'January', 'year' => 2024],
    ['month' => 'February', 'year' => 2024],
    ['month' => 'March', 'year' => 2024]
];
?>

<script>
    function handlePaymentType() {
        const paymentType = document.querySelector('input[name="payment_type"]:checked').value;
        const monthField = document.getElementById('installment_month_div');
        const amountField = document.getElementById('installment_amount');

        if (paymentType === 'month') {
            monthField.style.display = 'block';
            amountField.readOnly = true;
        } else {
            monthField.style.display = 'none';
            amountField.readOnly = false;
            amountField.value = '';
        }
    }

    function updateInstallmentAmount() {
        const assetDropdown = document.getElementById('asset');
        const selectedAssetId = assetDropdown.value;

        const installmentAmounts = <?= json_encode(array_column($assets, 'installment_amount', 'id')) ?>;
        const amountField = document.getElementById('installment_amount');
        amountField.value = installmentAmounts[selectedAssetId] || '';
    }
</script>

<div class="container mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Installment Payment</h2>

        <form method="POST" enctype="multipart/form-data" action="process_installment.php">
            <!-- Select Asset -->
            <div class="form-group mb-3">
                <label for="asset">Select Asset</label>
                <select name="asset" id="asset" class="form-control" onchange="updateInstallmentAmount()" required>
                    <option value="">-- Select Asset --</option>
                    <?php foreach ($assets as $asset): ?>
                        <option value="<?= $asset['id'] ?>"><?= htmlspecialchars($asset['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Select Transfer To Account -->
            <div class="form-group mb-3">
                <label for="to_account">Select Transfer To Account</label>
                <select name="to_account" id="to_account" class="form-control" required>
                    <option value="">-- Select Account --</option>
                    <?php foreach ($assetBankingInfo as $account): ?>
                        <option value="<?= $account['account_number'] ?>">
                            <?= htmlspecialchars($account['bank_name'] . ' - ' . $account['account_number']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Payment Type -->
            <div class="form-group mb-3">
                <label>Payment Type</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="payment_type" value="month" id="month" class="form-check-input" onchange="handlePaymentType()" checked>
                    <label for="month" class="form-check-label">Installment Month</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="payment_type" value="partial" id="partial" class="form-check-input" onchange="handlePaymentType()">
                    <label for="partial" class="form-check-label">Partial Payment</label>
                </div>
            </div>

            <!-- Installment Month -->
            <div id="installment_month_div" class="form-group mb-3">
                <label for="installment_month">Select Installment Month</label>
                <select name="installment_month" id="installment_month" class="form-control" onchange="updateInstallmentAmount()">
                    <option value="">-- Select Month --</option>
                    <?php foreach ($pendingInstallments as $installment): ?>
                        <option value="<?= $installment['month'] . ' ' . $installment['year'] ?>">
                            <?= $installment['month'] . ' ' . $installment['year'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Installment Amount -->
            <div class="form-group mb-3">
                <label for="installment_amount">Amount</label>
                <input type="number" name="installment_amount" id="installment_amount" class="form-control" placeholder="Auto-filled or input value" required>
            </div>

            <!-- C-No and R-No (Side by Side) -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="c_no">C-No</label>
                    <input type="text" name="c_no" id="c_no" class="form-control" placeholder="Enter C-No">
                </div>
                <div class="col-md-6">
                    <label for="r_no">R-No</label>
                    <input type="text" name="r_no" id="r_no" class="form-control" placeholder="Enter R-No">
                </div>
            </div>

            <!-- Description (Optional) -->
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
            </div>

            <!-- Attachment (Optional) -->
            <div class="form-group mb-4">
                <label for="attachment">Attachment</label>
                <input type="file" name="attachment" id="attachment" class="form-control">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">Save Payment</button>
                <a href="asset_details.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>
