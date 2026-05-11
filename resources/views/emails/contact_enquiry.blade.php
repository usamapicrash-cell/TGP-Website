<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #34497e;
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .content {
            padding: 30px;
        }
        .content p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            color: #34497e;
            width: 30%;
        }
        .value {
            color: #555;
        }
        .message-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #34497e;
            margin-top: 10px;
            font-style: italic;
        }
        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Enquiry</h2>
        </div>

        <div class="content">
            <p>Hello <strong>Admin</strong>,</p>
            <p>You have received a new lead from <strong>The Glass People</strong> website. Details are provided below:</p>

            <table class="info-table">
                <tr>
                    <td class="label">Service</td>
                    <td class="value">{{ $details['service_type'] }}</td>
                </tr>
                <tr>
                    <td class="label">Full Name</td>
                    <td class="value">{{ $details['first_name'] }} {{ $details['last_name'] }}</td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td class="value"><a href="mailto:{{ $details['email'] }}" style="color: #34497e;">{{ $details['email'] }}</a></td>
                </tr>
                <tr>
                    <td class="label">Phone</td>
                    <td class="value">{{ $details['phone'] }}</td>
                </tr>
                <tr>
                    <td class="label">Zip Code</td>
                    <td class="value">{{ $details['zip_code'] }}</td>
                </tr>
            </table>

            <p><strong>Customer Message:</strong></p>
            <div class="message-box">
                {{ $details['message'] }}
            </div>
        </div>

        <div class="footer">
            <p>This is an automated notification from your website's CMS.<br>
            &copy; {{ date('Y') }} The Glass People. All rights reserved.</p>
        </div>
    </div>
</body>
</html>