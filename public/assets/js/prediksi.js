const nilaiTugas = document.querySelector('.nilai-tugas')
const nilaiQuiz = document.querySelector('.nilai-quiz')

if (nilaiQuiz.querySelector('.input-group').children.length == 1) {
  nilaiQuiz.querySelector('.btn-remove').classList.add('d-none')
}else{
  nilaiQuiz.querySelector('.btn-remove').classList.remove('d-none')
}

nilaiTugas.querySelector('.btn-add').addEventListener('click', () => {
  let inputTugas = document.createElement('input')
  inputTugas.setAttribute('name', 'tugas[]')
  inputTugas.setAttribute('id', 'tugas')
  inputTugas.setAttribute('placeholder', 'Nilai Tugas')
  inputTugas.setAttribute('required', 'required')
  inputTugas.setAttribute('maxlength', '2')
  inputTugas.classList.add('form-control', 'fs-6', 'form-control-lg')

  nilaiTugas.querySelector('.input-group').append(inputTugas)

  nilaiTugas.querySelector('.btn-remove').classList.remove('d-none')

  if (nilaiTugas.querySelector('.input-group').children.length == 6) {
    nilaiTugas.querySelector('.btn-add').classList.add('d-none')
  }
})

nilaiTugas.querySelector('.btn-remove').addEventListener('click', () => {
  nilaiTugas.querySelector('.input-group').lastElementChild.remove()

  if (nilaiTugas.querySelector('.input-group').children.length == 1) {
    nilaiTugas.querySelector('.btn-remove').classList.add('d-none')
  }
  
  if(nilaiTugas.querySelector('.input-group').children.length < 6){
    nilaiTugas.querySelector('.btn-add').classList.remove('d-none')
  }
})

nilaiQuiz.querySelector('.btn-add').addEventListener('click', () => {
  let inputQuiz = document.createElement('input')
  inputQuiz.setAttribute('name', 'quiz[]')
  inputQuiz.setAttribute('id', 'quiz')
  inputQuiz.setAttribute('placeholder', 'Nilai Quiz')
  inputQuiz.setAttribute('required', 'required')
  inputQuiz.setAttribute('maxlength', '3')
  inputQuiz.classList.add('form-control', 'fs-6', 'form-control-lg')

  nilaiQuiz.querySelector('.input-group').append(inputQuiz)

  nilaiQuiz.querySelector('.btn-remove').classList.remove('d-none')

  if (nilaiQuiz.querySelector('.input-group').children.length == 6) {
    nilaiQuiz.querySelector('.btn-add').classList.add('d-none')
  }
})

nilaiQuiz.querySelector('.btn-remove').addEventListener('click', () => {
  nilaiQuiz.querySelector('.input-group').lastElementChild.remove()

  if (nilaiQuiz.querySelector('.input-group').children.length == 1) {
    nilaiQuiz.querySelector('.btn-remove').classList.add('d-none')
  }
  
  if(nilaiQuiz.querySelector('.input-group').children.length < 6){
    nilaiQuiz.querySelector('.btn-add').classList.remove('d-none')
  }
})