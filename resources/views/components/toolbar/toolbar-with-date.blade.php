<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
          <div class="col">
            <ol class="breadcrumb bg-transparent mb-0">
              <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col">
            <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, {{ auth('admin')->user()->name }}</h1>
            <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
          </div>
          <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">

            <div class="input-group">
              <input class="form-control" type="text" name="daterange">
              <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i
                  class="fa fa-envelope"></i></button>
              <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Download Reports"><i
                  class="fa fa-download"></i></button>
              <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i
                  class="fa fa-file-pdf-o"></i></button>
              <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i
                  class="fa fa-share-alt"></i></button>
            </div>

            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script src="{{ asset('assets/js/bundle/daterangepicker.bundle.js') }}"></script>

            <script>
              // date range picker
              $(function () {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function (start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              })
            </script>
          </div>
        </div>
      </div>
    </div>