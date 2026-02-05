<div class="modal-header">
	<h5 class="modal-title">{{ __('dash.Create Product') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<form id="productForm" action="{{ route('admins.products.store') }}" method="POST">
		@csrf
		<input type="hidden" name="_method" id="form_method" value="POST">

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

		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Category') }}</label>
					<select name="category_id" id="parentCategorySelect" class="form-control required" data-get-subcategories-url="{{ route('categories.subcategories', ['category' => ':category']) }}">
						<option value="">-</option>
						@foreach($parentCategories as $cat)
							<option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
								{{ $cat->translate('en')->name ?? $cat->id }}
							</option>
						@endforeach
					</select>
					<div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Sub Category') }}</label>
					<select name="sub_category_id" id="subCategorySelect" class="form-control" disabled>
						<option value="">Choose Parent Category First</option>
					</select>
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>

		<div class="mb-3">
			<label class="form-label">{{ __('dash.Details (EN)') }}</label>
			<textarea name="details_en" class="form-control" rows="3">{{ old('details_en') }}</textarea>
			<div class="invalid-feedback"></div>
		</div>

		<div class="mb-3">
			<label class="form-label">{{ __('dash.Details (AR)') }}</label>
			<textarea name="details_ar" class="form-control" rows="3">{{ old('details_ar') }}</textarea>
			<div class="invalid-feedback"></div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Price') }}</label>
					<input type="number" step="0.01" min="0" name="price" class="form-control"
						value="{{ old('price') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="mb-3 col-md-2">
					<label class="form-label d-block sr-only">{{ __('dash.Has Offer') }}</label>
					<input type="hidden" name="has_offer" value="0" />
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" id="hasOfferCheckbox" name="has_offer" value="1"
							{{ old('has_offer') ? 'checked' : '' }}>
						<label class="form-check-label" for="hasOfferCheckbox">{{ __('dash.Has Offer') }}</label>
					</div>
					<div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="mb-3" id="offerFields" style="display:none;">
					<label class="form-label">{{ __('dash.Offer Type') }}</label>
					<select name="offer_type" class="form-control">
						<option value="">-</option>
						<option value="percent">{{ __('dash.Percent') }}</option>
						<option value="value">{{ __('dash.Value') }}</option>
					</select>
					<div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="mb-3 col-md-8" id="offerFieldsSection" style="display:none;">
				<label class="form-label">{{ __('dash.Offer Amount') }}</label>
				<input type="number" step="0.01" name="offer_amount" class="form-control"
					value="{{ old('offer_amount') }}" />
				<div class="invalid-feedback"></div>
			</div>
		</div>

		<div id="finalPriceSection" style="display:none;" class="mt-3">
			<strong>{{ __('dash.Final Price') }}: </strong>
			<span id="finalPriceDisplay">-</span>
		</div>

	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dash.Close') }}</button>
	<button type="button" class="btn btn-primary" id="saveProductBtn">{{ __('dash.Save') }}</button>
</div>