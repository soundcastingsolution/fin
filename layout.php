<?php include('includes/header.php'); ?>

<div class="container mt-5 pt-5">
    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-start mb-3">
        <button onclick="history.back()" class="btn btn-secondary me-2">Back To Previous</button>
        <a href="index.php" class="btn btn-primary">Back To Main</a>
    </div>

    <!-- Page Content -->
    <div class="card p-4">
        <h2 class="text-center mb-4">Persons</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>John Doe</td><td>123-456-7890</td><td>123 Main St</td></tr>
                <tr><td>Jane Smith</td><td>987-654-3210</td><td>456 Elm St</td></tr>
            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>
