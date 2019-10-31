
document.addEventListener('DOMContentLoaded', function(){


  $('#myModal').modal('show');
  

  var hasBeenAnimated = false;
  var firstClick = false;
  var skills = [['HTML','CSS','Javascript','Bootstrap'],['PHP','MySql'],['Unity','C#']];
  const imgClick = document.getElementById('imgClick');
  const c = document.getElementById('myChart');
  const ctx = c.getContext("2d");
  const colDescription = document.getElementById('colDescription');
  const colChart = document.getElementById('colChart');
  var wWidth = window.innerWidth; //Permet de récuperer la largeur du navigateur au moment où on clique

  var font = "bold 18px Lato";
  if(wWidth < 992)
  {
    c.setAttribute('width','300vh');
    c.setAttribute('height','300vw');
    c.classList.add('chart-small');
  }

  var data = {
      datasets: [{
        data: [10,10,10],
        backgroundColor: [
          "#f5f5f5",
          "#C96567",
          "#222629"
        ],
        label: 'Mes compétences',
        labels: ['Front-end', 'Back-end', 'Extra'] 
      }],
      labels: [
        '<div class="logo logo-html"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="html5" class="svg-inline--fa fa-html5 fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M0 32l34.9 395.8L191.5 480l157.6-52.2L384 32H0zm308.2 127.9H124.4l4.1 49.4h175.6l-13.6 148.4-97.9 27v.3h-1.1l-98.7-27.3-6-75.8h47.7L138 320l53.5 14.5 53.7-14.5 6-62.2H84.3L71.5 112.2h241.1l-4.4 47.7z"></path></svg><span class="titleSkill">HTML</span></div><div class="logo logo-css"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="css3-alt" class="svg-inline--fa fa-css3-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M0 32l34.9 395.8L192 480l157.1-52.2L384 32H0zm313.1 80l-4.8 47.3L193 208.6l-.3.1h111.5l-12.8 146.6-98.2 28.7-98.8-29.2-6.4-73.9h48.9l3.2 38.3 52.6 13.3 54.7-15.4 3.7-61.6-166.3-.5v-.1l-.2.1-3.6-46.3L193.1 162l6.5-2.7H76.7L70.9 112h242.2z"></path></svg><span class="titleSkill">CSS</span></div><div class=" logo logo-js"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="js-square" class="svg-inline--fa fa-js-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM243.8 381.4c0 43.6-25.6 63.5-62.9 63.5-33.7 0-53.2-17.4-63.2-38.5l34.3-20.7c6.6 11.7 12.6 21.6 27.1 21.6 13.8 0 22.6-5.4 22.6-26.5V237.7h42.1v143.7zm99.6 63.5c-39.1 0-64.4-18.6-76.7-43l34.3-19.8c9 14.7 20.8 25.6 41.5 25.6 17.4 0 28.6-8.7 28.6-20.8 0-14.4-11.4-19.5-30.7-28l-10.5-4.5c-30.4-12.9-50.5-29.2-50.5-63.5 0-31.6 24.1-55.6 61.6-55.6 26.8 0 46 9.3 59.8 33.7L368 290c-7.2-12.9-15-18-27.1-18-12.3 0-20.1 7.8-20.1 18 0 12.6 7.8 17.7 25.9 25.6l10.5 4.5c35.8 15.3 55.9 31 55.9 66.2 0 37.8-29.8 58.6-69.7 58.6z"></path></svg><span class="titleSkill">Javascript</span></div><div class="logo logo-bootstrap"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="bootstrap" class="svg-inline--fa fa-bootstrap fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M292.3 311.93c0 42.41-39.72 41.43-43.92 41.43h-80.89v-81.69h80.89c42.56 0 43.92 31.9 43.92 40.26zm-50.15-73.13c.67 0 38.44 1 38.44-36.31 0-15.52-3.51-35.87-38.44-35.87h-74.66v72.18h74.66zM448 106.67v298.66A74.89 74.89 0 0 1 373.33 480H74.67A74.89 74.89 0 0 1 0 405.33V106.67A74.89 74.89 0 0 1 74.67 32h298.66A74.89 74.89 0 0 1 448 106.67zM338.05 317.86c0-21.57-6.65-58.29-49.05-67.35v-.73c22.91-9.78 37.34-28.25 37.34-55.64 0-7 2-64.78-77.6-64.78h-127v261.33c128.23 0 139.87 1.68 163.6-5.71 14.21-4.42 52.71-17.98 52.71-67.12z"></path></svg><span class="titleSkill">Bootstrap</span></div>',
        '<div class=" logo logo-php"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="php" class="svg-inline--fa fa-php fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z"></path></svg><span class="titleSkill">PHP</span></div><div class="logo logo-mysql"><?xml version="1.0" encoding="UTF-8" standalone="no" ?><svg width="256px" height="252px" viewBox="0 0 256 252" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"><path d="M235.648276,194.211632 C221.729851,193.864559 210.942872,195.257272 201.895604,199.083964 C199.285899,200.127406 195.109927,200.128498 194.761767,203.433458 C196.154498,204.826189 196.328034,207.087716 197.546096,209.001055 C199.635192,212.479551 203.287247,217.178343 206.593317,219.614507 C210.246461,222.397748 213.900691,225.180989 217.727416,227.617153 C224.513092,231.793125 232.168625,234.22817 238.779677,238.404123 C242.608577,240.838067 246.434123,243.971711 250.261934,246.581411 C252.176407,247.971926 253.393381,250.234545 255.829549,251.104446 L255.829549,250.582732 C254.611442,249.016479 254.263282,246.754952 253.046308,245.015144 C251.307592,243.275341 249.566702,241.709083 247.826899,239.96928 C242.781025,233.1847 236.518133,227.268984 229.732547,222.397748 C224.166065,218.56995 211.986355,213.35055 209.724764,206.913051 C209.724764,206.913051 209.55014,206.73951 209.376604,206.56597 C213.204371,206.217787 217.727416,204.82618 221.381691,203.781623 C227.297466,202.215374 232.690457,202.563548 238.779677,200.998382 C241.562919,200.30203 244.347292,199.432129 247.130533,198.562222 L247.130533,196.997075 C244.00022,193.864532 241.737588,189.689684 238.431517,186.731778 C229.558965,179.075113 219.815379,171.595269 209.724764,165.332394 C204.330685,161.852792 197.371472,159.590151 191.630412,156.633369 C189.543536,155.587729 186.062797,155.06712 184.845823,153.327299 C181.713302,149.499523 179.973499,144.45476 177.711982,139.930579 C172.668329,130.360605 167.794863,119.749306 163.44541,109.658665 C160.315096,102.872993 158.400651,96.0872892 154.572862,89.8245233 C136.653166,60.2479054 117.167095,42.3281102 87.242308,24.7554574 C80.8048232,21.1023052 73.1503779,19.5360541 64.9730628,17.6227124 C60.6246649,17.4480683 56.2740469,17.1009966 51.9245072,16.9263525 C49.1412661,15.7082579 46.3569195,12.4033092 43.9207465,10.8370441 C34.0058755,4.5730961 8.42942301,-8.99607108 1.1220548,8.92370237 C-3.57563582,20.2324516 8.08126754,31.366477 12.0825475,37.1086812 C15.041536,41.1100178 18.8682195,45.6330512 20.9562053,50.1572463 C22.1742941,53.1129226 22.5213621,56.2465484 23.7394509,59.3779766 C26.523793,67.031339 29.1323922,75.5578744 32.7866404,82.691806 C34.7010855,86.3449577 36.7879657,90.1727422 39.2241297,93.477666 C40.6157457,95.3910055 43.0508086,96.2620126 43.5736286,99.3934363 C41.1385747,102.873029 40.9639284,108.092452 39.5711977,112.441992 C33.3083548,132.101492 35.7445143,156.4588 44.617071,170.89889 C47.4003121,175.247297 54.0124069,184.818421 62.8850316,181.164182 C70.7141415,178.032744 68.9743337,168.115626 71.2358604,159.41661 C71.7586894,157.327523 71.4105022,155.937017 72.4539446,154.545383 C72.4548508,154.718924 72.4539446,154.893561 72.4539446,154.893561 C74.8901041,159.764788 77.3251715,164.46251 79.5866891,169.333656 C84.980736,177.858025 94.3750434,186.731674 102.204103,192.647503 C106.381181,195.777808 109.686136,201.171877 114.905523,203.086313 L114.905523,202.563484 L114.557345,202.563484 C113.512801,200.997231 111.947645,200.301958 110.55602,199.083892 C107.424591,195.952463 103.943884,192.124665 101.50883,188.645081 C94.2025447,178.901486 87.7639408,168.115635 82.0228486,156.980496 C79.2396075,151.587555 76.8034481,145.671734 74.5419214,140.278811 C73.497378,138.189729 73.497378,135.059406 71.7575748,134.015973 C69.1478745,137.842647 65.3211911,141.148717 63.4067461,145.846417 C60.1028916,153.327344 59.7536034,162.548097 58.5355192,172.116947 C57.8402503,172.291598 58.187332,172.116947 57.8391493,172.465138 C52.2726627,171.072408 50.3582176,165.332394 48.2701955,160.460052 C43.0507905,148.107926 42.1808935,128.273684 46.7050387,114.008236 C47.923123,110.353988 53.142528,98.8717128 51.0545422,95.3921019 C50.0110998,92.0860273 46.5303924,90.1726969 44.6170529,87.5629967 C42.3555262,84.2569266 39.9193668,80.082065 38.35421,76.4278576 C34.1782383,66.6853811 32.0902615,55.898411 27.5672354,46.1548154 C25.4792496,41.6306665 21.8261069,36.9340837 18.8682195,32.7592063 C15.563264,28.0615284 11.9090067,24.7554574 9.29927023,19.1878506 C8.43046966,17.2745089 7.21128439,14.1430915 8.60290945,12.0550966 C8.95109211,10.6634847 9.64634733,10.1417599 11.0390689,9.79357497 C13.3005955,7.87912949 19.7380848,10.3152907 21.9995616,11.3587363 C28.4370509,13.9673251 33.8300058,16.4046087 39.2240527,20.0577513 C41.6591111,21.7975523 44.2688113,25.1036232 47.4002396,25.9735239 L51.0544833,25.9735239 C56.6220709,27.1905053 62.8849274,26.3216898 68.1043279,27.8868652 C77.3261638,30.843648 85.6758644,35.1942543 93.1579696,39.8919512 C115.95003,54.332049 134.738553,74.8626147 147.440063,99.3934454 C149.528049,103.39367 150.396845,107.04901 152.31129,111.22389 C155.965538,119.749365 160.488578,128.448376 164.14173,136.799218 C167.794872,144.975401 171.274474,153.327362 176.493861,160.113048 C179.104667,163.765094 189.542403,165.67953 194.240026,167.593975 C197.719632,169.159141 203.113711,170.551871 206.245112,172.465206 C212.159801,176.117243 218.075576,180.29433 223.643145,184.295646 C226.427474,186.382535 235.125402,190.733144 235.648231,194.21165 L235.648276,194.211632 L235.648276,194.211632 Z" ></path><path d="M58.1864892,43.0222644 C55.2286063,43.0222644 53.1417305,43.3715526 51.0537447,43.8932806 C51.0537447,43.8923744 51.0537447,44.0679225 51.0537447,44.2414633 L51.4019319,44.2414633 C52.794658,47.0247034 55.2286154,48.9391485 56.968414,51.3741978 C58.3611446,54.1574389 59.5781143,56.9417945 60.9708449,59.7261412 C61.1443766,59.5514948 61.3179175,59.3779585 61.3179175,59.3779585 C63.7551915,57.6370498 64.9721657,54.8538087 64.9721657,50.6789426 C63.9276177,49.4608583 63.7540769,48.2427786 62.8841798,47.0246944 C61.8407374,45.283782 59.5781052,44.414995 58.1864892,43.0222644 L58.1864892,43.0222644 L58.1864892,43.0222644 Z"></path></svg><span class="titleSkill">MySql</span></div>',
        '<div class="logo logo-unity"><?xml version="1.0" encoding="UTF-8" standalone="no"?><svg width="256px" height="263px" viewBox="0 0 256 263" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"><g><path d="M166.872326,131.23686 L212.781118,51.9623472 L234.965569,131.23686 L212.781118,210.493243 L166.872326,131.23686 L166.872326,131.23686 Z M144.495923,144.110517 L190.412179,223.373299 L110.445569,202.886567 L52.6751399,144.110517 L144.495923,144.110517 L144.495923,144.110517 Z M190.401515,39.0780261 L144.495923,118.352539 L52.6751399,118.352539 L110.445569,59.5732891 L190.401515,39.0780261 L190.401515,39.0780261 Z M255.940714,104.258913 L227.932619,0.0603519323 L123.392808,27.9852677 L107.918186,55.1924919 L76.5167858,54.9674802 L0,131.244325 L76.5167858,207.50304 L76.519985,207.50304 L107.907522,207.270564 L123.404539,234.477788 L227.932619,262.398438 L255.940714,158.219072 L240.035264,131.23686 L255.940714,104.258913 L255.940714,104.258913 Z"></path></g></svg><span class="titleSkill">Unity</span></div><div class="logo logo-csharp"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs><style>.cls-1{}.cls-2,.cls-3{fill:#fff;}.cls-2{opacity:0.1;}</style></defs><circle class="cls-1" cx="32" cy="32" r="32"/><path class="cls-2" d="M9.82,9A32,32,0,1,0,55,54.18Z"/><path class="cls-3" d="M30.43,43.55a14.78,14.78,0,0,1-7,1.48,11.23,11.23,0,0,1-8.61-3.46,12.78,12.78,0,0,1-3.23-9.09,13.39,13.39,0,0,1,3.64-9.77A12.35,12.35,0,0,1,24.49,19a14.8,14.8,0,0,1,5.94,1v3.15a12,12,0,0,0-6-1.51,9.17,9.17,0,0,0-7,2.9,10.93,10.93,0,0,0-2.7,7.75,10.4,10.4,0,0,0,2.52,7.34,8.58,8.58,0,0,0,6.62,2.73,12.42,12.42,0,0,0,6.57-1.69Z"/><path class="cls-3" d="M52.76,26.46l-.4,1.86H47.76L46.66,33.6H51.6l-.47,1.86H46.29l-1.55,7H42.53l1.51-7H39.64l-1.48,7H36l1.48-7H32.84l.35-1.86h4.66l1.07-5.27H34.05l.37-1.86h4.87l1.48-7.07H43l-1.48,7.07h4.43l1.51-7.07h2.16l-1.48,7.07Zm-7.17,1.86H41.15L40,33.6h4.46Z"/></svg><span class="titleSkill">C#</span></div>'
      ]
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
        animation: {
          duration: 800,
          onProgress: function () {
            if(hasBeenAnimated)
            {
              var ctx = this.chart.ctx;
              ctx.font = font;
              //ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
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
                  ctx.fillStyle = '#222629';
                  ctx.font = font;
                  if(i==2)
                  {
                    ctx.fillStyle = '#FFF';
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
                ctx.font = font;
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
                    ctx.fillStyle = '#222629';
                    ctx.font = font;
                    if(i==2)
                    {
                      ctx.fillStyle = '#FFF';
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
          var index = item[0]._index;
          if(firstClick)
          {
            updateLabel(skill,index);
          }
          else{
            var isSmall = true;
            
            if(wWidth > 992)
            {
              c.classList.add('transform');
              imgClick.classList.add('transform');
              isSmall = false;
            }
            printLabel(skill,index,isSmall);
            firstClick = true;
          }
        },
        hover : {
          onHover: function(e) {
            var point = this.getElementAtEvent(e);
            if (point.length) e.target.style.cursor = 'pointer';
            else e.target.style.cursor = 'default';
        }
        }
      };

    const myChart = new Chart(ctx, {
      type: 'pie', 
      data: data,
      options: pieOptions
    });

    function printLabel(selectLabel,index,isSmall){
      if(isSmall)
      {
        colChart.classList.remove('col-md-12');
        c.classList.remove('transform');
        colChart.classList.add('col-md-6');
        colDescription.innerHTML = '<div id="col-right" class="col-md-6"><div id="skillDescription"></div></div>';
        let content = document.getElementById('skillDescription');
        content.innerHTML = selectLabel;
        addHoverCss('.logo','hvr-grow');
      }else{
        setTimeout(function(){
          colChart.classList.remove('col-md-12');
          c.classList.remove('transform');
          imgClick.classList.remove('transform');
          colChart.classList.add('col-md-6');
          colDescription.innerHTML = '<div id="col-right" class="col-md-6"><div id="skillDescription"></div></div>';
          let content = document.getElementById('skillDescription');
          content.innerHTML = selectLabel;
          addHoverCss('.logo','hvr-grow');
        }, 2000);
      }
    }
  

  function updateLabel(selectLabel,index){
    let content = document.getElementById('skillDescription');
    content.innerHTML = selectLabel;
    addHoverCss('.logo','hvr-grow');
  }

  function addHoverCss(query,className)
  {
    var logo = document.querySelectorAll(query);
    for(var i = 0;i< logo.length;i++)
    {
      logo[i].classList.add(className);
    }
  }

  var timeline = document.querySelectorAll('.timeline-panel');
  for(var i = 0;i< timeline.length;i++)
  {
      timeline[i].addEventListener('mouseenter',function(e){
        this.classList.add('hvr-grow');
      })
  }
/*
  var formation = document.querySelectorAll('.formations-block');
  for(var i = 0;i< formation.length;i++)
  {
    formation[i].addEventListener('mouseenter',function(e){
        this.classList.add('hvr-grow');
    })
    formation[i].addEventListener('mouseleave',function(e){
        this.classList.remove('hvr-grow');
    })
  }
*/

});