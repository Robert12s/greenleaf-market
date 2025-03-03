<?php
/* Smarty version 5.4.3, created on 2025-03-03 16:30:57
  from 'file:index/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67c5d941382972_51277983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c860930848ab0eb1ffce09fd768ad3896bf610c' => 
    array (
      0 => 'index/main.tpl',
      1 => 1741019454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:page/header.tpl' => 1,
    'file:page/footer.tpl' => 1,
  ),
))) {
function content_67c5d941382972_51277983 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\repos\\greenleaf-market\\templates\\index';
$_smarty_tpl->renderSubTemplate('file:page/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<div class="container">
    <h1>All Products</h1>
    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach0DoElse = false;
?>
            <li>
                <strong><?php echo $_smarty_tpl->getValue('product')['name'];?>
</strong> - £<?php echo $_smarty_tpl->getValue('product')['price'];?>
 
                (Category ID: <?php echo $_smarty_tpl->getValue('product')['category_id'];?>
)
            </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
</div>
<?php $_smarty_tpl->renderSubTemplate('file:page/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
