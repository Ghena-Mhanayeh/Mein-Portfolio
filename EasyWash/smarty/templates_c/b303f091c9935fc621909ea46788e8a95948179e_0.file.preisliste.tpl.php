<?php
/* Smarty version 4.2.0, created on 2025-07-02 20:38:54
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/preisliste.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_686598de13ff90_22077825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b303f091c9935fc621909ea46788e8a95948179e' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/preisliste.tpl',
      1 => 1751480349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686598de13ff90_22077825 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Preisliste</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- Logo -->
	<div class="container mt-3">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<?php if ((isset($_SESSION['email']))) {?> <a href="startSeite.php"> <?php } else { ?> <a
				href="index.php"> <?php }?> <img src="images/Logo.png"
					alt="Easy Wash Logo" style="height: 100px; width: auto;">
			</a>
		
		</div>
	</div>

	<!-- Inhalt -->
	<main class="flex-grow-1">
		<div class="container mt-5">
			<h2 class="text-center mb-4"
				style="color: #008ddc; font-weight: 900; text-transform: uppercase;">
				Preisliste</h2>
			<div class="mx-auto" style="max-width: 800px; font-size: 1.1rem;">

				<h4 class="mt-4">Teppichreinigung</h4>
				<ul>
					<li><?php echo $_smarty_tpl->tpl_vars['TEPPICH_PREIS_PRO_M2']->value;?>
 pro m<sup>2</sup></li>
					<li>+ Lieferung: <?php echo $_smarty_tpl->tpl_vars['LIEFERKOSTEN_TEPPICHE']->value;?>
 (optional)</li>
					<li>+ Tiefreinigung: <?php echo $_smarty_tpl->tpl_vars['reinigungskosten']->value;?>
 (optional)</li>
				</ul>

				<h4 class="mt-4">Kleidungsreinigung</h4>
				<ul>
					<li>Grundpreis: <?php echo $_smarty_tpl->tpl_vars['GRUNDPREIS_KLEIDUNG']->value;?>
 pro kg</li>
					<li>+ Aufschlag weiß: <?php echo $_smarty_tpl->tpl_vars['aufschlag_weiss']->value;?>
</li>
					<li>+ Aufschlag schwarz: <?php echo $_smarty_tpl->tpl_vars['aufschlag_schwarz']->value;?>
</li>
					<li>+ Aufschlag mix: <?php echo $_smarty_tpl->tpl_vars['aufschlag_mix']->value;?>
</li>
					<li>+ Bügeln: <?php echo $_smarty_tpl->tpl_vars['bugelnPreis']->value;?>
 pro kg</li>
					<li>+ Lieferung:<?php echo $_smarty_tpl->tpl_vars['LIEFERKOSTEN_KLEIDUNG']->value;?>
 (optional)</li>
				</ul>

				<h4 class="mt-4">Möbelreinigung</h4>
				<ul>
					<li>Matratze: <?php echo $_smarty_tpl->tpl_vars['MATRATZE']->value;?>
</li>
					<li>Sessel: <?php echo $_smarty_tpl->tpl_vars['SESSEL']->value;?>
</li>
					<li>Gardine: <?php echo $_smarty_tpl->tpl_vars['GARDINEN']->value;?>
</li>
					<li>Ecksofa: <?php echo $_smarty_tpl->tpl_vars['ECKSOFA']->value;?>
</li>
					<li>Zwei-Sitzer Sofa: <?php echo $_smarty_tpl->tpl_vars['ZWEI_SITZER_SOFA']->value;?>
</li>
					<li>Drei-Sitzer Sofa: <?php echo $_smarty_tpl->tpl_vars['DREI_SITZER_SOFA']->value;?>
</li>
				</ul>

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
