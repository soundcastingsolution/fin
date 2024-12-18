<?php include('includes/header.php'); ?>

<div class="container mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Add New Person</h2>
        <form method="POST" action="process_add_person.php" enctype="multipart/form-data">
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
            </div>

            <!-- Person Type -->
            <div class="form-group">
                <label for="person_type">Person Type</label>
                <select class="form-control" id="person_type" name="person_type" onchange="toggleSalaryField()" required>
                    <option value="">-- Select Person Type --</option>
                    <option value="Friend">Friend</option>
                    <option value="Employee">Employee</option>
                    <option value="Family">Family</option>
                    <option value="Sponsorship">Sponsorship</option>
                    <option value="Vendor">Vendor</option>
                    <option value="Business">Business</option>
                </select>
            </div>

            <!-- Salary Field (Conditional for Employee) -->
            <div class="form-group" id="salary_field" style="display: none;">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter salary amount">
            </div>

            <!-- Profile Picture -->
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
            </div>

            <!-- Attachment -->
            <div class="form-group">
                <label for="attachment">Attachment (Optional)</label>
                <input type="file" class="form-control-file" id="attachment" name="attachment">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Add Person</button>
            <a href="person.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script>
    function toggleSalaryField() {
        const personType = document.getElementById('person_type').value;
        const salaryField = document.getElementById('salary_field');
        salaryField.style.display = (personType === 'Employee') ? 'block' : 'none';
    }
</script>

<?php include('includes/footer.php'); ?>
