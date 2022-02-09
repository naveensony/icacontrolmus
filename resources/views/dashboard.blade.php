@extends('layouts.app')
@section('custom_css')
@endsection 
@section('content')
<div id="wrapper">
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!--<span class="label label-success pull-right">Monthly</span>-->
                                <h5>Registered Students</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">200</h1>
                                <div class="stat-percent font-bold text-success">33.33% <i class="fa fa-bolt"></i></div>
                                <small>Students</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!--<span class="label label-info pull-right">Annual</span>-->
                                <h5>Students Awaiting Registration</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">300</h1>
                                <div class="stat-percent font-bold text-info">50% <i class="fa fa-level-up"></i></div>
                                <small>Students</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!--<span class="label label-primary pull-right">Today</span>-->
                                <h5>Prospective Students</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">100</h1>
                                <div class="stat-percent font-bold text-navy">16.67% <i class="fa fa-level-up"></i></div>
                                <small>Students</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <!--<span class="label label-danger pull-right">Low value</span>-->
                                <h5>Total Students</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">600</h1>
                                <!--<div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>-->
                                <small>Students</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Registered Students by Month</h5>
					</div>
					<div class="ibox-content">
						<div>
							<canvas id="barChart" height="140"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Polar Area</h5>

					</div>
					<div class="ibox-content">
						<div class="text-center">
							<canvas id="polarChart" height="140"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Pie </h5>

					</div>
					<div class="ibox-content">
						<div>
							<canvas id="doughnutChart" height="140"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

@endsection
@section('scripts')

 <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>
<script src="{{asset('js/demo/chartjs-demo.js')}}"></script>
@endsection