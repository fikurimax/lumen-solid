<?php
namespace App\Http\Controllers\todo\functions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Update {
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "id"    => "required"
        ]);

        if ($validate->fails()) {
            return response()
                    ->json([
                        "msg"   => "there's no id given"
                    ], 400);
        }

        $id         = $request->post("id");

        // ensure that the given id is exists in the database
        $read_data = $this->repository_todo->read($id);
        if (!$read_data) {
            return response()
                    ->json([
                        "msg"   => "There's no data matches with the given id"
                    ], 400);
        }

        $name       = ucwords($request->post("name"));
        $due_date   = Carbon::parse($request->post("due_date"))->format("Y-m-d H:i:s");

        // call repository contract to proceed the update
        $update     = $this->repository_todo->update($id, ["name" => $name, "due_date" => $due_date]);
        if (!$update) {
            return response()
                    ->json([
                        "msg"   => "Error encauntered when updating data"
                    ], 500);
        }

        return response()
                ->json([
                    "msg"   => "Data updated successfully"
                ], 204);
    }
}