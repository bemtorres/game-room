// Prevenir double request
$(function() {
  $('.form-prevent').on('submit', function() {
    $('.button-prevent').attr('disabled', 'true');
    $('.spinner').show();
  });

  $('.form-submit').on('submit', function() {
    $('.form-submit').find('button').attr('disabled', 'true');
  });
});