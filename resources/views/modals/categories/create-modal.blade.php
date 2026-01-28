<div class="modal-header">
	<h5 class="modal-title">{{ __('dash.Create Category') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<form id="categoryForm" action="{{ route('categories.store') }}" enctype="multipart/form-data" method="POST">
		@csrf
		<input type="hidden" name="_method" id="form_method" value="POST">

		<div class="row">
			<div class="mb-3 text-center">
				<div class="image-input avatar xxl rounded-4" id="photoPreview"
					style="background-image: url('{{ asset('assets/img/avatar.png') }}')">
					<div class="avatar-wrapper rounded-4"></div>
					<div class="file-input">
						<input type="file" class="form-control" name="photo" id="photo">
						<label for="photo" class="fa fa-pencil shadow"></label>
					</div>
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Name (EN)') }}</label>
					<input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Name (AR)') }}</label>
					<input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>
	</form>
</div>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dash.Close') }}</button>
	<button type="button" class="btn btn-primary" id="saveCategoryBtn">{{ __('dash.Save') }}</button>
</div>