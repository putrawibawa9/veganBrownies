<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    #invoice {
      max-width: 800px;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 20px;
      background: #fff;
    }

    #invoice h1 {
      text-align: center;
      color: #333;
    }

    .invoice-details {
      margin-bottom: 20px;
    }

    .invoice-details div {
      display: inline-block;
      width: 49%;
    }

    #customer {
      margin-top: 20px;
    }

    #customer th, #customer td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    #items {
      margin-top: 20px;
      width: 100%;
      border-collapse: collapse;
    }

    #items th, #items td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    #total {
      margin-top: 20px;
      text-align: right;
    }

    #thanks {
      margin-top: 20px;
      text-align: center;
      color: #333;
    }
  </style>
</head>
<body>

  <div id="invoice">
    <h1>Invoice</h1>

    <div class="invoice-details">
      <div>
        <strong>Invoice Number:</strong> INV-001
      </div>
      <div>
        <strong>Date:</strong> December 21, 2023
      </div>
    </div>

    <div id="customer">
      <h2>Customer Details</h2>
      <table>
        <tr>
          <th>Name</th>
          <td>John Doe</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>john@example.com</td>
        </tr>
        <tr>
          <th>Address</th>
          <td>123 Main St, Cityville</td>
        </tr>
      </table>
    </div>

    <div id="items">
      <h2>Invoice Items</h2>
      <table>
        <tr>
          <th>Description</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
        </tr>
        <tr>
          <td>Item 1</td>
          <td>2</td>
          <td>$50.00</td>
          <td>$100.00</td>
        </tr>
        <tr>
          <td>Item 2</td>
          <td>1</td>
          <td>$30.00</td>
          <td>$30.00</td>
        </tr>
      </table>
    </div>

    <div id="total">
      <p><strong>Total:</strong> $130.00</p>
    </div>

    <div id="thanks">
      <p>Thank you for your business!</p>
    </div>

  </div>

</body>
</html>
