<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hypermarket Selling Price Calculator</title>

</head>
<body>
    <h1>Hypermarket Selling Price Calculator</h1>
    <form action="calculate.php" method="post">
    <!-- Input fields for VAT, General Expenses, Profit Margin, and Buying Price for each product -->
    <label for="vat">VAT (%):</label>
    <input type="text" name="vat" id="vat" required><br>

    <label for="general_expenses">General Expenses (%):</label>
    <input type="text" name="general_expenses" id="general_expenses" required><br>

    <label for="profit_margin">Profit Margin (%):</label>
    <input type="text" name="profit_margin" id="profit_margin" required><br><br>

    <!-- Input fields for Buying Price for each product -->
    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <label for="buying_price_<?php echo $i; ?>">Buying Price for Product <?php echo $i; ?>:</label>
        <input type="text" name="buying_price_<?php echo $i; ?>" id="buying_price_<?php echo $i; ?>" required><br>
    <?php endfor; ?>

    <br><input type="submit" value="Calculate">
</form>

</body>
</html>
