<?php
/* Smarty version 4.2.0, created on 2025-07-02 17:10:05
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/registrieren.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686567ed572863_95873700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09735143bf950f3ed64c2dc5c259b54f7025eace' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/registrieren.tpl',
      1 => 1751476134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686567ed572863_95873700 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrieren</title>
  <link rel="icon" type="image/png" href="images/Logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="register-page">
  <div class="register-container">
    <div class="text-center mb-4">
      <a href="index.php">
        <img src="images/Logo.png" alt="Easy Wash Logo" class="logo" />
      </a>
      <h3>Jetzt registrieren</h3>
    </div>

    <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
      <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>
</div>
    <?php }?>

    <form action="registrieren.php" method="POST">
      <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

      <div class="row">
        <!-- Persönliche Daten -->
        <div class="col-form">
          <h5 class="mb-3">Persönliche Daten</h5>
          <div class="mb-3"><label class="form-label">Vorname</label><input type="text" class="form-control" name="vorname" required></div>
          <div class="mb-3"><label class="form-label">Nachname</label><input type="text" class="form-control" name="nachname" required></div>
          <div class="mb-3"><label class="form-label">E-Mail</label><input type="email" class="form-control" name="email" required></div>
          <div class="mb-3"><label class="form-label">Telefonnummer</label><input type="text" class="form-control" name="telefonnummer" maxlength="20" required></div>
          
          <div class="mb-3 position-relative">
            <label class="form-label">Passwort</label>
            <input type="password" class="form-control" id="passwort" name="passwort" required
                   pattern="<?php echo $_smarty_tpl->tpl_vars['passwortPattern']->value;?>
"
                   title="Mindestens 8 Zeichen, 1 Groß-, 1 Kleinbuchstabe, 1 Zahl, 1 Sonderzeichen.">
            <i class="fa fa-eye position-absolute" style="top: 38px; right: 15px; cursor: pointer;"
               onclick="togglePassword('passwort', this)"></i>
          </div>

          <div class="mb-3 position-relative">
            <label class="form-label">Passwort wiederholen</label>
            <input type="password" class="form-control" id="passwortWiederholt" name="passwortWiederholt" required>
            <i class="fa fa-eye position-absolute" style="top: 38px; right: 15px; cursor: pointer;"
               onclick="togglePassword('passwortWiederholt', this)"></i>
          </div>
        </div>

        <!-- Rechnungsadresse -->
        <div class="col-form">
          <h5 class="mb-3">Rechnungsadresse</h5>
          <div class="mb-3"><label class="form-label">Straße und Hausnummer</label><input type="text" class="form-control" name="strasse" required></div>
          <div class="mb-3"><label class="form-label">Adresszusatz (optional)</label><input type="text" class="form-control" name="adresszusatz"></div>
          <div class="mb-3"><label class="form-label">PLZ</label><input type="text" class="form-control" name="plz" min="5" max="5" required></div>
          <div class="mb-3"><label class="form-label">Stadt</label><input type="text" class="form-control" name="stadt" required></div>
          <div class="mb-3"><label class="form-label">Land</label><input type="text" class="form-control" name="land" value="Deutschland" required></div>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" name="registrieren" class="btn btn-easywash px-5">Registrieren</button>
      </div>
    </form>

    <p class="mt-3 text-center">Bereits registriert? <a href="login.php">Zum Login</a></p>
  </div>

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
  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
}
