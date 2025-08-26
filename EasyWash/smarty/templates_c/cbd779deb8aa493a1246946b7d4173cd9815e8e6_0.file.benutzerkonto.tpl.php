<?php
/* Smarty version 4.2.0, created on 2025-08-19 01:05:02
  from '/var/www/html/iksy06/EasyWash/smarty/templates/benutzerkonto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a3cdbee296c5_16946200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbd779deb8aa493a1246946b7d4173cd9815e8e6' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/benutzerkonto.tpl',
      1 => 1755565498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a3cdbee296c5_16946200 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Benutzerkonto</title>
  <link rel="icon" type="image/png" href="images/Logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; padding-top: 100px;">

  <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="main-content">
    <div class="container mt-3">
      <h3 class="text-center mb-4">Benutzerkonto Verwalten</h3>

            <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
        <div class="alert alert-danger text-center">
          <?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>

        </div>
      <?php }?>

      <form method="post" action="benutzerkonto.php">
        <input type="hidden" name="kunde_id" value="<?php echo $_smarty_tpl->tpl_vars['kunde_id']->value;?>
">

        <div class="mb-3">
          <label class="form-label">Kundennummer</label>
          <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kunde_id']->value;?>
" disabled>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="nachname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nachname']->value;?>
">
          </div>
          <div class="col-md-6">
            <label class="form-label">Vorname</label>
            <input type="text" name="vorname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['vorname']->value;?>
">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefonnummer</label>
            <input type="text" name="telefonnummer" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['telefonnummer']->value;?>
">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 position-relative">
            <label class="form-label">Passwort</label>
            <input type="password" name="neues_passwort" id="neues_passwort" class="form-control"
              pattern="<?php echo $_smarty_tpl->tpl_vars['passwortPattern']->value;?>
"
              title="Mindestens 8 Zeichen, 1 Großbuchstabe, 1 Kleinbuchstabe, 1 Zahl und 1 Sonderzeichen.">
            <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;"
               onclick="togglePassword('neues_passwort', this)"></i>
          </div>
          <div class="col-md-6 position-relative">
            <label class="form-label">Passwort wiederholen</label>
            <input type="password" name="neues_passwort_wiederholen" id="neues_passwort_wiederholen" class="form-control">
            <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;"
               onclick="togglePassword('neues_passwort_wiederholen', this)"></i>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Straße</label>
            <input type="text" name="strasse" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['strasse']->value;?>
">
          </div>
          <div class="col-md-6">
            <label class="form-label">Hausnummer</label>
            <input type="text" name="hausnummer" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['hausnummer']->value;?>
">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Stadt</label>
            <input type="text" name="stadt" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['stadt']->value;?>
">
          </div>
          <div class="col-md-6">
            <label class="form-label">PLZ</label>
            <input type="text" name="plz" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['plz']->value;?>
">
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label class="form-label">Land</label>
            <input type="text" name="land" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['land']->value;?>
">
          </div>
          <div class="col-md-6">
            <label class="form-label">Adresszusatz (optional)</label>
            <input type="text" name="adresszusatz" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['adresszusatz']->value;?>
">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" name="speichern" class="btn btn-primary">Speichern</button>
        </div>
      </form>
    </div>
  </div>

  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
    function togglePassword(fieldId, icon) {
      const field = document.getElementById(fieldId);
      if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
