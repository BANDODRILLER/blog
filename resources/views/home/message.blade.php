<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STK Push Query Response</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .centered-content {
            text-align: center;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        h2 {
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="centered-content">
    <h2>STK Push Query Response</h2>

    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Response Code</td>
            <td>{{ $response['ResponseCode'] }}</td>
        </tr>
        <tr>
            <td>Response Description</td>
            <td>{{ $response['ResponseDescription'] }}</td>
        </tr>
        <tr>
            <td>Merchant Request ID</td>
            <td>{{ $response['MerchantRequestID'] }}</td>
        </tr>
        <tr>
            <td>Checkout Request ID</td>
            <td>{{ $response['CheckoutRequestID'] }}</td>
        </tr>
        <tr>
            <td>Result Code</td>
            <td>{{ $response['ResultCode'] }}</td>
        </tr>
        <tr>
            <td>Result Description</td>
            <td>{{ $response['ResultDesc'] }}</td>
        </tr>
    </table>

    <h2> <a href="/mpesatransaction" class="btn btn-primary">Return Home</a></h2>
</div>

</body>

</html>
