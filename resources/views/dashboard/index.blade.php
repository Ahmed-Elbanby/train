@extends('layouts.app')

@section('title', __('dash.dashboard'))

@section('content')

  <!-- Body Start -->
  <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
      <div class="row g-3 row-deck">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg" width="26"
                fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-muted"
                  d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                <path class="fill-primary"
                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              </svg>
              <div class="mb-2 text-uppercase">{{ __('dash.new_employee') }}</div>
              <div><span class="h4">51</span> <span class="small text-muted"><i class="fa fa-level-up"></i> 13%</span>
              </div>
              <small class="text-muted">{{ __('dash.analytics_for_last_week') }}</small>
            </div>
            <div class="progress" style="height: 4px;">
              <div class="progress-bar bg-secondary" role="progressbar" style="width: 85%" aria-valuenow="85"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <svg class="{{ app()->getLocale() === 'ar' ? 'position-absolute top-0 start-0 mt-4 ms-3' : 'position-absolute top-0 end-0 mt-4 me-3' }}" xmlns="http://www.w3.org/2000/svg" width="26"
                fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-muted"
                  d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                <path class="fill-primary"
                  d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
              </svg>
              <div class="mb-2 text-uppercase">{{ __('dash.expense') }}</div>
              <div><span class="h4">$3,251</span> <span class="small text-muted"><i class="fa fa-level-up"></i>
                  13%</span></div>
              <small class="text-muted">{{ __('dash.analytics_for_last_week') }}</small>
            </div>
            <div class="progress" style="height: 4px;">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 13%" aria-valuenow="13"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg" width="26"
                fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-primary" fill-rule="evenodd"
                  d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                <path class="fill-primary"
                  d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                <path class="fill-muted"
                  d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                <path class="fill-muted" d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
              </svg>
              <div class="mb-2 text-uppercase">{{ __('dash.revenue') }}</div>
              <div><span class="h4">$18,925</span> <span class="small text-muted"><i class="fa fa-level-up"></i>
                  78%</span></div>
              <small class="text-muted">{{ __('dash.analytics_for_last_week') }}</small>
            </div>
            <div class="progress" style="height: 4px;">
              <div class="progress-bar bg-secondary" role="progressbar" style="width: 78%" aria-valuenow="78"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card overflow-hidden">
            <div class="card-body">
              <svg class="position-absolute top-0 end-0 mt-4 me-3" xmlns="http://www.w3.org/2000/svg" width="26"
                fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-muted"
                  d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                <path class="fill-primary"
                  d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
              </svg>
              <div class="mb-2 text-uppercase">{{ __('dash.new_leads') }}</div>
              <div><span class="h4">125</span> <span class="small text-muted"><i class="fa fa-level-up"></i>
                  55%</span></div>
              <small class="text-muted">{{ __('dash.analytics_for_last_week') }}</small>
            </div>
            <div class="progress" style="height: 4px;">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="78"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12">
          <div class="card text-center bg-primary-gradient">
            <div class="card-body d-flex align-items-center justify-content-center">
              <div>
                <h4 class="mt-4">{{ __('dash.welcome_back') }}</h4>
                <p class="card-text fs-6 mb-5"><strong>{{ __('dash.need_help') }}</strong> {{ __('dash.help_description') }}</p>
                <a class="btn btn-lg bg-white text-uppercase px-4 lift" href="./docs/index.html" title="">{{ __('dash.visit_documentation') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-6 col-xl-8 col-lg-8">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title m-0">{{ __('dash.luno_revenue') }}</h6>

              <div class="dropdown morphing scale-left">
                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                    class="icon-size-fullscreen"></i></a>
                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2">
                  <li><a class="dropdown-item" href="#">{{ __('dash.file_info') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.copy_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.move_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.rename') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.block') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div id="apex-AudienceOverview"></div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">{{ __('dash.sales_by_category') }}</h6>

              <div class="dropdown morphing scale-left">
                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                    class="icon-size-fullscreen"></i></a>
                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2">
                  <li><a class="dropdown-item" href="#">{{ __('dash.file_info') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.copy_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.move_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.rename') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.block') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div id="apex-SalesbyCategory"></div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">{{ __('dash.my_wallet') }}</h6>

              <div class="dropdown morphing scale-left">
                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                    class="icon-size-fullscreen"></i></a>
                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2">
                  <li><a class="dropdown-item" href="#">{{ __('dash.file_info') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.copy_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.move_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.rename') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.block') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div>{{ __('dash.available_btc') }} <a href="crypto/index.html">{{ __('dash.view_account') }}</a></div>
              <h3>0.0386245 BTC</h3>
              <div class="py-4">
                <div class="text-uppercase text-muted small">{{ __('dash.buy_this_month') }}</div>
                <h5>3.0675432 BTC</h5>
                <div class="mt-3 text-uppercase text-muted small">{{ __('dash.sell_this_month') }}</div>
                <h5>2.0345618 BTC</h5>
              </div>
              <div class="btn-group d-flex">
                <input type="radio" class="btn-check" name="gm-btnradio" id="gm-btnradio1" checked="">
                <label class="btn btn-outline-secondary" for="gm-btnradio1">{{ __('dash.buy') }}</label>
                <input type="radio" class="btn-check" name="gm-btnradio" id="gm-btnradio2">
                <label class="btn btn-outline-secondary" for="gm-btnradio2">{{ __('dash.sell') }}</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">{{ __('dash.downloads') }}</h6>

              <div class="dropdown morphing scale-left">
                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                    class="icon-size-fullscreen"></i></a>
                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2">
                  <li><a class="dropdown-item" href="#">{{ __('dash.file_info') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.copy_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.move_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.rename') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.block') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li class="d-flex py-2 mb-2">
                  <div class="avatar rounded no-thumbnail"><i class="fa fa-file-zip-o fa-lg"></i></div>
                  <div class="flex-fill ms-3">
                    <span>LUNO_admin.zip</span>
                    <div class="progress mt-2" style="height: 5px;">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 44%;" aria-valuenow="44"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
                <li class="d-flex py-2 mb-2">
                  <div class="avatar rounded no-thumbnail"><i class="fa fa-file-pdf-o fa-lg"></i></div>
                  <div class="flex-fill ms-3">
                    <span>reposrt_2020.pdf</span>
                    <div class="progress mt-2" style="height: 5px;">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
                <li class="d-flex py-2 mb-2">
                  <div class="avatar rounded no-thumbnail"><i class="fa fa-file-code-o fa-lg"></i></div>
                  <div class="flex-fill ms-3">
                    <span>package.json</span>
                    <div class="progress mt-2" style="height: 5px;">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 10%;" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
                <li class="d-flex py-2 mb-2">
                  <div class="avatar rounded no-thumbnail"><i class="fa fa-file-code-o fa-lg"></i></div>
                  <div class="flex-fill ms-3">
                    <span>bootstrap.min.css</span>
                    <div class="progress mt-2" style="height: 5px;">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 89%;" aria-valuenow="89"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
              </ul>
              <small class="text-muted">{{ __('dash.showing_downloads') }}</small>
            </div>
          </div>
        </div>
        <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title m-0">{{ __('dash.reports_overview') }}</h6>

              <div class="dropdown morphing scale-left">
                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                    class="icon-size-fullscreen"></i></a>
                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-h"></i></a>
                <ul class="dropdown-menu shadow border-0 p-2">
                  <li><a class="dropdown-item" href="#">{{ __('dash.file_info') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.copy_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.move_to') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.rename') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.block') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <h3>$7,431.14 USD</h3>

              <div class="progress rounded-pill mb-2" style="height: 5px;">
                <div class="progress-bar chart-color1" role="progressbar" style="width: 15%" aria-valuenow="15"
                  aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar chart-color2" role="progressbar" style="width: 30%" aria-valuenow="30"
                  aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar chart-color3" role="progressbar" style="width: 20%" aria-valuenow="20"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex justify-content-between">
                <span>0%</span>
                <span>100%</span>
              </div>
            </div>
            <div class="table-responsive border-top">
              <table class="table card-table table-nowrap mb-0">
                <tbody>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color1"></i>{{ __('dash.gross_value') }}</td>
                    <td>$3,500.71</td>
                    <td><span class="badge bg-success">+12.1%</span></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color2"></i>{{ __('dash.net_volume_from_sales') }}</td>
                    <td>$2,980.45</td>
                    <td><span class="badge bg-warning">+6.9%</span></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle me-2 chart-text-color3"></i>{{ __('dash.new_volume_from_sales') }}</td>
                    <td>$950.00</td>
                    <td><span class="badge bg-danger">-1.5%</span></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-circle me-2"></i>{{ __('dash.other') }}</td>
                    <td>32</td>
                    <td><span class="badge bg-success">1.9%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection