<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital - Email Verification</title>
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

        .verification-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(218, 165, 32, 0.3);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(218, 165, 32, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
            margin: 20px;
            animation: slideIn 0.6s ease-out;
        }

        .verification-container::before {
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

        .email-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .email-icon {
            font-size: 4em;
            color: #DAA520;
            margin-bottom: 15px;
            text-shadow: 0 0 30px rgba(218, 165, 32, 0.6);
            animation: emailPulse 2s ease-in-out infinite;
        }

        @keyframes emailPulse {
            0%, 100% { 
                transform: scale(1);
                text-shadow: 0 0 30px rgba(218, 165, 32, 0.6);
            }
            50% { 
                transform: scale(1.05);
                text-shadow: 0 0 40px rgba(218, 165, 32, 0.8);
            }
        }

        .subtitle {
            color: #ccc;
            font-size: 1.2em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .status-text {
            color: #aaa;
            font-size: 0.9em;
            font-style: italic;
        }

        .main-message {
            background: rgba(218, 165, 32, 0.1);
            border: 1px solid rgba(218, 165, 32, 0.2);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            color: #e6e6e6;
            font-size: 0.95em;
            line-height: 1.7;
            text-align: center;
            position: relative;
        }

        .main-message::before {
            content: '📧';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            padding: 8px 12px;
            border-radius: 50%;
            font-size: 1.3em;
        }

        .success-message {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid #22c55e;
            font-size: 0.9em;
            text-align: center;
            position: relative;
            animation: successSlideIn 0.5s ease-out;
        }

        .success-message::before {
            content: '✅';
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            padding: 6px 10px;
            border-radius: 50%;
            font-size: 1.2em;
        }

        @keyframes successSlideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
        }

        .resend-form {
            flex: 1;
        }

        .resend-btn {
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            color: #000;
            padding: 14px 25px;
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

        .resend-btn:hover {
            background: linear-gradient(135deg, #FFD700 0%, #DAA520 100%);
            transform: translateY(-2px);
            box-shadow: 
                0 8px 25px rgba(218, 165, 32, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .resend-btn:active {
            transform: translateY(0);
        }

        .resend-btn::before {
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

        .resend-btn:hover::before {
            left: 100%;
            width: 50px;
        }

        .logout-btn {
            background: none;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ccc;
            padding: 14px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9em;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            border-color: rgba(218, 165, 32, 0.5);
            color: #DAA520;
            background: rgba(218, 165, 32, 0.1);
            transform: translateY(-1px);
        }

        .logout-btn::before {
            content: '🚪';
            font-size: 1.1em;
        }

        /* Email animation elements */
        .email-trail {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 8px;
        }

        .email-dot {
            width: 6px;
            height: 6px;
            background: #DAA520;
            border-radius: 50%;
            animation: emailTrail 2s ease-in-out infinite;
        }

        .email-dot:nth-child(1) { animation-delay: 0s; }
        .email-dot:nth-child(2) { animation-delay: 0.2s; }
        .email-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes emailTrail {
            0%, 80%, 100% { 
                opacity: 0.3; 
                transform: translateY(0);
            }
            40% { 
                opacity: 1; 
                transform: translateY(-10px);
            }
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

        /* Loading states */
        .resend-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .resend-btn.loading::after {
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

        /* Progress indicator */
        .verification-progress {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .progress-step {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(218, 165, 32, 0.2);
            position: relative;
        }

        .progress-step.completed {
            background: #DAA520;
            box-shadow: 0 0 10px rgba(218, 165, 32, 0.5);
        }

        .progress-step.current {
            background: #DAA520;
            animation: currentStep 1.5s ease-in-out infinite;
        }

        @keyframes currentStep {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 0 10px rgba(218, 165, 32, 0.5);
            }
            50% { 
                transform: scale(1.3);
                box-shadow: 0 0 20px rgba(218, 165, 32, 0.8);
            }
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .verification-container {
                margin: 10px;
                padding: 25px 20px;
            }
            
            .logo h1 {
                font-size: 1.8em;
            }
            
            .email-icon {
                font-size: 3em;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .logout-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Entry animation */
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

        /* Email envelope animation */
        .envelope-animation {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 1.2em;
            color: rgba(218, 165, 32, 0.6);
            animation: envelopeFloat 3s ease-in-out infinite;
        }

        @keyframes envelopeFloat {
            0%, 100% { 
                transform: translateY(0) rotate(0deg);
                opacity: 0.6;
            }
            50% { 
                transform: translateY(-5px) rotate(2deg);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="envelope-animation">📬</div>
        <div class="email-trail">
            <div class="email-dot"></div>
            <div class="email-dot"></div>
            <div class="email-dot"></div>
        </div>

        <div class="logo">
            <h1>Capital</h1>
            <p>Metalcraft Solutions</p>
        </div>
        
        <div class="email-header">
            <div class="email-icon">📨</div>
            <div class="subtitle">Email Verification</div>
            <div class="status-text">Almost there...</div>
        </div>
        
        <div class="accent-line"></div>

        <div class="verification-progress">
            <div class="progress-step completed"></div>
            <div class="progress-step current"></div>
            <div class="progress-step"></div>
        </div>

        <div class="main-message">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="action-buttons">
            <form method="POST" action="{{ route('verification.send') }}" class="resend-form" id="resendForm">
                @csrf
                <button type="submit" class="resend-btn" id="resendBtn">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resendForm = document.getElementById('resendForm');
            const resendBtn = document.getElementById('resendBtn');
            let resendCooldown = false;

            // Handle resend form submission
            resendForm.addEventListener('submit', function(e) {
                if (resendCooldown) {
                    e.preventDefault();
                    return;
                }

                resendBtn.classList.add('loading');
                resendBtn.textContent = 'Sending...';
                resendCooldown = true;

                // Add cooldown to prevent spam
                setTimeout(() => {
                    if (resendBtn.classList.contains('loading')) {
                        resendBtn.classList.remove('loading');
                        resendBtn.textContent = 'Email Sent!';
                        
                        setTimeout(() => {
                            resendBtn.textContent = 'Resend Verification Email';
                            resendCooldown = false;
                        }, 3000);
                    }
                }, 2000);
            });

            // Check for successful email send
            if (document.querySelector('.success-message')) {
                // Update progress
                const progressSteps = document.querySelectorAll('.progress-step');
                progressSteps[1].classList.remove('current');
                progressSteps[1].classList.add('completed');
                progressSteps[2].classList.add('current');

                // Update status
                const statusText = document.querySelector('.status-text');
                statusText.textContent = 'Check your email!';
                statusText.style.color = '#22c55e';
            }

            // Auto-refresh to check verification status (optional)
            // Uncomment if you want to auto-check verification status
            /*
            setInterval(() => {
                fetch('/email/verify-status', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.verified) {
                        window.location.href = '/dashboard';
                    }
                })
                .catch(error => {
                    // Ignore errors in background check
                });
            }, 30000); // Check every 30 seconds
            */
        });
    </script>
</body>
</html>