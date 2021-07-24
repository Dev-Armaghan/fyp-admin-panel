@extends('dashboard')

@section('content')
    <div class="row dashboard-items">
        <a href="totalOrders">
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title dashboard-card-text">Total Orders Today</h3>
                <ul class="list-inline two-part">
                    {{-- <li>
                        <div id="sparklinedash"></div>
                    </li> --}}
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">20</span></li>
                </ul>
            </div>
        </div>
        </a>
            <a href="orders">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title dashboard-card-text">New Orders</h3>
                            <ul class="list-inline two-part">
                    {{-- <li>
                        <div id="sparklinedash"></div>
                    </li> --}}
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">10</span></li>
                            </ul>
                    </div>
       
                 </div>
            </a>
    </div>
@endsection