<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --card-bg: rgba(255, 255, 255, 0.92);
        }

        body {
            background: linear-gradient(135deg, #007BFF, #00C6FF, #007BFF);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            margin: 0;
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .event-card {
            background: var(--card-bg);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 800px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.2);
        }

        .event-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .event-header h3 {
            color: var(--primary);
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .event-header p {
            color: #6c757d;
            font-size: 16px;
        }

        .event-header::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--accent);
            margin: 15px auto;
            border-radius: 2px;
        }

        .form-step { display: none; }
        .form-step.active { display: block; animation: fadeIn 0.5s ease; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .stepper::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e9ecef;
            z-index: 1;
        }

        .step {
            position: relative;
            z-index: 2;
            text-align: center;
            flex: 1;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 2px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 600;
            color: #6c757d;
        }

        .step.active .step-icon {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step.completed .step-icon {
            background: var(--success);
            border-color: var(--success);
            color: white;
        }

        .step-title {
            font-size: 14px;
            font-weight: 600;
            color: #6c757d;
        }

        .step.active .step-title { color: var(--primary); }
        .step.completed .step-title { color: var(--success); }

        .event-type-card {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            width: 150px;
        }

        .event-type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .event-type-card.selected {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }

        .event-type-card i { font-size: 32px; margin-bottom: 10px; color: var(--primary); }

        .image-preview {
            width: 100%;
            height: 200px;
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            background: #f8f9fa;
        }

        .image-preview img { max-width: 100%; max-height: 100%; display: none; }
        .image-preview span { color: #6c757d; }

        .form-label { font-weight: 600; color: var(--dark); margin-bottom: 8px; display: flex; align-items: center; }
        .form-label i { margin-right: 8px; color: var(--primary); }
        .form-control { padding: 12px 16px; border-radius: 10px; border: 2px solid #e9ecef; transition: all 0.3s; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 0.25rem rgba(67,97,238,0.15); }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            box-shadow: 0 8px 20px rgba(67,97,238,0.4);
        }

        .form-navigation { display: flex; justify-content: space-between; margin-top: 20px; }
    </style>
</head>
<body>
<div class="event-card">
    <div class="event-header">
        <h3>Create New Event</h3>
        <p>Fill in the details to create your amazing event</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" id="eventForm">
        @csrf

        <!-- Stepper -->
        <div class="stepper mb-4">
            <div class="step active" id="step1"><div class="step-icon">1</div><div class="step-title">Type</div></div>
            <div class="step" id="step2"><div class="step-icon">2</div><div class="step-title">Details</div></div>
            <div class="step" id="step3"><div class="step-icon">3</div><div class="step-title">Tickets</div></div>
        </div>

        <!-- Step 1: Event Type -->
        <div class="form-step active" id="step1-form">
            <p>Select the type of event:</p>
            <div class="d-flex gap-3 flex-wrap">
                <div class="event-type-card" data-type="concert"><i class="fas fa-music"></i><div>Concert</div></div>
                <div class="event-type-card" data-type="conference"><i class="fas fa-chalkboard-teacher"></i><div>Conference</div></div>
                <div class="event-type-card" data-type="sports"><i class="fas fa-running"></i><div>Sports</div></div>
                <div class="event-type-card" data-type="workshop"><i class="fas fa-tools"></i><div>Workshop</div></div>
            </div>
            <input type="hidden" name="event_type" id="event_type">
            <div class="form-navigation mt-3">
                <div></div>
                <button type="button" class="btn btn-primary next-step" data-step="2">Next <i class="fas fa-arrow-right ms-2"></i></button>
            </div>
        </div>

        <!-- Step 2: Event Details -->
        <div class="form-step" id="step2-form">
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-heading"></i> Event Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-align-left"></i> Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-calendar-alt"></i> Start Date & Time</label>
                <input type="datetime-local" name="start_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-calendar-alt"></i> End Date & Time</label>
                <input type="datetime-local" name="end_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-map-marker-alt"></i> Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <div class="form-navigation">
                <button type="button" class="btn btn-outline-primary prev-step" data-step="1"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                <button type="button" class="btn btn-primary next-step" data-step="3">Next <i class="fas fa-arrow-right ms-2"></i></button>
            </div>
        </div>

        <!-- Step 3: Tickets & Banner -->
        <div class="form-step" id="step3-form">
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-image"></i> Event Banner</label>
                <input type="file" name="banner" class="form-control" accept="image/*" onchange="previewImage(event)">
                <div class="image-preview">
                    <span id="previewText">Image preview will appear here</span>
                    <img id="preview" src="" alt="Preview">
                </div>
            </div>         <!-- Tickets Section -->
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-ticket-alt"></i> Tickets</label>

                <div class="ticket-group mb-2">
                    <div class="mb-2">
                        <strong>Standard Ticket</strong>
                        <input type="number" name="tickets[standard][price]" class="form-control mb-1" placeholder="Price" required>
                        <input type="number" name="tickets[standard][quantity]" class="form-control mb-1" placeholder="Quantity" value="1" required>
                        <textarea name="tickets[standard][description]" class="form-control" placeholder="Description"></textarea>
                    </div>

                    <div class="mb-2">
                        <strong>VIP Ticket</strong>
                        <input type="number" name="tickets[vip][price]" class="form-control mb-1" placeholder="Price" required>
                        <input type="number" name="tickets[vip][quantity]" class="form-control mb-1" placeholder="Quantity" value="1" required>
                        <textarea name="tickets[vip][description]" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-navigation">
                <button type="button" class="btn btn-outline-primary prev-step" data-step="2"><i class="fas fa-arrow-left me-2"></i> Previous</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i> Create Event</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Stepper and event type selection
    const steps = document.querySelectorAll('.step');
    const formSteps = document.querySelectorAll('.form-step');
    const nextButtons = document.querySelectorAll('.next-step');
    const prevButtons = document.querySelectorAll('.prev-step');
    const eventTypeCards = document.querySelectorAll('.event-type-card');
    const eventTypeInput = document.getElementById('event_type');
    let currentStep = 1;

    eventTypeCards.forEach(card => {
        card.addEventListener('click', () => {
            eventTypeCards.forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            eventTypeInput.value = card.getAttribute('data-type');
        });
    });

    nextButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const step = parseInt(btn.getAttribute('data-step'));
            if (currentStep === 1 && !eventTypeInput.value) { alert('Please select an event type'); return; }
            formSteps.forEach(s => s.classList.remove('active'));
            document.getElementById(`step${step}-form`).classList.add('active');
            steps.forEach((s, i) => {
                s.classList.remove('active','completed');
                if (i+1 < step) s.classList.add('completed');
                else if (i+1 === step) s.classList.add('active');
            });
            currentStep = step;
        });
    });

    prevButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const step = parseInt(btn.getAttribute('data-step'));
            formSteps.forEach(s => s.classList.remove('active'));
            document.getElementById(`step${step}-form`).classList.add('active');
            steps.forEach((s, i) => {
                s.classList.remove('active','completed');
                if (i+1 < step) s.classList.add('completed');
                else if (i+1 === step) s.classList.add('active');
            });
            currentStep = step;
        });
    });

    function previewImage(event){
        const input = event.target;
        const preview = document.getElementById('preview');
        const previewText = document.getElementById('previewText');
        if(input.files && input.files[0]){
            const reader = new FileReader();
            reader.onload = function(e){
                preview.src = e.target.result;
                preview.style.display='block';
                previewText.style.display='none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
