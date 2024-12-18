<?php include('includes/header.php'); ?>

<?php
// Dummy Banking Info
$bankingInfos = [
  ['id'=>1,'owner_type'=>'own','owner_name'=>'(Own Account)','type'=>'Bank Account','details'=>'Bank: ABC, Acc: 123456'],
  ['id'=>2,'owner_type'=>'person','owner_name'=>'John Doe','type'=>'Mobile Banking','details'=>'Channel: XYZ Pay, Acc: 7890'],
  ['id'=>3,'owner_type'=>'asset','owner_name'=>'House Asset','type'=>'Hand Cash','details'=>'Cash pickup on site']
];
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Banking Info</h1>
  <a href="banking_info_details.php?action=add" class="btn btn-primary">Add New Banking Info</a>
</div>

<form class="form-inline mb-3">
  <input class="form-control mr-2" type="text" placeholder="Search by owner or type (dummy)">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr><th>Owner</th><th>Type</th><th>Details</th></tr>
    </thead>
    <tbody>
      <?php foreach($bankingInfos as $b): ?>
      <tr style="cursor:pointer;" onclick="window.location='banking_info_details.php?id=<?= $b['id'] ?>';">
        <td><?= htmlspecialchars($b['owner_name']) ?></td>
        <td><?= htmlspecialchars($b['type']) ?></td>
        <td><?= htmlspecialchars($b['details']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include('includes/footer.php'); ?>
