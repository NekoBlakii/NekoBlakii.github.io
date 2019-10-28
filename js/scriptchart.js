var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['HTML', 'CSS', 'JAVASCRIPT', 'SQL', 'PHP', 'C#'],
    datasets: [{
      label: '# of Tomatoes',
      data: [10, 10, 10, 10, 10, 10],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(70, 100, 50, 0.2)',
        'rgba(200, 50, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(70, 100, 50, 1)',
        'rgba(200, 50, 192, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
   	cutoutPercentage: 40,
    responsive: false,
  }
});