<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prix = Ticket::get();
        $somme = 0;
        foreach ($prix as $pri) {
            $somme += $pri->price;
        }


        return view('ticket.show', [
            'somme' => $somme / 100,
            'tickets' => Ticket::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ticket.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'store' => 'bail|required|max:20',
            'description' => 'bail|required|max:250',
            'price' => 'bail|required|max:250'
        ]);

        if(!isset($request->id)){
            $ticket = new Ticket;
        } else {
            $ticket = Ticket::findOrFail($request->id);
        }

        $ticket->userId = 1;
        $ticket->store = $request->store;
        $ticket->description = $request->description;
        $ticket->price = ($request->price * 100);
        $ticket->save();

        return redirect('tickets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('ticket.edit', [
            'ticket' => $ticket
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
