<div class="modal-header">
	<h5 class="modal-title">{{ __('dash.Edit Product') }}</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<form id="productForm" action="{{ isset($product) ? route('admins.products.update', $product->id) : '#' }}" method="POST">
		@csrf
		@if(isset($product))
		<input type="hidden" name="_method" id="form_method" value="PUT">
		@else
		<input type="hidden" name="_method" id="form_method" value="POST">
		@endif

		<div class="row">
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Name (EN)') }}</label>
					<input type="text" name="name_en" class="form-control" value="{{ old('name_en', isset($product) ? ($product->translate('en')->name ?? '') : '') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Name (AR)') }}</label>
					<input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', isset($product) ? ($product->translate('ar')->name ?? '') : '') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>
		</div>

		<div class="mb-3">
			<label class="form-label">{{ __('dash.Category') }}</label>
			<select name="category_id" class="form-control">
				<option value="">-</option>
				@foreach(\App\Models\Category::all() as $cat)
					<option value="{{ $cat->id }}" {{ (old('category_id', isset($product) ? $product->category_id : '') == $cat->id) ? 'selected' : '' }}>{{ $cat->translate('en')->name ?? $cat->id }}</option>
				@endforeach
			</select>
			<div class="invalid-feedback"></div>
		</div>

		<div class="mb-3">
			<label class="form-label">{{ __('dash.Details (EN)') }}</label>
			<textarea name="details_en" class="form-control" rows="3">{{ old('details_en', isset($product) ? ($product->translate('en')->details ?? '') : '') }}</textarea>
			<div class="invalid-feedback"></div>
		</div>

		<div class="mb-3">
			<label class="form-label">{{ __('dash.Details (AR)') }}</label>
			<textarea name="details_ar" class="form-control" rows="3">{{ old('details_ar', isset($product) ? ($product->translate('ar')->details ?? '') : '') }}</textarea>
			<div class="invalid-feedback"></div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="mb-3">
					<label class="form-label">{{ __('dash.Price') }}</label>
					<input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', isset($product) ? $product->price : '') }}" />
					<div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="mb-3 col-md-2">
					<label class="form-label d-block sr-only">{{ __('dash.Has Offer') }}</label>
					<input type="hidden" name="has_offer" value="0" />
					<div class="form-check form-switch">
						<input class="form-check-input" type="checkbox" id="hasOfferCheckbox" name="has_offer" value="1" {{ old('has_offer', isset($product) && $product->has_offer ? '1' : '') ? 'checked' : '' }}>
						<label class="form-check-label" for="hasOfferCheckboxEdit">{{ __('dash.Has Offer') }}</label>
					</div>
					<div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-md-4">
				@php
					$hasOfferOld = old('has_offer', isset($product) ? $product->has_offer : false);
				@endphp
				<div class="mb-3" id="offerFields" style="{{ $hasOfferOld ? '' : 'display:none;' }}">
					<label class="form-label">{{ __('dash.Offer Type') }}</label>
					<select name="offer_type" class="form-control">
						<option value="">-</option>
						<option value="percent" {{ old('offer_type', isset($product) ? $product->offer_type : '') == 'percent' ? 'selected' : '' }}>{{ __('dash.Percent') }}</option>
						<option value="value" {{ old('offer_type', isset($product) ? $product->offer_type : '') == 'value' ? 'selected' : '' }}>{{ __('dash.Value') }}</option>
					</select>
					<div class="invalid-feedback"></div>
				</div>
			</div>
			<div class="mb-3 col-md-8" id="offerFieldsSection" style="{{ $hasOfferOld ? '' : 'display:none;' }}">
				<label class="form-label">{{ __('dash.Offer Amount') }}</label>
				<input type="number" step="0.01" name="offer_amount" class="form-control" value="{{ old('offer_amount', isset($product) ? $product->offer_amount : '') }}" />
				<div class="invalid-feedback"></div>
			</div>
		</div>

				@php
					$finalPrice = '-';
					$priceVal = old('price', isset($product) ? $product->price : null);
					$offerType = old('offer_type', isset($product) ? $product->offer_type : null);
					$offerAmount = old('offer_amount', isset($product) ? $product->offer_amount : null);
					if ($hasOfferOld && is_numeric($priceVal) && is_numeric($offerAmount)) {
						if ($offerType === 'percent') {
							$finalPrice = number_format($priceVal - ($priceVal * ($offerAmount / 100)), 2, '.', '');
						} else {
							$finalPrice = number_format($priceVal - $offerAmount, 2, '.', '');
						}
					}
				@endphp
				<div id="finalPriceSection" style="{{ $hasOfferOld ? '' : 'display:none;' }}" class="mt-3">
			  <strong>{{ __('dash.Final Price') }}: </strong>
			  <span id="finalPriceDisplay">{{ $finalPrice }}</span>
		</div>

	</form>
</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dash.Close') }}</button>
		<button type="button" class="btn btn-primary" id="saveProductBtn">{{ __('dash.Save') }}</button>
	</div>
