<!-- resources/views/payment/test.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success">
            <h4>✅ Form Submission Working!</h4>
            <p>If you can see this page, the form is submitting correctly.</p>
        </div>
        
        @if(session('event'))
        <div class="card">
            <div class="card-body">
                <h5>Event: {{ session('event')->title }}</h5>
                <h5>Ticket: {{ session('ticket')->type }}</h5>
                <h5>Amount: {{ session('amount') }} XAF</h5>
            </div>
        </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
    </div>
</body>
</html>