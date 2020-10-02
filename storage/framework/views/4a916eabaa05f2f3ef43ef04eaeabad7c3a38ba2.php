<div class="tab-pane fade" id="v-pills-atm-acc" role="tabpanel" aria-labelledby="v-pills-atm-acc-tab">
	<div class="card shadow-lg border-0 rounded-lg">
		<div class="card-body">
			<form autocomplete="off">
				<p class="mt-4 font-weight-bold">ATM Account</p>
				<hr>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1">Card Holder</label>
							<input class="form-control" type="text" placeholder="Card Holder">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1">Card Number</label>
							<input class="form-control item" type="text" id="atm" placeholder="0000-0000-0000-0000">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="small mb-1">Expiration date</label>
							<div class="input-group expiration-date">
								<input class="form-control item" type="text" id="atm_mm_yy" placeholder="MM/YY">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="small mb-1">CVC</label>
							<input class="form-control item" type="text" id="atm_cvc" placeholder="CVC">
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-3 offset-md-9 mb-3">
			<div class="btn-group mt-4">
					<button type="button" class="btn btn-primary btn-md">Back</button>
					<a href="<?php echo e(asset('review')); ?>">
						<button type="button" class="btn btn-primary btn-md">
							Next
						</button>
					</a>
			</div>
			
		</div>
	</div>
</div><?php /**PATH D:\laragon\www\vancework-hris\resources\views/admin/201/steps/atm.blade.php ENDPATH**/ ?>