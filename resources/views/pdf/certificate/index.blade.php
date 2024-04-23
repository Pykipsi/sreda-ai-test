<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="text-center">
        <h2 class="mt-4">Certificate of Completion</h2>
    </div>
    <div class="text-center mt-4">
        <p><strong>Certificate Number:</strong> {{ $certificate['id'] }} </p>
        <p><strong>Serial Number:</strong> {{ $certificate['serial_number'] }} </p>
        <p><strong>Course Name:</strong> {{ $certificate['name'] }} </p>
        <p><strong>Student Name:</strong> {{ $certificate['student_name'] }} </p>
        <p><strong>Completion Date:</strong> {{ $certificate['competition_date'] }} </p>
    </div>
    <div class="text-center mt-4">
        {{ $certificate['qr_code'] }}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
