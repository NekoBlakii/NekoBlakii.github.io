
document.addEventListener('DOMContentLoaded', function(){

  var hasBeenAnimated = false;
  var firstClick = false;


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
        
        if(firstClick)
        {
          updateLabel(skill);
        }
        else{
          let wWidth = window.innerWidth; //Permet de récuperer la largeur du navigateur au moment où on clique
          var isSmall = true;
          if(wWidth > 992)
          {
            c.classList.add('transform');
            isSmall = false;
          }
          printLabel(skill,isSmall);
          firstClick = true;
        }
      }
    };


  const c = document.getElementById('myChart');
  const ctx = c.getContext("2d");

  const myChart = new Chart(ctx, {
    type: 'pie', 
    data: data,
    options: pieOptions
  });

  const colDescription = document.getElementById('colDescription');
  const colChart = document.getElementById('colChart');


  function printLabel(selectLabel,isSmall){
    if(isSmall)
    {
      colChart.classList.remove('col-md-12');
      c.classList.remove('transform');
      colChart.classList.add('col-md-6');
      colDescription.innerHTML = '<div class="col-md-6"><div id="skillDescription"></div></div>';
      let content = document.getElementById('skillDescription');
      content.innerHTML = selectLabel;
    }else{
      setTimeout(function(){
        colChart.classList.remove('col-md-12');
        c.classList.remove('center');
        c.classList.remove('transform');
        colChart.classList.add('col-md-6');
        colDescription.innerHTML = '<div class="col-md-6"><div id="skillDescription"></div></div>';
        let content = document.getElementById('skillDescription');
        content.innerHTML = selectLabel;
      }, 3000);
    }
    
  }

  function updateLabel(selectLabel){
    let content = document.getElementById('skillDescription');
    content.innerHTML = selectLabel;
  }

});