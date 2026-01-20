<div class="modal fade" id="CreateNew" tabindex="-1">
  <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('dash.setup_new_project') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="progress bg-transparent" style="height: 3px;">
        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5"
          style="width: 20%;"></div>
      </div>
      <div class="modal-body custom_scroll">
        <ul class="nav nav-tabs tab-card border-0 fs-6" role="tablist">
          <li class="nav-item flex-fill text-center"><a class="nav-link active" href="#step1" data-bs-toggle="tab"
              data-bs-step="1">1. {{ __('dash.project') }}</a></li>
          <li class="nav-item flex-fill text-center"><a class="nav-link" href="#step2" data-bs-toggle="tab"
              data-bs-step="3">2. {{ __('dash.team') }}</a></li>
          <li class="nav-item flex-fill text-center"><a class="nav-link" href="#step3" data-bs-toggle="tab"
              data-bs-step="4">3. {{ __('dash.file') }}</a></li>
          <li class="nav-item flex-fill text-center"><a class="nav-link" href="#step4" data-bs-toggle="tab"
              data-bs-step="5">4. {{ __('dash.completed') }}</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="step1">
            <div class="card mb-2">
              <div class="card-body">
                <h6 class="card-title mb-1">{{ __('dash.project_type') }}</h6>
                <p class="text-muted small">{{ __('dash.project_type_info') }} <a href="#">{{ __('dash.faq_page') }}</a>
                </p>
                <div class="c_radio d-flex flex-md-wrap">
                  <label class="m-1 w-100" for="Personal">
                    <input type="radio" name="plan" id="Personal" checked />
                    <span class="card">
                      <span class="card-body d-flex p-3">
                        <svg class="avatar" viewBox="0 0 16 16">
                          <path class="fill-muted"
                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <span class="ms-3">
                          <span class="h6 d-flex mb-1">{{ __('dash.personal_project') }}</span>
                          <span class="text-muted">{{ __('dash.personal_project_desc') }}</span>
                        </span>
                      </span>
                    </span>
                  </label>
                  <label class="m-1 w-100" for="Team">
                    <input type="radio" name="plan" id="Team" />
                    <span class="card">
                      <span class="card-body d-flex p-3">
                        <svg class="avatar" viewBox="0 0 16 16">
                          <path class="fill-muted"
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                          <path class="fill-muted" fill-rule="evenodd"
                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                          <path class="fill-muted" d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        <span class="ms-3">
                          <span class="h6 d-flex mb-1">{{ __('dash.team_project') }}</span>
                          <span class="text-muted">{{ __('dash.team_project_desc') }}</span>
                        </span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <div class="card mb-2">
              <div class="card-body">
                <h6 class="card-title mb-1">{{ __('dash.project_details') }}</h6>
                <p class="text-muted small">{{ __('dash.project_details_info') }}</p>
                <div class="form-floating mb-2">
                  <select class="form-select">
                    <option value="1">{{ __('dash.lucid') }}</option>
                    <option selected>{{ __('dash.luno') }}</option>
                    <option value="3">{{ __('dash.luno') }}</option>
                  </select>
                  <label>{{ __('dash.choose_customer') }} *</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="text" class="form-control" placeholder="{{ __('dash.project_name_placeholder') }}">
                  <label>{{ __('dash.project_name') }} *</label>
                </div>
                <div class="form-floating mb-2">
                  <textarea class="form-control" placeholder="{{ __('dash.add_project_details_placeholder') }}"
                    style="height: 100px"></textarea>
                  <label>{{ __('dash.add_project_details') }}</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="date" class="form-control">
                  <label>{{ __('dash.enter_release_date') }} *</label>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="text-muted">{{ __('dash.allow_notifications') }} *</div>
                  <div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="allow_phone" value="option1">
                      <label class="form-check-label" for="allow_phone">{{ __('dash.phone') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="allow_email" value="option2">
                      <label class="form-check-label" for="allow_email">{{ __('dash.email') }}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button
                class="btn btn-lg bg-secondary text-light next text-uppercase">{{ __('dash.add_people') }}</button>
            </div>
          </div>
          <div class="tab-pane fade" id="step2">
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-1">{{ __('dash.build_team') }}</h6>
                <p class="text-muted small">{{ __('dash.build_team_info') }} <a
                    href="#">{{ __('dash.project_guidelines') }}</a>
                </p>
                <div class="form-floating mb-4">
                  <input type="text" class="form-control" placeholder="{{ __('dash.invite_teammates_placeholder') }}">
                  <label>{{ __('dash.invite_teammates') }}</label>
                </div>
                <h6 class="card-title mb-1">{{ __('dash.team_members') }}</h6>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="list-group6" checked="">
                  <label class="form-check-label text-muted"
                    for="list-group6">{{ __('dash.adding_users_by_team') }}</label>
                </div>
              </div>
              <ul class="list-group list-group-flush list-group-custom custom_scroll mb-0" style="height: 300px;">
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.chris_fox') }}</div>
                    <small class="text-muted">{{ __('dash.angular_developer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.joge_lucky') }}</div>
                    <small class="text-muted">{{ __('dash.reactjs_developer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar3.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.nodejs_developer') }}</div>
                    <small class="text-muted">{{ __('dash.nodejs_developer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar4.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.sr_designer') }}</div>
                    <small class="text-muted">{{ __('dash.sr_designer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar5.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.designer') }}</div>
                    <small class="text-muted">{{ __('dash.designer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar6.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.frontend_developer') }}</div>
                    <small class="text-muted">{{ __('dash.frontend_developer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar7.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.qa') }}</div>
                    <small class="text-muted">{{ __('dash.qa') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
                <li class="list-group-item d-flex align-items-center">
                  <img class="avatar rounded" src="{{ asset('assets/img/xs/avatar8.jpg') }}" alt="">
                  <div class="flex-fill ms-2">
                    <div class="h6 mb-0">{{ __('dash.laravel_developer') }}</div>
                    <small class="text-muted">{{ __('dash.laravel_developer') }}</small>
                  </div>
                  <select class="form-select rounded-pill form-select-sm w120">
                    <option value="1">{{ __('dash.owner') }}</option>
                    <option value="2">{{ __('dash.can_edit') }}</option>
                    <option value="3">{{ __('dash.guest') }}</option>
                  </select>
                </li>
              </ul>
            </div>
            <div class="text-center">
              <button
                class="btn btn-lg bg-secondary text-light next text-uppercase">{{ __('dash.select_files') }}</button>
            </div>
          </div>
          <div class="tab-pane fade" id="step3">
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-1">{{ __('dash.upload_files') }}</h6>
                <div class="mb-4">
                  <label class="form-label small">{{ __('dash.upload_up_to_10_files') }}</label>
                  <input class="form-control" type="file" multiple>
                </div>
                <span>{{ __('dash.already_uploaded_file') }}</span>
              </div>
              <ul class="list-group list-group-flush list-group-custom custom_scroll mb-0" style="height: 300px;">
                <li class="list-group-item py-3">
                  <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-pdf-o text-danger"></i></div>
                    <div class="flex-fill ms-3 text-truncate">
                      <p class="mb-0 color-800">{{ __('dash.annual_sales_report') }}</p>
                      <small class="text-muted">.pdf, 5.3 MB</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item py-3">
                  <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-excel-o text-success"></i></div>
                    <div class="flex-fill ms-3 text-truncate">
                      <p class="mb-0 color-800">{{ __('dash.complete_product_sheet') }}</p>
                      <small class="text-muted">.xls, 2.1 MB</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item py-3">
                  <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-word-o text-info"></i></div>
                    <div class="flex-fill ms-3 text-truncate">
                      <p class="mb-0 color-800">{{ __('dash.marketing_guidelines') }}</p>
                      <small class="text-muted">.doc, 2.3 MB</small>
                    </div>
                  </div>
                </li>
                <li class="list-group-item py-3">
                  <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail"><i class="fa fa-file-zip-o"></i></div>
                    <div class="flex-fill ms-3 text-truncate">
                      <p class="mb-0 color-800">{{ __('dash.brand_photography') }}</p>
                      <small class="text-muted">.zip, 30.5 MB</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="text-center">
              <button
                class="btn btn-lg bg-secondary text-light next text-uppercase">{{ __('dash.advanced_options') }}</button>
            </div>
          </div>
          <div class="tab-pane fade" id="step4">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title mb-1">{{ __('dash.project_created') }}!</h4>
                <span class="text-muted">{{ __('dash.project_created_info') }}</span>
              </div>
              <div class="card-body">
                <button class="btn btn-lg bg-light first text-uppercase">{{ __('dash.create_new_project') }}</button>
                <button class="btn btn-lg bg-secondary text-light text-uppercase">{{ __('dash.view_project') }}</button>
              </div>
              <div class="card-body">
                <img class="img-fluid" src="{{ asset('assets/img/project-team.svg') }}" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="MynotesModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header px-4">
        <h5 class="modal-title">{{ __('dash.my_notes') }} <span class="badge bg-danger ms-2">14</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="bg-light px-4 py-3">
        <ul class="nav nav-pills nav-fill" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#Notetab-all" role="tab"
              aria-selected="true">{{ __('dash.all_notes') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Notetab-Business" role="tab"
              aria-selected="false">{{ __('dash.business') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Notetab-Social" role="tab">{{ __('dash.social') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Notetab-Create" role="tab"><i
                class="fa fa-plus me-2"></i>{{ __('dash.new') }}</a>
          </li>
        </ul>
      </div>
      <div class="modal-body px-4 custom_scroll">
        <div class="tab-content p-0">
          <div class="tab-pane fade active show" id="Notetab-all" role="tabpanel">
            <div class="card ribbon mb-2">
              <div class="option-2 bg-primary position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">02 {{ __('dash.january') }} 2021</span>
                <p class="lead">{{ __('dash.give_review_for_design') }}</p>
                <span>{{ __('dash.classical_latin_literature') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
            <div class="card ribbon mb-2">
              <div class="option-2 bg-success position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">17 {{ __('dash.january') }} 2022</span>
                <p class="lead">{{ __('dash.give_salary_to_employee') }}</p>
                <span>{{ __('dash.generated_lorem_ipsum') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
            <div class="card ribbon mb-2">
              <div class="option-2 bg-info position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">02 {{ __('dash.february') }} 2020</span>
                <p class="lead">{{ __('dash.launch_new_template') }}</p>
                <span>{{ __('dash.blandit_tempus_porttitor') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
            <div class="card ribbon mb-2">
              <div class="option-2 bg-dark position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">22 {{ __('dash.august') }} 2021</span>
                <p class="lead">{{ __('dash.nightout_with_friends') }}</p>
                <span>{{ __('dash.blandit_tempus_porttitor') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
            <div class="card ribbon mb-2">
              <div class="option-2 bg-danger position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">01 {{ __('dash.december') }} 2021</span>
                <p class="lead">{{ __('dash.change_a_design') }}</p>
                <span> {{ __('dash.survived_not_only_five_centuries') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
            <div class="card ribbon mb-2">
              <div class="option-2 bg-warning position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">10 {{ __('dash.december') }} 2021</span>
                <p class="lead">{{ __('dash.meeting_with_mr_lee') }}</p>
                <span>{{ __('dash.desktop_publishing_packages') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="Notetab-Business" role="tabpanel">
            <div class="card ribbon mb-2">
              <div class="option-2 bg-warning position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">10 {{ __('dash.december') }} 2021</span>
                <p class="lead">{{ __('dash.meeting_with_mr_lee') }}</p>
                <span>{{ __('dash.desktop_publishing_packages') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
            <div class="card ribbon mb-2">
              <div class="option-2 bg-danger position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">01 {{ __('dash.december') }} 2021</span>
                <p class="lead">{{ __('dash.change_a_design') }}</p>
                <span> {{ __('dash.survived_not_only_five_centuries') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="Notetab-Social" role="tabpanel">
            <div class="card ribbon mb-2">
              <div class="option-2 bg-dark position-absolute"></div>
              <div class="card-body">
                <span class="text-muted">22 {{ __('dash.august') }} 2021</span>
                <p class="lead">{{ __('dash.nightout_with_friends') }}</p>
                <span>{{ __('dash.blandit_tempus_porttitor') }}</span>
              </div>
              <div class="card-footer pt-0 border-0">
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-star favourite-note"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="#"><i class="fa fa-trash favourite-note"></i></a>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="Notetab-Create" role="tabpanel">
            <div class="form-floating mb-2">
              <input type="text" class="form-control" placeholder="{{ __('dash.note_title_placeholder') }}">
              <label>{{ __('dash.note_title') }}</label>
            </div>
            <div class="form-floating mb-2">
              <input type="text" class="form-control datepicker" placeholder="{{ __('dash.select_date_placeholder') }}">
              <label>{{ __('dash.select_date') }}</label>
            </div>
            <div class="form-floating mb-2">
              <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>{{ __('dash.open_this_select_menu') }}</option>
                <option value="1">{{ __('dash.business') }}</option>
                <option value="2">{{ __('dash.social') }}</option>
              </select>
              <label>{{ __('dash.works_with_selects') }}</label>
            </div>
            <div class="form-floating mb-4">
              <textarea class="form-control" placeholder="{{ __('dash.leave_comment_placeholder') }}"
                style="height: 100px"></textarea>
              <label>{{ __('dash.leave_comment') }}</label>
            </div>
            <button type="button" class="btn btn-primary lift">{{ __('dash.save_note') }}</button>
            <button type="button" class="btn btn-white border lift"
              data-bs-dismiss="modal">{{ __('dash.close') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ScheduleModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-secondary rounded-0">
        <h5 class="modal-title text-light">{{ __('dash.schedule') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body custom_scroll">
        <div class="ps-2">
          <div class="timeline-item ti-primary p-3">
            <div class="avatar sm rounded-circle no-thumbnail">
              <i class="fa fa-phone"></i>
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.call_danny_at_colbys') }}</div>
              <small class="text-muted">Today - 11:32am</small>
            </div>
          </div>
          <div class="timeline-item ti-info p-3">
            <div class="timeline-icon">
              <img class="avatar sm rounded-circle" src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="">
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.meeting_with_alice') }}</div>
              <small class="text-muted">Today - 12:50pm</small>
            </div>
          </div>
          <div class="timeline-item ti-danger p-3">
            <div class="avatar sm rounded-circle no-thumbnail">
              <i class="fa fa-comment"></i>
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.answer_annies_message') }}</div>
              <small class="text-muted">Today - 01:35pm</small>
            </div>
          </div>
          <div class="timeline-item ti-danger p-3">
            <div class="avatar sm rounded-circle no-thumbnail">
              <i class="fa fa-phone"></i>
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.send_new_campaign') }}</div>
              <small class="text-muted">Today - 02:40pm</small>
            </div>
          </div>
          <div class="timeline-item ti-primary p-3">
            <div class="avatar sm rounded-circle no-thumbnail">
              <i class="fa fa-smile-o"></i>
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.project_review') }}</div>
              <small class="text-muted">Today - 03:15pm</small>
            </div>
          </div>
          <div class="timeline-item ti-warning p-3">
            <div class="avatar sm rounded-circle no-thumbnail">
              <i class="fa fa-phone"></i>
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.call_trisha_jackson') }}</div>
              <small class="text-muted">Today - 05:40pm</small>
            </div>
          </div>
          <div class="timeline-item ti-success p-3">
            <div class="avatar sm rounded-circle no-thumbnail">
              <i class="fa fa-leaf"></i>
            </div>
            <div class="timeline-content ms-3">
              <div>{{ __('dash.write_proposal_for_don') }}</div>
              <small class="text-muted">Today - 06:30pm</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="RecentChat" tabindex="-1">
  <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
    <div class="modal-content">
      <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills p-3 h-100">
          <a class="nav-link rounded-circle p-1 mb-2 active" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-1" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-2" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-3" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar3.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-2" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar4.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-5" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar5.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-1" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar6.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-7" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar7.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-3" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar8.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-3" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar9.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-1" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar10.jpg') }}" alt="avatar">
          </a>
          <a class="nav-link rounded-circle p-1 mb-2" href="javascript:void(0);" data-bs-toggle="pill"
            data-bs-target="#c-user-1" title="">
            <img class="avatar sm rounded-circle border" src="{{ asset('assets/img/xs/avatar5.jpg') }}" alt="avatar">
          </a>
        </div>
        <div class="tab-content shadow-sm">
          <div class="tab-pane fade show active" id="c-user-1" role="tabpanel">
            <div class="card">
              <div class="card-header border-bottom py-3">
                <div class="d-flex">
                  <a href="javascript:void(0);" title="">
                    <img class="avatar rounded-circle" src="{{ asset('assets/img/xs/avatar1.jpg') }}" alt="avatar">
                  </a>
                  <div class="ms-3">
                    <h6 class="mb-0">{{ __('dash.orlando_lentz') }}</h6>
                    <small class="text-muted">{{ __('dash.last_seen') }}: 2 {{ __('dash.hours_ago') }}</small>
                  </div>
                </div>
                <div class="dropdown morphing scale-left">
                  <a class="nav-link p-2 text-secondary d-none d-xl-inline-block" href="javascript:void(0);"><i
                      class="fa fa-camera"></i></a>
                  <a class="nav-link p-2 me-1 text-secondary d-none d-xl-inline-block" href="javascript:void(0);"><i
                      class="fa fa-video-camera"></i></a>
                  <a class="nav-link py-2 px-3 text-muted d-inline-block d-xl-none" data-bs-dismiss="modal"
                    aria-label="Close" href="#"><i class="fa fa-close"></i></a>
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
              <div class="card-body custom_scroll" style="height: calc(100vh - 141px);">
                <ul class="list-unstyled chat-history flex-grow-1">
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar1.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">{{ __('dash.hi_aiden_how_are_you') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row-reverse align-items-end">
                    <div class="max-width-70 text-end">
                      <div class="user-info mb-1">
                        <span class="text-muted small">10:12 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card border-0 p-3 bg-primary text-light">
                        <div class="message">{{ __('dash.are_we_meeting_today') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar1.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">{{ __('dash.long_established_fact') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar1.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">{{ __('dash.contrary_to_popular_belief') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row-reverse align-items-end">
                    <div class="max-width-70 text-end">
                      <div class="user-info mb-1">
                        <span class="text-muted small">10:12 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card border-0 p-3 bg-primary text-light">
                        <div class="message">
                          {{ __('dash.yes_orlando_already_done') }}<br>{{ __('dash.many_variations_passages') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar1.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">
                          <p>{{ __('dash.please_find_attached_images') }}</p>
                          <img class="w120 img-thumbnail" src="{{ asset('assets/img/gallery/3.jpg') }}" alt="">
                          <img class="w120 img-thumbnail" src="{{ asset('assets/img/gallery/4.jpg') }}" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row-reverse align-items-end">
                    <div class="max-width-70 text-end">
                      <div class="user-info mb-1">
                        <span class="text-muted small">10:12 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card border-0 p-3 bg-primary text-light">
                        <div class="message">{{ __('dash.okay_will_check') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="card-footer border-top bg-transparent py-3 px-4">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="{{ __('dash.enter_text_here') }}">
                  <button class="btn btn-primary" type="button">{{ __('dash.send') }}</button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="c-user-2" role="tabpanel">
            <div class="card">
              <div class="card-header border-bottom py-3">
                <div class="d-flex">
                  <a href="javascript:void(0);" title="">
                    <img class="avatar rounded-circle" src="{{ asset('assets/img/xs/avatar2.jpg') }}" alt="avatar">
                  </a>
                  <div class="ms-3">
                    <h6 class="mb-0">{{ __('dash.orlando_lentz') }}</h6>
                    <small class="text-muted">{{ __('dash.last_seen') }}: 2 {{ __('dash.hours_ago') }}</small>
                  </div>
                </div>
                <div class="dropdown morphing scale-left">
                  <a class="nav-link p-2 text-secondary d-none d-xl-inline-block" href="javascript:void(0);"><i
                      class="fa fa-camera"></i></a>
                  <a class="nav-link p-2 me-1 text-secondary d-none d-xl-inline-block" href="javascript:void(0);"><i
                      class="fa fa-video-camera"></i></a>
                  <a class="nav-link py-2 px-3 text-muted d-inline-block d-xl-none" data-bs-dismiss="modal"
                    aria-label="Close" href="#"><i class="fa fa-close"></i></a>
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
              <div class="card-body custom_scroll" style="height: calc(100vh - 141px);">
                <ul class="list-unstyled chat-history flex-grow-1">
                  <li class="mb-3 d-flex flex-row-reverse align-items-end">
                    <div class="max-width-70 text-end">
                      <div class="user-info mb-1">
                        <span class="text-muted small">10:12 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card border-0 p-3 bg-primary text-light">
                        <div class="message">{{ __('dash.are_we_meeting_today') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar2.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">{{ __('dash.hi_aiden_how_are_you') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row-reverse align-items-end">
                    <div class="max-width-70 text-end">
                      <div class="user-info mb-1">
                        <span class="text-muted small">10:12 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card border-0 p-3 bg-primary text-light">
                        <div class="message">
                          {{ __('dash.yes_orlando_already_done') }}<br>{{ __('dash.many_variations_passages') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar2.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">
                          <p>{{ __('dash.please_find_attached_images') }}</p>
                          <img class="w120 img-thumbnail" src="{{ asset('assets/img/gallery/1.jpg') }}" alt="">
                          <img class="w120 img-thumbnail" src="{{ asset('assets/img/gallery/2.jpg') }}" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row-reverse align-items-end">
                    <div class="max-width-70 text-end">
                      <div class="user-info mb-1">
                        <span class="text-muted small">10:12 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card border-0 p-3 bg-primary text-light">
                        <div class="message">{{ __('dash.okay_will_check') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar2.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">{{ __('dash.long_established_fact') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="mb-3 d-flex flex-row align-items-end">
                    <div class="max-width-70">
                      <div class="user-info mb-1">
                        <img class="avatar xs rounded-circle me-1" src="{{ asset('assets/img/xs/avatar2.jpg') }}"
                          alt="avatar">
                        <span class="text-muted small">10:10 AM, {{ __('dash.today') }}</span>
                      </div>
                      <div class="card p-3">
                        <div class="message">{{ __('dash.contrary_to_popular_belief') }}</div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu rounded-4 border-0 shadow">
                        <li><a class="dropdown-item" href="#">{{ __('dash.edit') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.share') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('dash.delete') }}</a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="card-footer border-top bg-transparent py-3 px-4">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="{{ __('dash.enter_text_here') }}">
                  <button class="btn btn-primary" type="button">{{ __('dash.send') }}</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="SettingsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-vertical right-side modal-dialog-scrollable">
    <div class="modal-content">
      <div class="px-xl-4 modal-header">
        <h5 class="modal-title">{{ __('dash.theme_setting') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="px-xl-4 modal-body custom_scroll">
        <div class="card fieldset border border-primary p-3 setting-theme mb-4">
          <span class="fieldset-tile text-primary bg-card">{{ __('dash.color_settings') }}</span>
          <ul class="list-unstyled d-flex choose-skin mb-0">
            <li data-theme="black">
              <div class="black"></div>
            </li>
            <li data-theme="indigo">
              <div class="indigo"></div>
            </li>
            <li data-theme="blue">
              <div class="blue"></div>
            </li>
            <li data-theme="cyan">
              <div class="cyan"></div>
            </li>
            <li data-theme="green">
              <div class="green"></div>
            </li>
            <li data-theme="orange">
              <div class="orange"></div>
            </li>
            <li data-theme="blush">
              <div class="blush"></div>
            </li>
            <li data-theme="red">
              <div class="red"></div>
            </li>
            <li data-theme="dynamic">
              <div class="dynamic"><i class="fa fa-paint-brush"></i></div>
            </li>
          </ul>
          <div class="card fieldset border border-primary p-3 dt-setting mt-4">
            <span class="fieldset-tile text-primary bg-card">{{ __('dash.dynamic_color_settings') }}</span>
            <div class="row g-3">
              <div class="col-7">
                <ul class="list-unstyled mb-0">
                  <li>
                    <button id="primaryColorPicker" class="btn bg-primary avatar xs me-2"></button>
                    <label>{{ __('dash.primary_color') }}</label>
                  </li>
                  <li>
                    <button id="secondaryColorPicker" class="btn bg-secondary avatar xs me-2"></button>
                    <label>{{ __('dash.secondary_color') }}</label>
                  </li>
                  <li>
                    <button id="BodyColorPicker" class="btn btn-outline-secondary bg-body avatar xs me-2"></button>
                    <label>{{ __('dash.site_background') }}</label>
                  </li>
                  <li>
                    <button id="CardColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                    <label>{{ __('dash.widget_background') }}</label>
                  </li>
                  <li>
                    <button id="BorderColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                    <label>{{ __('dash.border_color') }}</label>
                  </li>
                </ul>
              </div>
              <div class="col-5">
                <ul class="list-unstyled mb-0">
                  <li>
                    <button id="chartColorPicker1" class="btn chart-color1 avatar xs me-2"></button>
                    <label>{{ __('dash.chart_color_1') }}</label>
                  </li>
                  <li>
                    <button id="chartColorPicker2" class="btn chart-color2 avatar xs me-2"></button>
                    <label>{{ __('dash.chart_color_2') }}</label>
                  </li>
                  <li>
                    <button id="chartColorPicker3" class="btn chart-color3 avatar xs me-2"></button>
                    <label>{{ __('dash.chart_color_3') }}</label>
                  </li>
                  <li>
                    <button id="chartColorPicker4" class="btn chart-color4 avatar xs me-2"></button>
                    <label>{{ __('dash.chart_color_4') }}</label>
                  </li>
                  <li>
                    <button id="chartColorPicker5" class="btn chart-color5 avatar xs me-2"></button>
                    <label>{{ __('dash.chart_color_5') }}</label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="card fieldset border setting-mode mb-4">
          <span class="fieldset-tile bg-card">{{ __('dash.light_dark_contrast_layout') }}</span>
          <div class="c_radio d-flex text-center">
            <label class="m-1 theme-switch" for="theme-switch">
              <input type="checkbox" id="theme-switch" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/dark-version.svg') }}"
                  alt="{{ __('dash.dark_mode') }}" />
              </span>
            </label>
            <label class="m-1 theme-dark" for="theme-dark">
              <input type="checkbox" id="theme-dark" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/dark-theme.svg') }}"
                  alt="{{ __('dash.theme_dark_mode') }}" />
              </span>
            </label>
            <label class="m-1 theme-high-contrast" for="theme-high-contrast">
              <input type="checkbox" id="theme-high-contrast" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/high-version.svg') }}"
                  alt="{{ __('dash.high_contrast') }}" />
              </span>
            </label>
            <label class="m-1 theme-rtl" for="theme-rtl">
              <input type="checkbox" id="theme-rtl" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/rtl-version.svg') }}"
                  alt="{{ __('dash.rtl_mode') }}" />
              </span>
            </label>
          </div>
        </div>
        <div class="card fieldset border setting-font">
          <span class="fieldset-tile bg-card">{{ __('dash.google_font_settings') }}</span>
          <div class="c_radio d-flex text-center font_setting">
            <label class="m-1" for="font-opensans">
              <input type="radio" name="font" id="font-opensans" value="font-opensans" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/font-opensans.svg') }}"
                  alt="{{ __('dash.opensans_font') }}" />
              </span>
            </label>
            <label class="m-1" for="font-quicksand">
              <input type="radio" name="font" id="font-quicksand" value="font-quicksand" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/font-quicksand.svg') }}"
                  alt="{{ __('dash.quicksand_font') }}" />
              </span>
            </label>
            <label class="m-1" for="font-nunito">
              <input type="radio" name="font" id="font-nunito" value="font-nunito" checked="" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/font-nunito.svg') }}"
                  alt="{{ __('dash.nunito_font') }}" />
              </span>
            </label>
            <label class="m-1" for="font-raleway">
              <input type="radio" name="font" id="font-raleway" value="font-raleway" />
              <span class="card p-2">
                <img class="img-fluid" src="{{ asset('assets/img/font-raleway.svg') }}"
                  alt="{{ __('dash.raleway_font') }}" />
              </span>
            </label>
          </div>
        </div>
        <div class="m-1 p-3 bg-body rounded-4 mb-4">
          <p>{{ __('dash.dynamic_font_settings') }}</p>
          <div class="mb-2">
            <label class="form-label small text-muted mb-0">{{ __('dash.enter_font_url') }}</label>
            <input id="font_url" type="text" class="form-control" placeholder="http://fonts.cdnfonts.com/css/vonfont">
          </div>
          <div class="mb-3">
            <label class="form-label small text-muted mb-0">{{ __('dash.enter_font_family_name') }}</label>
            <input id="font_family" type="text" class="form-control" placeholder="vonfont">
          </div>
          <button id="font_apply" type="submit" class="btn btn-primary">{{ __('dash.save_changes') }}</button>
          <button id="font_cancel" type="submit" class="btn btn-secondary">{{ __('dash.clear_changes') }}</button>
        </div>
        <div class="setting-more mb-4">
          <h6 class="card-title">{{ __('dash.more_setting') }}</h6>
          <ul class="list-group list-group-flush list-group-custom fs-6">
            <li class="list-group-item">
              <div class="form-check form-switch h-menu-switch mb-1">
                <input class="form-check-input" type="checkbox" id="h_menu">
                <label class="form-check-label" for="h_menu">{{ __('dash.horizontal_menu_version') }}</label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch pageheader-switch mb-1">
                <input class="form-check-input" type="checkbox" id="PageHeader" checked>
                <label class="form-check-label" for="PageHeader">{{ __('dash.page_header_fix') }}</label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch pageheader-dark-switch mb-1">
                <input class="form-check-input" type="checkbox" id="PageHeader_dark">
                <label class="form-check-label" for="PageHeader_dark">{{ __('dash.page_header_dark_mode') }}</label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch radius-switch mb-1">
                <input class="form-check-input" type="checkbox" id="BorderRadius">
                <label class="form-check-label" for="BorderRadius">{{ __('dash.border_radius_none') }}</label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch sidebar-v2 mb-1">
                <input class="form-check-input" type="checkbox" id="sidebar_v2">
                <label class="form-check-label" for="sidebar_v2">{{ __('dash.sidebar_version_2') }}</label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch sidebardark-switch mb-1">
                <input class="form-check-input" type="checkbox" id="SidebarDark">
                <label class="form-check-label" for="SidebarDark">{{ __('dash.enable_dark_sidebar') }}</label>
              </div>
            </li>
            <li class="list-group-item setting-img">
              <div class="form-check form-switch imagebg-switch mb-1">
                <input class="form-check-input" type="checkbox" id="CheckImage">
                <label class="form-check-label" for="CheckImage">{{ __('dash.background_image_sidebar') }}</label>
              </div>
              <div class="bg-images">
                <ul class="list-unstyled d-flex">
                  <li class="sidebar-img-1 me-1 sidebar-img-active"><a class="rounded sidebar-img" id="img-1"
                      href="#"><img src="{{ asset('assets/img/sidebar-bg/sidebar-1.jpg') }}" alt="" /></a></li>
                  <li class="sidebar-img-2 me-1"><a class="rounded sidebar-img" id="img-2" href="#"><img
                        src="{{ asset('assets/img/sidebar-bg/sidebar-2.jpg') }}" alt="" /></a></li>
                  <li class="sidebar-img-3 me-1"><a class="rounded sidebar-img" id="img-3" href="#"><img
                        src="{{ asset('assets/img/sidebar-bg/sidebar-3.jpg') }}" alt="" /></a></li>
                  <li class="sidebar-img-4 me-1"><a class="rounded sidebar-img" id="img-4" href="#"><img
                        src="{{ asset('assets/img/sidebar-bg/sidebar-4.jpg') }}" alt="" /></a></li>
                  <li class="sidebar-img-5 me-1"><a class="rounded sidebar-img" id="img-5" href="#"><img
                        src="{{ asset('assets/img/sidebar-bg/sidebar-5.jpg') }}" alt="" /></a></li>
                </ul>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch fluid-switch mb-1">
                <input class="form-check-input" type="checkbox" id="fluidLayout" checked="">
                <label class="form-check-label" for="fluidLayout">{{ __('dash.container_fluid') }}</label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-check form-switch shadow-switch mb-1">
                <input class="form-check-input" type="checkbox" id="card_shadow">
                <label class="form-check-label" for="card_shadow">{{ __('dash.card_box_shadow') }}</label>
              </div>
            </li>
          </ul>
        </div>
        <div class="mb-4">
          <a class="btn lift  btn-outline-secondary" href="./marketing/index.html">{{ __('dash.marketing_page') }}</a>
          <a class="btn lift  btn-outline-secondary"
            href="./onepgae-uikit/onepage.html">{{ __('dash.landing_page') }}</a>
          <a class="btn lift  btn-outline-secondary"
            href="./onepgae-uikit/index.html">{{ __('dash.one_page_ui_kit_elements') }}</a>
        </div>
      </div>
      <div class="px-xl-4 modal-footer d-flex justify-content-start text-center">
        <button type="button" class="btn flex-fill btn-primary lift">{{ __('dash.save_changes') }}</button>
        <button type="button" class="btn flex-fill btn-white border lift"
          data-bs-dismiss="modal">{{ __('dash.close') }}</button>
      </div>
    </div>
  </div>
</div>