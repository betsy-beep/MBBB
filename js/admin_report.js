var month_array = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July','Aug','Sept','Oct','Nov','Dec'];
var month_value = [];
var month_color = [];

var chart_options = 0;
var chart_types = ['bar','pie','doughnut'];

var chart_year;

var ctx;
var myChart;

document.addEventListener("DOMContentLoaded", function(){

    var color_hex = '';

    while(month_color.length < 12){

        color_hex = '#'+Math.floor(Math.random()*16777215).toString(16);

        if(month_color.indexOf(color_hex) < 0){

            month_color.push(color_hex);
        }
    }

    chart_year = document.getElementById('year').value;
    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
            
            if((this.responseText).search('error') < 0){

                var result = (this.responseText).split(' ');
                
                var i = 0;
                while( i < result.length){

                    month_value.push(parseFloat(result[i]));
                    ++i;
                }
                //console.log(month_value);
                ctx = document.getElementById('sales-chart').getContext('2d');

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: month_array,
                        datasets: [{
                            label: 'Number of Sales (RM) in '+chart_year,
                            data: month_value,
                            backgroundColor: month_color,
                            borderColor: month_color,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }else{

                var modal = document.getElementById('error-modal');

                var error = document.createElement('P');
		        error.innerHTML = this.responseText;
                modal.insertBefore(error, modal.childNodes[0]);
                document.getElementById('error-modal-bg').style.display = 'flex';
                anime({targets: '#error-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
            }
		}
	};

	xmlhttp.open('GET', 'admin_sales_monthly.php?year='+chart_year);
	xmlhttp.send();

    document.getElementById('sales-chart').addEventListener("mouseup", function(){

        chart_options = (chart_options + 1) % chart_types.length;

        myChart.destroy();

        //ctx = document.getElementById('sales-chart').getContext('2d');

        myChart = new Chart(ctx, {
            type: chart_types[chart_options],
            data: {
                labels: month_array,
                datasets: [{
                    label: 'Number of Sales (RM) in '+chart_year,
                    data: month_value,
                    backgroundColor: month_color,
                    borderColor: month_color,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });

    document.getElementById('error-modal-button').addEventListener("mousedown", function(b){

        anime({targets: '#error-modal-bg', opacity: ['100%','0%'], duration: 200, easing: 'linear', complete: function(){
            
            document.getElementById('error-modal').removeChild(document.getElementById('error-modal').childNodes[0]);
            document.getElementById('error-modal-bg').style.display = 'none';
        }});
    });
});

function changeDataSet(){

    chart_year = document.getElementById('year').value;

    var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
            
            if((this.responseText).search('error') < 0){

                var result = (this.responseText).split(' ');
                month_value.splice(0,month_value.length);
                var i = 0;
                while( i < result.length){

                    month_value.push(parseFloat(result[i]));
                    ++i;
                }
                myChart.destroy();
                //console.log(month_value);
                ctx = document.getElementById('sales-chart').getContext('2d');

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: month_array,
                        datasets: [{
                            label: 'Number of Sales (RM) in '+chart_year,
                            data: month_value,
                            backgroundColor: month_color,
                            borderColor: month_color,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }else{

                var error = document.createElement('P');
		        error.innerHTML = this.responseText;
                modal.insertBefore(error, modal.childNodes[0]);
                document.getElementById('error-modal-bg').style.display = 'flex';
                anime({targets: '#error-modal-bg', opacity: ['0%','100%'], duration: 200, easing: 'linear'});
            }
		}
	};
    
    xmlhttp.open('GET', 'admin_sales_monthly.php?year='+chart_year);
	xmlhttp.send();

    return false;
}   