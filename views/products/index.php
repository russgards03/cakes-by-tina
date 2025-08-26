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
        <?php if (!empty($products)): ?>
            <ul>
                <?php foreach($products as $product): ?>
                    <li><?= htmlspecialchars($product['product_name']) ?> - ₱<?=htmlspecialchars($product['product_price']) ?></li>
                <?php endforeach; ?>    
            </ul>
    <?php else: ?>
        <p> No products available.</p>
    <?php endif; ?>
    </div>
    
</body>
</html>