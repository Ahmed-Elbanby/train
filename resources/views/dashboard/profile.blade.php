@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <div class="d-flex align-items-md-start align-items-center flex-column flex-md-row">
                                <img src="{{ auth('admin')->user()->photo
                                                ? asset('storage/' . auth('admin')->user()->photo)
                                                : asset('assets/img/avatar.png') }}" alt="" class="rounded-4">
                                <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                                    <h4 class="mb-1 fw-light">{{auth('admin')->user()->name}}<a href="#"
                                            class="fa fa-pencil-square-o fs-6 ms-2" data-bs-toggle="offcanvas"
                                            data-bs-target="#edit_profile" title="Edit Profile"></a></h4>
                                    <!-- <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="a0c1ccccc9c5c7d2c1d4c5d2e0ccd5cecf8ec3cfcd">[email&#160;protected]</a>
                                    </p> -->
                                    <span class="text-muted">It is a long established fact that a reader will be distracted
                                        by the readable<br> content of a page when looking at its layout.</span>
                                    <div
                                        class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                        <div class="card py-2 px-3 me-2 mt-2">
                                            <small class="text-muted">Total Earnings</small>
                                            <div class="fs-5">$10,705</div>
                                        </div>
                                        <div class="card py-2 px-3 me-2 mt-2">
                                            <small class="text-muted">Awards</small>
                                            <div class="fs-5">45</div>
                                        </div>
                                        <div class="card py-2 px-3 me-2 mt-2">
                                            <small class="text-muted">Experience</small>
                                            <div class="fs-5">8+</div>
                                        </div>
                                        <div class="card py-2 px-3 me-2 mt-2">
                                            <small class="text-muted">City</small>
                                            <div class="fs-5">New york</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs tab-card border-bottom-0 pt-2 fs-6 justify-content-center justify-content-md-start"
                            role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#profile_post"
                                    role="tab"><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#profile_groups"
                                    role="tab"><i class="fa fa-address-card-o"></i><span
                                        class="d-none d-sm-inline-block ms-2">Groups</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#profile_project"
                                    role="tab"><i class="fa fa-list-alt"></i><span
                                        class="d-none d-sm-inline-block ms-2">Projects</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#profile_campaigns"
                                    role="tab" id="tab_profile_campaigns"><i class="fa fa-area-chart"></i><span
                                        class="d-none d-md-inline-block ms-2">Campaigns</span></a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#profile_activity"
                                    role="tab"><i class="fa fa-font"></i><span
                                        class="d-none d-md-inline-block ms-2">Activity</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content mt-5">

                        <div class="tab-pane fade show active" id="profile_post" role="tabpanel">
                            <div class="row-title mb-2">
                                <h5>Profile Overview</h5>
                            </div>
                            <div class="row g-3">
                                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title mb-3">Personal Information</h6>
                                            <p class="card-text text-muted">Hi I'm Allie Grater, Contrary to popular belief,
                                                Lorem Ipsum is not simply random text. It has roots in a piece of classical
                                                Latin literature.</p>
                                            <ul class="list-unstyled mb-0">
                                                <li class="py-2"><span class="text-muted me-2 w90 d-inline-block">Full
                                                        Name:</span>{{auth('admin')->user()->name}}</li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">E-mail:</span>{{auth('admin')->user()->email}}
                                                </li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">Phone:</span>{{auth('admin')->user()->phone}}</li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">Location:</span>California,
                                                    USA</li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">Website:</span>http://website.com
                                                </li>
                                                <li class="py-2"><span
                                                        class="text-muted me-2 w90 d-inline-block">Social:</span>
                                                    <a href="#" class="py-1 px-2"><i class="fa fa-globe"></i></a>
                                                    <a href="#" class="py-1 px-2"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title mb-3">Skills Information</h6>
                                            <p class="text-muted">Augue mauris dignissim arcu, ut venenatis metus ante eu
                                                orci. Donec non maximus neque, ut finibus ex. <a href="#">Read more</a></p>
                                            <div class="d-flex justify-content-between">
                                                <small class="text-uppercase">BOOTSTRAP:</small>
                                                <small class="text-muted">95</small>
                                            </div>
                                            <div class="progress mt-1 mb-3" style="height: 3px;">
                                                <div class="progress-bar chart-color1" role="progressbar" aria-valuenow="95"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <small class="text-uppercase">HTML5:</small>
                                                <small class="text-muted">77</small>
                                            </div>
                                            <div class="progress mt-1 mb-3" style="height: 3px;">
                                                <div class="progress-bar chart-color2" role="progressbar" aria-valuenow="77"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <small class="text-uppercase">JQUERY:</small>
                                                <small class="text-muted">66</small>
                                            </div>
                                            <div class="progress mt-1 mb-3" style="height: 3px;">
                                                <div class="progress-bar chart-color3" role="progressbar" aria-valuenow="66"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 66%;"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <small class="text-uppercase">RESPONSIVE:</small>
                                                <small class="text-muted">80</small>
                                            </div>
                                            <div class="progress mt-1 mb-3" style="height: 3px;">
                                                <div class="progress-bar chart-color4" role="progressbar" aria-valuenow="80"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <small class="text-uppercase">CSS3:</small>
                                                <small class="text-muted">85</small>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 3px;">
                                                <div class="progress-bar chart-color5" role="progressbar" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-8 col-lg-8 col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <textarea class="form-control" placeholder="Post" rows="4"></textarea>
                                            <div class="pt-3">
                                                <a href="#" class="px-3"><i class="fa fa-camera"></i></a>
                                                <a href="#" class="px-3"><i class="fa fa-video-camera"></i></a>
                                                <a href="#" class="px-3"><i class="fa fa-music"></i></a>
                                                <button class="btn btn-primary float-end">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">

                                        <li class="card mb-2">
                                            <div class="card-header pb-0">
                                                <div class="d-flex">
                                                    <img class="avatar rounded-circle" src="{{asset('assets/img/profile_av.png')}}"
                                                        alt="">
                                                    <div class="flex-fill ms-3 text-truncate">
                                                        <h6 class="mb-0">
                                                            <span class="author">Allie Grater</span>
                                                            <small class="text-muted">posted a status</small>
                                                        </h6>
                                                        <small class="text-muted">1 hours ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown morphing scale-left">
                                                    <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                    <ul
                                                        class="dropdown-menu dropdown-animation dropdown-menu-end shadow border-0">
                                                        <li class="fw-bold mb-2">Quick Actions</li>
                                                        <li><a class="dropdown-item" href="#">Save post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Hide post <i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Snooze 30 days<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Turn on notifications<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Report post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Edit post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Delete post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="post-detail">
                                                    <p class="lead">Hampden-Sydney College in Virginia, looked up one of the
                                                        more obscure</p>
                                                    <p class="lead">It has roots in a piece of classical Latin literature
                                                        from 45 BC, making it over 2000 years old. Richard McClintock.</p>
                                                    <div class="mb-2 post-tag">
                                                        <a href="#" title="" class="me-2">#Design</a><a href="#" title=""
                                                            class="me-2">#HTML</a><a href="#" title=""
                                                            class="me-2">#ThemeMakker</a>
                                                    </div>
                                                    <a class="fancybox img-fluid" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/11.jpg')}}">
                                                        <img class="img-fluid rounded-4" alt=""
                                                            src="{{asset('assets/img/gallery/11.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="post-action">
                                                    <div class="mb-2 mt-4">
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-thumbs-up"></i> Like (105)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-comment"></i> Comment (2)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-share"></i> Share (6)</a>
                                                    </div>
                                                    <div class="card d-flex flex-row p-3 mt-1">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar2.jpg')}}"
                                                            alt="">
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 mb-1 author">Rose Rivera</span>
                                                                <small class="text-muted msg-time">1 hour ago</small>
                                                            </div>
                                                            <span class="text-muted">It is a long established fact that a
                                                                reader will be distracted by the readable content of a page
                                                                when looking at its layout.</span>
                                                        </div>
                                                    </div>
                                                    <div class="card d-flex flex-row p-3 mt-1">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar3.jpg')}}"
                                                            alt="">
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 mb-1 author">Robert Hammer</span>
                                                                <small class="text-muted msg-time">1 hour ago</small>
                                                            </div>
                                                            <span class="text-muted">If you are going to use a passage of
                                                                Lorem Ipsum, you need to be sure there isn't anything
                                                                embarrassing</span>
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control mt-3" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="card mb-2">
                                            <div class="card-header pb-0">
                                                <div class="d-flex">
                                                    <img class="avatar rounded-circle" src="{{asset('assets/img/profile_av.png')}}"
                                                        alt="">
                                                    <div class="flex-fill ms-3 text-truncate">
                                                        <h6 class="mb-0">
                                                            <span class="author">Allie Grater</span>
                                                            <small class="text-muted">posted a status</small>
                                                        </h6>
                                                        <small class="text-muted">4 hours ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown morphing scale-left">
                                                    <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                    <ul
                                                        class="dropdown-menu dropdown-animation dropdown-menu-end shadow border-0">
                                                        <li class="fw-bold mb-2">Quick Actions</li>
                                                        <li><a class="dropdown-item" href="#">Save post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Hide post <i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Snooze 30 days<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Turn on notifications<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Report post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Edit post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Delete post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="post-detail">
                                                    <p class="lead">Need a website designer for an online virtual football
                                                        league, lmk if interested</p>
                                                    <div class="mb-2 post-tag">
                                                        <a href="#" title="" class="me-2">#Figma</a><a href="#" title=""
                                                            class="me-2">#HTML</a><a href="#" title=""
                                                            class="me-2">#SCSS</a>
                                                    </div>
                                                </div>
                                                <div class="post-action">
                                                    <div class="mb-2 mt-4">
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-thumbs-up"></i> Like (0)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-comment"></i> Comment (0)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-share"></i> Share (0)</a>
                                                    </div>
                                                    <textarea class="form-control mt-3" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="card mb-2">
                                            <div class="card-header pb-0">
                                                <div class="d-flex">
                                                    <img class="avatar rounded-circle" src="{{asset('assets/img/profile_av.png')}}"
                                                        alt="">
                                                    <div class="flex-fill ms-3 text-truncate">
                                                        <h6 class="mb-0">
                                                            <span class="author">Allie Grater</span>
                                                            <small class="text-muted">posted a status</small>
                                                        </h6>
                                                        <small class="text-muted">3 hours ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown morphing scale-left">
                                                    <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                    <ul
                                                        class="dropdown-menu dropdown-animation dropdown-menu-end shadow border-0">
                                                        <li class="fw-bold mb-2">Quick Actions</li>
                                                        <li><a class="dropdown-item" href="#">Save post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Hide post <i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Snooze 30 days<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Turn on notifications<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Report post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Edit post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Delete post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="post-detail">
                                                    <p class="lead">Let's exchange our gigs</p>
                                                    <ul class="lead mb-3">
                                                        <li>Open My Gig</li>
                                                        <li>Swap Gig Images</li>
                                                        <li>Save My Gig</li>
                                                        <li>Then send me ss and I will do same promise</li>
                                                    </ul>
                                                    <div class="mb-2 post-tag">
                                                        <a href="#" title="" class="me-2">#Design</a><a href="#" title=""
                                                            class="me-2">#HTML</a><a href="#" title=""
                                                            class="me-2">#ThemeMakker</a>
                                                    </div>
                                                </div>
                                                <div class="post-action">
                                                    <div class="mb-2 mt-4">
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-thumbs-up"></i> Like (78)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-comment"></i> Comment (3)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-share"></i> Share (15)</a>
                                                    </div>
                                                    <div class="card d-flex flex-row p-3 mt-1">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar2.jpg')}}"
                                                            alt="">
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 mb-1 author">Rose Rivera</span>
                                                                <small class="text-muted msg-time">3 hour ago</small>
                                                            </div>
                                                            <span class="text-muted">If you are going to use a passage of
                                                                Lorem Ipsum, you need to be sure there isn't anything
                                                                embarrassing hidden in the middle of text. All the Lorem
                                                                Ipsum generators</span>
                                                            <div class="card d-flex flex-row p-3 mb-1 mt-3">
                                                                <img class="avatar rounded-circle"
                                                                    src="{{asset('assets/img/xs/avatar7.jpg')}}" alt="">
                                                                <div class="flex-fill ms-3">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="h6 mb-1 author">Andew Jon</span>
                                                                        <small class="text-muted msg-time">1 hour
                                                                            ago</small>
                                                                    </div>
                                                                    <span class="text-muted">Lorem Ipsum has been the
                                                                        industry's standard dummy text ever since the 1500s,
                                                                        when an unknown printer took</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card d-flex flex-row p-3 mt-1">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar3.jpg')}}"
                                                            alt="">
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 mb-1 author">Robert Hammer</span>
                                                                <small class="text-muted msg-time">1 hour ago</small>
                                                            </div>
                                                            <span class="text-muted">Internet tend to repeat predefined
                                                                chunks as necessary, making this the first true generator on
                                                                the Internet. It uses a dictionary of over 200 Latin
                                                                words</span>
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control mt-3" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="card mb-2">
                                            <div class="card-header pb-0">
                                                <div class="d-flex">
                                                    <img class="avatar rounded-circle" src="{{asset('assets/img/profile_av.png')}}"
                                                        alt="">
                                                    <div class="flex-fill ms-3 text-truncate">
                                                        <h6 class="mb-0">
                                                            <span class="author">Allie Grater</span>
                                                            <small class="text-muted">posted a status</small>
                                                        </h6>
                                                        <small class="text-muted">6 hours ago</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown morphing scale-left">
                                                    <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                        aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                    <ul
                                                        class="dropdown-menu dropdown-animation dropdown-menu-end shadow border-0">
                                                        <li class="fw-bold mb-2">Quick Actions</li>
                                                        <li><a class="dropdown-item" href="#">Save post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Hide post <i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Snooze 30 days<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Turn on notifications<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Report post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Edit post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                        <li><a class="dropdown-item" href="#">Delete post<i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="post-detail">
                                                    <p class="lead">I need a website developer designer and React, Angular,
                                                        Laravel asap</p>
                                                    <div class="mb-2 post-tag">
                                                        <a href="#" title="" class="me-2">#ReactJs</a><a href="#" title=""
                                                            class="me-2">#Laravel</a><a href="#" title=""
                                                            class="me-2">#ThemeMakker</a><a href="#" title=""
                                                            class="me-2">#Angular</a>
                                                    </div>
                                                    <a class="fancybox img-fluid" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/10.jpg')}}">
                                                        <img class="img-fluid rounded-4 w120" alt=""
                                                            src="{{asset('assets/img/gallery/10.jpg')}}" />
                                                    </a>
                                                    <a class="fancybox img-fluid" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/12.jpg')}}">
                                                        <img class="img-fluid rounded-4 w120" alt=""
                                                            src="{{asset('assets/img/gallery/12.jpg')}}" />
                                                    </a>
                                                    <a class="fancybox img-fluid" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/13.jpg')}}">
                                                        <img class="img-fluid rounded-4 w120" alt=""
                                                            src="{{asset('assets/img/gallery/13.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="post-action">
                                                    <div class="mb-2 mt-4">
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-thumbs-up"></i> Like (105)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-comment"></i> Comment (2)</a>
                                                        <a class="me-lg-4 me-2 text-primary" href="#"><i
                                                                class="fa fa-share"></i> Share (6)</a>
                                                    </div>
                                                    <div class="card d-flex flex-row p-3 mt-1">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar2.jpg')}}"
                                                            alt="">
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 mb-1 author">Rose Rivera</span>
                                                                <small class="text-muted msg-time">1 hour ago</small>
                                                            </div>
                                                            <span class="text-muted">Yes available</span>
                                                        </div>
                                                    </div>
                                                    <div class="card d-flex flex-row p-3 mt-1">
                                                        <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar3.jpg')}}"
                                                            alt="">
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 mb-1 author">Robert Hammer</span>
                                                                <small class="text-muted msg-time">1 hour ago</small>
                                                            </div>
                                                            <span class="text-muted">Intrested</span>
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control mt-3" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title mb-0">Categories</h6>
                                        </div>
                                        <ul class="list-group list-group-flush list-group-custom">
                                            <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                    href="#">Web Design <span>78</span></a></li>
                                            <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                    href="#">ReactJs <span>23</span></a></li>
                                            <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                    href="#">Music <span>12</span></a></li>
                                            <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                    href="#">Trending <span>41</span></a></li>
                                            <li class="list-group-item px-4"><a class="d-flex justify-content-between"
                                                    href="#">Newest Blog <span>8</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title mb-3">Average Agent Rating</h6>
                                            <h3>4.4/<small class="fs-6">5</small></h3>
                                            <button class="btn btn-sm btn-warning rounded-circle"><i
                                                    class="fa fa-star"></i></button>
                                            <button class="btn btn-sm btn-warning rounded-circle"><i
                                                    class="fa fa-star"></i></button>
                                            <button class="btn btn-sm btn-warning rounded-circle"><i
                                                    class="fa fa-star"></i></button>
                                            <button class="btn btn-sm btn-warning rounded-circle"><i
                                                    class="fa fa-star"></i></button>
                                            <button class="btn btn-sm btn-warning rounded-circle"><i
                                                    class="fa fa-star-half-empty"></i></button>
                                        </div>
                                    </div>
                                    <div class="card @@cardClass">
                                        <div class="card-header pb-0">
                                            <h6 class="card-title mb-0">Latest Photos</h6>
                                            <div class="dropdown morphing scale-left">
                                                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip"
                                                    title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                                                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                <ul class="dropdown-menu shadow border-0 p-2">
                                                    <li><a class="dropdown-item" href="#">File Info</a></li>
                                                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                    <li><a class="dropdown-item" href="#">Move to</a></li>
                                                    <li><a class="dropdown-item" href="#">Rename</a></li>
                                                    <li><a class="dropdown-item" href="#">Block</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-1">
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/1.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/1.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/2.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/2.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/3.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/3.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/4.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/4.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/5.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/5.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/6.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/6.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/7.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/7.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/8.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/8.jpg')}}" />
                                                    </a>
                                                </div>
                                                <div class="col-4">
                                                    <a class="fancybox rounded d-block" rel="ligthbox"
                                                        href="{{asset('assets/img/gallery/9.jpg')}}">
                                                        <img class="img-fluid rounded" alt=""
                                                            src="{{asset('assets/img/gallery/9.jpg')}}" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script data-cfasync="false"
                                        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                    <script src="{{asset('assets/js/bundle/fancybox.bundle.js')}}"></script>

                                    <script>
                                        /*	end gallery */
                                        $(document).ready(function () {
                                            $(".fancybox").fancybox({
                                                openEffect: "none",
                                                closeEffect: "none"
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile_groups" role="tabpanel">
                            <div class="row-title mb-2">
                                <h5>Groups</h5>
                                <div>
                                    <div class="input-group">
                                        <select class="form-select">
                                            <option selected>Choose...</option>
                                            <option value="1">Designer</option>
                                            <option value="2">Developer</option>
                                            <option value="3">Office</option>
                                            <option value="4">Friends</option>
                                            <option value="5">Management</option>
                                            <option value="6">Colleagues</option>
                                        </select>
                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#Create_Group">Create Group</button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-4 row-cols-lg-3 row-cols-sm-2 row-cols-1 g-3 row-deck">
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar2.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar3.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar4.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar5.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">Out Sourcing</h6>
                                                <small class="text-muted">16 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar6.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar7.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar8.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">Management</h6>
                                                <small class="text-muted">11 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar10.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar9.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar3.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar2.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar5.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">Sold Properties</h6>
                                                <small class="text-muted">106 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <div class="avatar rounded-circle m-1 lift d-inline-flex no-thumbnail">RH
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">San Fransisco</h6>
                                                <small class="text-muted">126 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar6.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar7.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar8.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">Los Angeles</h6>
                                                <small class="text-muted">84 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar10.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar9.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar2.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar5.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">Colleagues</h6>
                                                <small class="text-muted">245 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <div class="avatar rounded-circle m-1 lift d-inline-flex no-thumbnail">RH
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">San Fransisco</h6>
                                                <small class="text-muted">126 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-center overflow-visible">
                                        <div class="dropdown morphing scale-left position-absolute top-0 end-0 mt-2 me-2">
                                            <a href="#" class="dropdown-toggle more-icon" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu shadow border-0 dropdown-animation">
                                                <li class="fw-bold">Quick Actions</li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Edit Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Add Contact<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Share Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Group Info<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Rename<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                                <li><a class="dropdown-item" href="#">Delete Group<i
                                                            class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between flex-column">
                                            <div class="me-auto ms-auto py-4">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar6.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar7.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar8.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                                <img class="avatar rounded-circle m-1 lift"
                                                    src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Avatar Name" alt="">
                                            </div>
                                            <div class="mt-2">
                                                <h6 class="mb-0">Los Angeles</h6>
                                                <small class="text-muted">84 Contacts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="offcanvas offcanvas-end" tabindex="-1" id="Create_Group">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title">Create new Group</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body custom_scroll">
                                    <p><strong>Note: </strong>It is a long established fact that a reader will be distracted
                                        by the readable.</p>
                                    <div class="card p-3 mb-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="Group Name">
                                            <label>Group Name</label>
                                        </div>
                                        <div>
                                            <label class="me-3">Added :</label>
                                            <a href="#" title=""><img class="avatar sm rounded-circle"
                                                    src="{{asset('assets/img/xs/avatar3.jpg')}}" alt="friend"> </a>
                                            <a href="#" title=""><img class="avatar sm rounded-circle"
                                                    src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="friend"> </a>
                                            <a href="#" title=""><img class="avatar sm rounded-circle"
                                                    src="{{asset('assets/img/xs/avatar9.jpg')}}" alt="friend"> </a>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary text-uppercase" type="button">Create new
                                            Group</button>
                                    </div>
                                    <h6 class="card-title mt-4">Contact List</h6>
                                    <ul class="list-unstyled mb-0 custom_scroll" style="height: 400px;">
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Chris Fox</div>
                                                <span class="text-muted small">21 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-primary">Add</button>
                                            </div>
                                        </li>
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar2.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Marshall Nichols</div>
                                                <span class="text-muted small">5 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-success">Added</button>
                                            </div>
                                        </li>
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar3.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Orlando Lentz</div>
                                                <span class="text-muted small">9 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-primary">Add</button>
                                            </div>
                                        </li>
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar4.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Alexander</div>
                                                <span class="text-muted small">18 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-primary">Add</button>
                                            </div>
                                        </li>
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar8.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Orlando Lentz</div>
                                                <span class="text-muted small">11 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-primary">Add</button>
                                            </div>
                                        </li>
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar5.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Marshall Nichols</div>
                                                <span class="text-muted small">5 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-success">Added</button>
                                            </div>
                                        </li>
                                        <li class="card p-3 my-1 flex-row">
                                            <img class="avatar rounded-circle" src="{{asset('assets/img/xs/avatar6.jpg')}}" alt="">
                                            <div class="flex-fill ms-3">
                                                <div class="h6 mb-0">Orlando Lentz</div>
                                                <span class="text-muted small">9 mutual connections</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button class="btn mx-1 btn-light-success">Added</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile_project" role="tabpanel">
                            <div class="row-title mb-2">
                                <h5>My Projects</h5>
                                <div>
                                    <div class="input-group">
                                        <select class="form-select">
                                            <option selected>Choose...</option>
                                            <option value="1">Active</option>
                                            <option value="2">In Progress</option>
                                            <option value="3">To Do</option>
                                            <option value="3">Completed</option>
                                        </select>
                                        <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                                            data-bs-target="#CreateNew" type="button">Create Project</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 row-deck">
                                <div class="col-xxl-4 col-lg-6 col-md-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">School /
                                                    University</a></h5>
                                            <p class="text-muted">Project sub title here</p>
                                            <ul class="list-inline d-flex my-4">
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">7</h6>
                                                    <small class="text-uppercase text-muted">Issues</small>
                                                </li>
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">4</h6>
                                                    <small class="text-uppercase text-muted">Resolved</small>
                                                </li>
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">3</h6>
                                                    <small class="text-uppercase text-muted">Comment</small>
                                                </li>
                                            </ul>
                                            <div class="project-members mb-4">
                                                <label class="me-2">Team:</label>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar3.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Team Lead" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Designer" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar7.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Developer" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar9.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Developer" alt="friend"> </a>
                                            </div>
                                            <label class="small d-flex justify-content-between">80% <span
                                                    class="text-custom">Done</span></label>
                                            <div class="progress mt-1" style="height: 3px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="95"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                        <div class="card-footer py-3">
                                            <span>Due date: <strong>21 Aug, 2022</strong></span>
                                            <span class="px-3">|</span>
                                            <span>Budget: <strong>$12,050</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-md-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">LUNO job
                                                    Portal</a></h5>
                                            <p class="text-muted">Project sub title here</p>
                                            <ul class="list-inline d-flex my-4">
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">7</h6>
                                                    <small class="text-uppercase text-muted">Issues</small>
                                                </li>
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">4</h6>
                                                    <small class="text-uppercase text-muted">Resolved</small>
                                                </li>
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">3</h6>
                                                    <small class="text-uppercase text-muted">Comment</small>
                                                </li>
                                            </ul>
                                            <div class="project-members mb-4">
                                                <label class="me-2">Team:</label>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar3.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Team Lead" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Designer" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar7.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Developer" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar9.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Developer" alt="friend"> </a>
                                            </div>
                                            <label class="small d-flex justify-content-between">23% <span
                                                    class="text-custom">Done</span></label>
                                            <div class="progress mt-1" style="height: 3px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="95"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                            </div>
                                        </div>
                                        <div class="card-footer py-3">
                                            <span>Due date: <strong>25 Aug, 2022</strong></span>
                                            <span class="px-3">|</span>
                                            <span>Budget: <strong>$1,150</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-6 col-md-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1"><a href="app-project-detail.html" class="color-600">TTM
                                                    Banking</a></h5>
                                            <p class="text-muted">Project sub title here</p>
                                            <ul class="list-inline d-flex my-4">
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">7</h6>
                                                    <small class="text-uppercase text-muted">Issues</small>
                                                </li>
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">4</h6>
                                                    <small class="text-uppercase text-muted">Resolved</small>
                                                </li>
                                                <li class="list-inline-item card py-2 px-xxl-3 px-xl-2 px-3">
                                                    <h6 class="mb-0">3</h6>
                                                    <small class="text-uppercase text-muted">Comment</small>
                                                </li>
                                            </ul>
                                            <div class="project-members mb-4">
                                                <label class="me-2">Team:</label>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar3.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Team Lead" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar1.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Designer" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar7.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Developer" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar sm rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar9.jpg')}}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Developer" alt="friend"> </a>
                                            </div>
                                            <label class="small d-flex justify-content-between">91% <span
                                                    class="text-custom">Done</span></label>
                                            <div class="progress mt-1" style="height: 3px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="95"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 91%;"></div>
                                            </div>
                                        </div>
                                        <div class="card-footer py-3">
                                            <span>Due date: <strong>28 Aug, 2022</strong></span>
                                            <span class="px-3">|</span>
                                            <span>Budget: <strong>$8,050</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile_campaigns" role="tabpanel">
                            <div class="row-title mb-2">
                                <h5>Campaigns</h5>
                                <button type="button" class="btn btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#CreateCampaigns">Create new campaigns</button>
                            </div>

                            <div class="row g-3 row-deck mb-4">
                                <div class="col-xxl-5 col-xl-12 col-lg-12">
                                    <div class="card bg-transparent border-0">
                                        <div class="row g-3">
                                            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span class="text-uppercase">New Sessions</span>
                                                        <h4 class="mb-0 mt-2">22,500</h4>
                                                        <small class="text-muted">Analytics for last week</small>
                                                    </div>
                                                    <div id="apex_c_1"></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span class="text-uppercase">TIME ON SITE</span>
                                                        <h4 class="mb-0 mt-2">1,070</h4>
                                                        <small class="text-muted">Analytics for last week</small>
                                                    </div>
                                                    <div id="apex_c_2"></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span class="text-uppercase">BOUNCE RATE</span>
                                                        <h4 class="mb-0 mt-2">10K</h4>
                                                        <small class="text-muted">Analytics for last week</small>
                                                    </div>
                                                    <div id="apex_c_3"></div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-3 col-lg-6 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span class="text-uppercase">GOAL COMPLETIONS</span>
                                                        <h4 class="mb-0 mt-2">$1,22,500</h4>
                                                        <small class="text-muted">Analytics for last week</small>
                                                    </div>
                                                    <div id="apex_c_4"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card bg-secondary text-light position-relative">
                                                    <div class="card-body">
                                                        <h5>Luno - Admin Dashboard Template</h5>
                                                        <p class="card-text mb-4">1 Jan 20222, 11:15 AM</p>
                                                        <button class="btn btn-white">Published</button>
                                                        <button class="btn btn-dark" data-bs-toggle="modal"
                                                            data-bs-target="#CreateCampaigns">Create New</button>
                                                    </div>
                                                    <svg class="position-absolute bottom-0 end-0" data-name="Layer 1"
                                                        xmlns="http://www.w3.org/2000/svg" width="251.99951"
                                                        height="127.00734" viewBox="0 0 901.99951 702.00734">
                                                        <path
                                                            d="M965.71224,741.859c-.06572-.28941-6.42292-29.27871,6.56012-53.35614,12.983-24.07627,40.69652-34.69446,40.975-34.79938l1.26659-.47505.29921,1.32022c.06572.2894,6.42292,29.27871-6.56012,53.35613-12.98246,24.07627-40.69652,34.69446-40.975,34.79938l-1.26717.47505Zm47.06466-85.409c-5.55122,2.38791-27.46039,12.83891-38.42564,33.17362-10.9664,20.337-7.6578,44.38677-6.60278,50.33406,5.54892-2.38214,27.44944-12.817,38.42564-33.17362C1017.13994,686.44821,1013.8325,662.40076,1012.7769,656.45Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#3f3d56">
                                                        </path>
                                                        <path
                                                            d="M998.33141,699.45924c-23.33121,14.03683-32.3168,41.91784-32.3168,41.91784s28.84178,5.12281,52.173-8.914,32.3168-41.91784,32.3168-41.91784S1021.66262,685.42241,998.33141,699.45924Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M491.41852,614.99633c-2.77442,0-5.57715-.04395-8.32813-.12988l.0625-1.99805c3.9502.12305,7.98145.15723,11.9502.10254l.02734,2Q493.27741,614.99584,491.41852,614.99633Zm15.74511-.46387-.11719-1.99609c3.95606-.2334,7.9629-.56152,11.90918-.97461l.209,1.98828C515.18805,613.967,511.15094,614.29809,507.16363,614.53246Zm-36.0957-.31152c-3.98926-.30567-8.02051-.70606-11.98242-1.19238l.24414-1.98438c3.93164.48145,7.93164.87988,11.89062,1.18262Zm60.03906-2.19922-.2998-1.97656c3.93066-.59668,7.8916-1.28906,11.76953-2.05957l.38965,1.96093C539.05816,610.72289,535.06793,611.42113,531.107,612.02172Zm-83.93506-.73145c-3.94091-.668-7.91894-1.43554-11.82324-2.2832l.42432-1.95508c3.87451.8418,7.82177,1.60352,11.73291,2.26563Zm107.54834-3.96191-.48047-1.94141c3.8584-.9541,7.73829-2.00878,11.53223-3.13378l.56836,1.918C562.51715,605.30492,558.608,606.36742,554.72027,607.32836ZM423.6441,606.18188c-3.86572-1.02832-7.75586-2.15918-11.5625-3.36328l.60254-1.90625c3.77783,1.19433,7.63818,2.3164,11.47363,3.33593Zm154.1582-5.70118L577.146,598.592c3.74414-1.30176,7.50977-2.709,11.19434-4.18359l.74219,1.85742C585.37066,597.75121,581.57574,599.16918,577.8023,600.4807Zm-177.1455-1.5664c-3.7544-1.37988-7.53223-2.86914-11.22754-4.42578l.77636-1.84375c3.667,1.54492,7.41553,3.02246,11.14161,4.39258Zm199.47461-7.36817-.82813-1.82031c3.5957-1.63379,7.21-3.37793,10.74219-5.18359l.91015,1.78125C607.396,588.14281,603.75445,589.89965,600.13141,591.54613Zm21.39843-10.93847-.99023-1.73633c3.44824-1.96777,6.89062-4.03613,10.22949-6.14844l1.06836,1.68946C628.4732,576.54125,625.00543,578.62621,621.52984,580.60766Zm20.32325-12.85742-1.14454-1.63868c3.24707-2.26855,6.48731-4.64453,9.63086-7.06054l1.21875,1.58593C648.39117,563.07152,645.12555,565.46508,641.85309,567.75024ZM337.0274,564.93383c-3.228-2.34473-6.45263-4.80078-9.585-7.30176l1.24805-1.5625c3.1084,2.48145,6.30859,4.91895,9.51172,7.24512Zm323.90283-11.8457-1.28906-1.5293c3.02637-2.55371,6.03809-5.21484,8.95313-7.91016l1.35742,1.46875C667.01519,547.83324,663.98,550.51488,660.93023,553.08813Zm-342.728-3.18555c-3.00635-2.63281-5.99317-5.37109-8.877-8.13965l1.38477-1.44336c2.8623,2.74805,5.82617,5.46582,8.80957,8.0791Zm360.40088-13.16113-1.42383-1.4043c2.79-2.82715,5.5498-5.75293,8.20117-8.69531l1.48633,1.33789C684.19488,530.94555,681.41461,533.89281,678.60309,536.74145Zm-377.77295-3.51172c-2.7583-2.90039-5.48243-5.89844-8.09668-8.91016l1.51074-1.31055c2.59424,2.98926,5.29736,5.96387,8.03515,8.8418ZM694.7232,518.84985l-1.54492-1.26954c2.52051-3.06738,5.002-6.23242,7.37793-9.40918l1.60156,1.19727C699.76422,512.56957,697.26324,515.76,694.7232,518.84985ZM285.0523,515.053c-2.47705-3.12988-4.916-6.36133-7.24951-9.60449l1.623-1.168c2.31592,3.21777,4.73633,6.4248,7.19482,9.53223ZM709.15191,499.5559l-1.65429-1.12305c2.23047-3.28418,4.415-6.66406,6.49218-10.04785l1.70508,1.04688C713.60016,492.84106,711.399,496.24731,709.15191,499.5559ZM271.001,495.5266c-2.17919-3.34082-4.312-6.77832-6.33984-10.21972l1.72266-1.01563c2.01269,3.415,4.12939,6.82715,6.292,10.1416Zm450.76612-16.51074-1.75-.9668c1.91992-3.47461,3.78515-7.043,5.5459-10.60644l1.793.88672C725.58258,471.91918,723.70172,475.51488,721.76715,479.01586Zm10.68066-21.62109-1.832-.80274c1.59375-3.63965,3.124-7.36718,4.54883-11.07812l1.86719.71679C735.59625,449.97094,734.05328,453.7268,732.44781,457.39477Zm-483.90234-4.31543c-1.5332-3.67969-3.00147-7.44434-4.36377-11.19043l1.87988-.6836c1.35156,3.71778,2.8086,7.45313,4.32959,11.1045Zm492.55078-18.21582-1.89844-.62891c1.24805-3.76074,2.42578-7.60449,3.5-11.42578l1.92578.541C743.54059,427.20043,742.35309,431.07445,741.09625,434.86352ZM240.32916,430.4807c-1.18994-3.81152-2.30811-7.70507-3.32324-11.57421l1.93457-.50782c1.00732,3.83985,2.11719,7.7041,3.29785,11.48633ZM747.6148,411.68578l-1.94824-.45312c.89551-3.85449,1.71387-7.791,2.4336-11.69824l1.96679.36132C749.34234,403.83422,748.51715,407.8,747.6148,411.68578Zm-513.394-4.49414c-.834-3.90625-1.58887-7.88574-2.24316-11.83008l1.97265-.32812c.64991,3.915,1.39893,7.86426,2.22657,11.74023ZM751.9732,388.00805l-1.98242-.27149c.53809-3.917.99219-7.91113,1.35059-11.87207l1.99218.17969C752.97223,380.03637,752.51422,384.06078,751.9732,388.00805Zm-521.69385-4.56641c-.47167-3.959-.85888-7.99121-1.15136-11.98437l1.99511-.14649c.28956,3.96387.67432,7.96485,1.14258,11.89453ZM754.148,364.03246l-1.99805-.08984c.17773-3.96289.26856-7.98242.26856-11.94629h2C754.41852,355.99047,754.32769,360.04027,754.148,364.03246ZM228.522,359.4309c-.06836-2.45215-.103-4.9541-.10351-7.43457q0-2.30859.03955-4.6084l2,.03516q-.03955,2.28222-.03955,4.57324c.00048,2.46191.03515,4.94531.10253,7.37988Zm2.41065-23.94775-1.9961-.125c.24951-3.9961.59424-8.03223,1.02344-11.99659l1.98828.21534C231.522,327.51147,231.18072,331.51684,230.93268,335.48315Zm520.19445-12.20159c-.39941-3.94288-.94885-5.86531-1.52893-9.79109l1.97852-.292c.584,3.95556,1.085,6.9751,1.48828,10.94775Zm-517.6217-11.55134-1.97656-.30567c.61279-3.95654,1.3247-7.94433,2.11621-11.854l1.96.39648C234.81988,303.84692,234.11334,307.80444,233.50543,311.73022Zm514.07422-10.01563c-.7627-3.90137-1.62305-7.82861-2.5586-11.67236l1.94336-.47266c.94239,3.873,1.80957,7.83057,2.57813,11.76123ZM238.24273,288.31322l-1.93994-.48632c.97119-3.87354,2.04688-7.7793,3.19727-11.60938l1.915.5752C240.274,280.5935,239.2066,284.46947,238.24273,288.31322Zm503.68457-9.81347c-1.11523-3.80811-2.334-7.63867-3.62207-11.38672l1.89063-.65039c1.29883,3.77685,2.52734,7.63769,3.65137,11.47461Zm-496.7998-13.1001-1.88672-.66309c1.3291-3.78076,2.76416-7.57959,4.26514-11.291l1.85449.75C247.87066,257.87817,246.44635,261.64819,245.1275,265.39965ZM734.1607,255.905c-1.459-3.68066-3.02148-7.37451-4.64453-10.97949l1.82422-.82129c1.63574,3.63281,3.21,7.355,4.67969,11.06348ZM254.10406,243.20238l-1.81738-.835c1.67041-3.63769,3.44824-7.28564,5.28418-10.84228l1.77734.917C257.52594,235.97192,255.76178,239.592,254.10406,243.20238Zm470.26856-9.03564c-1.79-3.53076-3.68653-7.06885-5.63672-10.51465l1.74023-.98535c1.96582,3.47266,3.876,7.0376,5.67969,10.5957ZM265.08111,221.93725l-1.7334-.99805c1.99512-3.46435,4.09913-6.93213,6.25391-10.30615l1.68555,1.07617C269.149,215.05785,267.0606,218.49926,265.08111,221.93725Zm447.54151-8.53516c-2.11328-3.36426-4.32618-6.71582-6.57715-9.96191l1.64258-1.13965c2.26855,3.271,4.499,6.64795,6.62793,10.03808ZM277.95416,201.77856l-1.63477-1.15235c2.30567-3.27,4.71631-6.52929,7.16651-9.6875l1.58008,1.22559C282.63482,195.29906,280.24176,198.53344,277.95416,201.77856Zm421.064-7.99219c-2.41015-3.15674-4.91992-6.29492-7.46191-9.32715l1.5332-1.28467c2.56055,3.05567,5.08985,6.21729,7.51856,9.39795ZM292.60748,182.88744l-1.52246-1.29687c2.5874-3.03906,5.28418-6.064,8.01514-8.99072l1.46191,1.36425C297.85211,176.86889,295.17584,179.87133,292.60748,182.88744Zm391.06982-7.4082c-2.68652-2.92432-5.47363-5.82275-8.28222-8.61377l1.41015-1.41895c2.83008,2.813,5.6377,5.73292,8.34473,8.6792Zm-374.76513-10.064-1.39844-1.42968c2.85986-2.79785,5.81934-5.564,8.79541-8.22119l1.332,1.49218C314.68756,159.8933,311.75055,162.63842,308.91217,165.41527ZM666.73,158.63549c-2.94434-2.67041-5.98438-5.3042-9.03516-7.82813l1.27539-1.541c3.07325,2.543,6.13672,5.19678,9.10352,7.88769Zm-339.99951-9.13184-1.2627-1.55078c3.09326-2.519,6.29-5.00342,9.502-7.38427l1.19141,1.60644C332.9732,144.53832,329.80035,147.00365,326.73053,149.50365Zm19.18213-14.21728-1.11622-1.65918c3.31055-2.22754,6.71875-4.40869,10.13038-6.48438l1.03906,1.709C352.58062,130.91137,349.1983,133.07641,345.91266,135.28637ZM366.30035,122.885l-.96-1.75488c3.50244-1.91651,7.09375-3.77588,10.67383-5.52735l.8789,1.79688C373.34039,119.13744,369.77643,120.98266,366.30035,122.885Zm241.37012-4.63379c-3.5586-1.77295-7.2041-3.48584-10.835-5.09082l.80859-1.8291c3.65918,1.61719,7.333,3.34326,10.91895,5.12988ZM387.72223,112.407l-.79493-1.835c3.66016-1.58642,7.4043-3.10791,11.12793-4.52246l.71,1.87012C395.06988,109.323,391.35455,110.83276,387.72223,112.407ZM585.774,108.5725c-3.70312-1.436-7.49316-2.80615-11.26562-4.07178l.63672-1.89648c3.80078,1.27588,7.62011,2.65625,11.35156,4.104Zm-175.74316-4.63672-.623-1.90039c3.80078-1.24609,7.67871-2.41943,11.52539-3.48633l.53467,1.92676C417.65045,101.5349,413.8023,102.699,410.03082,103.93578Zm153.06348-2.97363c-3.81446-1.0874-7.70508-2.1001-11.56348-3.00977l.459-1.94628c3.88868.9165,7.8086,1.937,11.65332,3.03222ZM433.05279,97.54662l-.44531-1.9497c3.89648-.89014,7.86572-1.70118,11.79687-2.41016l.35547,1.96777C440.858,95.85863,436.91949,96.66332,433.05279,97.54662Zm106.7876-2.06689c-3.89453-.731-7.86133-1.38135-11.791-1.93311l.27735-1.98047c3.96.55616,7.958,1.21143,11.88281,1.94776ZM456.565,93.30346l-.26465-1.98242c3.959-.52832,7.98535-.97266,11.9668-1.31934l.17383,1.99219C464.4898,92.33861,460.49469,92.779,456.565,93.30346ZM516.18121,92.156c-3.93945-.3711-7.94922-.65723-11.91894-.84912l.09765-1.99805c3.999.19385,8.03906.48193,12.00879.856Zm-35.81445-.9292-.084-1.998c3.67578-.15332,7.42188-.23144,11.13575-.23242l.90527.00146-.00586,2-.89941-.00146C487.733,90.99731,484.01422,91.07494,480.36676,91.2268Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#3f3d56">
                                                        </path>
                                                        <rect x="169" y="652.29235" width="732.99951" height="2"
                                                            fill="#3f3d56"></rect>
                                                        <path
                                                            d="M769.01079,405.02149l10,155s24,61,23,119c0,0-9,23-2,27s11,7,7,10-7,10-4,12,4,5,3,5h-30s6-15-3-19-4-14-4-14l-67-196-53,180s9,6,2,9-10-3-7,3-1,9-1,10-30-3-30-3,15-13,8-16-10-6-8-8,10-21,10-21,4-72,5-75,0-17,0-24-1-35,2-42,6-93,22-103S769.01079,405.02149,769.01079,405.02149Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#2f2e41">
                                                        </path>
                                                        <path
                                                            d="M642.01079,701.02149s20,41,6,46-32,1-36,7-48,13-49-2,48-43,48-43l6.38294-10.278Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#2f2e41">
                                                        </path>
                                                        <path
                                                            d="M804.01079,731.02149s20,41,6,46-32,1-36,7-48,13-49-2,48-43,48-43l6.38294-10.278Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#2f2e41">
                                                        </path>
                                                        <circle cx="540.51054" cy="94.52516" r="33" fill="#a0616a"></circle>
                                                        <polygon
                                                            points="563.011 112.025 559.011 141.025 529.011 164.025 521.011 153.025 521.011 115.025 563.011 112.025"
                                                            fill="#a0616a"></polygon>
                                                        <path
                                                            d="M687.01079,238.02149s31,3,47-8l32,189s-113,9-118,3v-59l20-96Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#3f3d56">
                                                        </path>
                                                        <path
                                                            d="M731.25716,220.98529l10.75363,9.0362s44,7,41,19l-12,142,4,48s-34-9-60,0-5.34348-193.40333-5.34348-193.40333S733.50353,223.94908,731.25716,220.98529Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M692.01079,231.93094s-32,23.09055-36,38.09055-17,173-17,173,6-3,9,2S697.01079,239.84039,692.01079,231.93094Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M678.52663,182.08371s-3.57245-5.35868-2.19843-11.12956a33.73126,33.73126,0,0,0,.96181-10.03036s2.88544-9.34334,5.77089-14.56461,1.51142-7.41972,10.58-9.06854,5.35868-13.4654,29.26664-.687a7.01143,7.01143,0,0,0,7.28231,2.748c4.94647-.96181,6.7327,5.90829,6.7327,5.90829s3.29765-1.92363,4.53427.82441,10.054-1.64932,10.054,16.9-10.03388,35.11857-10.03388,35.11857.73558-31.20212-15.61527-34.36236-33.93831-12.36619-38.19777-.54961A90.08054,90.08054,0,0,1,678.52663,182.08371Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#2f2e41">
                                                        </path>
                                                        <ellipse cx="570.83502" cy="96.20587" rx="3.22517" ry="4.30023"
                                                            fill="#a0616a"></ellipse>
                                                        <path
                                                            d="M606.301,494.446c-7.91283-4.75844-17.45386-4.395-21.08095-4.03157,1.38129,3.37232,5.52576,11.974,13.43859,16.73484,7.93214,4.77052,17.4605,4.39622,21.08216,4.0352C618.36014,507.81331,614.21507,499.208,606.301,494.446Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M643.48415,588.86985H594.02821a11.12758,11.12758,0,1,0,0,22.25517h49.45594a11.12759,11.12759,0,0,0,0-22.25517Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M867.43777,471.412H590.15352A24.56242,24.56242,0,0,0,565.591,495.97447V631.07289a24.56248,24.56248,0,0,0,24.56248,24.56248H867.43777a24.56247,24.56247,0,0,0,24.56247-24.56248V495.97447A24.56242,24.56242,0,0,0,867.43777,471.412ZM583.293,488.16737c.54757-.099,13.53156-2.30859,24.283,4.16077,10.75087,6.46815,14.88146,18.97582,15.0517,19.50467l.43467,1.34869-1.39517.24752a37.0364,37.0364,0,0,1-6.01718.44191c-4.88281,0-11.95829-.80776-18.26646-4.60389-10.75087-6.46694-14.88085-18.97461-15.0511-19.50346l-.43467-1.34869Zm60.19112,125.43045H594.02821a13.60038,13.60038,0,0,1,0-27.20076h49.45594a13.60038,13.60038,0,0,1,0,27.20076Zm225.02452-2.4728a14.88044,14.88044,0,0,1-14.83678,14.83679H816.57994A14.88045,14.88045,0,0,1,801.74315,611.125V588.86985a14.8804,14.8804,0,0,1,14.83679-14.83678h37.092a14.88039,14.88039,0,0,1,14.83678,14.83678Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M828.32572,606.79763H812.25254a4.32739,4.32739,0,0,0,0,8.65479h16.07318a4.32739,4.32739,0,1,0,0-8.65479Zm0,6.182H812.25254a1.8546,1.8546,0,1,1,0-3.70919h16.07318a1.8546,1.8546,0,1,1,0,3.70919Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M857.99929,606.79763H841.92611a4.3274,4.3274,0,1,0,0,8.65479h16.07318a4.32739,4.32739,0,0,0,0-8.65479Zm0,6.182H841.92611a1.8546,1.8546,0,1,1,0-3.70919h16.07318a1.8546,1.8546,0,0,1,0,3.70919Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M828.32572,595.67H812.25254a4.32739,4.32739,0,0,0,0,8.65479h16.07318a4.3274,4.3274,0,1,0,0-8.65479Zm0,6.182H812.25254a1.8546,1.8546,0,1,1,0-3.7092h16.07318a1.8546,1.8546,0,1,1,0,3.7092Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M857.99929,595.67H841.92611a4.3274,4.3274,0,1,0,0,8.65479h16.07318a4.32739,4.32739,0,0,0,0-8.65479Zm0,6.182H841.92611a1.8546,1.8546,0,0,1,0-3.7092h16.07318a1.8546,1.8546,0,0,1,0,3.7092Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M828.32572,584.54246H812.25254a4.32739,4.32739,0,0,0,0,8.65479h16.07318a4.32739,4.32739,0,1,0,0-8.65479Zm0,6.182H812.25254a1.8546,1.8546,0,0,1,0-3.7092h16.07318a1.8546,1.8546,0,0,1,0,3.7092Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M857.99929,584.54246H841.92611a4.3274,4.3274,0,1,0,0,8.65479h16.07318a4.3274,4.3274,0,0,0,0-8.65479Zm0,6.182H841.92611a1.8546,1.8546,0,0,1,0-3.7092h16.07318a1.8546,1.8546,0,0,1,0,3.7092Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <path
                                                            d="M780.01079,441.02149l-7.1683,23.39148s-1.8317,43.60852-25.8317,37.60852,7-57,7-57l7-11Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#a0616a">
                                                        </path>
                                                        <path
                                                            d="M644.01079,441.02149l-7.1683,23.39148s-1.8317,43.60852-25.8317,37.60852,7-57,7-57l7-11Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#a0616a">
                                                        </path>
                                                        <path
                                                            d="M775.01079,242.02149s16-4,21,23,11,104,11,104l-24,81s-24-13-29-11l18.88626-70.32085-15.88626-71.67915S771.01079,242.02149,775.01079,242.02149Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <polygon
                                                            points="580.747 209.393 601.747 279.393 580.747 350.393 592.747 279.393 580.747 209.393"
                                                            opacity="0.15"></polygon>
                                                        <path
                                                            d="M656.01079,297.02149l-36,142s18.98945,6.26719,25.98945,11.26719Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#d0cde1">
                                                        </path>
                                                        <circle cx="107.3622" cy="464.88438" r="100" fill="#3f3d56">
                                                        </circle>
                                                        <circle cx="107.3622" cy="464.88438" r="86" opacity="0.1"></circle>
                                                        <path
                                                            d="M274.24154,604.62862V592.11155c-6.32734-.12344-12.87306-2.355-16.69109-5.45315l2.618-8.30316a26.68127,26.68127,0,0,0,15.70942,5.3285c7.74578,0,12.98225-5.081,12.98225-12.14493,0-6.81644-4.2548-11.02974-12.32763-14.74807-11.12757-4.957-18.00034-10.6582-18.00034-21.43985,0-10.28667,6.43653-18.09425,16.47324-19.95312V502.88071h6.76357V514.9022a26.54268,26.54268,0,0,1,14.18232,4.33734l-2.7277,8.17972a24.10675,24.10675,0,0,0-13.74554-4.2139c-8.39987,0-11.56381,5.70063-11.56381,10.6582,0,6.4443,4.03641,9.66645,13.52769,14.12845,11.23623,5.205,16.90947,11.64935,16.90947,22.67909,0,9.79049-6.00029,18.962-17.23705,21.06771v12.88981Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#6c63ff">
                                                        </path>
                                                        <path
                                                            d="M384.00024,757.28868a722.02568,722.02568,0,0,1-213,0v-24a802.32929,802.32929,0,0,0,213,0Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#3f3d56">
                                                        </path>
                                                        <path
                                                            d="M384.00024,720.28868a722.02568,722.02568,0,0,1-213,0v-24a802.32929,802.32929,0,0,0,213,0Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#3f3d56">
                                                        </path>
                                                        <path
                                                            d="M384.00024,683.28868a722.02568,722.02568,0,0,1-213,0v-24a802.32929,802.32929,0,0,0,213,0Z"
                                                            transform="translate(-171.00024 -88.99633)" fill="#3f3d56">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-7 col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h6 class="card-title mb-0">Impressions & Data Traffic</h6>
                                                <small class="text-muted">Or you can <a href="#">sync data to Dashboard</a>
                                                    to ensure your data is always up-to-date.</small>
                                            </div>

                                            <div class="dropdown morphing scale-left">
                                                <a href="#" class="card-fullscreen" data-bs-toggle="tooltip"
                                                    title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                                                <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                                <ul class="dropdown-menu shadow border-0 p-2">
                                                    <li><a class="dropdown-item" href="#">File Info</a></li>
                                                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                                                    <li><a class="dropdown-item" href="#">Move to</a></li>
                                                    <li><a class="dropdown-item" href="#">Rename</a></li>
                                                    <li><a class="dropdown-item" href="#">Block</a></li>
                                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="d-flex flex-row flex-wrap">
                                                <div class="card py-2 px-3 me-2 mt-2">
                                                    <small class="text-uppercase text-muted"><i
                                                            class="fa fa-square me-1 chart-text-color1"></i>Impressions</small>
                                                    <div><span class="fs-4 fw-bold">4.2M</span> <span
                                                            class="text-success fa fa-level-up">43%</span></div>
                                                    <div class="text-muted small">5.0M Total Target</div>
                                                </div>
                                                <div class="card py-2 px-3 me-2 mt-2">
                                                    <small class="text-uppercase text-muted"><i
                                                            class="fa fa-square me-1 chart-text-color5"></i>Data
                                                        Transfered</small>
                                                    <div><span class="fs-4 fw-bold">8.3M</span> <span
                                                            class="text-danger fa fa-level-down">17%</span></div>
                                                    <div class="text-muted small">10.0M Total Target</div>
                                                </div>
                                                <div class="card py-2 px-3 me-2 mt-2">
                                                    <small class="text-muted text-uppercase">Delevered</small>
                                                    <div><span class="fs-4 fw-bold">87%</span></div>
                                                    <div class="progress mt-1" style="height: 5px;">
                                                        <div class="progress-bar chart-color1" role="progressbar"
                                                            aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 87%;"></div>
                                                    </div>
                                                </div>
                                                <div class="card py-2 px-3 me-2 mt-2">
                                                    <small class="text-muted text-uppercase">Transfered</small>
                                                    <div><span class="fs-4 fw-bold">77%</span></div>
                                                    <div class="progress mt-1" style="height: 5px;">
                                                        <div class="progress-bar chart-color5" role="progressbar"
                                                            aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 77%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="apex_c_5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-12">
                                    <div class="row-title mb-2">
                                        <h5 class="fw-light mb-0">Recent Campaigns</h5>
                                        <div>
                                            <div class="input-group">
                                                <select class="form-select">
                                                    <option selected>Filter</option>
                                                    <option value="1">Designer</option>
                                                    <option value="2">Developer</option>
                                                    <option value="3">Office</option>
                                                    <option value="4">Friends</option>
                                                    <option value="5">Management</option>
                                                    <option value="6">Colleagues</option>
                                                </select>
                                                <button class="btn btn-outline-secondary" type="button"><i
                                                        class="fa fa-upload"></i><span
                                                        class="d-none d-md-inline-block ms-2">Import</span></button>
                                                <button class="btn btn-outline-secondary" type="button"><i
                                                        class="fa fa-download"></i><span
                                                        class="d-none d-md-inline-block ms-2">Export</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded-4 img-thumbnail" src="{{asset('assets/img/gallery/1.jpg')}}"
                                                alt="">
                                            <div
                                                class="media-body ms-0 ms-4 ms-xxl-5 text-md-start text-center w-100 mt-4 mt-md-0">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-xxl-6 col-xl-5 col-lg-4 col-md-12 mb-3 mb-lg-0">
                                                        <h6 class="mb-1">New Freebies for Designer and Developer</h6>
                                                        <div class="text-muted">Regular (Send by time zone) 22 Dec 2021
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 text-center">
                                                        <ul class="list-unstyled d-flex mb-0 text-center text-md-start">
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">3,021</h6>
                                                                <div class="text-muted">Recipents</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        aria-valuenow="77" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 77%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3 mx-1">
                                                                <h6 class="mb-1">12.5%</h6>
                                                                <div class="text-muted">Opened</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-secondary"
                                                                        role="progressbar" aria-valuenow="91"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width: 91%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">5.7%</h6>
                                                                <div class="text-muted">Clicked</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 85%;"></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 text-center text-md-end mt-3 mt-md-0">
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"><i
                                                                class="fa fa-copy"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex  align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded-4 img-thumbnail" src="{{asset('assets/img/gallery/2.jpg')}}"
                                                alt="">
                                            <div
                                                class="media-body ms-0 ms-4 ms-xxl-5 text-md-start text-center w-100 mt-4 mt-md-0">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-xxl-6 col-xl-5 col-lg-4 col-md-12 mb-3 mb-lg-0">
                                                        <h6 class="mb-1">Lucid - VueJS Admin Template & Webapp kit</h6>
                                                        <div class="text-muted">Regular (Send by time zone) 25 Dec 2021
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 text-center">
                                                        <ul class="list-unstyled d-flex mb-0 text-center text-md-start">
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">5,201</h6>
                                                                <div class="text-muted">Recipents</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        aria-valuenow="77" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 77%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3 mx-1">
                                                                <h6 class="mb-1">16.5%</h6>
                                                                <div class="text-muted">Opened</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-secondary"
                                                                        role="progressbar" aria-valuenow="91"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width: 91%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">5.7%</h6>
                                                                <div class="text-muted">Clicked</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 85%;"></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 text-center text-md-end mt-3 mt-md-0">
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"><i
                                                                class="fa fa-copy"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex  align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded-4 img-thumbnail" src="{{asset('assets/img/gallery/3.jpg')}}"
                                                alt="">
                                            <div
                                                class="media-body ms-0 ms-4 ms-xxl-5 text-md-start text-center w-100 mt-4 mt-md-0">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-xxl-6 col-xl-5 col-lg-4 col-md-12 mb-3 mb-lg-0">
                                                        <h6 class="mb-1">Alpino - Bootstrap 4 Admin Dashboard Template</h6>
                                                        <div class="text-muted">Regular (Send by time zone) 26 Dec 2021
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 text-center">
                                                        <ul class="list-unstyled d-flex mb-0 text-center text-md-start">
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">3,548</h6>
                                                                <div class="text-muted">Recipents</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        aria-valuenow="77" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 77%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3 mx-1">
                                                                <h6 class="mb-1">18.5%</h6>
                                                                <div class="text-muted">Opened</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-secondary"
                                                                        role="progressbar" aria-valuenow="91"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width: 91%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">8.7%</h6>
                                                                <div class="text-muted">Clicked</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 85%;"></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 text-center text-md-end mt-3 mt-md-0">
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"><i
                                                                class="fa fa-copy"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body d-flex  align-items-center flex-column flex-md-row">
                                            <img class="w120 rounded-4 img-thumbnail" src="{{asset('assets/img/gallery/4.jpg')}}"
                                                alt="">
                                            <div
                                                class="media-body ms-0 ms-4 ms-xxl-5 text-md-start text-center w-100 mt-4 mt-md-0">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-xxl-6 col-xl-5 col-lg-4 col-md-12 mb-3 mb-lg-0">
                                                        <h6 class="mb-1">New sale LUNO Admin template</h6>
                                                        <div class="text-muted">Regular (Send by time zone) 31 Dec 2021
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 text-center">
                                                        <ul class="list-unstyled d-flex mb-0 text-center text-md-start">
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">1,850</h6>
                                                                <div class="text-muted">Recipents</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        aria-valuenow="77" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 77%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3 mx-1">
                                                                <h6 class="mb-1">10.5%</h6>
                                                                <div class="text-muted">Opened</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-secondary"
                                                                        role="progressbar" aria-valuenow="91"
                                                                        aria-valuemin="0" aria-valuemax="100"
                                                                        style="width: 91%;"></div>
                                                                </div>
                                                            </li>
                                                            <li class="flex-fill card py-2 px-3">
                                                                <h6 class="mb-1">5.7%</h6>
                                                                <div class="text-muted">Clicked</div>
                                                                <div class="progress mt-1" style="height: 1px;">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100" style="width: 85%;"></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 text-center text-md-end mt-3 mt-md-0">
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                                class="fa fa-pencil"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-sm btn-link color-400"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"><i
                                                                class="fa fa-copy"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="modal fade" id="CreateCampaigns" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-body custom_scroll p-lg-5">
                                            <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                            <h4 class="modal-title">Create Campaigns</h4>
                                            <p class="text-muted">All the Lorem Ipsum generators on the Internet tend to
                                                repeat predefined chunks as necessary</p>
                                            <div class="row g-2 mt-3">
                                                <div class="col-12">
                                                    <label class="form-label">Campaigns Title</label>
                                                    <input type="text" class="form-control" placeholder="Campaigns Title">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Campaigns description</label>
                                                    <textarea class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Date</label>
                                                    <input class="form-control" type="date">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Time</label>
                                                    <input class="form-control" type="time">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Duration</label>
                                                    <input class="form-control" type="number" placeholder="1h 45m">
                                                </div>
                                                <div class="col-12 text-muted">
                                                    <p class="small"><span class="fa fa-check-circle pe-1"></span>This event
                                                        will take place on the july 14, 2022 form 02:30 PM untill 05:15 PM
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Location</label>
                                                    <input class="form-control" type="text" placeholder="Location">
                                                </div>
                                                <div class="col-12 my-4">
                                                    <label class="me-3">Participate :</label>
                                                    <a href="#" title=""><img class="avatar sm rounded"
                                                            src="{{asset('assets/img/xs/avatar3.jpg')}}" alt="friend"> </a>
                                                    <a href="#" title=""><img class="avatar sm rounded"
                                                            src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="friend"> </a>
                                                    <a href="#" title=""><img class="avatar sm rounded"
                                                            src="{{asset('assets/img/xs/avatar7.jpg')}}" alt="friend"> </a>
                                                    <a href="#" title=""><img class="avatar sm rounded"
                                                            src="{{asset('assets/img/xs/avatar9.jpg')}}" alt="friend"> </a>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Set reminder</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Email" value="option1">
                                                                <label class="form-check-label" for="Email">Email</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Stack" value="option2">
                                                                <label class="form-check-label" for="Stack">Stack</label>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                            aria-label="1 hour before event">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button class="btn btn-lg btn-secondary text-uppercase" type="button"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-lg btn-primary text-uppercase"
                                                        type="button">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script src="{{asset('assets/js/bundle/apexcharts.bundle.js')}}"></script>

                            <script>
                                // Apex-wc-1
                                var apexwc1 = {
                                    chart: {
                                        type: 'bar',
                                        height: 50,
                                        sparkline: {
                                            enabled: true
                                        },
                                    },
                                    series: [{
                                        data: [47, 45, 54, 38, 24, 65, 31, 45, 56, 24, 65, 31]
                                    }],
                                    colors: ['var(--chart-color1)'],
                                }
                                new ApexCharts(document.querySelector("#apex_c_1"), apexwc1).render();
                                // Apex-wc-2
                                var apexwc2 = {
                                    chart: {
                                        type: 'bar',
                                        height: 50,
                                        sparkline: {
                                            enabled: true
                                        },
                                    },
                                    series: [{
                                        data: [47, 45, 54, 38, 56, 24, 24, 65, 31, 45, 65, 31]
                                    }],
                                    colors: ['var(--chart-color2)'],
                                }
                                new ApexCharts(document.querySelector("#apex_c_2"), apexwc2).render();
                                // Apex-wc-3
                                var apexwc3 = {
                                    chart: {
                                        type: 'bar',
                                        height: 50,
                                        sparkline: {
                                            enabled: true
                                        },
                                    },
                                    series: [{
                                        data: [47, 24, 65, 31, 45, 45, 54, 38, 56, 24, 65, 31]
                                    }],
                                    colors: ['var(--chart-color3)'],
                                }
                                new ApexCharts(document.querySelector("#apex_c_3"), apexwc3).render();
                                // Apex-wc-4
                                var apexwc4 = {
                                    chart: {
                                        type: 'line',
                                        height: 50,
                                        sparkline: {
                                            enabled: true
                                        },
                                    },
                                    series: [{
                                        data: [47, 56, 24, 65, 31, 45, 54, 38, 24, 65, 31, 45]
                                    }],
                                    stroke: {
                                        width: 2,
                                        curve: 'smooth',
                                    },
                                    colors: ['var(--chart-color5)'],
                                }
                                new ApexCharts(document.querySelector("#apex_c_4"), apexwc4).render();
                                // Apex-wc-9
                                var apexwc9 = {
                                    series: [{
                                        name: "IMPRESSIONS",
                                        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                                    }, {
                                        name: "TRANSFERED",
                                        data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                                    }],
                                    chart: {
                                        height: 320,
                                        type: 'line', // line, bar, area
                                        toolbar: {
                                            show: false,
                                        },
                                        zoom: {
                                            enabled: false
                                        },
                                    },
                                    colors: ['var(--chart-color1)', 'var(--chart-color5)'],
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        width: [2, 2],
                                        curve: 'smooth', // straight, smooth
                                        dashArray: [10, 0]
                                    },
                                    legend: {
                                        tooltipHoverFormatter: function (val, opts) {
                                            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                                        }
                                    },
                                    markers: {
                                        size: 0,
                                        hover: {
                                            sizeOffset: 6
                                        }
                                    },
                                    xaxis: {
                                        categories: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                                    },
                                    tooltip: {
                                        y: [{
                                            title: {
                                                formatter: function (val) {
                                                    return val + " (M)"
                                                }
                                            }
                                        }, {
                                            title: {
                                                formatter: function (val) {
                                                    return val + " (M)"
                                                }
                                            }
                                        }]
                                    },
                                };
                                new ApexCharts(document.querySelector("#apex_c_5"), apexwc9).render();
                            </script>
                        </div>

                        <div class="tab-pane fade" id="profile_activity" role="tabpanel">
                            <div class="row-title mb-2">
                                <h5>User Activity</h5>
                            </div>

                            <div class="card p-md-4 p-2">
                                <div class="timeline-item ti-danger ms-2">
                                    <div class="d-flex">
                                        <img class="avatar sm rounded-circle" src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1">Gerald Vaughn changed the status to QA on <strong>MA-86 -
                                                    Retargeting Ads</strong></div>
                                            <span class="d-flex text-muted mb-3 small">New Dashboard Design - 9:24PM by <a
                                                    class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                                            <div class="card p-3"> I’ve prepared all sizes for you. Can you take a look
                                                tonight so we can prepare my final invoice? </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item ti-info ms-2">
                                    <div class="d-flex">
                                        <img class="avatar sm rounded-circle" src="{{asset('assets/img/xs/avatar2.jpg')}}" alt="">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1">Gerald Vaughn commented on <strong>DA-459 - Mediation: Demand
                                                    Source Logo Size</strong></div>
                                            <span class="d-flex text-muted mb-3 small">Portfolio Updates for Jason Carroll -
                                                7:12PM by <a class="ms-2" href="#" title=""><strong>Orlando</strong></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item ti-success ms-2">
                                    <div class="d-flex">
                                        <img class="avatar sm rounded-circle" src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1">Gerald Vaughn changed the status to QA on <strong>MA-45 -
                                                    Finish Prototype</strong></div>
                                            <span class="d-flex text-muted mb-3 small">New Dashboard Design - 11:30AM by <a
                                                    class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item ti-primary ms-2">
                                    <div class="d-flex">
                                        <img class="avatar sm rounded-circle" src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1">Create new development team for <strong>MA-86 - stocks for our
                                                    Instagram channel</strong></div>
                                            <span class="d-flex text-muted mb-3 small">Marketing Templates & Strategy -
                                                7:58AM by <a class="ms-2" href="#" title=""><strong>You</strong></a> </span>
                                            <div class="card p-3"> What do you think about these? Should I continue in this
                                                style? </div>
                                            <div class="project-members mt-3">
                                                <label class="me-3">Team :</label>
                                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar3.jpg')}}" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar1.jpg')}}" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar7.jpg')}}" alt="friend"> </a>
                                                <a href="#" title=""><img class="avatar xs rounded-circle"
                                                        src="{{asset('assets/img/xs/avatar9.jpg')}}" alt="friend"> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item ti-warning ms-2">
                                    <div class="d-flex">
                                        <img class="avatar sm rounded-circle" src="{{asset('assets/img/xs/avatar4.jpg')}}" alt="">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1">update new source code on GitHub <strong>MA-78 - Retargeting
                                                    React Webapp</strong></div>
                                            <span class="d-flex text-muted mb-3 small">New Dashboard Design - 9:24PM by <a
                                                    class="ms-2" href="#" title=""><strong>Chris</strong></a> </span>
                                            <div class="alert alert-success rounded"> I’ve prepared all sizes for you. Can
                                                you take a look tonight so we can prepare my final invoice? </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="edit_profile">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title">Edit details</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form id="profileForm" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <div class="col-md-12">
                                    <div class="image-input avatar xxl rounded-4"
                                        style="background-image: url({{ auth('admin')->user()->photo
                                                ? asset('storage/' . auth('admin')->user()->photo)
                                                : asset('assets/img/avatar.png') }})">
                                        <div class="avatar-wrapper rounded-4"></div>
                                        <div class="file-input">
                                            <input type="file" class="form-control" name="photo" id="photo">
                                            <label for="photo" class="fa fa-pencil shadow"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Allie Grater" value="{{ auth('admin')->user()->name }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="alliegrater@luno.com" value="{{ auth('admin')->user()->email }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="alliegrater" value="{{ auth('admin')->user()->username }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="********">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="010000000" value="{{ auth('admin')->user()->phone }}">
                                </div>
                                <!-- <div class="col-12">
                                    <label class="form-label">Address 2</label>
                                    <input type="text" class="form-control" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" placeholder="New york">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">State</label>
                                    <select class="form-select">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div> -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update Details</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="offcanvas">Cancel</button>
                                </div>
                            </form>
                            <script>
                                $('#profileForm').on('submit', function (e) {
                                    e.preventDefault();

                                    // Show loading state
                                    $('button[type="submit"]').prop('disabled', true).html('Updating...');

                                    let formData = new FormData(this);

                                    $.ajax({
                                        url: "{{ route('admin.profile.update') }}",
                                        method: "POST",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function (res) {
                                            // Show success message
                                            if(res.success) {       
                                                alert(res.message || 'Profile updated successfully!');
                                                location.reload(); // Reload to show updated data
                                            } else {
                                                alert(res.message || 'Something went wrong!');
                                            }
                                            $('button[type="submit"]').prop('disabled', false).html('Update Details');
                                        },
                                        error: function (xhr) {
                                            // Handle errors
                                            let errors = xhr.responseJSON?.errors;
                                            let message = xhr.responseJSON?.message;

                                            if(errors) {
                                                // Show all validation errors
                                                let errorMsg = '';
                                                for(let field in errors) {
                                                    errorMsg += errors[field].join('\n') + '\n';
                                                }
                                                alert('Validation errors:\n' + errorMsg);
                                            } else if(message) {
                                                alert('Error: ' + message);
                                            } else {
                                                alert('Something went wrong! Please try again.');
                                            }

                                            console.error('AJAX Error:', xhr);
                                            $('button[type="submit"]').prop('disabled', false).html('Update Details');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection