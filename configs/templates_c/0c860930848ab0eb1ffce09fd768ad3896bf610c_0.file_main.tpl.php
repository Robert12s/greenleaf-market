<?php
/* Smarty version 5.4.3, created on 2025-02-23 18:22:10
  from 'file:index/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67bb67527e7b54_47140877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c860930848ab0eb1ffce09fd768ad3896bf610c' => 
    array (
      0 => 'index/main.tpl',
      1 => 1739397319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:page/header.tpl' => 1,
    'file:page/footer.tpl' => 1,
  ),
))) {
function content_67bb67527e7b54_47140877 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\repos\\greenleaf-market\\templates\\index';
$_smarty_tpl->renderSubTemplate('file:page/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<div style="background-color: #EDEDED;">
    <h1>Main test</h1>

</div>
<?php $_smarty_tpl->renderSubTemplate('file:page/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
