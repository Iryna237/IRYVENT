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
            --standard: #4361ee;
            --vip: #f72585;
            --premium: #ff9e00;
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
        
        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 8px;
            color: var(--primary);
        }
        
        .form-control {
            padding: 12px 16px;
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .input-group-text {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px 0 0 10px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }
        
        .alert-danger {
            border-radius: 10px;
            border: none;
            background: rgba(247, 37, 133, 0.15);
            color: #d63384;
        }
        
        .image-preview {
            width: 100%;
            height: 200px;
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: 10px;
            background: #f8f9fa;
        }
        
        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }
        
        .image-preview span {
            color: #6c757d;
        }
        
        .character-count {
            font-size: 12px;
            color: #6c757d;
            text-align: right;
            margin-top: 5px;
        }
        
        .form-section {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .form-section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .form-section-title i {
            margin-right: 10px;
            background: rgba(67, 97, 238, 0.1);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Ticket type styles */
        .ticket-type {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid var(--standard);
            transition: all 0.3s;
        }
        
        .ticket-type.vip {
            border-left-color: var(--vip);
        }
        
        .ticket-type.premium {
            border-left-color: var(--premium);
        }
        
        .ticket-type:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .ticket-title {
            font-weight: 700;
            font-size: 18px;
            color: var(--dark);
        }
        
        .ticket-type .ticket-title i {
            margin-right: 8px;
        }
        
        .standard .ticket-title {
            color: var(--standard);
        }
        
        .vip .ticket-title {
            color: var(--vip);
        }
        
        .premium .ticket-title {
            color: var(--premium);
        }
        
        .remove-ticket {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s;
        }
        
        .remove-ticket:hover {
            transform: scale(1.2);
        }
        
        .add-ticket-btn {
            background: linear-gradient(135deg, var(--success), #4895ef);
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            margin: 0 auto;
            transition: all 0.3s;
        }
        
        .add-ticket-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 201, 240, 0.3);
        }
        
        .add-ticket-btn i {
            margin-right: 8px;
        }
        
        .ticket-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-standard {
            background: rgba(67, 97, 238, 0.15);
            color: var(--standard);
        }
        
        .badge-vip {
            background: rgba(247, 37, 133, 0.15);
            color: var(--vip);
        }
        
        .badge-premium {
            background: rgba(255, 158, 0, 0.15);
            color: var(--premium);
        }
        
        @media (max-width: 768px) {
            .event-card {
                padding: 25px 20px;
            }
            
            .event-header h3 {
                font-size: 24px;
            }
            
            .ticket-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .ticket-header .form-check {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="event-card">
        <div class="event-header">
            <h3>Create New Event</h3>
            <p>Fill in the details to create an amazing event</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" id="eventForm">
            @csrf
            
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-info-circle"></i>Informations
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label"><i class="fas fa-heading"></i> Event Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter event title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><i class="fas fa-align-left"></i> Event Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" placeholder="Describe your event" required></textarea>
                    <div class="character-count"><span id="charCount">0</span>/500 characters</div>
                </div>
            </div>
            
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-calendar-alt"></i> Date & Time
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label"><i class="fas fa-play-circle"></i> Start Date & Time</label>
                        <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date" class="form-label"><i class="fas fa-stop-circle"></i> End Date & Time</label>
                        <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-map-marker-alt"></i> Location Details
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><i class="fas fa-location-arrow"></i> Location</label>
                    <input type="text" id="location" name="location" class="form-control" placeholder="Enter event location" required>
                </div>
            </div>
            
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-ticket-alt"></i> Ticket Information
                </div>
                
                <div id="ticket-container">
                    
                    <div class="ticket-type standard">
                        <div class="ticket-header">
                            <div>
                                <div class="ticket-title"><i class="fas fa-ticket-alt"></i> Standard Ticket</div>
                                <span class="ticket-badge badge-standard">Most Popular</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price (FCFA)</label>
                                <div class="input-group">
                                    <span class="input-group-text">FCFA</span>
                                    <input type="number" name="tickets[standard][price]" class="form-control" placeholder="0.00" min="0" step="100" value="5000" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Available Quantity</label>
                                <input type="number" name="tickets[standard][quantity]" class="form-control" placeholderNumber of tickets" min="1" value="100" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ticket Description</label>
                            <textarea name="tickets[standard][description]" class="form-control" rows="2" placeholder="What's included in this ticket">Access to main event area, basic amenities</textarea>
                        </div>
                    </div>
                    
                    
                    <div class="ticket-type vip">
                        <div class="ticket-header">
                            <div>
                                <div class="ticket-title"><i class="fa-ticket-alt"></i> VIP Ticket</div>
                                <span class="ticket-badge badge-vip">Premium Experience</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price (FCFA)</label>
                                <div class="input-group">
                                    <span class="input-group-text">FCFA</span>
                                    <input type="number" name="tickets[vip][price]" class="form-control" placeholder="0.00" min="0" step="100" value="15000" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Available Quantity</label>
                                <input type="number" name="tickets[vip][quantity]" class="form-control" placeholder="Number of tickets" min="1" value="50" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ticket Description</label>
                            <textarea name="tickets[vip][description]" class="form-control" rows="2" placeholder="What's included in this ticket">Premium seating, complimentary drinks, VIP lounge access</textarea>
                        </div>
                    </div>
                    
                    
                    <div class="ticket-type premium">
                        <div class="ticket-header">
                            <div>
                                <div class="ticket-title"><i class="fa-ticket-alt"></i> Premium Ticket</div>
                                <span class="ticket-badge badge-premium">Exclusive</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price (FCFA)</label>
                                <div class="input-group">
                                    <span class="input-group-text">FCFA</span>
                                    <input type="number" name="tickets[premium][price]" class="form-control" placeholder="0.00" min="0" step="100" value="25000" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Available Quantity</label>
                                <input type="number" name="tickets[premium][quantity]" class="form-control" placeholder="Number of tickets" min="1" value="20" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ticket Description</label>
                            <textarea name="tickets[premium][description]" class="form-control" rows="2" placeholder="What's included in this ticket">Front row seats, backstage access, meet & greet with performers, exclusive merchandise</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-image"></i> Event Banner
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label"><i class="fas fa-upload"></i> Event Image</label>
                    <input type="file" id="banner" name="banner" class="form-control" accept="image/*" required onchange="previewImage(event)">
                    <div class="image-preview">
                        <span id="previewText">Image preview will appear here</span>
                        <img id="preview" src="" alt="Preview">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-plus-circle me-2"></i> Create Event
            </button>
        </form>
    </div>

    <script>
        
        const description = document.getElementById('description');
        const charCount = document.getElementById('charCount');
        
        description.addEventListener('input', function() {
            const text = this.value;
            charCount.textContent = text.length;
            
            if (text.length > 500) {
                charCount.style.color = '#dc3545';
            } else {
                charCount.style.color = '#6c757d';
            }
        });
        
        
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const previewText = document.getElementById('previewText');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    previewText.style.display = 'none';
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
       
        document.getElementById('eventForm').addEventListener('submit', function(e) {
            const startDate = new Date(document.getElementById('start_date').value);
            const endDate = new Date(document.getElementById('end_date').value);
            
            if (startDate >= endDate) {
                e.preventDefault();
                alert('End date must be after start date.');
                return false;
            }
            
            if (document.getElementById('description').value.length > 500) {
                e.preventDefault();
                alert('Description must be 500 characters or less.');
                return false;
            }
        });
    </script>
</body>
</html>