@extends('admin.layout.app')
@section('title', 'Profile')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="padding-20">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <a class="nav-item nav-link active" id="category-1-nav" data-toggle="tab" href="#category-1"
                                        role="tab" data-analytics-track="click" data-analytics-key="seoTabClick"
                                        data-analytics-set-group="click,#nav-tabContent,seoTabContent-Top Vendors"
                                        aria-controls="category-1" aria-selected="false">Daily Reports
                                    </a>
                                    {{-- <a class="nav-item nav-link active" id="category-2-nav" data-toggle="tab"
                                        href="#category-2" role="tab" data-analytics-track="click"
                                        data-analytics-key="seoTabClick"
                                        data-analytics-set-group="click,#nav-tabContent,seoTabContent-Top Vendors"
                                        aria-controls="category-2" aria-selected="false">Weekly Reports
                                    </a> --}}
                                    <a class="nav-item nav-link" id="category-3-nav" data-toggle="tab" href="#category-3"
                                        role="tab" data-analytics-track="click" data-analytics-key="seoTabClick"
                                        data-analytics-set-group="click,#nav-tabContent,seoTabContent-Top Vendors"
                                        aria-controls="category-3" aria-selected="false">Monthly Reports
                                    </a>
                                    <a class="nav-item nav-link" id="category-4-nav" data-toggle="tab" href="#category-4"
                                        role="tab" data-analytics-track="click" data-analytics-key="seoTabClick"
                                        data-analytics-set-group="click,#nav-tabContent,seoTabContent-Top Vendors"
                                        aria-controls="category-4" aria-selected="false">Yearly Reports
                                    </a>
                                </ul>
                                <div class="tab-content tab-bordered" id="myTab3Content">
                                    <div class="tab-pane fade unauth-job-list active show" id="category-1" role="tabpanel"
                                        aria-labelledby="category-1-nav" data-an-category="seoTabContent-Top Clients">
                                        <div class="card-body table-striped table-bordered table-responsive">
                                            <table class="table text-center" id="table_id_events">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Order ID</th>
                                                        <th>Payment</th>
                                                        <th>Total</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $totalAmount = 0;
                                                @endphp
                                                    @foreach ($dailyOrders as $dailyOrder)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $dailyOrder->code }}</td>
                                                            <td>{{ $dailyOrder->payment }}</td>
                                                            <td>{{ $dailyOrder->total_amount }}</td>
                                                            <td>{{ $dailyOrder->created_at->format('d-m-Y') }}</td>
                                                            <td>{{ $dailyOrder->status }}</td>

                                                        </tr>
                                                        @php
                                                        $totalAmount += $dailyOrder->total_amount;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <h4>total amount:{{ $totalAmount }}</h4>
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade unauth-job-list  active show" id="category-2" role="tabpanel"
                                        aria-labelledby="category-2-nav" data-an-category="seoTabContent-Top Clients">
                                        <div class="card-body table-striped table-bordered table-responsive">
                                            <table class="table text-center" id="table_id_events">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Order ID</th>
                                                        <th>Payment</th>
                                                        <th>Total</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $totalAmount = 0;
                                                @endphp
                                                    @foreach ($weeklyOrders as $weeklyOrder)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $weeklyOrder->code }}</td>
                                                            <td>{{ $weeklyOrder->payment }}</td>
                                                            <td>{{ $weeklyOrder->total_amount }}</td>
                                                            <td>{{ $weeklyOrder->created_at }}</td>
                                                            <td>{{ $weeklyOrder->status }}</td>

                                                        </tr>
                                                        @php
                                                        $totalAmount += $weeklyOrder->total_amount;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <h4>total amount:{{ $totalAmount }}</h4>
                                        </div>
                                    </div> --}}
                                    <div class="tab-pane fade unauth-job-list" id="category-3" role="tabpanel"
                                        aria-labelledby="category-3-nav" data-an-category="seoTabContent-Top Clients">
                                        <div class="card-body table-striped table-bordered table-responsive">
                                            <table class="table text-center" id="table_id_events1">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Order ID</th>
                                                        <th>Payment</th>
                                                        <th>Total</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $totalAmount = 0;
                                                @endphp
                                                    @foreach ($monthlyOrders as $monthlyOrder)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $monthlyOrder->code }}</td>
                                                            <td>{{ $monthlyOrder->payment }}</td>
                                                            <td>{{ $monthlyOrder->total_amount }}</td>
                                                            <td>{{ $monthlyOrder->created_at }}</td>
                                                            <td>{{ $monthlyOrder->status }}</td>

                                                        </tr>
                                                        @php
                                                        $totalAmount += $monthlyOrder->total_amount;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <h4>total amount:{{ $totalAmount }}</h4>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade unauth-job-list" id="category-4" role="tabpanel"
                                        aria-labelledby="category-4-nav" data-an-category="seoTabContent-Top Clients">
                                        <div class="card-body table-striped table-bordered table-responsive">
                                            <table class="table text-center" id="table_id_events2">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Order ID</th>
                                                        <th>Payment</th>
                                                        <th>Total</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $totalAmount = 0;
                                                @endphp
                                                    @foreach ($yearlyOrders as $yearlyOrder)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $yearlyOrder->code }}</td>
                                                            <td>{{ $yearlyOrder->payment }}</td>
                                                            <td>{{ $yearlyOrder->total_amount }}</td>
                                                            <td>{{ $yearlyOrder->created_at }}</td>
                                                            <td>{{ $yearlyOrder->status }}</td>

                                                        </tr>
                                                        @php
                                                        $totalAmount += $yearlyOrder->total_amount;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <h4>total amount:{{ $totalAmount }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Add click event handler to the tab links
            $('.nav-link').click(function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Get the target tab content ID from the href attribute
                var target = $(this).attr('href');

                // Show the target tab content and hide others
                $(target).addClass('active show').siblings().removeClass('active show');

                // Update the active class for the clicked tab link
                $(this).addClass('active').siblings().removeClass('active');
            });
        });
    </script>
    @if (\Illuminate\Support\Facades\Session::has('message'))
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('message') }}');
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#table_id_events').DataTable()

        })
        $(document).ready(function() {
            $('#table_id_events1').DataTable()

        })
        $(document).ready(function() {
            $('#table_id_events2').DataTable()

        })
    </script>
@endsection


