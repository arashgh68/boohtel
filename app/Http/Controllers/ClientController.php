<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\Client;

class ClientController extends Controller
{
    //
    public function __construct(Title $title)
    {
        $this->titles = $title->all();
    }

    public function di()
    {
        dd($this->titles);
    }

    public function index()
    {
        $data['clients'] = Client::all();

        return view('client.index')->with($data);
    }

    public function export()
    {
        $data['clients'] = Client::all();
        header('Content-Disposition: attachment;filename=export.xls');
        return view('client.export')->with($data);
    }

    public function show($client_id)
    {

        $data['client'] = Client::where('id', $client_id)->firstOrFail()->toarray();
        $data += [
            'titles' => $this->titles,
            'modify' => 1
        ];
        request()->session()->put('last_update',$data['client']['name']);
        return view('client.form')->with($data);
    }

    public function newClient(Request $request, Client $client)
    {

        $client->fill($request->all());
        $data = [
            'titles' => $this->titles,
            'modify' => 0,

            'client' => $client
        ];
        if ($request->isMethod('post')) {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'last_name' => 'required',
                'address' => 'required',
                'zip_code' => 'required',
                'city' => 'required',
                'state' => 'required',
            ];
            $this->validate($request, $rules);
            $client->save();

            return redirect('clients');
        }
        return view('client.form')->with($data);
    }

    public function modify(Request $request, $client_id, Client $client)
    {

        $rules = [
            'name' => 'min:1',
            'email' => '|email',
            'last_name' => 'min:1',
            'address' => 'min:1',
            'zip_code' => 'min:1',
            'city' => 'min:1',
            'state' => 'min:1',
        ];
        $this->validate($request, $rules);
        $client = Client::findOrFail($client_id);
        $client->fill($request->all());
        $client->save();

        return redirect('clients');
    }

    public function create()
    {
        return view('client.create');
    }
}
