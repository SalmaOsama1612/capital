<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital - Reset Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        /* Industrial background pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(218, 165, 32, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(218, 165, 32, 0.08) 0%, transparent 50%),
                linear-gradient(45deg, rgba(255, 255, 255, 0.02) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(255, 255, 255, 0.02) 25%, transparent 25%);
            background-size: 100px 100px, 150px 150px, 50px 50px, 50px 50px;
            animation: backgroundMove 20s linear infinite;
        }

        @keyframes backgroundMove {
            0% { background-position: 0 0, 0 0, 0 0, 0 0; }
            100% { background-position: 100px 100px, -150px -150px, 50px 50px, -50px -50px; }
        }

        .reset-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(218, 165, 32, 0.3);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(218, 165, 32, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
            margin: 20px;
            animation: slideIn 0.5s ease-out;
        }

        .reset-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(218, 165, 32, 0.05) 0%, transparent 50%);
            border-radius: 15px;
            pointer-events: none;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo h1 {
            color: #DAA520;
            font-size: 2.2em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }

        .logo p {
            color: #888;
            font-size: 0.9em;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .subtitle {
            text-align: center;
            color: #ccc;
            font-size: 1.1em;
            margin-bottom: 15px;
            font-weight: 300;
        }

        .description {
            background: rgba(218, 165, 32, 0.1);
            border: 1px solid rgba(218, 165, 32, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            color: #e6e6e6;
            font-size: 0.9em;
            line-height: 1.6;
            text-align: center;
            position: relative;
        }

        .description::before {
            content: '🔧';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            padding: 8px 12px;
            border-radius: 50%;
            font-size: 1.2em;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #DAA520;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(218, 165, 32, 0.3);
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            text-align: center;
        }

        .form-input:focus {
            outline: none;
            border-color: #DAA520;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 0 20px rgba(218, 165, 32, 0.2),
                inset 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        .form-input::placeholder {
            color: #888;
            text-align: center;
        }

        .form-input:focus::placeholder {
            text-align: left;
        }

        .send-btn {
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            color: #000;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 
                0 5px 15px rgba(218, 165, 32, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .send-btn:hover {
            background: linear-gradient(135deg, #FFD700 0%, #DAA520 100%);
            transform: translateY(-2px);
            box-shadow: 
                0 8px 25px rgba(218, 165, 32, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .send-btn:active {
            transform: translateY(0);
        }

        .send-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -50px;
            transform: translateY(-50%);
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .send-btn:hover::before {
            left: 100%;
            width: 50px;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.8em;
            margin-top: 8px;
            background: rgba(255, 107, 107, 0.1);
            padding: 10px 15px;
            border-radius: 8px;
            border-left: 4px solid #ff6b6b;
        }

        .session-status {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid #22c55e;
            font-size: 0.9em;
            text-align: center;
            position: relative;
        }

        .session-status::before {
            content: '✉️';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 1.1em;
        }

        /* Industrial accent elements */
        .accent-line {
            height: 2px;
            background: linear-gradient(90deg, transparent, #DAA520, transparent);
            margin: 20px 0;
            position: relative;
        }

        .accent-line::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -4px;
            transform: translateX(-50%);
            width: 8px;
            height: 8px;
            background: #DAA520;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(218, 165, 32, 0.5);
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .back-link a {
            color: #DAA520;
            text-decoration: none;
            font-size: 0.9em;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link a:hover {
            color: #FFD700;
            text-shadow: 0 0 5px rgba(218, 165, 32, 0.5);
            transform: translateX(-3px);
        }

        .back-link a::before {
            content: '←';
            font-size: 1.2em;
            transition: all 0.3s ease;
        }

        .back-link a:hover::before {
            transform: translateX(-2px);
        }

        /* Loading state */
        .send-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .send-btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            border-top: 2px solid #000;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Email validation state */
        .form-input.valid {
            border-color: #22c55e;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.2);
        }

        .form-input.invalid {
            border-color: #ef4444;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.2);
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .reset-container {
                margin: 10px;
                padding: 25px 20px;
            }
            
            .logo h1 {
                font-size: 1.8em;
            }
            
            .description {
                padding: 15px;
                font-size: 0.85em;
            }
        }

        /* Smooth entry animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating particles effect */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #DAA520;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 6s linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.3;
            }
            90% {
                opacity: 0.3;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 2.5s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 3.5s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 4.5s;"></div>
    </div>

    <div class="reset-container">
        <div class="logo">
          <h1>Capital</h1>
            <p>Construction Company</p>
        </div>
        
        <div class="subtitle">Password Recovery</div>
        <div class="accent-line"></div>

        <div class="description">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="session-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" id="resetForm">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input 
                    id="email" 
                    class="form-input" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                    placeholder="Enter your registered email address"
                />
                @if ($errors->get('email'))
                    <div class="error-message">
                        @foreach ($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="send-btn" id="submitBtn">
                {{ __('Email Password Reset Link') }}
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">
                {{ __('Back to Login') }}
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetForm');
            const emailInput = document.getElementById('email');
            const submitBtn = document.getElementById('submitBtn');

            // Email validation
            emailInput.addEventListener('input', function() {
                const email = this.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (email === '') {
                    this.classList.remove('valid', 'invalid');
                } else if (emailRegex.test(email)) {
                    this.classList.add('valid');
                    this.classList.remove('invalid');
                } else {
                    this.classList.add('invalid');
                    this.classList.remove('valid');
                }
            });

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(email)) {
                    e.preventDefault();
                    emailInput.classList.add('invalid');
                    emailInput.focus();
                    return;
                }
                
                submitBtn.classList.add('loading');
                submitBtn.textContent = 'Sending...';
            });

            // Auto-focus and select email input
            emailInput.focus();
            if (emailInput.value) {
                emailInput.select();
            }
        });
    </script>
</body>
</html>