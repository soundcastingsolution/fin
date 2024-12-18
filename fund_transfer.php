<?php include('includes/header.php'); ?>

<?php
// Dummy Data: Persons with Bank Name and Account Numbers
$persons = [
    ['id' => 1, 'name' => 'John Doe', 'type' => 'Employee', 'salary' => 30000, 
        'accounts' => [
            ['bank_name' => 'City Bank', 'account_number' => '123456789'],
            ['bank_name' => 'AB Bank', 'account_number' => '987654321']
        ]
    ],
    ['id' => 2, 'name' => 'Jane Smith', 'type' => 'Vendor', 'salary' => 0, 
        'accounts' => [
            ['bank_name' => 'Bkash', 'account_number' => '654321789']
        ]
    ],
    ['id' => 3, 'name' => 'Mike Johnson', 'type' => 'Family', 'salary' => 0, 
        'accounts' => [
            ['bank_name' => 'Rocket', 'account_number' => '111222333']
        ]
    ],
];

// Own Accounts
$ownAccounts = [
    ['id' => 1, 'bank_name' => 'City Bank', 'account_number' => '1234567890'],
    ['id' => 2, 'bank_name' => 'AB Bank', 'account_number' => '0987654321'],
];

// Dummy Transfer Types
$commonRoles = ['Regular Expense', 'Taking Loan', 'Giving Loan', 'Sponsorship'];
$specialRoles = ['Employee' => ['Salary'], 'Vendor' => ['Vendor Payment'], 'Family' => ['Family']];
?>

<script>
    let personsData = <?= json_encode($persons) ?>;

    function loadTransferTypesAndAccounts() {
        const personDropdown = document.getElementById('person');
        const transferTypeDropdown = document.getElementById('transfer_type');
        const toAccountDropdown = document.getElementById('to_account');
        const selectedPersonId = personDropdown.value;

        const selectedPerson = personsData.find(person => person.id == selectedPersonId);

        // Reset Transfer Type and Account fields
        transferTypeDropdown.innerHTML = '<option value="">-- Select Transfer Type --</option>';
        toAccountDropdown.innerHTML = '<option value="">-- Select Account --</option>';

        // Add Common Transfer Types
        const commonRoles = <?= json_encode($commonRoles) ?>;
        commonRoles.forEach(role => transferTypeDropdown.add(new Option(role, role)));

        // Add Special Roles Based on Person Type
        const personType = selectedPerson.type;
        const specialRoles = <?= json_encode($specialRoles) ?>;
        if (specialRoles[personType]) {
            specialRoles[personType].forEach(role => transferTypeDropdown.add(new Option(role, role)));
        }

        // Populate Transfer To Account with Bank Name - Account Number
        selectedPerson.accounts.forEach(account => {
            const displayText = `${account.bank_name} - ${account.account_number}`;
            toAccountDropdown.add(new Option(displayText, account.account_number));
        });
    }

    function handleSalaryAmount() {
        const transferTypeDropdown = document.getElementById('transfer_type');
        const amountField = document.getElementById('amount');
        const personDropdown = document.getElementById('person');

        const selectedPersonId = personDropdown.value;
        const selectedPerson = personsData.find(person => person.id == selectedPersonId);

        if (transferTypeDropdown.value === 'Salary' && selectedPerson.type === 'Employee') {
            amountField.value = selectedPerson.salary;
            updateSalaryBalance(selectedPerson.salary);
        } else {
            amountField.value = '';
        }
    }

    function updateSalaryBalance(salaryAmount) {
        const amountField = document.getElementById('amount');
        const balanceNotification = document.getElementById('balance_notification');
        const enteredAmount = parseFloat(amountField.value) || 0;

        const remainingBalance = salaryAmount - enteredAmount;

        if (remainingBalance > 0) {
            balanceNotification.innerHTML = `Remaining Salary Balance: ${remainingBalance} (Due)`;
        } else if (remainingBalance < 0) {
            balanceNotification.innerHTML = `Advance Paid: ${Math.abs(remainingBalance)}`;
        } else {
            balanceNotification.innerHTML = '';
        }
    }
</script>

<div class="container mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Fund Transfer</h2>

        <form method="POST" enctype="multipart/form-data" action="process_fund_transfer.php">
            <!-- Select Person -->
            <div class="form-group mb-3">
                <label for="person">Select Person</label>
                <select name="person" id="person" class="form-control" onchange="loadTransferTypesAndAccounts()" required>
                    <option value="">-- Select Person --</option>
                    <?php foreach ($persons as $person): ?>
                        <option value="<?= $person['id'] ?>"><?= htmlspecialchars($person['name'] . ' (' . $person['type'] . ')') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Select Transfer Type -->
            <div class="form-group mb-3">
                <label for="transfer_type">Select Transfer Type</label>
                <select name="transfer_type" id="transfer_type" class="form-control" onchange="handleSalaryAmount()" required>
                    <option value="">-- Select Transfer Type --</option>
                </select>
            </div>

            <!-- Transfer To Account -->
            <div class="form-group mb-3">
                <label for="to_account">Transfer To Account</label>
                <select name="to_account" id="to_account" class="form-control" required>
                    <option value="">-- Select Account --</option>
                </select>
            </div>

            <!-- Transfer From Account -->
            <div class="form-group mb-3">
                <label for="from_account">Transfer From Account</label>
                <select name="from_account" id="from_account" class="form-control" required>
                    <option value="">-- Select Own Account --</option>
                    <?php foreach ($ownAccounts as $account): ?>
                        <option value="<?= $account['id'] ?>">
                            <?= htmlspecialchars($account['bank_name'] . ' - ' . $account['account_number']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Amount -->
            <div class="form-group mb-3">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" oninput="updateSalaryBalance(personsData.find(p => p.id == document.getElementById('person').value).salary)" required>
                <small id="balance_notification" class="text-muted"></small>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success">Submit Transfer</button>
                <a href="asset_details.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>
