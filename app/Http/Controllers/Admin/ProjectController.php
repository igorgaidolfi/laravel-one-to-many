<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view ('admin.projects.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all(); 
        $proj = new Project();
        if($request->hasFile('img')){
        $path= Storage::disk('public')->put('project_image', $form_data['img']);
            $proj->img = $path;
        }
        $proj->type_id = $form_data['type_id'];
        $proj->title = $form_data['title'];
        $slug = Str::slug($proj->title,'-');
        $proj->slug = $slug;
        $proj->content = $form_data['content'];
        $proj->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view ('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        $exists = Project::where('title','LIKE', $form_data['title'])
        ->where('id', '!=', $project->id)->get();
        if($request->hasFile('img')){
            if($project->img != null){
                Storage::disk('public')->delete($project->img);
            }
            $path= Storage::disk('public')->put('project_image', $form_data['img']);
                $project->img = $path;
            }
        $project->type_id = $form_data['type_id'];
        $slug = Str::slug($form_data['title'],'-');
        $project->slug = $slug;
        $project->content = $form_data['content'];
        if($exists->isNotEmpty()){
            return redirect()->route('admin.projects.edit', compact('project'))->withErrors(['Titolo gia\' inserito']);
        }
        $project->title = $form_data['title'];
        $project->update();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->img != null){
            Storage::disk('public')->delete($project->img);
        }
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
