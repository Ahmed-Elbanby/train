<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nami Soft Task </title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    .collapse-row>td {
      border-top: none;
      border-bottom: 1px solid #dee2e6;
    }

    .table thead th {
      background-color: #f8f9fa;
    }

    #table5-thead th {
      min-width: 100px !important;
    }
  </style>
</head>

<body>
  <div class="container py-4">
    <h1 class="mb-4">Nami Soft Task </h1>

    <!-- Controls -->
    <div class="row g-3 align-items-center mb-4">
      <div class="col-sm-6 col-md-4">
        <label for="tableSelect" class="form-label">Choose Project to display</label>
        <select id="tableSelect" class="form-select" aria-label="Select table">
          <option value="all" selected>All Projects</option>
          @foreach ($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-auto">
        <label class="form-label d-block mb-1">&nbsp;</label>
        <button class="btn btn-primary" id="applyFilter">Apply</button>
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

      <!-- Table 4 -->
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
                <tbody id="table4-body">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div id="t5" class="col-12">
        <div class="card shadow-sm">
          <div class="card-header">
            <strong>Table 5 — logs </strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-sm mb-0">
                <thead class="table-light" id="table5-thead">

                </thead>
                <tbody id="table5-body">

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
    function loadTable1(projectId = 'all') {
      $.ajax({
        url: '{{ route("tasks.getT1Data") }}', // ensure you have named the route
        method: 'POST',
        data: {
          project_id: projectId,
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
          // 1. Group work logs by date
          const groups = {};
          response.data.forEach(item => {
            if (!groups[item.date]) groups[item.date] = [];
            groups[item.date].push(item);
          });

          let html = '';

          // 2. Loop through each date (sorted oldest first)
          Object.keys(groups).sort().forEach(date => {
            const logs = groups[date];

            // ▶ Date row – click to toggle details
            html += `<tr class="date-row" data-date="${date}">
                    <td colspan="5">
                        <span style="cursor: pointer;">
                            <span class="toggle-icon">▶</span>
                            <strong>${date}</strong>
                            <span class="badge bg-secondary">${logs.length} entries</span>
                        </span>
                    </td>
                </tr>`;

            // ▼ Detail rows – initially hidden
            logs.forEach(log => {
              html += `<tr class="detail-${date}" style="display: none;">
                        <td></td>  <!-- empty to keep alignment -->
                        <td>${log.employee}</td>
                        <td>${log.project}</td>
                        <td>${log.hours}</td>
                        <td>${log.modul}</td>
                    </tr>`;
            });
          });

          $('#table3-body').html(html);

          // 3. Click on date row toggles its details + icon
          $('.date-row').on('click', function () {
            const date = $(this).data('date');
            $(`.detail-${date}`).toggle();   // show/hide details
            const icon = $(this).find('.toggle-icon');
            icon.text(icon.text() === '▶' ? '▼' : '▶');
          });
        },
        error: function (xhr) {
          console.error('Table 3 error:', xhr.responseText);
          alert('Failed to load time logs.');
        }
      });

    }
    function loadTable4(projectId = 'all') {
      $.ajax({
        url: '{{ route("tasks.getT4Data") }}',
        method: 'POST',
        data: {
          project_id: projectId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          let html = '';
          response.data.forEach(function (item) {
            html += `<tr>
                  <td>${item.modul_name}</td>
                  <td>${item.project_name}</td>
                  <td>${item.hours}</td>
              </tr>`;
          });
          $('#table4-body').html(html);
        },
        error: function (xhr) {
          console.error('Table 4 error:', xhr.responseText);
          alert('Failed to load module data.');
        }
      });
    }

    function loadTable5(projectId = 'all') {
      $.ajax({
        url: '{{ route("tasks.getT5Data") }}',
        method: 'POST',
        data: {
          project_id: projectId,
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {

          var theadHtml = '<tr><th>Employee</th>';
          for (var c = 0; c < response.dates.length; c++) {
            theadHtml += '<th>' + response.dates[c] + '</th>';
          }
          theadHtml += '</tr>';
          $('#table5-thead').html(theadHtml);

          var tbodyHtml = '';
          for (var r = 0; r < response.rows.length; r++) {
            var row = response.rows[r];
            tbodyHtml += '<tr>';
            tbodyHtml += '<td>' + row.employee + '</td>';
            for (var d = 0; d < response.dates.length; d++) {
              var date = response.dates[d];
              tbodyHtml += '<td>' + row[date] + '</td>';
            }
            tbodyHtml += '</tr>';
          }
          $('#table5-body').html(tbodyHtml);
        },
        error: function (xhr) {
          console.error('Table 5 error:', xhr.responseText);
          alert('Failed to load work logs.');
        }
      });
    }

    $(document).ready(function () {

      loadTable1('all');

      loadTable2('all');

      loadTable3('all');

      loadTable4('all');

      loadTable5('all');

      // Apply filter button
      $('#applyFilter').click(function () {
        const selectedProject = $('#tableSelect').val();
        loadTable1(selectedProject);
        loadTable2(selectedProject);
        loadTable3(selectedProject);
        loadTable4(selectedProject);
        loadTable5(selectedProject);
      });

    });
  </script>
</body>

</html>