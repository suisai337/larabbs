<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:160'
        ], [
            'content.required' => '微博内容不能为空',
            'content.max' => '微博内容最大长度为160'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request->input('content')
        ]);
        session()->flash('success', '发布微博成功');
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '删除成功');
        return redirect()->back();
    }
}
