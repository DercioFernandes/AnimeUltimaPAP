var btn = $('#button');
// Quando passar dos 300 pixeis a dar scroll, o botão vai aparecer  
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
// Ao clicar no botão, vai subir até ao topo
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});