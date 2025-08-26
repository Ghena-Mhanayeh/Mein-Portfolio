<?php
/* Smarty version 4.2.0, created on 2025-07-02 20:38:56
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/impressum.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686598e0f1acb5_73753473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ce9b60cda5238da2e0d98d41af2114c73a79ff1' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/impressum.tpl',
      1 => 1750973256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686598e0f1acb5_73753473 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Impressum</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

	<div class="container mt-3">
		<div class="d-flex justify-content-between align-items-center mb-3">

			<?php if ((isset($_SESSION['email']))) {?> <a href="startSeite.php"> <img
				src="images/Logo.png" alt="Easy Wash Logo" class="logo"
				style="width: 100px;">
			</a> <?php } else { ?> <a href="index.php"> <img src="images/Logo.png"
				alt="Easy Wash Logo" class="logo" style="width: 100px;">
			</a> <?php }?>


		</div>


	</div>
	</div>

	<main class="flex-grow-1">
		<div class="container mt-5">
			<h2 class="text-center mb-4"
				style="color: #008ddc; font-weight: 900; text-transform: uppercase;">Impressum</h2>
			<div class="mx-auto" style="max-width: 700px; font-size: 1.1rem;">

				<p>
					<strong>Easy Wash GbR</strong><br> Lennershofstraße 140<br> 44801
					Bochum<br> Deutschland
				</p>

				<p>
					<strong>Vertreten durch:</strong><br> Zineb Tagmouti, Ghena Mhnayeh
					und Riham Barrak
				</p>

				<p>
					<strong>Kontakt:</strong><br> <i
						class="fa fa-phone text-primary me-2"></i> +49 1578 8729629 (ZT)<br>
					<i class="fa fa-phone text-primary me-2"></i> +49 1578 6439404 (GM)<br>
					<i class="fa fa-phone text-primary me-2"></i> +49 176 28355913 (RB)<br>
					<br> <i class="fa fa-envelope text-danger me-2"></i>
					zineb.tagmouti@stud.hs-bochum.de<br> <i
						class="fa fa-envelope text-danger me-2"></i>
					ghena.mhnayeh@stud.hs-bochum.de<br> <i
						class="fa fa-envelope text-danger me-2"></i>
					riham.barrak@stud.hs-bochum.de
				</p>

				<p>
					<strong>Projekt:</strong><br> Diese Website wurde im Rahmen eines
					studentischen Projekts an der Hochschule Bochum entwickelt.
				</p>

				<p>
					<strong>Inhaltlich verantwortlich gemäß § 55 Abs. 2 RStV:</strong><br>
					Zineb Tagmouti, Ghena Mhnayeh und Riham Barrak<br> Lennershofstraße
					140<br> 44801 Bochum
				</p>

			</div>
		</div>
	</main>

	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>

		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
