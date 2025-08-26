<?php
/* Smarty version 4.2.0, created on 2025-07-02 13:26:53
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/teppich.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6865339dd56452_81172531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd96426760f8d9a2c14056056908ca8be489c6121' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/teppich.tpl',
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
function content_6865339dd56452_81172531 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Teppich Service</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container" style="max-width: 600px; margin-top: 120px;">
    <div class="text-center mb-3">
      <img src="images/Logo.png" alt="Easy Wash Logo" width="100">
    </div>

    <h3 class="mb-4 text-center">Teppich – Service buchen</h3>

    <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
      <div class="alert alert-danger text-center">
        <?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>

      </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['ausgabe']->value) {?>
    <div class="alert alert-info text-center"><?php echo $_smarty_tpl->tpl_vars['ausgabe']->value;?>
</div>
    <?php }?>

    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
">
      <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

      <!-- Breite -->
      <div class="mb-3">
        <label class="form-label">Breite in Meter (<?php echo $_smarty_tpl->tpl_vars['TEPPICH_PREIS_PRO_M2']->value;?>
 pro m<sup>2</sup>)</label>
        <input type="number" step="0.1" class="form-control" name="breite" min="0.1" required value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_breite']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
      </div>

      <!-- Länge -->
      <div class="mb-3">
        <label class="form-label">Länge in Meter</label>
        <input type="number" step="0.1" class="form-control" name="laenge" min="0.1" required value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_laenge']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
      </div>

      <!-- Tiefreinigung -->
      <div class="mb-3">
        <label class="form-label">Tiefreinigung? (<?php echo $_smarty_tpl->tpl_vars['reinigungskosten']->value;?>
)</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tiefreinigung" value="Ja" required <?php if ($_smarty_tpl->tpl_vars['form_tiefreinigung']->value == 'Ja') {?>checked<?php }?>>
          <label class="form-check-label">Ja</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tiefreinigung" value="Nein" <?php if ($_smarty_tpl->tpl_vars['form_tiefreinigung']->value == 'Nein') {?>checked<?php }?>>
          <label class="form-check-label">Nein</label>
        </div>
      </div>

      <!-- Liefern lassen -->
      <div class="mb-3">
        <label class="form-label">Liefern lassen? (<?php echo $_smarty_tpl->tpl_vars['LIEFERKOSTEN_TEPPICHE']->value;?>
)</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="liefern" id="lieferJa" value="Ja" required <?php if ($_smarty_tpl->tpl_vars['form_lieferung']->value == 'Ja') {?>checked<?php }?>>
          <label class="form-check-label" for="lieferJa">Ja</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="liefern" id="lieferNein" value="Nein" <?php if ($_smarty_tpl->tpl_vars['form_lieferung']->value == 'Nein') {?>checked<?php }?>>
          <label class="form-check-label" for="lieferNein">Nein</label>
        </div>
      </div>

      <!-- Buttons -->
      <div class="d-grid gap-3 mt-4">
        <button type="submit" name="preis_berechnen" class="btn btn-primary">
          Preis berechnen <i class="fa-solid fa-calculator ms-2"></i>
        </button>
        <button type="submit" name="in_warenkorb_legen" class="btn btn-primary">
          In den Warenkorb legen <i class="fa-solid fa-cart-plus ms-2"></i>
        </button>
      </div>
    </form>
  </div>

  <?php echo '<script'; ?>
>
    document.addEventListener('DOMContentLoaded', function () {
      const lieferJa = document.getElementById('lieferJa');
      const lieferNein = document.getElementById('lieferNein');
      const adresseBlock = document.getElementById('lieferadresse');

      function toggleAdresse() {
        adresseBlock.style.display = lieferJa && lieferJa.checked ? 'block' : 'none';
      }

      if (lieferJa && lieferNein) {
        lieferJa.addEventListener('change', toggleAdresse);
        lieferNein.addEventListener('change', toggleAdresse);
        toggleAdresse();
      }
    });
  <?php echo '</script'; ?>
>

  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
