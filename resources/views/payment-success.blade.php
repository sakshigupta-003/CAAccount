<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Divine Bristol Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png"
          href="{{ settings('favicon') ? asset('storage/' . settings('favicon')) : asset('assets-front/img-main.png') }}">

    <style>
        /* Your complete original CSS remains unchanged */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #e6ffe6 0%, #ccffcc 100%);
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
        
        .success-ornament {
            position: absolute;
            opacity: 0.06;
            z-index: 0;
            font-size: 70px;
            color: #28a745;
        }
        
        .success-ornament-1 { top: 5%; left: 3%; }
        .success-ornament-2 { bottom: 5%; right: 3%; transform: rotate(45deg); }
        .success-ornament-3 { top: 10%; right: 5%; }
        .success-ornament-4 { bottom: 10%; left: 5%; transform: rotate(-30deg); }
        
        .success-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 580px;
            border-radius: 20px;
            padding: 20px 25px;
            box-shadow: 0 20px 50px rgba(40, 167, 69, 0.25), 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(40, 167, 69, 0.2);
            position: relative;
            z-index: 1;
            overflow: hidden;
            text-align: center;
            display: flex;
            flex-direction: column;
        }
        
        .success-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #28a745, #34ce57, #5cd65c, #28a745);
            background-size: 300% 100%;
            animation: shimmer 3s infinite linear;
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #28a745, #5cd65c);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
            position: relative;
            overflow: hidden;
            animation: iconFloat 3s ease-in-out infinite;
            flex-shrink: 0;
        }
        
        .success-icon::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shine 3s ease-in-out infinite;
            transform: rotate(45deg);
        }
        
        .success-icon i {
            font-size: 35px;
            color: white;
            z-index: 1;
        }
        
        .success-title {
            font-size: 26px;
            font-weight: 800;
            color: #1e7e34;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #28a745, #5cd65c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            flex-shrink: 0;
        }
        
        .success-message {
            font-size: 14px;
            color: #2d8b47;
            line-height: 1.4;
            margin-bottom: 15px;
            max-width: 100%;
            margin-left: auto;
            margin-right: auto;
            flex-shrink: 0;
        }
        
        .bristol-success-details {
            background: linear-gradient(135deg, #f0fff4 0%, #e6ffee 100%);
            border-radius: 12px;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid rgba(40, 167, 69, 0.2);
            text-align: left;
            position: relative;
            flex: 1;
        }
        
        .bristol-success-details::-webkit-scrollbar {
            width: 4px;
        }
        
        .bristol-success-details::-webkit-scrollbar-track {
            background: rgba(40, 167, 69, 0.1);
            border-radius: 10px;
        }
        
        .bristol-success-details::-webkit-scrollbar-thumb {
            background: #28a745;
            border-radius: 10px;
        }
        
        .bristol-success-details::before {
            content: '✓';
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 35px;
            color: rgba(40, 167, 69, 0.08);
            font-weight: bold;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed rgba(40, 167, 69, 0.2);
            font-size: 13px;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #2d8b47;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
        }
        
        .detail-label i {
            color: #28a745;
            font-size: 14px;
        }
        
        .detail-value {
            font-weight: 600;
            color: #1e7e34;
            font-size: 13px;
        }
        
        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 15px;
            flex-wrap: wrap;
            flex-shrink: 0;
        }
        
        .btn-action {
            padding: 10px 20px;
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
        
        .btn-home {
            background: linear-gradient(135deg, #28a745 0%, #5cd65c 100%);
            color: white;
            box-shadow: 0 6px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-print {
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
        
        .next-steps {
            margin-top: 15px;
            padding-top: 12px;
            border-top: 1px solid rgba(40, 167, 69, 0.2);
            flex-shrink: 0;
        }
        
        .next-steps-title {
            font-size: 16px;
            font-weight: 600;
            color: #1e7e34;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .steps-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin: 0 auto;
        }
        
        .step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 8px 10px;
            background: rgba(40, 167, 69, 0.05);
            border-radius: 8px;
            text-align: center;
        }
        
        .step-icon {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #28a745, #5cd65c);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            flex-shrink: 0;
        }
        
        .step-text {
            color: #2d8b47;
            font-size: 11px;
            line-height: 1.3;
        }
        
        @keyframes shimmer {
            0% { background-position: -300% 0; }
            100% { background-position: 300% 0; }
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes shine {
            0% { transform: translateX(-150%) rotate(45deg); }
            100% { transform: translateX(150%) rotate(45deg); }
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #28a745;
            border-radius: 20%;
            opacity: 0;
            z-index: 0;
        }
        
        @media (max-width: 576px) {
            body { padding: 5px; }
            .success-container { padding: 15px 18px; max-height: 460px; }
            .success-title { font-size: 22px; }
            .success-message { font-size: 13px; }
            .steps-list { grid-template-columns: 1fr; grid-template-rows: repeat(3, auto); gap: 6px; }
            .step-item { flex-direction: row; text-align: left; padding: 6px 10px; }
            .step-text { font-size: 12px; }
            .action-buttons { flex-direction: row; }
            .btn-action { min-width: 120px; padding: 8px 15px; }
        }
        
        @media (max-width: 400px) {
            .steps-list { grid-template-columns: 1fr; }
            .action-buttons { flex-direction: column; align-items: center; }
            .btn-action { width: 100%; max-width: 200px; }
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="success-ornament success-ornament-1">✓</div>
    <div class="success-ornament success-ornament-2">🪔</div>
    <div class="success-ornament success-ornament-3"></div>
    <div class="success-ornament success-ornament-4">🌸</div>
    
    <!-- Confetti elements -->
    <div id="confetti-container"></div>
    
    <div class="success-container">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        
        <h1 class="success-title">Payment Successful!</h1>
        
        <p class="success-message">
            Thank you for your payment! Your <strong>{{ session('successData.bristol_name', 'bristol') }}</strong> has been successfully booked. 
            Our team will contact you within 24 hours.
        </p>
        
        <div class="bristol-success-details">
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-check-circle"></i> Status
                </span>
                <span class="detail-value" style="color: #28a745;">
                    {{ session('successData.status', 'Confirmed') }}
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-receipt"></i> Payment ID
                </span>
                <span class="detail-value">
                    {{ session('successData.payment_id', '—') }}
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-rupee-sign"></i> Amount
                </span>
                <span class="detail-value">
                    {{ session('successData.amount_display', '₹0') }}
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-calendar-check"></i> Booking Reference Date
                </span>
                <span class="detail-value">
                    {{-- {{ session('successData.booking_date', 'Will be confirmed soon') }} --}}
                     {{ now()->format('d M Y, h:i A') }}
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-user-check"></i> Next Steps
                </span>
                <span class="detail-value" style="color: #ff9900;">
                    Team will contact you
                </span>
            </div>
        </div>
        
        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn-action btn-home">
                <i class="fas fa-home"></i> Return Home
            </a>
            <button class="btn-action btn-print" onclick="window.print()">
                <i class="fas fa-print"></i> Print Receipt
            </button>
        </div>
    </div>

    <script>
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            const colors = ['#28a745', '#34ce57', '#5cd65c', '#8aff8a', '#c1ffc1'];
            
            for(let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.width = Math.random() * 12 + 4 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.animation = `confettiFall ${Math.random() * 2 + 1.5}s ease-in-out ${Math.random() * 0.5}s forwards`;
                confetti.style.position = 'fixed';
                confetti.style.top = '-30px';
                confetti.style.zIndex = '0';
                
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes confettiFall {
                        0% { transform: translateY(-30px) rotate(0deg); opacity: 1; }
                        100% { transform: translateY(400px) rotate(360deg); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
                
                container.appendChild(confetti);
                
                setTimeout(() => {
                    if(confetti.parentNode) confetti.remove();
                }, 3000);
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            createConfetti();
            document.body.style.overflow = 'hidden';
            
            const container = document.querySelector('.success-container');
            const totalHeight = container.scrollHeight;
            
            if (totalHeight > 480) {
                const title = document.querySelector('.success-title');
                const message = document.querySelector('.success-message');
                
                if (totalHeight > 500) {
                    title.style.fontSize = '24px';
                    message.style.fontSize = '13px';
                }
            }
        });
        
        // Auto redirect after 30 seconds
        setTimeout(function() {
            window.location.href = "{{ url('/') }}";
        }, 80000);
    </script>
</body>
</html>