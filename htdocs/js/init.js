showSizes = function()
{
  $('#size-indicator').text('Viewport width: ' + $(document).width() + 'px');
}

$(window).resize(function() {
  showSizes();
});

$(document).ready(function() {
  showSizes();
});