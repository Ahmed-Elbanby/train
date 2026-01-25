@extends('layouts.app')

@section('title', __('dash.Products'))

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('dash.Products') }}</h3>
    <button class="btn btn-primary" id="createProductBtn">{{ __('dash.Create Product') }}</button>
  </div>

  <table class="table table-striped" id="products-table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ __('dash.Name (EN)') }}</th>
        <th>{{ __('dash.Name (AR)') }}</th>
        <th>{{ __('dash.Price') }}</th>
        <th>{{ __('dash.Has Offer') }}</th>
        <th>{{ __('dash.Actions') }}</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="productForm">
          <input type="hidden" name="_method" id="form_method" value="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">{{ __('dash.Name (EN)') }}</label>
                <input type="text" name="name_en" class="form-control" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">{{ __('dash.Name (AR)') }}</label>
                <input type="text" name="name_ar" class="form-control" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">{{ __('dash.Details (EN)') }}</label>
            <textarea name="details_en" class="form-control" rows="3"></textarea>
            <div class="invalid-feedback"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">{{ __('dash.Details (AR)') }}</label>
            <textarea name="details_ar" class="form-control" rows="3"></textarea>
            <div class="invalid-feedback"></div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label">{{ __('dash.Price') }}</label>
                <input type="number" step="0.01" name="price" class="form-control" />
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label">{{ __('dash.Price') }}</label>
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="mb-3 col-md-2">
                <label class="form-label d-block sr-only">{{ __('dash.Has Offer') }}</label>
                <input type="hidden" name="has_offer" value="0" />
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="hasOfferCheckbox">
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
              <input type="number" step="0.01" name="offer_amount" class="form-control" />
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
    </div>
  </div>
</div>

@push('scripts')
<script>
  const PRODUCTS_DATA_URL = "{{ route('admins.products.data') }}";
  const PRODUCTS_STORE_URL = "{{ route('admins.products.store') }}";
  const PRODUCTS_BASE_URL = "{{ url(app()->getLocale() . '/admins/products') }}";
</script>
<script src="{{ asset('assets/js/admin-products.js') }}"></script>
@endpush

@endsection
