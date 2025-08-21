<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital - Security Verification</title>
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

        .confirm-container {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(218, 165, 32, 0.4);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.6),
                0 0 100px rgba(218, 165, 32, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
            margin: 20px;
            animation: secureEntry 0.6s ease-out;
        }

        .confirm-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(218, 165, 32, 0.08) 0%, transparent 50%);
            border-radius: 15px;
            pointer-events: none;
        }

        /* Security border animation */
        .confirm-container::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #DAA520, transparent, #DAA520, transparent, #DAA520);
            border-radius: 15px;
            z-index: -1;
            opacity: 0.6;
            animation: securityPulse 2s ease-in-out infinite;
        }

        @keyframes securityPulse {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo h1 {
            color: #DAA520;
            font-size: 2em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
        }

        .logo p {
            color: #888;
            font-size: 0.85em;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .security-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .security-icon {
            font-size: 3em;
            color: #DAA520;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(218, 165, 32, 0.5);
            animation: securityGlow 2s ease-in-out infinite alternate;
        }

        @keyframes securityGlow {
            0% { text-shadow: 0 0 20px rgba(218, 165, 32, 0.5); }
            100% { text-shadow: 0 0 30px rgba(218, 165, 32, 0.8); }
        }

        .subtitle {
            color: #ccc;
            font-size: 1.1em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .security-notice {
            background: rgba(218, 165, 32, 0.1);
            border: 1px solid rgba(218, 165, 32, 0.3);
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 25px;
            color: #e6e6e6;
            font-size: 0.9em;
            line-height: 1.6;
            text-align: center;
            position: relative;
        }

        .security-notice::before {
            content: '⚠️';
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.9);
            padding: 6px 10px;
            border-radius: 50%;
            font-size: 1.1em;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #DAA520;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .password-field {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 16px 50px 16px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(218, 165, 32, 0.4);
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
        }

        .form-input:focus {
            outline: none;
            border-color: #DAA520;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 0 25px rgba(218, 165, 32, 0.3),
                inset 0 2px 5px rgba(0, 0, 0, 0.3);
            transform: scale(1.02);
        }

        .form-input::placeholder {
            color: #999;
            font-style: italic;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(218, 165, 32, 0.2);
            border: 1px solid rgba(218, 165, 32, 0.4);
            color: #DAA520;
            cursor: pointer;
            font-size: 1.1em;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            background: rgba(218, 165, 32, 0.3);
            color: #FFD700;
            transform: translateY(-50%) scale(1.1);
        }

        .confirm-btn {
            background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
            color: #000;
            padding: 16px 40px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 
                0 6px 20px rgba(218, 165, 32, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .confirm-btn:hover {
            background: linear-gradient(135deg, #FFD700 0%, #DAA520 100%);
            transform: translateY(-3px);
            box-shadow: 
                0 10px 30px rgba(218, 165, 32, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .confirm-btn:active {
            transform: translateY(-1px);
        }

        .confirm-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -100%;
            transform: translateY(-50%);
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.6s ease;
        }

        .confirm-btn:hover::before {
            left: 100%;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.85em;
            margin-top: 10px;
            background: rgba(255, 107, 107, 0.1);
            padding: 12px 15px;
            border-radius: 8px;
            border-left: 4px solid #ff6b6b;
            animation: errorShake 0.5s ease-in-out;
        }

        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Security indicators */
        .security-indicators {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .security-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(218, 165, 32, 0.3);
            animation: securityBlink 1.5s ease-in-out infinite;
        }

        .security-dot:nth-child(2) { animation-delay: 0.3s; }
        .security-dot:nth-child(3) { animation-delay: 0.6s; }

        @keyframes securityBlink {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; background: #DAA520; }
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
            width: 10px;
            height: 10px;
            background: #DAA520;
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(218, 165, 32, 0.6);
        }

        /* Loading state */
        .confirm-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .confirm-btn.loading::after {
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

        /* Responsive design */
        @media (max-width: 480px) {
            .confirm-container {
                margin: 10px;
                padding: 30px 20px;
            }
            
            .logo h1 {
                font-size: 1.7em;
            }
            
            .security-icon {
                font-size: 2.5em;
            }
        }

        /* Entry animation */
        @keyframes secureEntry {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.9);
            }
            50% {
                opacity: 0.8;
                transform: translateY(-10px) scale(1.02);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Typing indicator */
        .typing-indicator {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: #DAA520;
            border-radius: 2px;
            opacity: 0;
            animation: typingBlink 1s ease-in-out infinite;
        }

        .form-input:focus + .password-toggle + .typing-indicator {
            opacity: 1;
        }

        @keyframes typingBlink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="confirm-container">
        <div class="logo">
            <h1>Capital</h1>
            <p>Metalcraft Solutions</p>
        </div>
        
        <div class="security-header">
            <div class="security-icon">🔐</div>
            <div class="subtitle">Security Verification</div>
        </div>
        
        <div class="accent-line"></div>

        <div class="security-indicators">
            <div class="security-dot"></div>
            <div class="security-dot"></div>
            <div class="security-dot"></div>
        </div>

        <div class="security-notice">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" id="confirmForm">
            @csrf

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Current Password') }}</label>
                <div class="password-field">
                    <input 
                        id="password" 
                        class="form-input"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="Enter your current password"
                        autofocus
                    />
                    <button type="button" class="password-toggle" id="togglePassword">👁️</button>
                    <div class="typing-indicator"></div>
                </div>
                @if ($errors->get('password'))
                    <div class="error-message">
                        @foreach ($errors->get('password') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="confirm-btn" id="submitBtn">
                {{ __('Confirm Identity') }}
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('confirmForm');

            // Password visibility toggle
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                this.textContent = type === 'password' ? '👁️' : '🙈';
                
                // Add visual feedback
                this.style.transform = 'translateY(-50%) scale(1.2)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-50%) scale(1)';
                }, 150);
            });

            // Enhanced enter key handling
            passwordInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (this.value.trim() !== '') {
                        form.submit();
                    } else {
                        this.classList.add('invalid');
                        this.focus();
                        setTimeout(() => {
                            this.classList.remove('invalid');
                        }, 500);
                    }
                }
            });

            // Input validation feedback
            passwordInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.classList.remove('invalid');
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            });

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                const password = passwordInput.value.trim();
                
                if (!password) {
                    e.preventDefault();
                    passwordInput.classList.add('invalid');
                    passwordInput.focus();
                    return;
                }
                
                submitBtn.classList.add('loading');
                submitBtn.textContent = 'Verifying...';
                submitBtn.disabled = true;
                
                // Add slight delay for better UX
                setTimeout(() => {
                    // Form will submit naturally
                }, 100);
            });

            // Auto-focus and initial state
            passwordInput.focus();
            
            // Security enhancement: Clear clipboard on focus
            passwordInput.addEventListener('focus', function() {
                // Clear any sensitive data from clipboard
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText('').catch(() => {
                        // Ignore clipboard errors
                    });
                }
            });

            // Prevent password field inspection
            passwordInput.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });

            // Additional security: prevent copy
            passwordInput.addEventListener('copy', function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>
</html>