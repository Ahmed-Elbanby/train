<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nami Soft Task </title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-4">
    <h1 class="mb-4">Nami Soft Task </h1>

    <!-- Controls -->
    <div class="row g-3 align-items-center mb-4">
      <div class="col-sm-6 col-md-4">
        <label for="tableSelect" class="form-label">Choose Project to display</label>
        <select id="tableSelect" class="form-select" aria-label="Select table">
          <option value="" selected>Choose</option>
          <option value="all" selected>All Projects</option>
          @foreach ($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-auto">
        <label class="form-label d-block mb-1">&nbsp;</label>
        <button class="btn btn-primary">Apply</button>
      </div>

      <div class="col-12 col-md-4 align-self-end">
        <small class="text-muted">Tip: choose a table and click <strong>Apply</strong> to show it.</small>
      </div>
    </div>

    <!-- Tables -->
    <div id="tablesContainer" class="row gy-4">
      <!-- Table 1 -->
      <div id="t1" class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <strong>Table 1 — Employees</strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>salary</th>
                    <th>hour cost</th>
                  </tr>
                </thead>
                <tbody id="table1-body">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Table 2 -->
      <div id="t2" class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <strong>Table 2 — Projects</strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Project ID</th>
                    <th>Project Name</th>
                    <th>start data</th>
                    <th>end date </th>
                    <th>total days </th>
                    <th>total employees </th>
                    <th>total project cost </th>
                  </tr>
                </thead>
                <tbody id="table2-body">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Table 3 -->
      <div id="t3" class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <strong>Table 3 — Time Logs</strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-sm mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Project</th>
                    <th>Hours</th>
                    <th>medul</th>
                  </tr>
                </thead>
                <tbody id="table3-body">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div id="t4" class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <strong>Table 4 — moduls </strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-sm mb-0">
                <thead class="table-light">
                  <tr>
                    <th>modul name</th>
                    <th>Project</th>
                    <th>Hours</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Website Redesign</td>
                    <td>test</td>
                    <td>6.5</td>
                  </tr>
                  <tr>
                    <td>API Stabilization</td>
                    <td>Design</td>
                    <td>7.0</td>
                  </tr>
                  <tr>
                    <td>Testing</td>
                    <td>Mobile App</td>
                    <td>6.5</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div id="t5" class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <strong>Table 4 — logs </strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-sm mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Employee</th>
                    <th>2025-10-01</th>
                    <th>2025-10-02</th>
                    <th>2025-10-05</th>
                    <th>2025-10-07</th>
                    <th>2025-10-20</th>
                    <th>2025-10-30</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Alice</td>
                    <td>6</td>
                    <td>5</td>
                    <td>3</td>
                    <td>5</td>
                    <td>1</td>
                    <td>6</td>
                  </tr>
                  <tr>
                    <td>Bob</td>
                    <td>3</td>
                    <td>1</td>
                    <td>3</td>
                    <td>5</td>
                    <td>2</td>
                    <td>8</td>
                  </tr>
                  <tr>
                    <td>Carol</td>
                    <td>3</td>
                    <td>2</td>
                    <td>3</td>
                    <td>7</td>
                    <td>2</td>
                    <td>5</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>

    <!-- small footer -->
    <footer class="mt-4">
      <small class="text-muted">Example layout — Bootstrap 5</small>
    </footer>
  </div>

  <!-- Bootstrap JS (requires Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script>
    function loadTable1() {
      $.ajax({
        url: '{{ route("tasks.getT1Data") }}', // ensure you have named the route
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          let html = '';
          response.data.forEach(function (item) {
            html += `<tr>
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.salary}</td>
            <td>${item.hour_cost}</td>
          </tr>`;
          });
          $('#table1-body').html(html);
        }
      });
    }

    function loadTable2(projectId = 'all') {
      $.ajax({
        url: '{{ route("tasks.getT2Data") }}',
        method: 'POST',
        data: {
          project_id: projectId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          let html = '';
          response.data.forEach(function (item) {
            html += `<tr>
            <td>${item.project_id}</td>
            <td>${item.project_name}</td>
            <td>${item.start_date}</td>
            <td>${item.end_date}</td>
            <td>${item.total_days}</td>
            <td>${item.total_employees}</td>
            <td>${item.total_cost}</td>
          </tr>`;
          });
          $('#table2-body').html(html);
        }
      });
    }

    function loadTable3(projectId = 'all') {
      $.ajax({
        url: '{{ route("tasks.getT3Data") }}',
        method: 'POST',
        data: {
          project_id: projectId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          let html = '';
          response.data.forEach(function (item) {
            html += `<tr>
                    <td>${item.date}</td>
                    <td>${item.employee}</td>
                    <td>${item.project}</td>
                    <td>${item.hours}</td>
                    <td>${item.modul}</td>
                </tr>`;
          });
          $('#table3-body').html(html);
        },
        error: function (xhr) {
          console.error('Table 3 error:', xhr.responseText);
          alert('Failed to load time logs.');
        }
      });
    }

    $(document).ready(function () {

      loadTable1();

      loadTable2('all');

      loadTable3('all');

      // Apply filter button
      $('.btn-primary').click(function () {
        var selectedProject = $('#tableSelect').val();
        loadTable2(selectedProject);
        loadTable3(selectedProject);
      });

    });
  </script>
</body>

</html>