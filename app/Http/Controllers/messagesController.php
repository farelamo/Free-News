<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;

class messagesController extends Controller
{
    public function index()
    {
        $messages = messages::all();
        return view('admin/messages/index', compact('messages'));
    }

    public function store(Request $request)
    {
        $dataMsg = [
            'name' => $request->name, 'email' => $request->email,
            'content' => $request->content, 'type' => $request->type
        ];
        $messages->create($dataMsg);
        return redirect('/admin/messages');
    }

    public function update(Request $request, $id)
    {
        $messages = messages::findorfail($id);
        $dataMsg = [
            'name' => $request->name, 'email' => $request->email,
            'content' => $request->content, 'type' => $request->type
        ];
        $messages->update($dataMsg);
        return redirect('/admin/messages');
    }

    public function destroy($id)
    {
        $messages = messages::findorfail($id);
        messages::find($id)->delete();
        return redirect('/admin/messages');
    }
}