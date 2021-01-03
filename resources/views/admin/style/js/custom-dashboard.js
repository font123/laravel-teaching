/*
----------------------------------------------
    : Custom - Dashboard CRM js :
----------------------------------------------
*/
"use strict";
window.onload = function(){
	var date = new Date();
	var year =date.getFullYear(); //获取完整的年份(4位)

	var month = date.getMonth(); //获取当前月份(0-11,0代表1月)

	 //获取当前星期X(0-6,0代表星期天)
	switch (date.getDay()) {
    case 0:
        day = "日";
        break;
    case 1:
        day = "一";
         break;
    case 2:
        day = "二";
         break;
    case 3:
        day = "三";
         break;
    case 4:
        day = "四";
         break;
    case 5:
        day = "五";
         break;
    case 6:
        day = "六";
} 
	document.getElementById("day").innerHTML = day;
	document.getElementById("year").innerHTML = year;
	document.getElementById("month").innerHTML = month+1;
	
	}
	var date = new Date();
	var day = date.getDay(); //获取当前星期X(0-6,0代表星期天)
	if(day == 0){
		day = 7;
	}
	var lastTime = parseInt(day*(100/7));
$(document).ready(function() {   
	
    
    /* -----  Apex Bar Chart ----- */
    var options = {
        chart: {
            height: 270,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '25%',
                endingShape: 'rounded'  
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: ['#0442ba', '#9ccc34'],
        series: [{
            name: 'Net Profit',
            data: [76, 85, 101, 98, 87, 105, 72, 90, 50]
        }, {
            name: 'Revenue',
            data: [44, 55, 57, 56, 61, 58, 66, 78, 42]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-bar-chart"),
        options
    );
    chart.render();

    /* -----  Apex Area Chart ----- */
    var options = {
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
              type: 'x',
              enabled: false,
              autoScaleYaxis: true
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
        },
        colors: ['#0442ba', '#9ccc34'],
        series: [{
            name: 'Inward',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'Outward',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],
        legend: {
            show: false,
        },
        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'], opacity: .2
            },
            borderColor: 'rgba(0,0,0,0.05)'
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        }
    }
    var chart = new ApexCharts(
        document.querySelector("#apex-area-chart"),
        options
    );
    chart.render();

    /* -----  Apex Stroked Circle Guage Chart ----- */
   
	
	
    var options = {
        chart: {
            height: 245,
            type: 'radialBar',
            offsetY: -10
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                dataLabels: {
                    name: {
                        fontSize: '18px',
                        fontFamily: 'Work Sans',
                        color: '#4e5d71',
                        offsetY: 120
                    },
                    value: {
                        offsetY: 76,
                        fontSize: '24px',
                        fontFamily: 'Work Sans',
                        color: '#141d46',
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                shadeIntensity: 0.15,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 65, 91]
            },
        },
        stroke: {
            dashArray: 4
        },
        
        colors:["#0442ba"],
        series:[lastTime],
        labels: ['本周已过'],  
    		

    }
    var chart = new ApexCharts(
        document.querySelector("#apex-stroked-circle-guage-chart"),
        options
    );        
    chart.render();
    
});