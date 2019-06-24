@extends('layout.default')
@section('content')
    

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SENFORAGE</h4>
                  <p class="card-category"> Administrateurs
                      <a href="{{route('administrateurs.create')}}"><div class="btn btn-info">Ajouter administrateur <i class="material-icons">ajouter</i></div></a> 
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-administrateurs">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>

                        
                        <th>
                         Matricule

                        </th>
                        <th>
                          Nom
                        </th>
                        <th>

                            Prenom
                        </th>
                        <th>
                          Email
                        </th>
                      {{--   <th>
                          role
                        </th> --}}
                        <th>
                          Action
                          </th>
                      </thead>
                      <tbody>
                          
                      </tbody>
                     
                    </table>
                
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-administrateurs').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('administrateurs.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'matricule', name: '.matricule' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.email', name: 'user.email' },
                   // { data: 'user.role.name', name: 'user.role.name' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('administrateurs.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('administrateurs.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                        '<a class="btn btn-danger" href='+url_d+'><i class="materi-²al-icons">delete</i></a>';
                        },
                        "targets": 5
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('administrateurs.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
              
          });
      });
      </script>

          
      @endpush