<?php
/* Smarty version 5.4.3, created on 2025-02-23 21:26:42
  from 'file:page/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_67bb9292116455_33241459',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a10ca33befaeb86ae3e22a0cf16630fd9ba65607' => 
    array (
      0 => 'page/header.tpl',
      1 => 1740346000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67bb9292116455_33241459 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\repos\\greenleaf-market\\templates\\page';
?><head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <!-- main CSS file -->
  <link rel="stylesheet" href="/assets/css/main.css">
  <!-- responsive CSS file -->
  <link rel="stylesheet" href="/assets/css/responsive.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body class="bg-secondary">
  <nav class="navbar navbar-expand-lg bg-accent py-3">
    <div class="container d-flex align-items-center justify-content-between">
      <a class="navbar-brand" href="/">
          <img src="/assets/img/logo-dark.png" alt="Greenleaf Market Logo" height="80" class="d-inline-block align-text-top">
      </a>
      <form class="d-flex mx-auto w-50" role="search">
          <input class="form-control me-2 rounded-0" type="search" placeholder="Search..." aria-label="Search">
          <button class="btn btn-primary rounded-0" type="submit">Search</button>
      </form>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link" href="/signin">
                <i class="fa-solid fa-user fa-xl" style="color: black;"></i><h5 class="d-inline ps-3">Login/Sign up</h5>
              </a>
          </li>
      </ul>
    </div>
  </nav>
</body><?php }
}
