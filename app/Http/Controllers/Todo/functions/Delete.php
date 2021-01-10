<?php
namespace App\Http\Controllers\todo\functions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Delete {
    public function delete(Request $request)
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
        $read_data  = $this->repository_todo->read($id);
        if (!$read_data) {
            return response()
                    ->json([
                        "msg"   => "There's no data matches with the given id"
                    ], 400);
        }

        // proceed deletion data through repository contract
        $delete     = $this->repository_todo->delete($id);
        if(!$delete) {
            return response()
                    ->json([
                        "msg"   => "Error encauntered when updating data"
                    ], 500);
        }

        return response()
                ->json([
                    "msg"       => "Data deleted successfuly"
                ], 204);
    }
}