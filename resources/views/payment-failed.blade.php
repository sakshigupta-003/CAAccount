<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed - Divine Bristol Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png"
        href="{{ settings('favicon') ? asset('storage/' . settings('favicon')) : asset('assets-front/img-main.png') }}">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #ffe6e6 0%, #ffcccc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            position: relative;
            overflow: hidden;
            height: 100vh;
            max-height: 500px;
        }
        
        /* Background decorative elements */
        .failed-ornament {
            position: absolute;
            opacity: 0.06;
            z-index: 0;
            font-size: 70px;
            color: #dc3545;
        }
        
        .failed-ornament-1 { top: 5%; left: 3%; }
        .failed-ornament-2 { bottom: 5%; right: 3%; transform: rotate(45deg); }
        
        /* Main Failed Card */
        .failed-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 580px;
            max-height: 540px;
            border-radius: 20px;
            padding: 20px 25px;
            box-shadow: 0 20px 50px rgba(220, 53, 69, 0.2),
                        0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(220, 53, 69, 0.2);
            position: relative;
            z-index: 1;
            overflow: hidden;
            text-align: center;
            display: flex;
            flex-direction: column;
        }
        
        .failed-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #dc3545, #e74c3c, #ff6b6b, #dc3545);
            background-size: 300% 100%;
            animation: shimmer 3s infinite linear;
        }
        
        /* Failed Icon */
        .failed-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #dc3545, #e74c3c);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 10px 20px rgba(220, 53, 69, 0.3);
            position: relative;
            overflow: hidden;
            animation: shake 0.8s ease 0.5s;
            flex-shrink: 0;
        }
        
        .failed-icon::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 3s ease-in-out infinite;
            transform: rotate(45deg);
        }
        
        .failed-icon i {
            font-size: 35px;
            color: white;
            z-index: 1;
        }
        
        /* Failed Content */
        .failed-title {
            font-size: 26px;
            font-weight: 800;
            color: #c82333;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #dc3545, #e74c3c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            flex-shrink: 0;
        }
        
        .failed-message {
            font-size: 14px;
            color: #a71d2a;
            line-height: 1.4;
            margin-bottom: 15px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            flex-shrink: 0;
        }
        
        
        .error-details::-webkit-scrollbar {
            width: 4px;
        }
        
        .error-details::-webkit-scrollbar-track {
            background: rgba(220, 53, 69, 0.1);
            border-radius: 10px;
        }
        
        .error-details::-webkit-scrollbar-thumb {
            background: #dc3545;
            border-radius: 10px;
        }
        
        .error-details::before {
            content: '!';
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 35px;
            color: rgba(220, 53, 69, 0.08);
            font-weight: bold;
        }
        
        .error-title {
            font-size: 16px;
            font-weight: 600;
            color: #c82333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .error-title i {
            color: #dc3545;
        }
        
        .error-list {
            list-style: none;
            padding-left: 0;
        }
        
        .error-list li {
            padding: 6px 0;
            border-bottom: 1px dashed rgba(220, 53, 69, 0.2);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }
        
        .error-list li:last-child {
            border-bottom: none;
        }
        
        .error-list i {
            color: #dc3545;
            flex-shrink: 0;
            font-size: 14px;
        }
        
        /* Action Buttons - Compact */
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 15px 0;
            flex-wrap: wrap;
            flex-shrink: 0;
        }
        
        .btn-action {
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 700;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 140px;
            text-decoration: none;
            border: none;
        }
        
        .btn-retry {
            background: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%);
            color: white;
            box-shadow: 0 6px 15px rgba(220, 53, 69, 0.3);
        }
        
        .btn-home {
            background: linear-gradient(135deg, #6c757d 0%, #868e96 100%);
            color: white;
            box-shadow: 0 6px 15px rgba(108, 117, 125, 0.3);
        }
        
        .btn-support {
            background: linear-gradient(135deg, #ff9900 0%, #ffcc00 100%);
            color: white;
            box-shadow: 0 6px 15px rgba(255, 153, 0, 0.3);
        }
        
        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-action:active {
            transform: translateY(-1px);
        }
        
        /* Troubleshooting Tips - Compact */
        .troubleshooting {
            margin: 15px 0;
            padding-top: 12px;
            border-top: 1px solid rgba(220, 53, 69, 0.2);
            flex-shrink: 0;
        }
        
        .troubleshooting-title {
            font-size: 16px;
            font-weight: 600;
            color: #c82333;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .tips-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 0 auto;
        }
        
        .tip-item {
            background: rgba(220, 53, 69, 0.05);
            border-radius: 10px;
            padding: 12px;
            text-align: left;
        }
        
        .tip-icon {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #dc3545, #e74c3c);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-bottom: 8px;
            font-size: 16px;
        }
        
        .tip-title {
            font-weight: 600;
            color: #c82333;
            margin-bottom: 4px;
            font-size: 13px;
        }
        
        .tip-text {
            color: #a71d2a;
            font-size: 11px;
            line-height: 1.4;
        }
        
        /* Contact Support - Compact */
        .support-section {
            margin-top: 15px;
            padding: 15px;
            background: linear-gradient(135deg, #fff5e6 0%, #ffe8cc 100%);
            border-radius: 12px;
            border: 1px solid rgba(255, 153, 0, 0.2);
            flex-shrink: 0;
        }
        
        .support-title {
            font-size: 16px;
            font-weight: 600;
            color: #d4a017;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .support-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }
        
        .support-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #8a7a4a;
            font-size: 12px;
        }
        
        .support-item i {
            color: #d4a017;
            font-size: 14px;
        }
        
        /* Support Modal */
        .support-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 10000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background: white;
            padding: 25px;
            border-radius: 16px;
            max-width: 400px;
            width: 90%;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .modal-close {
            position: absolute;
            top: 12px;
            right: 15px;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #dc3545;
            font-weight: bold;
        }
        
        .modal-title {
            color: #d4a017;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .modal-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 15px;
        }
        
        /* Animation Keyframes */
        @keyframes shimmer {
            0% { background-position: -300% 0; }
            100% { background-position: 300% 0; }
        }
        
        @keyframes shine {
            0% { transform: translateX(-150%) rotate(45deg); }
            100% { transform: translateX(150%) rotate(45deg); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-3px); }
            20%, 40%, 60%, 80% { transform: translateX(3px); }
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            body {
                padding: 5px;
            }
            
            .failed-container {
                padding: 15px 18px;
                max-height: 460px;
            }
            
            .failed-title {
                font-size: 22px;
            }
            
            .failed-message {
                font-size: 13px;
            }
            
            .action-buttons {
                flex-direction: row;
                flex-wrap: wrap;
            }
            
            .btn-action {
                min-width: 120px;
                padding: 8px 15px;
            }
            
            .tips-list {
                grid-template-columns: 1fr;
            }
            
            .support-info {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
        }
        
        @media (max-width: 400px) {
            .tips-list {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-action {
                width: 100%;
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="failed-ornament failed-ornament-1">⚠</div>
    <div class="failed-ornament failed-ornament-2">✕</div>
    
    <div class="failed-container">
        <div class="failed-icon">
            <i class="fas fa-times"></i>
        </div>
        
        <h1 class="failed-title">Payment Failed</h1>
        
        <p class="failed-message">
            We couldn't process your payment. Please try again or use a different payment method.
        </p>
        
        <div class="error-details">
            <h3 class="error-title">
                <i class="fas fa-exclamation-triangle"></i> Error Details
            </h3>
            
            <ul class="error-list">
                <li>
                    <i class="fas fa-info-circle"></i>
                    <span>Payment authorization failed</span>
                </li>
                <li>
                    <i class="fas fa-clock"></i>
                    <span>Time: {{ date('d M Y, h:i A') }}</span>
                </li>
                <li>
                    <i class="fas fa-lightbulb"></i>
                    <span>Your bristol booking is pending until payment is completed</span>
                </li>
            </ul>
        </div>
        
        <div class="action-buttons">
           <a href="{{ url()->previous() }}" class="btn-action btn-retry">
                <i class="fas fa-redo"></i> Try Again
            </a>

            <a href="{{ url('/') }}" class="btn-action btn-home">
                <i class="fas fa-home"></i> Return Home
            </a>
            <button class="btn-action btn-support" onclick="openSupportModal()">
                <i class="fas fa-headset"></i> Get Help
            </button>
        </div>
        
        
        <div class="support-section">
            <h3 class="support-title">
                <i class="fas fa-headset"></i> Need Help?
            </h3>
            
            <div class="support-info">
                <div class="support-item">
                    <i class="fas fa-phone-alt"></i>
                    <span>+91 98765 43210</span>
                </div>
                <div class="support-item">
                    <i class="fas fa-envelope"></i>
                    <span>support@.com</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Support Modal -->
    <div id="supportModal" class="support-modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeSupportModal()">×</button>
            <h3 class="modal-title">Contact Support</h3>
            <p style="color: #555; font-size: 14px; margin-bottom: 15px;">
                Our team will help you resolve the payment issue immediately.
            </p>
            
            <div class="modal-info">
                <div>
                    <strong style="color: #d4a017;">Call:</strong> +91 98765 43210
                </div>
                <div>
                    <strong style="color: #d4a017;">WhatsApp:</strong> +91 98765 43210
                </div>
                <div>
                    <strong style="color: #d4a017;">Email:</strong> support@bristolbooking.com
                </div>
            </div>
        </div>
    </div>

    <script>
        // Disable body scrolling
        document.body.style.overflow = 'hidden';
        
        function openSupportModal() {
            document.getElementById('supportModal').style.display = 'flex';
        }
        
        function closeSupportModal() {
            document.getElementById('supportModal').style.display = 'none';
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            // Close modal when clicking outside
            window.onclick = function(event) {
                const modal = document.getElementById('supportModal');
                if (event.target == modal) {
                    closeSupportModal();
                }
            }
            
            // Auto close modal with escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSupportModal();
                }
            });
            
            // Ensure content fits within container
            const container = document.querySelector('.failed-container');
            const totalHeight = container.scrollHeight;
            
            if (totalHeight > 480) {
                // Adjust font sizes if needed
                const title = document.querySelector('.failed-title');
                const message = document.querySelector('.failed-message');
                
                if (totalHeight > 500) {
                    title.style.fontSize = '24px';
                    message.style.fontSize = '13px';
                }
            }
        });
    </script>
</body>
</html>