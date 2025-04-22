<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $messages=Message::with('user')->paginate(10);
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        Message::create([
            'idUser' => Auth::id(),
            'text' => $request->text,
            'date' => now(),
        ]);

        return redirect()->route('message.index')->with('status', 'Your message has been sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $message = Message::with('user')->findorfail($id);
        return view('messages.show',['message'=>$message]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('message.index')->with('alert', 'Message Removed!');
    }

    /**
     * Search the specified resource from storage.
     */
    public function search(Request $request)
    {   // objecto chama-se search, a barra de pesquisa.
        $search = $request->input('search');

        // Se o termo de pesquisa não for vazio
        if ($search) {
            $messages = Message::where('text', 'like', "%{$search}%") // Search for Text Message
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // Searches for Username
            })->paginate(10);  // (10 per page)
        } else {
            // In case there is no elements returns the same page.
            // I may implement here an alert to say that no "Search return = values with"
            $messages = Message::paginate(10);
        }

        // Retorna a view com os fornecedores encontrados
        return view('message.index', ['messages'=>$messages]);
    }





}
