@extends('layout.default')
@section('content')
<style type="text/css">
    #qrcode img{
        width:100%;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Abonnement ID: {{$abonnement->id}}</h4>
                        <p class="card-category">UUID {{$abonnement->uuid}}</p>
                    </div>
                    <div class="card-body">
                        <h4>Informations du Client</h4>
                        Nom: {{$abonnement->client->user->name}}
                        Prenom {{$abonnement->client->user->firstname}}<br/>
                        Email {{$abonnement->client->user->email}}<br/>
                        Telephone {{$abonnement->client->user->email}}<br/>
                      
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Abonnement ID: {{$abonnement->id}}</h4>
                        <p class="card-category">UUID {{$abonnement->uuid}}</p>
                    </div>
                    <div class="card-body">
                            <table class="table display nowrap" style="width:100%" id="table-consommations">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Valeur
                                    </th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
            
                        <div class="card-body">
                            <h6 class="card-category text-gray">Informations</h6>
                            <h4 class="card-title">Compteur</h4>
                            <p class="card-description justify-content-center" id="qrcode">
                                {{$compteur->numero_serie}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <video id="preview"></video>
                
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "{{$compteur->numero_serie}}",
                width: 256,
                height: 256,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            }); 
        });
    </script>
    @endpush   
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var url="{{route('consommations.list',':id')}}".replace(':id',{{$abonnement->id}});
            console.log(url);
            $('#table-consommations').DataTable( { 
                "processing": true,
                "serverSide": true,
                responsive: true,
                "ajax": url,
                columns: [
                { data: 'id', name: 'id' },
                { data: 'created_at', name: 'created_at' },
                { data: 'valeur', name: 'valeur' },
                
                ],
                scrollY:        200,
                deferRender:    true,
                scroller:       true,
            });
        });
    </script>
    @endpush  
    @endsection