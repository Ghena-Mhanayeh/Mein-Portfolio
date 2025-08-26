<?php
/* Smarty version 4.2.0, created on 2025-07-02 21:39:19
  from '/var/www/html/iksy05/EasyWash/EasyWash/smarty/templates/zahlung.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6865a707b937a2_87843546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d840cbfba1815c2225a6dba9be7e8247e69869c' => 
    array (
      0 => '/var/www/html/iksy05/EasyWash/EasyWash/smarty/templates/zahlung.tpl',
      1 => 1750982348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6865a707b937a2_87843546 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Zahlungsmethode</title>
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

  <div class="container" style="max-width: 700px; margin-top: 120px;">
   
    <h3 class="mb-4 text-center">💳 Wähle deine Zahlungsmethode</h3>

    <form method="post" action="bestellen.php">
  <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
  
            <!-- Lieferadresse versteckt übergeben -->
  <input type="hidden" name="liefer_strasse" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lieferadresse']->value['strasse'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
  <input type="hidden" name="liefer_adresszusatz" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lieferadresse']->value['adresszusatz'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
  <input type="hidden" name="liefer_plz" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lieferadresse']->value['plz'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
  <input type="hidden" name="liefer_stadt" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lieferadresse']->value['stadt'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
  <input type="hidden" name="liefer_land" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lieferadresse']->value['land'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

  <!-- Zahlungsarten -->
  <div class="form-check bg-light border rounded p-3 mb-3">
    <input class="form-check-input" type="radio" name="zahlungsmethode" id="paypal" value="PayPal" required>
    <label class="form-check-label fs-5" for="paypal">
      <i class="fa-brands fa-paypal me-2"></i>PayPal
    </label>
  </div>

      <div class="form-check bg-light border rounded p-3 mb-3">
        <input class="form-check-input" type="radio" name="zahlungsmethode" id="klarna" value="Klarna">
        <label class="form-check-label fs-5" for="klarna">
          <i class="fa-brands fa-kickstarter-k me-2"></i>Klarna
        </label>
      </div>

      <div class="form-check bg-light border rounded p-3 mb-3">
        <input class="form-check-input" type="radio" name="zahlungsmethode" id="ueberweisung" value="Überweisung">
        <label class="form-check-label fs-5" for="ueberweisung">
          <i class="fa-solid fa-building-columns me-2"></i>Überweisung
        </label>
      </div>

      <div class="form-check bg-light border rounded p-3 mb-4">
        <input class="form-check-input" type="radio" name="zahlungsmethode" id="kreditkarte" value="Kreditkarte">
        <label class="form-check-label fs-5" for="kreditkarte">
          <i class="fa-regular fa-credit-card me-2"></i>Kreditkarte
        </label>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">
          Bestellung abschließen <i class="fa-solid fa-paper-plane ms-2"></i>
        </button>
      </div>
    </form>
  </div>

  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}
