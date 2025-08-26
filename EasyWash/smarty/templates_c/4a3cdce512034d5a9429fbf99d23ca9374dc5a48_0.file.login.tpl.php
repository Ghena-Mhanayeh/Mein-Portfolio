<?php
/* Smarty version 4.2.0, created on 2025-08-19 21:56:22
  from '/var/www/html/iksy06/EasyWash/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a4f30641ff94_72575195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a3cdce512034d5a9429fbf99d23ca9374dc5a48' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/login.tpl',
      1 => 1755640579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a4f30641ff94_72575195 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="icon" type="image/png" href="images/Logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/style.css" />
</head>

<body class="bg-light">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card shadow rounded-4">
          <div class="card-body p-4 p-md-5">

            <!-- Logo + Titel -->
            <div class="text-center mb-4">
              <a href="index.php">
                <img src="images/Logo.png" alt="Easy Wash Logo" class="img-fluid mb-3" style="max-width:150px;">
              </a>
              <h3 class="fw-normal m-0">Login bei Easy Wash</h3>
            </div>

                        <?php if ((isset($_smarty_tpl->tpl_vars['fehler']->value)) && $_smarty_tpl->tpl_vars['fehler']->value) {?>
              <div class="alert alert-danger text-center"><?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>
</div>
            <?php }?>

            <form action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" method="POST" novalidate>
              <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

              <div class="mb-3">
                <label for="email" class="form-label">E‑Mail‑Adresse</label>
                <input
                  type="email"
                  class="form-control "
                  name="email"
                  id="email"
                  placeholder="E‑Mail"
                  value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['email']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                  required>
              </div>

              <div class="mb-3 position-relative">
                <label for="passwort" class="form-label">Passwort</label>
                <input
                  type="password"
                  class="form-control pe-5"
                  name="passwort"
                  id="passwort"
                  placeholder="Passwort"
                  required>
                <i class="fa fa-eye position-absolute end-0 me-3"
                   style="cursor:pointer; top:60%;" onclick="togglePassword('passwort', this)"></i>
              </div>

              <button type="submit" name="login" class="btn btn-primary w-100 py-2">Anmelden</button>
            </form>

            <p class="mt-3 text-center mb-0">
              Noch kein Konto? <a href="registrieren.php">Jetzt registrieren</a>
            </p>

          </div>
        </div>
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
