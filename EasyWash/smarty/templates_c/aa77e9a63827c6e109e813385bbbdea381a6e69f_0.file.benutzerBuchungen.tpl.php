<?php
/* Smarty version 4.2.0, created on 2025-07-28 21:25:32
  from '/var/www/html/iksy06/EasyWash/smarty/templates/benutzerBuchungen.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6887eacce20977_42233659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa77e9a63827c6e109e813385bbbdea381a6e69f' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/benutzerBuchungen.tpl',
      1 => 1751411108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6887eacce20977_42233659 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bestellungen Historie</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<!-- Eigene Styles -->
<link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

	<!-- Navigation -->
    <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main class="main-content flex-grow-1">
        <div class="container text-center" style="padding-top: 100px;">
            <h2 class="mb-5">Deine Bestellungen</h2>
        </div>

        <?php if (count($_smarty_tpl->tpl_vars['bestellungen']->value) > 0) {?>
        <div class="container mb-5">
            <ul class="list-group">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bestellungen']->value, 'bestellung');
$_smarty_tpl->tpl_vars['bestellung']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['bestellung']->value) {
$_smarty_tpl->tpl_vars['bestellung']->do_else = false;
?>
                <li class="list-group-item">
                    <strong>🧺 Bestellung #<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['bestellung']->value['bestellung_id'], ENT_QUOTES, 'UTF-8', true);?>
</strong><br> <!-- Smarty Escaping hinzugefügt -->
                    <small class="text-muted"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['bestellung']->value['datum_formatiert'], ENT_QUOTES, 'UTF-8', true);?>
</small><br>   <!-- Smarty Escaping hinzugefügt -->
                    <a class="btn btn-sm btn-outline-primary mt-2"
                       href="pdfRechnung.php?bestellung_id=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['bestellung']->value['bestellung_id']);?>
"> <!-- URL-Parameter mit |escape:'url' für sichere Übergabe an pdfRechnung.php. -->
                        📄 Rechnung ansehen
                    </a>
                    </a>
                </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <?php } else { ?>
        <p class="text-center mb-5">Du hast noch keine Bestellungen.</p>
        <?php }?>

        <div class="text-center mb-5 pb-5">
            <a href="startSeite.php" class="btn btn-primary">
                Zur Startseite
            </a>
        </div>
    </main>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Bootstrap JS -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
