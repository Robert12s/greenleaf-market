{include file='page/header.tpl'}
<div class="container">
    <h1>All Products</h1>
    <ul>
        {foreach $products as $product}
            <li>
                <strong>{$product.name}</strong> - £{$product.price} 
                (Category ID: {$product.category_id})
            </li>
        {/foreach}
    </ul>
</div>
{include file='page/footer.tpl'}
