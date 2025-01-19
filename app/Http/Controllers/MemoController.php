<?php

namespace App\Http\Controllers;

use App\Models\Memo;
// use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;


class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(MemoRequest $request)
    {
        $memo = new Memo();

        $memo->title = $request->title;
        $memo->body = $request->body;

        $memo->save();

        return redirect(route('memos.index'));
    }

    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }

    public function edit($id)
    {
        $memo = Memo::find($id);
        return view('memos.edit', ['memo' => $memo]);
    }

    public function update(MemoRequest $request, $id)
    {

        $memo = Memo::find($id);

        $memo->title = $request->title;
        $memo->body = $request->body;

        $memo->save();

        return redirect(route('memos.index'));
    }

    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();

        return redirect(route('memos.index'));
    }
}
