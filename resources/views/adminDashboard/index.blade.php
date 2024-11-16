@extends('adminDashboard.layouts.dashboard')

@section('content')
<!-- content -->
<div class="content ">

<div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 bg-purple">
                <div class="card-body text-center">
                    <div class="text-white-50">
                        <div class="bi bi-box-seam display-6 mb-3"></div>
                        <div class="display-8 mb-2">Products Buy</div>
                        <h5>{{ array_sum($buysData) }} Sold</h5>
                    </div>

                    <!-- Bar chart -->
                    <div class="bar-chart-container" style="display: flex; justify-content: space-between; align-items: flex-end; height: 150px; background-color: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 8px;">
                        @foreach($buysData as $day => $sales)
                            <div class="bar" style="width: 30px; background-color: rgba(255, 255, 255, 0.6); border-radius: 4px; height: {{ $sales / 100 }}%;" data-sales="{{ $sales }}">
                                <span style="position: absolute; top: -25px; color: rgba(255, 255, 255, 0.85); font-size: 12px;">${{ $sales }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Labels -->
                    <div class="bar-chart-labels" style="display: flex; justify-content: space-between; margin-top: 10px;">
                        @foreach($salesData as $day => $sales)
                            <div style="width: 30px; text-align: center; color: white; font-size: 12px;">{{ $day }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 bg-purple">
                <div class="card-body text-center">
                    <div class="text-white-50">
                        <div class="bi bi-box-seam display-6 mb-3"></div>
                        <div class="display-8 mb-2">Products Sold</div>
                        <h5>{{ array_sum($salesData) }} Sold</h5>
                    </div>

                    <!-- Bar chart -->
                    <div class="bar-chart-container" style="display: flex; justify-content: space-between; align-items: flex-end; height: 150px; background-color: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 8px;">
                        @foreach($salesData as $day => $sales)
                            <div class="bar" style="width: 30px; background-color: rgba(255, 255, 255, 0.6); border-radius: 4px; height: {{ $sales / 100 }}%;" data-sales="{{ $sales }}">
                                <span style="position: absolute; top: -25px; color: rgba(255, 255, 255, 0.85); font-size: 12px;">${{ $sales }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Labels -->
                    <div class="bar-chart-labels" style="display: flex; justify-content: space-between; margin-top: 10px;">
                        @foreach($salesData as $day => $sales)
                            <div style="width: 30px; text-align: center; color: white; font-size: 12px;">{{ $day }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-truck text-secondary"></i>
                                </div>
                                <h5 class="my-3">Sell Orders</h5>
                                <div class="text-muted">{{ $buyOrdersCount }}</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="display-5">
                                    <i class="bi bi-receipt text-warning"></i>
                                </div>
                                <h5 class="my-3">Buy Orders</h5>
                                <div class="text-muted">{{ $sellOrdersCount }}</div>

                            </div>
                        </div>
                    </div>


                </div>
        </div>


    </div>

    </div>
    @endsection
