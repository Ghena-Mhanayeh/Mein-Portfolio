<?php
/* Smarty version 4.2.0, created on 2025-08-19 23:22:46
  from '/var/www/html/iksy06/EasyWash/smarty/templates/registrieren.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a50746449d12_37266630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20fbef5287f4dc5ac305b35a80713eea528c8635' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/registrieren.tpl',
      1 => 1755645762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a50746449d12_37266630 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrieren</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
  <div class="container my-5">
    <div class="card shadow rounded-4 mx-auto" style="max-width: 700px;">
      <div class="card-body p-4 p-md-5">
        <!-- Logo + Titel -->
        <div class="text-center mb-4">
          <a href="index.php">
            <img src="images/Logo.png" alt="Easy Wash Logo" class="img-fluid mb-3" style="max-width:150px;">
          </a>
          <h3 class="fw-normal m-0">Jetzt registrieren</h3>
        </div>

        <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value))) {?>
          <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>
</div>
        <?php }?>

        <form action="registrieren.php" method="POST">
          <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

          <div class="row g-4">
            <!-- Persönliche Daten -->
            <div class="col-12 col-lg-6" style="padding: 30px;">
              <h5 class="mb-3">Persönliche Daten</h5>

              <div class="mb-3">
                <label class="form-label">Vorname</label>
                <input type="text" class="form-control" name="vorname"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_vorname']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                       pattern="<?php echo $_smarty_tpl->tpl_vars['namePattern']->value;?>
"
                       title="Nur Buchstaben, Leerzeichen und Bindestriche sind erlaubt">
              </div>

              <div class="mb-3">
                <label class="form-label">Nachname</label>
                <input type="text" class="form-control" name="nachname"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_nachname']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                       pattern="<?php echo $_smarty_tpl->tpl_vars['namePattern']->value;?>
"
                       title="Nur Buchstaben, Leerzeichen und Bindestriche sind erlaubt">
              </div>

              <div class="mb-3">
                <label class="form-label">E‑Mail</label>
                <input type="email" class="form-control" name="email"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                       pattern="<?php echo $_smarty_tpl->tpl_vars['emailPattern']->value;?>
"
                       title="Bitte gib eine gültige E‑Mail‑Adresse ein.">
              </div>

              <div class="mb-3">
                <label class="form-label">Telefonnummer</label>
                <input type="text" class="form-control" name="telefonnummer" maxlength="20"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_telefonnummer']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                       pattern="<?php echo $_smarty_tpl->tpl_vars['phonePattern']->value;?>
"
                       title="keine gültige Telefonnummer">
              </div>

              <div class="mb-3 position-relative">
                <label class="form-label">Passwort</label>
                <input type="password" class="form-control" id="passwort" name="passwort" required
                       pattern="<?php echo $_smarty_tpl->tpl_vars['passwortPattern']->value;?>
"
                       title="Mindestens 8 Zeichen, 1 Groß-, 1 Kleinbuchstabe, 1 Zahl, 1 Sonderzeichen.">
                <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;" onclick="togglePassword('passwort', this)"></i>
              </div>

              <div class="mb-3 position-relative">
                <label class="form-label">Passwort wiederholen</label>
                <input type="password" class="form-control" id="passwortWiederholt" name="passwortWiederholt" required>
                <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;" onclick="togglePassword('passwortWiederholt', this)"></i>
              </div>
            </div>

            <!-- Rechnungsadresse -->
            <div class="col-12 col-lg-6" style="padding: 30px;">
              <h5 class="mb-3">Rechnungsadresse</h5>

              <div class="mb-3">
                <label class="form-label">Straße und Hausnummer</label>
                <input type="text" class="form-control" name="strasse"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_strasse']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Adresszusatz (optional)</label>
                <input type="text" class="form-control" name="adresszusatz"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_adresszusatz']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
              </div>

              <div class="mb-3">
                <label class="form-label">PLZ</label>
                <input type="text" class="form-control" name="plz" minlength="5" maxlength="5"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_plz']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required
                       pattern="<?php echo $_smarty_tpl->tpl_vars['plzPattern']->value;?>
"
                       title="Die Postleitzahl muss 5 Ziffern haben.">
              </div>

              <div class="mb-3">
                <label class="form-label">Stadt</label>
                <input type="text" class="form-control" name="stadt"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_stadt']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Land</label>
                <input type="text" class="form-control" name="land"
                       value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_land']->value ?? null)===null||$tmp==='' ? 'Deutschland' ?? null : $tmp);?>
" required>
              </div>
            </div>
          </div>

          <!-- Submit -->
          <div class="text-center mt-4">
            <button type="submit" name="registrieren" class="btn btn-primary px-5 py-2 w-100 w-lg-auto">
              Registrieren
            </button>
          </div>
        </form>

        <p class="mt-3 text-center mb-0">
          Bereits registriert? <a href="login.php">Zum Login</a>
        </p>
      </div>
    </div>
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
        icon.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
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
