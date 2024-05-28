<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TaskApiController extends Controller
{
    protected $taskModel;
    function __construct(){
        $this->taskModel = new Task();  
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $this->taskModel->createTask([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json(['message' => 'Task created successfully'], 201);

    }

    public function index() {
       return response()->json(['data' => $this->taskModel->getTaskList()], 200);
    }

    public function markAsDone($id) {
        $isUpdated = $this->taskModel->markAsDone($id);

        if($isUpdated) {
            return response()->json(['message' => 'Task marked as done'], 200);
        }

        return response()->json(['message' => 'Task not found'], 404);

    } 

    public function destroy($id) {
        $isDeleted = $this->taskModel->deleteTask($id);

        if($isDeleted) {
            return response()->json(['message' => 'Task deleted successfully'], 200);
        }

        return response()->json(['message' => 'Failed to delete the task'], 404);
    }
}
