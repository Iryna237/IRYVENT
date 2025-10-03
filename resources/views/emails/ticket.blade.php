<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Ticket - {{ $event->title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .ticket-container {
            border: 2px solid #4f46e5;
            border-radius: 15px;
            overflow: hidden;
            margin: 20px 0;
        }
        .ticket-header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .ticket-body {
            padding: 30px;
            background: white;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .qr-image {
            max-width: 150px;
            height: auto;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }
        .ticket-details {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .fallback-text {
            background: #f1f5f9;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            font-family: monospace;
            word-break: break-all;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
            .ticket-body {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket-header">
            <h1 style="margin: 0; font-size: 24px;">{{ $event->title }}</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">Your E-Ticket</p>
        </div>
        
        <div class="ticket-body">
            <div class="qr-code">
                <!-- Méthode 1: Data URI -->
                @if(isset($qrCode) && !empty($qrCode))
                    <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" class="qr-image">
                @else
                    <div style="background: #f8fafc; padding: 20px; border-radius: 8px;">
                        <p style="margin: 0; color: #666;">QR Code not available</p>
                    </div>
                @endif
                
                <p style="margin: 10px 0; font-size: 14px; color: #666;">
                    <small>Scan this QR code at the entrance</small>
                </p>
                
                <!-- Lien de secours -->
                <p style="margin: 5px 0; font-size: 12px; color: #888;">
                    <small>
                        QR not showing? 
                        <span style="color: #4f46e5; font-family: monospace;">{{ $commande->reference }}</span>
                    </small>
                </p>
            </div>

            <div class="ticket-details">
                <div class="detail-row">
                    <strong>Ticket Type:</strong>
                    <span>{{ ucfirst($commande->ticket_type) }}</span>
                </div>
                <div class="detail-row">
                    <strong>Order Reference:</strong>
                    <span style="font-family: monospace;">{{ $commande->reference }}</span>
                </div>
                <div class="detail-row">
                    <strong>Event Date:</strong>
                    <span>{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y') }}</span>
                </div>
                <div class="detail-row">
                    <strong>Time:</strong>
                    <span>{{ \Carbon\Carbon::parse($event->start_date)->format('g:i A') }}</span>
                </div>
                <div class="detail-row">
                    <strong>Location:</strong>
                    <span>{{ $event->location }}</span>
                </div>
                <div class="detail-row">
                    <strong>Amount Paid:</strong>
                    <span>{{ number_format($commande->amount, 0, ',', ' ') }} XAF</span>
                </div>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <p style="font-weight: bold; margin-bottom: 15px;">Important Information:</p>
                <ul style="text-align: left; display: inline-block; margin: 0; padding-left: 20px;">
                    <li>Please present this ticket at the entrance</li>
                    <li>QR code must be scanned for entry</li>
                    <li>Keep this email for your records</li>
                    <li>For questions, contact event organizer</li>
                </ul>
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 30px; color: #64748b;">
        <p>Thank you for your purchase!</p>
        <p><small>This is an automated email. Please do not reply.</small></p>
    </div>
</body>
</html>