<h1>Produits de la catégorie : <?= $category->cate_title ?></h1>
<?php foreach($products as $product): ?>
    <h2><?= $product->prod_title ?></h2>
<?php endforeach; ?>