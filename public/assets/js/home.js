$('#add').click(() => {
  const options = $('#jokes option:selected');

  for (let i = 0; i < options.length; i += 1) {
    if ($('#favorites option').length < 5) {
      $('#favorites').append(options[i]);
    } else {
      break;
    }
  }
});


$('#remove').click(() => {
  const options = $('#favorites option:selected');
  $('#jokes').append(options);
  options.removeAttr('selected');
});
