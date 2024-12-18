<?php include('includes/header.php'); ?>

<?php
// Dummy Asset Data
$assets = [
  ['id'=>1,'name'=>'House','address'=>'123 Elm St','specification'=>'3 Bed, 2 Bath','initial_amount'=>50000,'status'=>'Won 9d','manager_name'=>'Mike Manager','manager_number'=>'111-222-3333','engineer_name'=>'Emily Engineer','engineer_number'=>'444-555-6666','installment_amount'=>500],
  ['id'=>2,'name'=>'Car','address'=>'Parking Lot #5','specification'=>'Sedan, Blue','initial_amount'=>20000,'status'=>'Under Construction','manager_name'=>'Carl Manager','manager_number'=>'777-888-9999','engineer_name'=>'Eve Engineer','engineer_number'=>'000-111-2222','installment_amount'=>250]
];
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Assets</h1>
  <a href="add_asset.php" class="btn btn-primary">Add New Asset</a>
</div>

<form class="form-inline mb-3">
  <input class="form-control mr-2" type="text" placeholder="Search by name (dummy)">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr><th>Name</th><th>Address</th><th>Status</th></tr>
    </thead>
    <tbody>
      <?php foreach($assets as $a): ?>
      <tr style="cursor:pointer;" onclick="window.location='asset_details.php?id=<?= $a['id'] ?>';">
        <td><?= htmlspecialchars($a['name']) ?></td>
        <td><?= htmlspecialchars($a['address']) ?></td>
        <td><?= htmlspecialchars($a['status']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include('includes/footer.php'); ?>
