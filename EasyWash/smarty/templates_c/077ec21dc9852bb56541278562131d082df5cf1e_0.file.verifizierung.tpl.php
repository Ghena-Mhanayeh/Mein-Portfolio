<?php
/* Smarty version 4.2.0, created on 2025-08-18 21:56:57
  from '/var/www/html/iksy06/EasyWash/smarty/templates/verifizierung.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a3a1a95974a1_73375652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '077ec21dc9852bb56541278562131d082df5cf1e' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/verifizierung.tpl',
      1 => 1751112999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a3a1a95974a1_73375652 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Verifizierung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <!-- Hauptinhalt mit flexiblem Platz -->
  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card shadow p-4" style="max-width: 500px;">
      <h4 class="mb-3">Konto verifizieren</h4>
      <p>Bitte klicke auf den folgenden Link, um dein Konto zu aktivieren:</p>
      <a href="<?php echo $_smarty_tpl->tpl_vars['verifizierungsLink']->value;?>
" class="btn btn-success mb-3">Konto aktivieren</a>
      <p class="text-muted" style="font-size: 0.9em;">
        Hinweis: Du musst diesen Schritt nur einmal machen. Danach kannst du dich einloggen.
      </p>
    </div>
  </main>

  <!-- Footer bleibt unten -->
  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}
