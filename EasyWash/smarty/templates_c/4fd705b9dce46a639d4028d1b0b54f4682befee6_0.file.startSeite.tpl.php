<?php
/* Smarty version 4.2.0, created on 2025-08-19 22:18:13
  from '/var/www/html/iksy06/EasyWash/smarty/templates/startSeite.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a4f8255126d1_38330049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fd705b9dce46a639d4028d1b0b54f4682befee6' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/startSeite.tpl',
      1 => 1755641888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a4f8255126d1_38330049 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Startseite</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; padding-top: 100px;">

<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="main-content">
  <div class="container mt-5">

    <!-- Zentriertes Logo oben -->
    

    <!-- Begrüßungstitel -->
    <h2 class="text-center mb-6" style="color: #008ddc; padding-bottom: 20px;">Willkommen bei Easy Wash!</h2>
    <p class="text-center lead">Wähle deinen Servicebereich:</p>

    <!-- Karten-Reihe mit zentrierter Ausrichtung -->
    <div class="row justify-content-center g-4" style="padding-top: 20px;padding-bottom: 20px;">
      <!-- Kleidung -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow border-0">
          <div class="position-relative card-hover rounded-top" style="height: 200px; background-image: url('images/kleidung.jpeg'); background-size: cover; background-position: center;">
            <div class="position-absolute top-50 start-50 translate-middle text-white">
              <h4 class="fw-bold text-shadow">Kleidung</h4>
            </div>
          </div>
          <div class="card-body text-center">
            <p class="card-text">Pflege und Reinigung für deine Kleidung.</p>
            <a href="kleidung.php" class="btn btn-primary">Weiter <i class="fa-solid fa-arrow-right ms-1"></i></a>
            
           </div>
        </div>
      </div>

      <!-- Möbel -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow border-0">
          <div class="position-relative card-hover rounded-top" style="height: 200px; background-image: url('images/möbel.jpeg'); background-size: cover; background-position: center;">
            <div class="position-absolute top-50 start-50 translate-middle text-white">
              <h4 class="fw-bold text-shadow">Möbel</h4>
            </div>
          </div>
          <div class="card-body text-center">
            <p class="card-text">Reinigung von Sofas, Sesseln und mehr.</p>
            <a href="moebel.php" class="btn btn-primary">Weiter <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <!-- Teppiche -->
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow border-0">
          <div class="position-relative card-hover rounded-top" style="height: 200px; background-image: url('images/teppich.jpeg'); background-size: cover; background-position: center;">
            <div class="position-absolute top-50 start-50 translate-middle text-white">
              <h4 class="fw-bold text-shadow">Teppiche</h4>
            </div>
          </div>
          <div class="card-body text-center">
            <p class="card-text">Professionelle Teppichreinigung vom Experten.</p>
            <a href="teppich.php" class="btn btn-primary">Weiter <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

  <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
