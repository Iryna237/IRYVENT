 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        .bg-bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }
        
        .bg-bubbles li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            bottom: -160px;
            border-radius: 50%;
            animation: square 25s infinite;
            transition-timing-function: linear;
        }
        
        .bg-bubbles li:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
            width: 80px;
            height: 80px;
        }
        
        .bg-bubbles li:nth-child(2) {
            left: 20%;
            animation-delay: 2s;
            animation-duration: 17s;
        }
        
        .bg-bubbles li:nth-child(3) {
            left: 25%;
            animation-delay: 4s;
        }
        
        .bg-bubbles li:nth-child(4) {
            left: 40%;
            animation-delay: 0s;
            animation-duration: 22s;
            width: 60px;
            height: 60px;
        }
        
        .bg-bubbles li:nth-child(5) {
            left: 70%;
            animation-delay: 3s;
        }
        
        .bg-bubbles li:nth-child(6) {
            left: 80%;
            animation-delay: 2s;
            width: 90px;
            height: 90px;
        }
        
        .bg-bubbles li:nth-child(7) {
            left: 32%;
            animation-delay: 6s;
            width: 70px;
            height: 70px;
        }
        
        .bg-bubbles li:nth-child(8) {
            left: 55%;
            animation-delay: 8s;
            animation-duration: 18s;
        }
        
        .bg-bubbles li:nth-child(9) {
            left: 25%;
            animation-delay: 9s;
            animation-duration: 20s;
        }
        
        .bg-bubbles li:nth-child(10) {
            left: 90%;
            animation-delay: 11s;
            width: 50px;
            height: 50px;
        }
        
        @keyframes square {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 50%;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.25);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .login-header p {
            color: #6c757d;
            font-size: 16px;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 16px 20px;
            height: auto;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: #dee2e6;
        }
        
        .divider span {
            padding: 0 15px;
            color: #6c757d;
            font-size: 14px;
        }
        
        .social-login {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 10px;
            border: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 14px;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        
        .social-btn i {
            font-size: 18px;
        }
        
        .google { background-color: #db4437; }
        .facebook { background-color: #3b5998; }
        .apple { background-color: #000; }
        
        .link {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
        }
        
        .link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .link a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }
        
        .forgot-password {
            text-align: center;
            margin: 15px 0;
        }
        
        .forgot-password a {
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .forgot-password a:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 25px 20px;
            }
            
            .social-login {
                grid-template-columns: 1fr;
            }
            
            .social-btn {
                width: 100%;
            }
            
            .bg-bubbles li {
                width: 30px;
                height: 30px;
            }
        }
        
        /* Animation for alerts */
        .alert {
            border-radius: 10px;
            border: none;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Animation for form fields */
        .form-floating {
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>
    <!-- Animated background bubbles -->
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3>Welcome Back</h3>
                <p>Sign in to access your account</p>
            </div>
            
              
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
             @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
           
            <form action="{{ route('auth.iryna-login') }}" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required autofocus>
                    <label for="email"><i class="bi bi-envelope me-2"></i>Email Address</label>
                </div>
                
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </div>
                
                <button type="submit" class="btn-login">Login</button>
            </form>
            
            <div class="divider">
                <span>Or continue with</span>
            </div>
            
            <div class="social-login">
                <button class="social-btn google" onclick="window.location.href='{{ url('auth/google') }}'">
                    <i class="bi bi-google"></i>
                </button>
                <button class="social-btn facebook" onclick="window.location.href='{{ url('auth/facebook') }}'">
                    <i class="bi bi-facebook"></i>
                </button>
                <button class="social-btn apple" onclick="window.location.href='{{ url('auth/apple') }}'">
                    <i class="bi bi-apple"></i>
                </button>
            </div>
            
            <div class="link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
