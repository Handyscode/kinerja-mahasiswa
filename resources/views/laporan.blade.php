@extends('layout/master')
@section('title', 'Laporan Penilaian')
@include('layout/partials/navbar')
@section('content')
  <section class="hasil-section">
    <div class="container-fluid d-flex justify-content-between flex-wrap p-4 gap-4">
      <div class="table-parent bg-white p-4 rounded border w-100 overflow-auto">
        <div class="title">
          <h1>List Penilaian</h1>
        </div>
        <table class="table text-center table-responsive table-bordered table-striped align-middle">
          <thead>
            <tr>
              <th class="align-middle" scope="col">No</th>
              <th class="align-middle" scope="col">Nama Mahasiswa</th>
              <th class="align-middle" scope="col" colspan="3">Kehadiran</th>
              <th class="align-middle" scope="col" colspan="3">Tugas</th>
              <th class="align-middle" scope="col" colspan="3">Quiz</th>
              <th class="align-middle" scope="col" colspan="3">UTS</th>
              <th class="align-middle" scope="col" colspan="3">UAS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>#</th>
              <th>-</th>
              <th>Kurang</th>
              <th>Cukup</th>
              <th>Baik</th>

              <th>Kurang</th>
              <th>Cukup</th>
              <th>Baik</th>
              
              <th>Kurang</th>
              <th>Cukup</th>
              <th>Baik</th>

              <th>Kurang</th>
              <th>Cukup</th>
              <th>Baik</th>

              <th>Kurang</th>
              <th>Cukup</th>
              <th>Baik</th>
            </tr>
            @foreach ($nilai as $data)
              <tr>
                <td rowspan="2">{{ $loop->iteration }}</td>
                <td rowspan="2">{{ $data->nama_depan. ' '. $data->nama_belakang }}</td>
                <td>{{ number_format($data->nk_kurang, 2) }}</td>
                <td>{{ number_format($data->nk_cukup, 2) }}</td>
                <td>{{ number_format($data->nk_baik, 2) }}</td>

                <td>{{ number_format($data->nt_kurang, 2) }}</td>
                <td>{{ number_format($data->nt_cukup, 2) }}</td>
                <td>{{ number_format($data->nt_baik, 2) }}</td>

                <td>{{ number_format($data->nq_kurang, 2) }}</td>
                <td>{{ number_format($data->nq_cukup, 2) }}</td>
                <td>{{ number_format($data->nq_baik, 2) }}</td>

                <td>{{ number_format($data->nm_kurang, 2) }}</td>
                <td>{{ number_format($data->nm_cukup, 2) }}</td>
                <td>{{ number_format($data->nm_baik, 2) }}</td>

                <td>{{ number_format($data->nf_kurang, 2) }}</td>
                <td>{{ number_format($data->nf_cukup, 2) }}</td>
                <td>{{ number_format($data->nf_baik, 2) }}</td>
              </tr>
              <tr>
                <td colspan="3" class="fw-bold">Nilai Mutu : {{ $data->nilai_kehadiran }}</td>
                <td colspan="3" class="fw-bold">Nilai Mutu : {{ $data->nilai_tugas }}</td>
                <td colspan="3" class="fw-bold">Nilai Mutu : {{ $data->nilai_quiz }}</td>
                <td colspan="3" class="fw-bold">Nilai Mutu : {{ $data->nilai_uts }}</td>
                <td colspan="3" class="fw-bold">Nilai Mutu : {{ $data->nilai_uas }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $nilai->links() }}
      </div>

      <div class="query-parent bg-white p-4 rounded border">
        <div class="title">
          <h1>Filter Penilaian</h1>
        </div>
        <form action="/get-penilaian/post" method="post" id="filterForm">
          @csrf
          <div class="input-group d-flex align-items-end justify-content-between gap-1">
            <div class="search-field mb-3">
              <label for="kehadiran">Kehadiran</label>
              <select name="kehadiran" id="kehadiran" class="form-control">
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <select name="operator1" id="operator1" class="form-control">
                <option value="AND">Dan</option>
                <option value="OR">Atau</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <label for="tugas">Tugas</label>
              <select name="tugas" id="tugas" class="form-control">
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <select name="operator2" id="operator2" class="form-control">
                <option value="AND">Dan</option>
                <option value="OR">Atau</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <label for="quiz">Quiz</label>
              <select name="quiz" id="quiz" class="form-control">
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <select name="operator2" id="operator2" class="form-control">
                <option value="AND">Dan</option>
                <option value="OR">Atau</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <label for="uts">UTS</label>
              <select name="uts" id="uts" class="form-control">
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <select name="operator3" id="operator3" class="form-control">
                <option value="AND">Dan</option>
                <option value="OR">Atau</option>
              </select>
            </div>
            <div class="search-field mb-3">
              <label for="uas">UAS</label>
              <select name="uas" id="uas" class="form-control">
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg w-100">Filter</button>
        </form>
      </div>
    </div>
  </section>
@stop

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/laporan.js') }}"></script>
@endsection