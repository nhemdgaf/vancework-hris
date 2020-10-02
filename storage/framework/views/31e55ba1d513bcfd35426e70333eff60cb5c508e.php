<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
	<link rel="stylesheet" href="<?php echo e(asset('/frontend/assets/bootstrap/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?php echo e(asset('/frontend/assets/fonts/fontawesome-all.min.css')); ?>">
</head>
<body id="page-top">
	<div id="wrapper">

		<!--- Side Navigation Bar --->
		<?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--- #Side Navigation Bar--->

		<!--- Encoding Content --->
		<div class="d-flex flex-column" id="content-wrapper">
			<?php echo $__env->yieldContent('content-encoding'); ?>
		</div>
		<!--- #Encoding Content --->

		<!--- Footer --->
		<?php echo $__env->make('admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--- #Footer --->
		
	</div>
	<script src="<?php echo e(asset('/frontend/assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/frontend/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/frontend/assets/js/chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/frontend/assets/js/bs-init.js')); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="<?php echo e(asset('/frontend/assets/js/theme.js')); ?>"></script>
</body>
</html><?php /**PATH D:\laragon\www\vancework-hris\resources\views/admin/employee.blade.php ENDPATH**/ ?>