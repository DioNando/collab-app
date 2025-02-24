<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollaboratorRequest;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborators = Collaborator::orderBy('created_at', 'desc')->paginate(10);
        return view('collaborators.index', compact('collaborators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collaborators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorRequest $request)
    {
        $request->validated();
        Collaborator::created($request->all());
        return redirect()->route('collaborators.index')->with('success', 'Collaborator ' . $request['name'] . ' created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collaborator $collaborator)
    {
        return view('collaborators.show', compact('collaborator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaborator $collaborator)
    {
        return view('collaborators.edit', compact('collaborator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collaborator $collaborator)
    {
        $request->validated();
        $collaborator->update($request->all());
        return redirect()->route('collaborators.index')->with('success', 'Collaborator ' . $collaborator['name'] . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return redirect()->route('collaborators.index')->with('success', 'Collaborator ' . $collaborator['name'] . ' deleted successfully');
    }
}
