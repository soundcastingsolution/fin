<?php include('includes/header.php'); ?>

<?php
$dummyAsset = [
    'id' => 1,
    'name' => 'Apartment #10',
    'address' => 'Block A, City Center',
    'status' => 'Won 3B',
    'initial_amount' => 75000,
    'installment_amount' => 2000,
    'specification' => '1500 sqft, 3 Bedrooms, 3 Bathrooms, 1 Kitchen, 1 Drawing Room',
    'installments_paid' => 5,
    'total_installment_amount' => 1500000,
    'pending_installments' => 3,
    'partial_payments' => 3,
    'partial_total_amount' => 3000000,
    'last_payment_month' => 'December 2023',
    'manager_name' => 'Mike Manager',
    'manager_number' => '123-456-7890',
    'engineer_name' => 'Emily Engineer',
    'engineer_number' => '987-654-3210'
];

$dummyBankingInfo = [
    ['type' => 'City Bank', 'account_number' => '230248900110'],
    ['type' => 'AB Bank', 'account_number' => '410544514504'],
    ['type' => 'Bkash', 'account_number' => '01752701707']
];
?>

<style>
    /* Enforce consistent layout on all screens */
    .fixed-layout p, .fixed-layout li {
        margin: 0;
        padding: 3px 0;
    }

    .fixed-layout .row {
        display: flex;
        justify-content: space-between;
        flex-wrap: nowrap;
    }

    .fixed-layout .col-md-6 {
        flex: 0 0 48%;
    }

    @media (max-width: 768px) {
        .fixed-layout .row {
            flex-wrap: wrap;
        }

        .fixed-layout .col-md-6 {
            flex: 0 0 100%;
        }
    }
</style>

<div class="container fixed-layout mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Asset: <?= htmlspecialchars($dummyAsset['name']) ?></h2>

        <!-- Asset Details -->
        <p><strong>Address:</strong> <?= htmlspecialchars($dummyAsset['address']) ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($dummyAsset['status']) ?></p>
        <p><strong>Initial Amount:</strong> $<?= number_format($dummyAsset['initial_amount'], 2) ?></p>
        <p><strong>Installment Amount:</strong> $<?= number_format($dummyAsset['installment_amount'], 2) ?></p>
        <p><strong>Specification:</strong> <?= htmlspecialchars($dummyAsset['specification']) ?></p>

        <!-- Installment Report -->
        <div class="row my-3">
            <div class="col-md-6">
                <p><strong>Installment Paid:</strong> <?= $dummyAsset['installments_paid'] ?></p>
                <p><strong>Pending Installment:</strong> <?= $dummyAsset['pending_installments'] ?></p>
                <p><strong>Partial Payment:</strong> <?= $dummyAsset['partial_payments'] ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Total Amount:</strong> $<?= number_format($dummyAsset['total_installment_amount'], 2) ?></p>
                <p><strong>Last Payment Month:</strong> <?= htmlspecialchars($dummyAsset['last_payment_month']) ?></p>
                <p><strong>Total Partial Payment Amount:</strong> $<?= number_format($dummyAsset['partial_total_amount'], 2) ?></p>
            </div>
        </div>

        <!-- Manager and Engineer -->
        <div class="row my-3">
            <div class="col-md-6">
                <p><strong>Manager:</strong> <?= htmlspecialchars($dummyAsset['manager_name']) ?></p>
                <p class="text-primary"><?= htmlspecialchars($dummyAsset['manager_number']) ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Engineer:</strong> <?= htmlspecialchars($dummyAsset['engineer_name']) ?></p>
                <p class="text-primary"><?= htmlspecialchars($dummyAsset['engineer_number']) ?></p>
            </div>
        </div>

        <!-- Banking Information -->
        <h4>Banking Information</h4>
        <ul class="list-group mb-4">
            <?php foreach ($dummyBankingInfo as $bank): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($bank['type']) ?>:</strong> <?= htmlspecialchars($bank['account_number']) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Action Buttons -->
        <div class="text-center">
            <a href="installment.php?asset_id=<?= $dummyAsset['id'] ?>" class="btn btn-primary">View Installment</a>
            <a href="installment.php?action=new&asset_id=<?= $dummyAsset['id'] ?>" class="btn btn-success">New Installment</a>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
