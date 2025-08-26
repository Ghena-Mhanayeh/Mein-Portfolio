<?php
/* Smarty version 4.2.0, created on 2025-07-02 13:28:02
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/bestellBestaetigung.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686533e22f61d3_04090413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe5b7ebb98783a20ff0fc68f44bed2b4fd2f741a' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/bestellBestaetigung.tpl',
      1 => 1751448362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686533e22f61d3_04090413 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Bestellungsbestätigung</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 

<div class="container" style="margin-top: 120px; max-width: 700px;">



    <div class="card shadow-sm p-4 rounded-4 text-center">
        <h2 class="mb-3">🎉 Bestellung erfolgreich!</h2>
        <p class="fs-5 mb-2">Vielen Dank für deine Bestellung, <strong><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vorname']->value, ENT_QUOTES, 'UTF-8', true);?>
</strong>!</p>
        <p class="fs-6 mb-4">Deine Bestellnummer: <strong>#<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['bestellung_id']->value, ENT_QUOTES, 'UTF-8', true);?>
</strong></p>

        

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="pdfRechnung.php?bestellung_id=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['bestellung_id']->value);?>
" class="btn btn-outline-primary">
                📄 Rechnung als PDF anzeigen
            </a>
            <a href="startSeite.php" class="btn btn-primary">
                Zur Startseite
            </a>
        </div>
        <!-- ✅ QR-Code anzeigen -->
     <div class="my-4">
            <p class="mb-2">📱 Scanne diesen QR-Code, um deine Bestellung anzuzeigen:</p>
            <img src="qrCodeErstellenBild.php?bestellung_id=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['bestellung_id']->value);?>
" 
                 alt="QR-Code" 
                 class="img-fluid rounded-3 border shadow-sm"
                 style="max-width: 200px;">
        </div>
    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Bootstrap JS -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
