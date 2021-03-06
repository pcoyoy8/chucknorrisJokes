$(document).ready(() => {
  $('#success-alert').hide();
});

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

$('#save').click(() => {
  const data = [];
  const favorites = $('#favorites');
  favorites.find('option').each(function add() {
    data.push({ key: $(this).val(), value: $(this).text() });
  });

  $.ajax({
    method: 'POST',
    url: '/store',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
    data: {
      items: data,
    },
    success: (response) => {
      $('#title').removeClass('alert-danger');
      $('#title').addClass('alert-success');
      $('#message').text(response.message);
      $('#modalInfo').modal();
    },
    error(jqXHR, textStatus, errorThrown) {
      $('#title').removeClass('alert-success');
      $('#title').addClass('alert-danger');
      const error = `(${jqXHR.status}) ${textStatus}: ${errorThrown}`;
      $('#message').text(error);
      $('#modalInfo').modal();
    },
  });
});

$('#reset').click(() => {
    location.reload();
});
