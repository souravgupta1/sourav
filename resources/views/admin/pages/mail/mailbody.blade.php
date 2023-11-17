<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receip Mail</title>
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                {!! $body !!}
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
