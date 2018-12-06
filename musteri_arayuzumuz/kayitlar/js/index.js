
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

$(document).ready(function(){
  $(".tab-pane").fitVids();
});