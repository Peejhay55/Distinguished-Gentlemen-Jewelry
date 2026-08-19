<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Actividad 4: listar objetos (id + nombre).
     */
    public function index(): View
    {
        return view('clients.index', [
            'clients' => Client::orderBy('id')->paginate(15),
        ]);
    }

    /**
     * Actividad 2: formulario de creación.
     */
    public function create(): View
    {
        return view('clients.create', [
            'roles' => Client::ROLES,
        ]);
    }

    /**
     * Actividad 3: inserción del objeto.
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        $client = Client::create($request->validated());

        return redirect()
            ->route('clients.show', $client)
            ->with('status', 'Elemento creado satisfactoriamente');
    }

    /**
     * Actividad 5: ver un objeto.
     */
    public function show(Client $client): View
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Actividad 6: borrar un objeto.
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('status', 'Elemento borrado satisfactoriamente');
    }
}
