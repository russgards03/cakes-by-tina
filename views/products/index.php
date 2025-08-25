<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cakes by Tina</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1> Welcome to Cakes by Tina! </h1>

    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h2><?= htmlspecialchars($product['product_name']) ?></h2>
                <p>Price: $<?= htmlspecialchars($product['product_price']) ?></p>
                <p><?= htmlspecialchars($product['product_desc']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    
</body>
</html>