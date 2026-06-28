
@extends('admin.dashboard_master')

 @section('content')
 <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header pb-3 mb-4 border-bottom border-light border-opacity-10">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                            <p class="text-muted small">Welcome back, Md. Sadikuzzaman. Here’s your latest admin overview.</p>
                        </div>
                        <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                            <ol class="breadcrumb justify-content-sm-end mb-0">
                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content Header-->

            <!--begin::Metrics row-->
            <div class="container-fluid">
                <div class="row g-3">
                    <div class="col-lg-4 col-sm-6">
                        <div class="metric-box p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h4>{{ $blogCount ?? 0 }}</h4>
                                    <p class="mb-0">Total Blogs</p>
                                </div>
                                <div class="icon shadow-sm">
                                    <i class="bi bi-graph-up-arrow fs-4"></i>
                                </div>
                            </div>
                            <div class="progress" style="height: 0.35rem;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 68%;" aria-valuenow="68"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="metric-box p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h4>{{ $journalCount ?? 0 }}</h4>
                                    <p class="mb-0">Total Journals</p>
                                </div>
                                <div class="icon shadow-sm">
                                    <i class="bi bi-lightning-charge-fill fs-4"></i>
                                </div>
                            </div>
                            <div class="progress" style="height: 0.35rem;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%;" aria-valuenow="92"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="metric-box p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <h4>{{ $pendingApprovals ?? 0 }}</h4>
                                    <p class="mb-0">Pending approvals (Journal drafts)</p>
                                </div>
                                <div class="icon shadow-sm">
                                    <i class="bi bi-clock-history fs-4"></i>
                                </div>
                            </div>
                            <div class="progress" style="height: 0.35rem;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 36%;" aria-valuenow="36"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Metrics row-->

                <!--begin::Main cards row-->
                <div class="row mt-4 g-4">
                    <div class="col-lg-8">
                        <div class="card card-glass p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h5 class="card-title mb-1">Overview</h5>
                                    <p class="text-muted small mb-0">Latest traffic, system health and recent activity.</p>
                                </div>
                                <button class="btn btn-sm btn-outline-light">View report</button>
                            </div>
                            <div id="analyticsChart" style="min-height: 280px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-glass p-4 h-100">
                            <h5 class="card-title">Quick actions</h5>
                            <div class="list-group list-group-flush mt-3">
                                <a href="#" class="list-group-item list-group-item-action bg-transparent border-0 px-0 py-3 text-white">
                                    <i class="bi bi-pencil-square me-2 text-info"></i> Create new blog post
                                </a>
                                <a href="#" class="list-group-item list-group-item-action bg-transparent border-0 px-0 py-3 text-white">
                                    <i class="bi bi-people-fill me-2 text-success"></i> Review comments
                                </a>
                                <a href="#" class="list-group-item list-group-item-action bg-transparent border-0 px-0 py-3 text-white">
                                    <i class="bi bi-chat-left-text me-2 text-warning"></i> Check support tickets
                                </a>
                            </div>
                        </div>
                    </div>
                            
                </div>
                <!--end::Main cards row-->
            </div>
            <!--end::App Content-->
        </main>

        @endsection