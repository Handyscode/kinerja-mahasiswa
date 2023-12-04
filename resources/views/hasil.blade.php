@extends('layout/master')
@section('title', 'Hasil Penilaian')
@section('content')
  <section class="hasil-section">
    <div class="container-fluid d-flex justify-content-center p-4" style="height: 100dvh; max-width: 60rem;">
      <div class="content-parent bg-white p-4 rounded border">
        <div class="title">
          <h1 class="fw-bold">Hasil Penilaian-mu : A</h1>
        </div>
        <div class="hasil-parent text-left mt-5">
          <div class="deskripsi">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae magnam quis reiciendis, nihil eligendi cupiditate dolore itaque! Officiis laboriosam totam quis libero consectetur ratione debitis eaque id, sequi saepe. Illum, nulla id ducimus, recusandae eum illo fugiat consequuntur eligendi voluptates minus molestiae cumque sed sunt soluta? Repudiandae id, voluptate beatae reprehenderit ratione consequuntur quibusdam odio officia at nemo, repellendus rerum fugiat! Voluptatum voluptas repellat autem illo aliquid facere officia modi provident fugit libero, error dicta quidem, eveniet eligendi molestias adipisci perspiciatis voluptate laborum eius! Velit nulla repellendus laborum illo voluptatum consequatur laboriosam eaque itaque illum facere ipsum culpa, ratione veniam pariatur veritatis molestiae, aperiam tempore dicta beatae consectetur inventore nemo dolores fugit est! Harum officia corrupti voluptatem inventore possimus incidunt exercitationem delectus id. Deserunt architecto corporis ipsam tenetur placeat recusandae nisi iste in excepturi eaque nihil, voluptatem voluptatibus earum beatae provident ipsa veritatis odio expedita sit possimus aut odit, culpa perferendis laborum. Illum obcaecati repellendus sapiente harum. Saepe, at rerum, possimus in facere deleniti modi fugit aperiam deserunt reprehenderit exercitationem laudantium, sit corporis velit nobis sed voluptas. Explicabo, placeat ab velit tempore vitae nihil eligendi suscipit facere hic nisi sequi commodi doloremque excepturi autem unde vel eius architecto. Consequuntur, repellat.</p>
          </div>
          <div class="table-parent overflow-auto">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection