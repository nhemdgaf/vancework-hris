
<?php $__env->startSection('title'); ?> 201-Encoding - Vancework <?php $__env->stopSection(); ?>
<?php $__env->startSection('content-encoding'); ?>
<div class="d-flex flex-column" id="content-wrapper">
	<!--- Top Navigation Bar --->
	<div id="content">
		<?php echo $__env->make('admin.partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<!--- #Top Navigation Bar --->
	<!--- 201 Encoding Main Content --->
	<div class="container-fluid">
		<h3 class="text-dark mb-4">201 ENCODING</h3>
		<div class="row ">
			<div class="col-lg-4">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-personal-information-tab" data-toggle="pill" href="#v-pills-personal-information" role="tab" aria-controls="v-pills-personal-information" aria-selected="true">Personal Information</a>
					<a class="nav-link" id="v-pills-contact-details-tab" data-toggle="pill" href="#v-pills-contact-details" role="tab" aria-controls="v-pills-contact-details" aria-selected="false">Contact Details </a>
					<a class="nav-link" id="v-pills-complete-address-tab" data-toggle="pill" href="#v-pills-complete-address" role="tab" aria-controls="v-pills-complete-address" aria-selected="false">Complete Address</a>
					<a class="nav-link" id="v-pills-add-information-tab" data-toggle="pill" href="#v-pills-add-information" role="tab" aria-controls="v-pills-add-information" aria-selected="false">Additional Information</a>
					<a class="nav-link" id="v-pills-contribution-number-tab" data-toggle="pill" href="#v-pills-contribution-number" role="tab" aria-controls="v-pills-contribution-number" aria-selected="false">Contribution Number</a>
					<a class="nav-link" id="v-pills-employee-profile-tab" data-toggle="pill" href="#v-pills-employee-profile" role="tab" aria-controls="v-pills-employee-profile" aria-selected="false">Employee Profile</a>
					<a class="nav-link" id="v-pills-atm-acc-tab" data-toggle="pill" href="#v-pills-atm-acc" role="tab" aria-controls="v-pills-atm-acc" aria-selected="false">ATM Record</a>
				</div>
			</div>
			<div class="col-lg-8 mb-5">
				<div class="tab-content" id="v-pills-tabContent">

					<?php echo $__env->make('admin.201.steps.personal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.add_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.contrib', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.emp_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo $__env->make('admin.201.steps.atm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				</div>
			</div>
		</div>
		<!--- /201 Encoding Content --->
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.employee', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\vancework-hris\resources\views/admin/201/index.blade.php ENDPATH**/ ?>