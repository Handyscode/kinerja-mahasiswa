$('#filterForm').submit(function (e) {
  e.preventDefault()

  const url = $(this).attr('action')
  const data = $(this).serializeArray()

  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    success: function(res){
      console.log(res);
    }
  })
})