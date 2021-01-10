<?php
namespace App\Http\Controllers\Todo\functions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Create {
    public function create(Request $request)
    {
        // make form validator to ensure the data payload is meet the requirements
        $validate = Validator::make($request->all(), [
            "name"      => "required|string",
            "due_date"  => "required|date"
        ], [
            "required"  => ":attribute is required",
            "date"      => ":attribute must be date format",
            "string"    => ":attribute must be string"
        ]);

        if ($validate->fails()) {
            // send a response with error details as array
            return response()
                    ->json($validate->errors()->all(), 400);
        }

        // make the first letter capital for each words
        $name = ucwords($request->post("name"));
        // parse date using carbon for formatting date
        $due_date = Carbon::parse($request->post("due_date"))->format("Y-m-d H:i:s");

        // use repository to call create function, we just need to insert its params
        $create = $this->repository_todo->create($name, $due_date);
        if (!$create) {
            // give a response when there's an error encountered
            return response()
                    ->json([
                        "msg"   => "Failed creating todo!"
                    ], 500);
        }

        return response()
                    ->json([
                        "msg"   => "Creating todo successfully!"
                    ], 201);
    }
}