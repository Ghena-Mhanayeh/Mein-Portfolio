<?php
/* Smarty version 4.2.0, created on 2025-07-02 15:30:24
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68655090d909e9_65816110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff89dd5261fa40e2b0d0289183a41108a1a1b959' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/login.tpl',
      1 => 1751448362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68655090d909e9_65816110 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="icon" type="image/png" href="images/Logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <div class="login-container text-center" style="max-width: 400px; margin: 100px auto;">
    <a href="index.php">
      <img src="images/Logo.png" alt="Easy Wash Logo" class="logo" style="width: 100px;">
    </a>
    <h3 class="mb-4">Login bei Easy Wash</h3>

        <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value)) && $_smarty_tpl->tpl_vars['fehler']->value) {?>
      <div class="alert alert-danger text-center"><?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>
</div>
    <?php }?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="POST">
      <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

      <div class="mb-3 text-start">
        <label for="email" class="form-label">E-Mail-Adresse</label>
        <input
          type="email"
          class="form-control"
          name="email"
          id="email"
          placeholder="Gib deine E-Mail-Adresse ein"
          value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
          required>
      </div>

      <div class="mb-3 text-start position-relative">
        <label for="passwort" class="form-label">Passwort</label>
        <input
          type="password"
          class="form-control"
          name="passwort"
          id="passwort"
          placeholder="Gib dein Passwort ein"
          required>
        <i class="fa fa-eye position-absolute"
           style="top: 38px; right: 15px; cursor: pointer;"
           onclick="togglePassword('passwort', this)"></i>
      </div>

      <button type="submit" name="login" class="btn btn-primary w-100">Anmelden</button>
    </form>

    <p class="mt-3">
      Noch kein Konto? <a href="registrieren.php">Jetzt registrieren</a>
    </p>
  </div>

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
