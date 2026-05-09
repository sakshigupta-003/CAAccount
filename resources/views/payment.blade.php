<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Payment - </title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
            background: linear-gradient(135deg, #fff5e6 0%, #ffe8cc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Background decorative elements */
        .bg-ornament {
            position: absolute;
            opacity: 0.08;
            z-index: 0;
        }
        
        .bg-ornament-1 {
            top: 10%;
            left: 5%;
            font-size: 120px;
            color: #d4a017;
        }
        
        .bg-ornament-2 {
            bottom: 10%;
            right: 5%;
            font-size: 100px;
            color: #d4a017;
            transform: rotate(45deg);
        }
        
        /* Main Payment Card */
        .payment-container {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 596px;
            border-radius: 24px;
            padding: 39px 24px;
            box-shadow: 0 20px 50px rgba(212, 160, 23, 0.15), 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(212, 160, 23, 0.2);
            position: relative;
            z-index: 1;
            overflow: hidden;
        }
        
        .payment-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #d4a017, #ffcc00, #ff9900, #d4a017);
            background-size: 300% 100%;
            animation: shimmer 3s infinite linear;
        }
        
        /* Header Section */
        .payment-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .payment-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #d4a017, #ffcc00);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(212, 160, 23, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .payment-icon::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 2.5s ease-in-out infinite;
            transform: rotate(45deg);
        }
        
        .payment-icon i {
            font-size: 36px;
            color: white;
            z-index: 1;
        }
        
        .payment-title {
            font-size: 28px;
            font-weight: 700;
            color: #5a4a1f;
            margin-bottom: 8px;
            position: relative;
            display: inline-block;
        }
        
        .payment-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #d4a017, #ffcc00);
            border-radius: 3px;
        }
        
        .payment-subtitle {
            font-size: 16px;
            color: #8a7a4a;
            margin-top: 15px;
        }
        
     
        .bristol-details {
            background: linear-gradient(135deg, #fff9e6 0%, #fff0cc 100%);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(212, 160, 23, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .bristol-details::before {
            content: '';
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 40px;
            color: rgba(212, 160, 23, 0.1);
            font-family: 'Segoe UI', sans-serif;
        }
        
        .bristol-name {
            font-size: 22px;
            font-weight: 600;
            color: #5a4a1f;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .bristol-name i {
            color: #d4a017;
        }
        
        .bristol-amount {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px dashed rgba(212, 160, 23, 0.3);
        }
        
        .amount-label {
            font-size: 16px;
            color: #8a7a4a;
        }
        
        .amount-value {
            font-size: 32px;
            font-weight: 700;
            color: #d4a017;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        /* Payment Button */
        .btn-pay {
            width: 100%;
            background: linear-gradient(135deg, #d4a017 0%, #ff9900 100%);
            color: white;
            border: none;
            padding: 20px;
            font-size: 18px;
            font-weight: 700;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            box-shadow: 0 10px 25px rgba(212, 160, 23, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            letter-spacing: 0.5px;
        }
        
        .btn-pay:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(212, 160, 23, 0.5);
            letter-spacing: 1px;
        }
        
        .btn-pay:active {
            transform: translateY(-2px);
        }
        
        .btn-pay::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }
        
        .btn-pay:hover::before {
            left: 100%;
        }
        
        /* Security Note */
        .security-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
            padding: 15px;
            background: rgba(212, 160, 23, 0.05);
            border-radius: 12px;
            font-size: 14px;
            color: #8a7a4a;
        }
        
        .security-note i {
            color: #28a745;
            font-size: 16px;
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
        
        /* Responsive */
        @media (max-width: 576px) {
            .payment-container {
                padding: 30px 25px;
            }
            
            .payment-title {
                font-size: 24px;
            }
            
            .bristol-details {
                padding: 20px;
            }
            
            .amount-value {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="bg-ornament bg-ornament-1"></div>
    <div class="bg-ornament bg-ornament-2">🪔</div>
    
    <div class="payment-container">
        <div class="payment-header">
            <div class="payment-icon">
                <i class="fas fa-lock"></i>
            </div>
            <h1 class="payment-title">Secure Payment</h1>
            <p class="payment-subtitle">Complete your Bristolbooking with secure payment</p>
        </div>
        
        <div class="bristol-details">
            <h2 class="bristol-name">
                <i class="fas fa-hands-praying"></i> {{ $bristol_name }}
            </h2>
            <p style="color: #8a7a4a; line-height: 1.6; margin-top: 10px;">
                You are about to book this sacred Bristolceremony. Upon successful payment, our team will contact you to schedule the auspicious timing.
            </p>
            
            <div class="bristol-amount">
                <span class="amount-label">Total Amount:</span>
                <span class="amount-value">{{ $amount_display }}</span>
            </div>
        </div>
        
        <button class="btn-pay" id="rzp-button">
            <i class="fas fa-lock"></i> Pay Securely
        </button>
        
        <div class="security-note">
            <i class="fas fa-shield-alt"></i>
            <span>Your payment is secured with 256-bit SSL encryption</span>
        </div>
    </div>

    <script>
    document.getElementById('rzp-button').onclick = function() {
        var options = {
            "key": "{{ $key }}",
            "amount": "{{ $amount }}", 
            "currency": "INR",
            "name": "Divine BristolBooking",
            "description": "{{ $bristol_name }}",
            "order_id": "{{ $order_id }}",
            // **CRITICAL FIX 6: Add retry options**
            "retry": {
                "enabled": true,
                "max_count": 4
            },
            "handler": function(response) {
                // Create form for POST
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('handle.payment') }}";
                
                // CSRF token
                var csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = "{{ csrf_token() }}";
                form.appendChild(csrfToken);
                
                // Payment details
                var fields = {
                    'razorpay_order_id': response.razorpay_order_id,
                    'razorpay_payment_id': response.razorpay_payment_id,
                    'razorpay_signature': response.razorpay_signature
                };
                
                for (var key in fields) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = fields[key];
                    form.appendChild(input);
                }
                
                document.body.appendChild(form);
                form.submit();
            },
            // **CRITICAL FIX 7: Proper prefill (important for UPI)**
            "prefill": {
                "name": "{{ auth()->user()->name ?? 'Customer' }}",
                "email": "{{ $user_email ?? 'customer@example.com' }}", // Use passed variable
                "contact": "{{ $user_phone ?? '9999999999' }}" // Use passed variable
            },
            "notes": {
                "bristol": "{{ $Bristol}}",
                "booking_type": "bristol_booking"
            },
            "theme": {
                "color": "#d4a017"
            },
            "modal": {
                "ondismiss": function() {
                    console.log('Payment modal closed');
                }
            }
        };
        
        var rzp1 = new Razorpay(options);
        rzp1.open();
        rzp1.on('payment.failed', function(response) {
            console.error('Payment failed:', response.error);
            // You can redirect to failure page
            window.location.href = "/payment-failed?error=" + 
                                  encodeURIComponent(response.error.description);
        });
    };
</script>
</body>
</html>