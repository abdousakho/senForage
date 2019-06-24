<?php

namespace App\Http\Controllers;

use App\Abonnement;
use Illuminate\Http\Request;
use DataTables;
class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('abonnements.index');
    }
    public function list()
    {
        $abonnements=Abonnement::with(['client.user','compteur'])->get();
        return DataTables::of($abonnements)->make(true);
    }
    // public function list(){
    //     $abonnements=Abonnement::with('client.user')->get();
    //     return DataTables::of($abonnements)->make(true);
    // }
    public function selectclient()
    {
        return view('abonnements.selectclient');
    }
    public function selectcompteur(Request $request)
    {
        $client=\App\Client::find($request->input('client'));
        return view('abonnements.selectcompteur',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $client=\App\Client::find($request->input('client'))->load('user');
        $compteur=\App\Compteur::find($request->input('compteur'));

        return view('abonnements.create',compact(['client','compteur']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request, [
                'client' => 'required|exists:clients,id',
                'compteur' => 'required|exists:compteurs,id',
               'details' => 'required|string|max:50',
            ]
        );
        $client=\App\Client::find($request->input('client'))->load('user');
        $compteur=\App\Compteur::find($request->input('compteur'));
        $count=$client->abonnements()->count();
        if($count>2){
            $message="Le systeme n'autorise pas plus de 2 abonnements pour le meme client";
            return redirect()->route('abonnements.index')->with(['message'=>$message]);

        }
        $abonnement=Abonnement::create([
            "clients_id"=>$request->input('client'),
            "compteurs_id"=>$request->input('compteur'),
            "details"=>$request->input('details'),
        ]);
        
        
        //$request->session()->flash('messagev','Effectué'); 
        $message="Enregistrement abonnement pour ".$client->user->name." ".$client->user->firstname." Effectué".PHP_EOL.
        "Nombre d'abonnements: ".$count;

        return redirect()->route('abonnements.index')->with(['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function show(Abonnement $abonnement)
    {
        //
        $compteur=$abonnement->compteur;
        $abonnement->load('client.user');
        return view('abonnements.show',compact(['compteur','abonnement']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abonnement  $abonnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abonnement $abonnement)
    {
        //
    }
}
