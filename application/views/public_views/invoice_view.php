<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style type="text/css">

    ::selection{ background-color: #E13300; color: white; }
    ::moz-selection{ background-color: #E13300; color: white; }
    ::webkit-selection{ background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1{
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    h2, h3, h4{
        margin: 0 0 14px 0;
        padding: 10px 15px 0 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 18px;
        font-weight: bold;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #header{
        text-align: center;
    }

    #item{
        text-align: left;
        padding-left: 30px;
    }

    #price{
        text-align: right;
        padding-right: 30px;
    }

    #total{
        text-align: right;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
        font-size: 15px;
        font-weight: bold;
    }


    #body{
        margin: 0 15px 0 15px;
    }
    
    p.footer{
        text-align: center;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }
    
    #container{
        margin: 20px;
        border: 1px solid #D0D0D0;
        -webkit-box-shadow: 0 0 8px #D0D0D0;
    }

    #secondhead{
        text-align: right;
    }
    </style>
</head>
<body>

<div id="container">
    <?php foreach($accountdetails as $uname): ?>
        <h4><?= $uname->c_last_name . ', ' . $uname->c_first_name; ?> | <i><?=$uname->c_email_address; ?></i></h4>
        <h4><?= $uname->c_address1 . ' ' . $uname->c_address2 . ' ' . $uname->c_city . ', ' . $uname->c_postal_code; ?></h4>
    <?php endforeach; ?>

    <?php foreach($order_invoice as $row): ?>
    <h1>Invoice Number: <?= date("Y") . $row->serialnum; ?></h1>

    <div id="body">
        <h3>Date of Order: <?= date("F d, Y", strtotime($row->date)); ?></h3>
        <hr>
        <div id="secondhead">
            <code>Payment Method: <?=$row->mode_of_payment; ?></code>
            <code>Total Amount: ₱ <?=$row->total_amount; ?></code>
        </div>
    <?php endforeach; ?>
        <br>
        <table border="0" width="100%">
            <tr id="header">
                <td><code>Item</code></td>
                <td><code>Price</code></td>
            </tr>
            <?php foreach($prods as $product): ?>
            <tr>
                <td id="item"><?= $product->product_name; ?> x <?= $product->quantity; ?></td>
                <?php
                $item = $product->product_price;
                $qty = $product->quantity;
                $subTotal = $item * $qty;
                ?>
                <td id="price"><?= number_format($subTotal, 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <p class="footer">abrietoCart &copy;2018</p>
</div>

</body>
</html>