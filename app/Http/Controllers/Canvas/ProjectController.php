<?php

namespace App\Http\Controllers\Canvas;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ProjectTag;
use Redirect;
use View;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Project Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the Images functions
    | 1. Upload
    | 2. Edit
    | 3. Delete
    |
    */

    //show functions
    protected function getProjectTypes()
    {
        return Response::json(array('data' => ProjectType::all() )) ;
    }

    //create, delete and updates
    protected function create(Request $request){
        try{
            // INITIALIZATION
            $input = $request->all();

            $project = new Project;
            $project->title = $input['title'];
            $project->content = $input['content'];
            if (array_key_exists('image', $input)) {
                $project->featured_image = $input['image'];
            }
            $project->save();

            $projectTag = new ProjectTag;
            $projectTag->project_id = $project->id;
            $projectTag->project_types_id = $input['projectType'];
            $projectTag->save();

            return Redirect::to('canvas/projects/manage');

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
    }

    protected function delete($id){
        try{
            $project = Project::find($id);
            $project->delete();

            $projectTag = ProjectTag::where('project_id', $id);
            $projectTag->delete();

            return Response::json(array('result'=>'true', 'message'=>'Project Succesfully Deleted!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
    }

    protected function update(Request $request){       
        try{
            // INITIALIZATION
            $input = $request->all();

            $project = Project::find($input['id']);
            $project->title = $input['title'];
            $project->content = $input['content'];
            if (array_key_exists('image', $input)) {
                $project->featured_image = $input['image'];
            }
            $project->save();

            $projectTag = ProjectTag::find($input['projectTagID']);
            $projectTag->project_types_id = $input['projectType'];
            $projectTag->save();

            return Response::json(array('result'=>'true', 'message'=>'Project Succesfully UPDATED!!'));

        }catch(Exception $e){
            return Response::json(array('result' => 'false', 'message' => $e ));
        }
    }

    //show projects
    protected function getAllProjects()
    {
        return Response::json(array('data' => Project::with(['featured_image'])->get() ) ) ;
    }

    protected function getProject($id)
    {
        return Response::json(array('data' => Project::with(['Tags.ProjectType'])->with(['featured_image'])->find($id) )) ;
    }

    protected function activate($id)
    {
        try{
            $project = Project::find($id);
            $project->isPublished = 1;
            $project->save();
            return Response::json(array('result'=>'true', 'message'=>'Project Succesfully Published!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }   

    protected function deActivate($id)
    {
        try{
            $project = Project::find($id);
            $project->isPublished = 0;
            $project->save();
            return Response::json(array('result'=>'true', 'message'=>'Project Succesfully Unpublished!!'));
        }catch(Exception $e){
            return Response::json(array('result'=>'fail', 'message'=>$e));
        }
        
    }  

}
