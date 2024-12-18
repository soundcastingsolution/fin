<?php include('includes/header.php'); ?>

<div class="container mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Add New Asset</h2>
        <form method="POST" action="process_add_asset.php" enctype="multipart/form-data">
            <!-- Name -->
            <div class="form-group">
                <label for="name">Asset Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter asset name" required>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter asset address" required></textarea>
            </div>

            <!-- Specification -->
            <div class="form-group">
                <label for="specification">Specification</label>
                <input type="text" class="form-control" id="specification" name="specification" placeholder="e.g., 1500 sqft, 3 Bedrooms, 1 Kitchen">
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" onchange="toggleUnitField()" required>
                    <option value="">-- Select Status --</option>
                    <option value="Won">Won</option>
                    <option value="Under Construction">Under Construction</option>
                </select>
            </div>

            <!-- Unit Name (Conditional for Won Status) -->
            <div class="form-group" id="unit_field" style="display: none;">
                <label for="unit_name">Unit Name</label>
                <input type="text" class="form-control" id="unit_name" name="unit_name" placeholder="Enter unit name (e.g., Won 8C)">
            </div>

            <!-- Initial Amount -->
            <div class="form-group">
                <label for="initial_amount">Initial Amount</label>
                <input type="number" class="form-control" id="initial_amount" name="initial_amount" placeholder="Enter initial amount" required>
            </div>

            <!-- Installment Amount -->
            <div class="form-group">
                <label for="installment_amount">Installment Amount</label>
                <input type="number" class="form-control" id="installment_amount" name="installment_amount" placeholder="Enter installment amount" required>
            </div>

            <!-- Store Manager -->
            <div class="form-group">
                <label for="manager_name">Manager Name</label>
                <input type="text" class="form-control" id="manager_name" name="manager_name" placeholder="Enter manager name">
            </div>
            <div class="form-group">
                <label for="manager_number">Manager Number</label>
                <input type="text" class="form-control" id="manager_number" name="manager_number" placeholder="Enter manager phone number">
            </div>

            <!-- Engineer -->
            <div class="form-group">
                <label for="engineer_name">Engineer Name</label>
                <input type="text" class="form-control" id="engineer_name" name="engineer_name" placeholder="Enter engineer name">
            </div>
            <div class="form-group">
                <label for="engineer_number">Engineer Number</label>
                <input type="text" class="form-control" id="engineer_number" name="engineer_number" placeholder="Enter engineer phone number">
            </div>

            <!-- Attachment -->
            <div class="form-group">
                <label for="attachment">Attachment (Optional)</label>
                <input type="file" class="form-control-file" id="attachment" name="attachment">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Asset</button>
            <a href="asset.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script>
    // Show or hide Unit Name field based on Status
    function toggleUnitField() {
        const status = document.getElementById('status').value;
        const unitField = document.getElementById('unit_field');
        unitField.style.display = (status === 'Won') ? 'block' : 'none';
    }
</script>

<?php include('includes/footer.php'); ?>
