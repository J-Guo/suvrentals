(function(){
  'use strict';

  var WrapkitUtils = window.WrapkitUtils,
  Chart = window.Chart;

  // turn on gradient
  $.cookie( 'template_bg_grd', true );

  // this action force the existing setups before
  window.wh.setSkin('blue');
  window.sidebar.setSkin('dark');
  window.sidebar.setContext('teal');

  var $heroOverlay = $('.content-hero > .content-hero-overlay'),
  $displayName = $('.display-name');
  // I want to change hero overlay if header skin is changed
  window.wh.on('setSkin', function(e, last, cur){
    last = (last === 'default' || last === 'light') ? 'dark': last;
    cur = (cur === 'default' || cur === 'light') ? 'dark': cur;

    $heroOverlay.removeClass('bg-grd-' + last)
    .addClass('bg-grd-' + cur);

    $displayName.removeClass('text-' + last)
    .addClass('text-' + cur);
  });

  // turn of gradient so the setting not effected on other pages
  $.cookie( 'template_bg_grd', false );
  // tell the user this page using gradient skin
  var toastr = window.toastr;
  toastr.options = {
    positionClass: 'toast-bottom-right'
  };
  toastr.info( 'Gradient skin is enabled!' );


  // or you can confirm to user
  // var bootbox = window.bootbox;
  // bootbox.confirm({
  //   message: 'This page Turn On Gradient skin globally?',
  //   closeButton: false,
  //   buttons: {
  //     confirm: {
  //       label: 'Okay',
  //       className: 'btn-primary'
  //     },
  //     cancel: {
  //       label: 'Turn Of',
  //       className: 'btn-default'
  //     }
  //   },
  //   callback: function(result){
  //     if(!result){
  //       console.log(1);
  //       // activate gradient
  //       $.cookie( 'template_bg_grd', false );

  //       // this action force the existing setups before
  //       window.wh.setSkin('default');
  //       window.sidebar.setSkin('dark');
  //       window.sidebar.setContext('teal');

  //       window.wh.$elem.removeClass('bg-grd-blue');
  //     }
  //   }
  // });


  // chartjs default settings
  Chart.defaults.global.responsive = true;
  Chart.defaults.global.scaleLineColor = 'rgba(22, 24, 27, 0.12)';
  Chart.defaults.global.scaleFontColor = 'rgba(22, 24, 27, 0.54)';
  Chart.defaults.global.tooltipFillColor = 'rgba(22, 24, 27, 0.9)';
  Chart.defaults.global.tooltipFontSize = 11;
  Chart.defaults.global.tooltipTitleFontSize = 12;
  Chart.defaults.global.tooltipTitleFontStyle = 600;
  Chart.defaults.global.tooltipCornerRadius = 2;

  // Chart Profile Sales
  var profile1Ctx = document.getElementById('chartjs-profile1').getContext('2d'),
  profile2Ctx = document.getElementById('chartjs-profile2').getContext('2d'),
  profile3Ctx = document.getElementById('chartjs-profile3').getContext('2d'),
  profile1Data = {
    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
    datasets: [
    { label: 'Clothes', fillColor: 'rgba(172, 146, 236, 1)', highlightFill: 'rgba(172, 146, 236, 0.8)', data: [98, 80, 64, 56] },
    { label: 'Trousers', fillColor: 'rgba(237, 85, 101, 1)', highlightFill: 'rgba(237, 85, 101, 0.8)', data: [51, 60, 91, 76] }
    ]
  },
  profile2Data = {
    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
    datasets: [
    { label: 'Clothes', fillColor: 'rgba(72, 207, 173, 1)', highlightFill: 'rgba(72, 207, 173, 0.8)', data: [65, 59, 80, 81] },
    { label: 'Trousers', fillColor: 'rgba(93, 156, 236, 1)', highlightFill: 'rgba(93, 156, 236, 0.8)', data: [81, 56, 55, 40] }
    ]
  },
  profile3Data = {
    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
    datasets: [
    { label: 'Clothes', fillColor: 'rgba(237, 85, 101, 1)', highlightFill: 'rgba(237, 85, 101, 0.8)', data: [65, 59, 80, 81] },
    { label: 'Trousers', fillColor: 'rgba(93, 156, 236, 1)', highlightFill: 'rgba(93, 156, 236, 0.8)', data: [28, 48, 40, 19] }
    ]
  },
  chartjsProfile1 = new Chart(profile1Ctx).Bar(profile1Data, {
    scaleShowVerticalLines: false,
    barShowStroke : false,
    barValueSpacing : 16
  }),
  chartjsProfile2 = new Chart(profile2Ctx).Bar(profile2Data, {
    scaleShowVerticalLines: false,
    barShowStroke : false,
    barValueSpacing : 16
  }),
  chartjsProfile3 = new Chart(profile3Ctx).Bar(profile3Data, {
    scaleShowVerticalLines: false,
    barShowStroke : false,
    barValueSpacing : 16
  });

  // update when content width change
  [].forEach.call(['show', 'hide', 'size'], function(ev){
    window.sidebar.on( ev, WrapkitUtils.debounce(function(){

      // manual redraw chart
      chartjsProfile1.resize(chartjsProfile1.render, true);
      chartjsProfile2.resize(chartjsProfile2.render, true);
      chartjsProfile3.resize(chartjsProfile3.render, true);
    }, 250));
  });
})(window);