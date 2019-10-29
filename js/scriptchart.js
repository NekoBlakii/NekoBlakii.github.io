
document.addEventListener('DOMContentLoaded', function(){

  var isHover = false;
  var hasBeenAnimated = false;

  var data = {
      datasets: [{
        data: [10,10,10,10,10,10],
        backgroundColor: [
          "#f16529",
          "#2965f1",
          "#FFCE56",
          "#E7E9ED",
          "#777bb3",
          "#222c37"
        ],
        label: 'Mes compétences',
        labels: ['HTML', 'CSS', 'JavaScript', 'SQL', 'PHP', 'Unity / C#'] 
      }],
      labels: ['HTML', 'CSS', 'JAVASCRIPT', 'SQL', 'PHP', 'C#']
    };

    var pieOptions = {
      cutoutPercentage: 40,
      responsive: false,
      legend: {
        display: false,
      },
      tooltips: { 
        enabled: false
      },
      events: ['click'],
      animation: {
        duration: 800,
        onProgress: function () {
          if(hasBeenAnimated)
          {
            var ctx = this.chart.ctx;
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';
            
            this.data.datasets.forEach(function (dataset) {
              for (var i = 0; i < dataset.data.length; i++) {
                var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                start_angle = model.startAngle,
                end_angle = model.endAngle,
                mid_angle = start_angle + (end_angle - start_angle)/2;
                var x = mid_radius * Math.cos(mid_angle);
                var y = mid_radius * Math.sin(mid_angle);
                ctx.fillStyle = '#fff';
                ctx.font = "12px Arial";
                if (i == 3 || i == 2){ // Permet de mettre en noir le texte
                  ctx.fillStyle = '#444';
                }
                var val = dataset.labels[i];
                if(val != 0) {
                  ctx.fillText(dataset.labels[i], model.x + x, model.y + y);
                }
              }
            });
          }
          
          },
          onComplete: function(){
            hasBeenAnimated = true;
            if(hasBeenAnimated)
            {
              var ctx = this.chart.ctx;
              ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
              ctx.textAlign = 'center';
              ctx.textBaseline = 'bottom';
              
              this.data.datasets.forEach(function (dataset) {
                for (var i = 0; i < dataset.data.length; i++) {
                  var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                  mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                  start_angle = model.startAngle,
                  end_angle = model.endAngle,
                  mid_angle = start_angle + (end_angle - start_angle)/2;
                  var x = mid_radius * Math.cos(mid_angle);
                  var y = mid_radius * Math.sin(mid_angle);
                  ctx.fillStyle = '#fff';
                  ctx.font = "12px Arial";
                  if (i == 3 || i == 2){ // Permet de mettre en noir le texte
                    ctx.fillStyle = '#444';
                  }
                  var val = dataset.labels[i];
                  if(val != 0) {
                    ctx.fillText(dataset.labels[i], model.x + x, model.y + y);
                  }
                }
              });
            }
          },
      },
      onClick: function(event,item){
        var skill = data.labels[item[0]._index];
        c.classList.add('transform');
        printLabel(skill);
      }
    };


  const c = document.getElementById('myChart');
  const ctx = c.getContext("2d");

  const myChart = new Chart(ctx, {
    type: 'pie', 
    data: data,
    options: pieOptions
  });

  const content = document.getElementById('skillDescription');


  function printLabel(selectLabel){
    content.innerHTML = selectLabel;
    isHover = false;
  }

  function animationLeftChart()
  {
    c.animate([
      { transform: 'translateX(0px)' }, 
      { transform: 'translateX(-300px)' }
    ], { 
      duration: 1000
    })
  }

  function animationCenterChart()
  {
    c.animate([
      { transform: 'translateX(0px)' }, 
      { transform: 'translateX(300px)' }
    ], { 
      duration: 1000
    })
  }

});