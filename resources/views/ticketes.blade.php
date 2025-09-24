<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Tickets</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #4361ee;
      --primary-dark: #3a56d4;
      --secondary: #7209b7;
      --light: #f8f9fa;
      --dark: #212529;
      --success: #4cc9f0;
    }
    
    body {
      background: linear-gradient(135deg, #f4f8fc 0%, #e6f0ff 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .card {
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      border: none;
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .card-header {
      background: linear-gradient(to right, var(--primary), var(--secondary));
      color: white;
      text-align: center;
      padding: 1.5rem;
      border-bottom: none;
    }
    
    .card-body {
      padding: 2rem;
    }
    
    .form-label {
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
      border-radius: 10px;
      padding: 0.8rem 1rem;
      border: 2px solid #e2e8f0;
      transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
    }
    
    .btn-primary {
      background: linear-gradient(to right, var(--primary), var(--secondary));
      border: none;
      border-radius: 10px;
      padding: 0.8rem;
      font-weight: 600;
      
      text-align: center;
    }
    
    .btn-primary:hover {
      background: linear-gradient(to right, var(--primary-dark), #601a96);
      transform: translateY(-2px);
    }
    
    
    
    .btn-next:hover {
      background: linear-gradient(to right, #601a96, #3bb4d9);
      transform: translateY(-2px);
      color: white;
    }
    
    .price-display {
      background-color: #f0f7ff;
      border-radius: 10px;
      padding: 1rem;
      border: 2px solid #e2e8f0;
      text-align: center;
      background-color: var(--primary);
    }
    
    .ticket-icon {
      font-size: 1.5rem;
      color: var(--primary);
      margin-right: 0.5rem;
    }
    
    .step-indicator {
      display: flex;
      justify-content: space-between;
      margin-bottom: 2rem;
      position: relative;
    }
    
    .step {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background-color: #e2e8f0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      z-index: 2;
    }
    
    .step.active {
      background-color: var(--primary);
      color: white;
    }
    .price {
      font-size: 22px;
      font-weight: bold;
      margin: 15px 0;
      color: #007bff;
    }
    .total {
      background: #eef6ff;
      border-radius: 8px;
      padding: 12px;
      font-size: 20px;
      font-weight: bold;
      color: #0056b3;
      margin-top: 15px;
    }
    
    .step-indicator::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 2px;
      background-color: #e2e8f0;
      transform: translateY(-50%);
      z-index: 1;
    }
    
    @media (max-width: 576px) {
      .card-body {
        padding: 1.5rem;
      }

      
    }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      
     
      <div class="card">
        <div class="card-header">
          <h4 class="my-1">What About You</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('tickets.purchase') }}">
            

           
<div class="ticket-card">
  <h2>Standard Ticket</h2>
  
 <div>

<div class="col-md-10">
  <div class="row align-items-center">
    <div class="col-md-6">
      <img src="images.jpg" alt="Ticket" class="img-fluid rounded">
      <div class="price mt-3" id="unitPrice" data-price="5000">
        Price: 5,000 XAF
      </div>
    </div>
    <div class="col-md-6">
      <h5>Benefits:</h5>
      <ul class="benefits">
        <li>✔ Standard entry to the event</li>
        <li>✔ Access to all public areas</li>
        <li>✔ Free event program booklet</li>
        <li>✔ Customer support during the event</li>
      </ul>
    </div>

  </div>
</div>


  <form method="POST" action="{{ route('tickets.purchase') }}">
    
    <input type="hidden" name="ticket_type" value="standard">
            <div class="mb-4">
              <label for="quantity" class="form-label"><i class="fas fa-users ticket-icon"></i>Quantity</label>
              <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" onchange="updateTotal()">
            </div>

             <div class="total" id="totalPrice">Total: 5,000 XAF</div>

    <button type="submit" class="btn btn-primary w-100 mt-3">Buy Ticket</button>
  </form>
</div>

<script>
  function updateTotal() {
    const price = parseInt(document.getElementById("unitPrice").dataset.price);
    const qty = parseInt(document.getElementById("quantity").value);
    const total = price * qty;
    document.getElementById("totalPrice").textContent = "Total: " + total.toLocaleString() + " XAF";
  }

  
  document.addEventListener("DOMContentLoaded", updateTotal);
</script>

</body>
</html>
