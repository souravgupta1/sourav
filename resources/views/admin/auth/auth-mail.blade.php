<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="text-align: center;  background-color: #007BFF;">
                <h1 style="color: #fff;">Email Verification</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Hello {{ $name }},</p>
                <p>Thank you for registering with our website. To complete your registration, please click the following link:</p>
                <p><a href="{{ $verificationUrl }}" style="background-color: #007BFF; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Verify Your Email</a></p>
                <p>If you didn't create an account, you can safely ignore this email.</p>
                <p>Best regards,<br> Disha Website Team</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; background-color: #f4f4f4; padding: 10px 0;">
                &copy; {{ date('Y') }} Dish@vedvika.com
            </td>
        </tr>
    </table>
</body>
</html>
