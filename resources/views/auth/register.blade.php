<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Register</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
				<div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role">
						<option value="1">Admin</option>
                        <option value="2">Polio Worker</option>
                        
                    </select>
                </div>

                <div class="mb-3" id="unionCouncilContainer" style="display: none;">
                    <label for="union_council" class="form-label">Union Council</label>
                    <select class="form-select" id="union_council" name="union_council">
                        <!-- Union Council options will be added dynamically via JavaScript -->
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var roleSelect = document.getElementById('role');
            var unionCouncilContainer = document.getElementById('unionCouncilContainer');
            var unionCouncilSelect = document.getElementById('union_council');

            roleSelect.addEventListener('change', function () {
                if (roleSelect.value == 2) { // Polio Worker
                    // Show the Union Council container
                    unionCouncilContainer.style.display = 'block';
                    // Call a function to populate the Union Council options
                    populateUnionCouncilOptions();
                } else {
                    // Hide the Union Council container if the role is not Polio Worker
                    unionCouncilContainer.style.display = 'none';
                }
            });

            function populateUnionCouncilOptions() {
                // Fetch Union Council options from the server
                fetch('get_union_councils') // Adjust the endpoint based on your Laravel routes
                    .then(response => response.json())
                    .then(data => {
                        // Clear existing options
                        unionCouncilSelect.innerHTML = '';

                        // Add new options
                        data.forEach(function (option) {
                            var optionElement = document.createElement('option');
                            optionElement.value = option.id;
                            optionElement.text = option.name;
                            unionCouncilSelect.appendChild(optionElement);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching Union Councils:', error);
                    });
            }
        });
    </script>
</body>
</html>
