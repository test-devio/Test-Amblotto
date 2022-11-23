<?php
// จำนวนการเข้าชมสินค้าทั้งหมด
$sql_view = "SELECT SUM(view) as all_view FROM tb_product ";
$query_view =  mysqli_query($connection,$sql_view);
$result_view = mysqli_fetch_assoc($query_view);

// จำนวนการเข้าชมสินค้าทั้งหมด
$sql_product = "SELECT COUNT(id) as count_product FROM tb_product ";
$query_product =  mysqli_query($connection,$sql_product);
$result_product = mysqli_fetch_assoc($query_product);

// รายการสินค้าทั้งหมด
$sql = "SELECT * FROM tb_product";
$query = mysqli_query($connection,$sql);
$label = array();
$data = array();
foreach($query as $key => $value){
    $label[] = $value['title'];
    $data[] = $value['view'];
}
// print_r(json_encode($label,true));
?>
<h1 class="app-page-title">หน้าหลัก</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">

    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="inner">
            <div class="app-card-body p-2 p-lg-3">
                <h3>ยินดีต้อนรับ <?=$_SESSION['user_login']?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div><!--//app-card-body-->
        </div><!--//inner-->
    </div><!--//app-card-->
    <div class="row g-4 mb-4">
            <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">จำนวนการเข้าชม</h4>
                        <div class="stats-figure"><?=$result_view['all_view']?></div>
                        <div class="stats-meta">คนดู</div>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->
            <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">จำนวนสินค้าทั้งหมด</h4>
                        <div class="stats-figure"><?=$result_product['count_product']?></div>
                        <div class="stats-meta">รายการ</div>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->
        </div><!--//row-->
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
            <div class="col-12 col-lg-6">
				        <div class="app-card app-card-chart h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">จำนวนการเข้าชมสินค้า</h4>
							        </div><!--//col-->
							        <div class="col-auto">
								        <div class="card-header-action">
									        <!-- <a href="charts.html">More charts</a> -->
								        </div><!--//card-header-actions-->
							        </div><!--//col-->
						        </div><!--//row-->
					        </div><!--//app-card-header-->
					        <div class="app-card-body p-3 p-lg-4">
							    <!-- <div class="mb-3 d-flex">   
							        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
									    <option value="1" selected>This week</option>
									    <option value="2">Today</option>
									    <option value="3">This Month</option>
									    <option value="3">This Year</option>
									</select>
							    </div> -->
						        <div class="chart-container">
				                    <canvas id="canvas-barchart" ></canvas>
						        </div>
					        </div><!--//app-card-body-->
				        </div><!--//app-card-->
			        </div><!--//col-->
            </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
</div><!--//row-->
<script>
    'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
	green: '#75c181',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

/* Random number generator for demo purpose */
var randomDataPoint = function(){ return Math.round(Math.random()*10000)};


//Chart.js Line Chart Example 

var lineChartConfig = {
	type: 'line',

	data: {
		labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
		
		datasets: [{
			label: 'Current week',
			fill: false,
			backgroundColor: window.chartColors.green,
			borderColor: window.chartColors.green,
			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			],
		}, {
			label: 'Previous week',
		    borderDash: [3, 5],
			backgroundColor: window.chartColors.gray,
			borderColor: window.chartColors.gray,
			
			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			],
			fill: false,
		}]
	},
	options: {
		responsive: true,	
		aspectRatio: 1.5,
		
		legend: {
			display: true,
			position: 'bottom',
			align: 'end',
		},
		
		title: {
			display: true,
			text: 'Chart.js Line Chart Example',
			
		}, 
		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,

            callbacks: {
	            //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
                label: function(tooltipItem, data) {
	                if (parseInt(tooltipItem.value) >= 1000) {
                        return "$" + tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    } else {
	                    return '$' + tooltipItem.value;
                    }
                }
            },

		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				},
				ticks: {
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return '$' + value.toLocaleString();   //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
		            }
		        },
			}]
		}
	}
};



// Chart.js Bar Chart Example 

var barChartConfig = {
	type: 'bar',

	data: {
		labels: <?php echo json_encode($label)?>,
		datasets: [{
			label: 'Orders',
			backgroundColor: '#75c181',
			borderColor: '#75c181',
			borderWidth: 1,
			maxBarThickness: 16,
			
			data: <?php echo json_encode($data)?>
		}]
	},
	options: {
		responsive: true,
		aspectRatio: 1.5,
		legend: {
			position: 'bottom',
			align: 'end',
		},
		title: {
			display: true,
			text: 'Chart.js Bar Chart Example'
		},
		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,

		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},

			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.borders,
				},

				
			}]
		}
		
	}
}







// Generate charts on load
window.addEventListener('load', function(){
	
	// var lineChart = document.getElementById('canvas-linechart').getContext('2d');
	// window.myLine = new Chart(lineChart, lineChartConfig);
	
	var barChart = document.getElementById('canvas-barchart').getContext('2d');
	window.myBar = new Chart(barChart, barChartConfig);
	

});	
	

</script>
