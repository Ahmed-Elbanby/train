@extends('layouts.app')

@section('title', __('dash.Categories'))

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('dash.Categories') }}</h3>
    <button class="btn btn-primary" data-modal="{{ route('categories.create-modal') }}" id="createCategoryBtn">{{ __('dash.Create Category') }}</button>
  </div>

  <table class="table table-striped" id="categories-table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ __('dash.Photo') }}</th>
        <th>{{ __('dash.Name (EN)') }}</th>
        <th>{{ __('dash.Name (AR)') }}</th>
        <th>{{ __('dash.Actions') }}</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Content -->
    </div>
  </div>
</div>

@push('scripts')
<script>
  const Categories_DATA_URL = "{{ route('categories.data') }}";
  const Categories_STORE_URL = "{{ route('categories.store') }}";
  const Categories_BASE_URL = "{{ url(app()->getLocale() . '/admins/categories') }}";
</script>
<script src="{{ asset('assets/js/admin-categories.js') }}"></script>
@endpush

@endsection
