<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST request from a web form
    processForm();
} elseif (php_sapi_name() === 'cli') {
    // Handle direct CLI execution
    echo "Direct CLI execution...\n";
    // You can add CLI-specific logic here
    // Example: Simulating form data for testing purposes
    $_POST['vat'] = 20;
    $_POST['general_expenses'] = 10;
    $_POST['profit_margin'] = 15;
    for ($i = 1; $i <= 10; $i++) {
        $_POST['buying_price_' . $i] = 50 + $i * 5;
    }
    processForm();
} else {
    // Invalid access method
    echo "<h1>Invalid access method.</h1>";
}

function processForm() {
    // Retrieve and sanitize form input
    $vat = floatval($_POST['vat']);
    $general_expenses = floatval($_POST['general_expenses']);
    $profit_margin = floatval($_POST['profit_margin']);

    echo "<h1>Selling Price Calculation Results</h1>";
    echo "<table border='1'>
            <tr>
                <th>Product</th>
                <th>Buying Price</th>
                <th>VAT Amount</th>
                <th>Total General Expense</th>
                <th>Profit Margin</th>
                <th>Selling Price</th>
            </tr>";

    // Loop through each product
    for ($i = 1; $i <= 10; $i++) {
        $buying_price = floatval($_POST['buying_price_' . $i]);

        // Calculate VAT Amount
        $vat_amount = $buying_price * ($vat / 100);

        // Calculate General Expenses Amount
        $general_expenses_amount = $buying_price * ($general_expenses / 100);

        // Calculate Profit Margin Amount
        $profit_margin_amount = $buying_price * ($profit_margin / 100);

        // Calculate Selling Price
        $selling_price = $buying_price + $vat_amount + $general_expenses_amount + $profit_margin_amount;

        echo "<tr>
                <td>Product $i</td>
                <td>\$$buying_price</td>
                <td>\$$vat_amount</td>
                <td>\$$general_expenses_amount</td>
                <td>\$$profit_margin_amount</td>
                <td>\$$selling_price</td>
              </tr>";
    }

    echo "</table>";
}
?>
