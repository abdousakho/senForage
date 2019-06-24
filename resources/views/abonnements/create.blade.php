@extends('layout.default')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3 class="card-title">Enregistrement</h3>
                <p class="card-category">Abonnement
                    {{-- <a target="_blank" href="#">Robert McIntosh</a>. Please checkout the --}}
                    {{-- <a href="#" target="_blank">full documentation.</a> --}}
                </p>
            </div>
            <div class="card-body">
                <div class="row pt-5 pl-5">
                    <h4>
                        Client: {{$client->user->name ?? 'Aucun client choisi'}}<br/>
                        Compteur: {{$compteur->numero_serie ?? ''}}
                    </h4>
                </div>
                <div class="row pt-5"></div>
                
                <form method="POST" action="{{route('abonnements.store')}}">
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="client" value="{{$client->id ?? ''}}" class="form-control" name="inputName" id="inputName" placeholder="">
                    <input type="hidden" name="compteur" value="{{$compteur->id ?? ''}}" class="form-control" name="inputName" id="inputName" placeholder="">

                    {{-- <div class="form-group">
                        
                        <input type="text" name="nom" class="form-control" id="input-nom" aria-describedby="emailHelp" placeholder="Nom du client">
                      
                    </div> --}}
                    <div class="form-group">
                    <label for="input-nom">details</label>
                      <textarea class="form-control" name="details" id="txt-details" rows="3"></textarea>
                      <small id="input-nom-help" class="form-text text-muted">
                        @if ($errors->has('details'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->get('details') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </small>
                    </div>
                  

              
                    
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
                {{-- <div class="row justify-content-center">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div> --}}
                <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @push('scripts')
                                <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#error-modal").modal({
                                        'show':true,
                                    })
                                });
                                </script>
                                    
                                @endpush
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection