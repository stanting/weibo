<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        $request->user()->statuses()->create([
            'content' => $request->content
        ]);

        session()->flash('success', 'Published successfully');
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();

        session()->flash('success', 'Weibo has been deleted!');
        return redirect()->back();
    }
}
