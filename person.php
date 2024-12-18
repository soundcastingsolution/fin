<?php include('includes/header.php'); ?>

<?php
// Dummy Person Data
$persons = [
  ['id'=>1, 'name'=>'John Doe',     'phone'=>'123-456-7890', 'address'=>'123 Main St'],
  ['id'=>2, 'name'=>'Jane Smith',   'phone'=>'987-654-3210', 'address'=>'456 Elm St'],
  ['id'=>3, 'name'=>'Alice Johnson','phone'=>'555-111-2222','address'=>'789 Oak Ave']
];
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Persons</h1>
  <a href="add_person.php" class="btn btn-primary">Add New Person</a>
</div>

<form class="form-inline mb-3">
  <input class="form-control mr-2" type="text" placeholder="Search by name (dummy)">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr><th>Name</th><th>Phone</th><th>Address</th></tr>
    </thead>
    <tbody>
      <?php foreach($persons as $p): ?>
      <tr style="cursor:pointer;" onclick="window.location='person_details.php?id=<?= $p['id'] ?>';">
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= htmlspecialchars($p['phone']) ?></td>
        <td><?= htmlspecialchars($p['address']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include('includes/footer.php'); ?>
