<div class="food-menu-box">
    <form method="post" action="?action=add&product_id=<?=$id; ?>">
        <div class="food-menu-img">
            <img src="<?= SITE; ?>images/food/<?= $image_name; ?>"
                onerror="this.onerror=null;this.src='https://via.placeholder.com/100x150.png?text=Food+Delight';"
                class="img-responsive img-curve" width="100">
        </div>
        <div class="food-menu-desc">
            <h4><?=$title; ?></h4>
            <h5><?= $price; ?></h5>
            <p><?= $description; ?></p>
            <input type="hidden" name="product_id" value="<?=$id; ?>">
            <input type="hidden" name="product_name" value="<?=$title; ?>">
            <input type="hidden" name="product_price" value="<?=$price; ?>">
            <input type="number" name="product_quantity" value="1" min="1" style="width:100px;margin:10px 0;">
            <input type="submit" name="add_to_cart" value="Add to cart" class="Button">
        </div>
    </form>

</div>