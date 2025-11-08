<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Lost Item</title>

  <!-- ✅ Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg border-0">
      <div class="card-header bg-primary text-white text-center">
        <h3>Report Lost Item</h3>
      </div>

      <div class="card-body">
        <form action="{{ route('lostItems.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="item_name" class="form-label">Item Name:</label>
            <input type="text" class="form-control" id="item_name" name="item_name" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="location_found" class="form-label">Location Found:</label>
            <input type="text" class="form-control" id="location_found" name="location_found" required>
          </div>

          <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Info:</label>
            <input type="text" class="form-control" id="contact_info" name="contact_info" required>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Upload Image:</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*">
          </div>

          <div class="d-flex justify-content-between">
            <a href="{{ route('lostItems.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ✅ Bootstrap JS Bundle (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>