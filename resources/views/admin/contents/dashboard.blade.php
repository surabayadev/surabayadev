@extends('admin::layouts.default')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    <a href="https://api.instagram.com/oauth/authorize/?client_id={{ config('services.instagram.client_id') }}&redirect_uri={{ config('services.instagram.redirect_url') }}&response_type=code" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fab fa-instagram fa-sm text-white-50"></i> Connect Instagram</a>
</div>


<div class="row">
    <!-- Total User -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">1769</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Events -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Events</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">32</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All Blog -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Blogs</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">72</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-align-justify fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Testimonies -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Testimonies</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Register Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">All Resources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direct
                </span>
                    <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                </span>
                    <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Referral
                </span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Upcoming Event</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://scontent-sin2-1.cdninstagram.com/vp/618c7161037f313d24a8ec77539d1a1f/5D339664/t51.2885-15/sh0.08/e35/s640x640/54247537_306768846660512_707140788838600121_n.jpg?_nc_ht=scontent-sin2-1.cdninstagram.com&_nc_cat=108" alt="">
                </div>
                <h5>Vue.js Workshop 2019</h5>
                <p>Ayo rek meluo acara e SurabayaDev. Kali iki, Acara e mbahas soal Vue.Js. Wes ngerti Vue.Js opo durung rek? Opo seh Vue.Js iku? Vue.Js iku semacem gudang e kata Javascript, seng digae mbangun tampilan awal e suatu website seng interaktif. Lah,daripada penasaran kan. Ayo rek meluo acara iki,ben lebih paham opo iku Vue.Js.</p>
                <div class="clearfix">
                    <a target="_blank" class="float-left" href="{{ route('admin.event.show', 1) }}"><i class="fas fa-fw fa-pencil-alt"></i> Edit Event</a>
                    <a target="_blank" class="float-right" href="{{ route('event.index') }}">Go to Event Page &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Past Events</h6>
            </div>
            <div>
                <div class="list-group">
                    @for ($i = 0; $i < 5; $i++)
                        <a href="{{ route('admin.event.show', 1) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 font-weight-bold">Create your own PHP Package</h6>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1" style="font-size: 15px;">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small class="font-weight-bold mr-2"><i class="fas fa-fw fa-star"></i> Antoni Putra</small>
                            <small><i class="fas fa-fw fa-user"></i> 40</small>
                        </a>
                    @endfor
                    <a href="{{ route('admin.event.index') }}" class="list-group-item list-group-item-action text-center">
                        See all Events &raquo;
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ admin_asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ admin_asset('js/demo/chart-pie-demo.js') }}"></script>
@stop
