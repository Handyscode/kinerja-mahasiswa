$('#filterForm').submit(function (e) {
  e.preventDefault()

  const url = $(this).attr('action')
  const data = $(this).serializeArray()

  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    success: function(res){
      const tableFilter = document.querySelector('.table-filter')
      const filterContent = document.querySelector('.filter-content')

      const existingTbody = tableFilter.querySelector('.filter-table-content');
      if (existingTbody) {
        existingTbody.remove();
      }

      let tableBody = document.createElement('tbody')
      tableBody.classList.add('filter-table-content')

      res.forEach(el => {
        let tableRow = document.createElement('tr')
        let nim = document.createElement('td')
        nim.innerHTML = el[0]

        let namaLengkap = document.createElement('td')
        namaLengkap.innerHTML = el[1] + ' ' + el[2]

        let nilai = document.createElement('td')
        nilai.innerHTML = el[3]

        tableRow.append(nim, namaLengkap, nilai)
        tableBody.append(tableRow)
      });
      tableFilter.append(tableBody)

      filterContent.classList.remove('d-none')
    }
  })
})