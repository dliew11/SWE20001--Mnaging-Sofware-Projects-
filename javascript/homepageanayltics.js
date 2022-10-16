var xValues = ["Toilet Paper", "Wine", "Sugar", "Milk", "Bread"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#003f5c",
  "#58508d",
  "#bc5090",
  "#ff6361",
  "#ffa600"
];

var MonthColors = [
  "#003f5c",
  "#58508d",
  "#bc5090",
  "#ff6361",
  "#ffa600",
  "#003f5c",
  "#58508d",
  "#bc5090",
  "#ff6361",
  "#ffa600",
  "#003f5c",
  "#58508d"
];



new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    
  }
});



var Months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
var UserNumbers = [7,8,8,9,9,9,10,11,14,14,15];
var MonthlySales = [500,150,200,400,1500,1800,300,600,2000,2500,1250,800]


new Chart("UserSignups", {
  type: "line",
  data: {
    labels: Months,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,255,255,0.5)",
      data: UserNumbers
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
	
  }
});

new Chart("MonthlySales", {
  type: "bar",
  data: {
    labels: Months,
    datasets: [{
      fill: true,
      lineTension: 0,
      backgroundColor: MonthColors,
      borderColor: "rgba(0,0,255,0.1)",
      data: MonthlySales
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:2500}}],
    }
	
  }
});

new Chart("OrdersMonthly", {
  type: "bar",
  data: {
    labels: Months,
    datasets: [{
      fill: true,
      lineTension: 0,
      backgroundColor: MonthColors,
      borderColor: "rgba(0,0,255,0.1)",
      data: ["30","25","10","4","19","6","45","11","30","5","12","24"]
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:50}}],
    }
	
  }
});

