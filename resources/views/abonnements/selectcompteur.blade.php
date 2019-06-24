@extends('layout.default')
@section('content')
    

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SENFORAGE</h4>
                  <p class="card-category"> Selection du compteur pour le client
                      {{-- <a href="{{route('abonnements.selectclient')}}"><div class="btn btn-warning">Selection du Client <i class="material-icons">add</i></div></a>  --}}
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-clients">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          UUID
                        </th>
                        <th>
                            NSERIE
                        </th>
                        <th>
                          Date Creation
                        </th>
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
          $('#table-clients').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('compteurs.listfree')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'uuid', name: 'uuid' },
                    { data: 'numero_serie', name: 'numero_serie' },
                    { data: 'created_at', name: 'created_at' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('abonnements.create',['compteur'=>'id-cptr','client'=>'idc'])!!}".replace('id-cptr', data.id).replace('idc',{{$client->id}});
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>';                        },
                        "targets": 4
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
              
          });
      });
      </script>

          
      @endpush