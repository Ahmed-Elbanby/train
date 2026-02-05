<div class="modal-header">
	<h5 class="modal-title">{{ __('dash.Edit Category') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<form id="categoryForm" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" method="POST">
		@csrf
		@method('PUT')
		<input type="hidden" name="_method" id="form_method" value="PUT">
		<input type="hidden" name="id" id="category_id">

		<div class="row">
			<div class="mb-3 text-center">
				@php
					$photoUrl = asset('assets/img/avatar.png');
					if (isset($category) && $category->photo) {
						try {
							if (\Storage::disk('public')->exists($category->photo)) {
								$photoUrl = \Storage::url($category->photo);
							}
						} catch (\Throwable $e) {
						}
					}
				@endphp
				<div class="image-input avatar xxl rounded-4" id="photoPreview"
						style="background-image: url('{{ $photoUrl }}')">
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
					<input type="text" name="name_en" class="form-control" id="name_en" value="{{ old('name_en', isset($category) ? ($category->translate('en')->name ?? '') : '') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Name (AR)') }}</label>
					<input type="text" name="name_ar" class="form-control" id="name_ar" value="{{ old('name_ar', isset($category) ? ($category->translate('ar')->name ?? '') : '') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Parent Category') }}</label>
					<select name="parent_category" class="form-select">
						<option value="">{{ __('dash.Parent Category (Optional)') }}</option>
						@foreach($parentCategories as $category)
							<option value="{{ $category->id }}" {{ old('parent_category') == $category->id ? 'selected' : '' }}>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dash.Close') }}</button>
	<button type="button" class="btn btn-primary" id="updateCategoryBtn">{{ __('dash.Update') }}</button>
</div>