$(document).ready(function(){
  $('.modal').modal();
  $('select').material_select();
  $('.button-collapse').sideNav({
    menuWidth: 260,
    edge: 'left',
    closeOnClick: false,
    draggable: true
  });
});
