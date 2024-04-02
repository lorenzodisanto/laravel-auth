<?php
// cambio in namespace
namespace App\Http\Controllers\Admin;
// importo il controller
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;

// importo facades string
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recupero la lista dei progetti dal database
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // ritorno il form aggiungi nuovo progetto
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //salvataggio progetto inserito nel form
        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();

        // ritorno al dettaglio del progetto dopo il salvataggio
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        //metodo show per dettaglio singolo progetto
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        //ritorno la vista del form di modifica
        return view('admin.projects.edit', compact('project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // salvataggio modifica
        $data = $request->all();
        $project->fill($data);
        $project->slug = Str::slug($project->title);
        $project->save();

        // dopo il salvataggio redirect alla rotta show
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
