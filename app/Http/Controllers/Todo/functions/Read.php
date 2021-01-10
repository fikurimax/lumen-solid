<?php
namespace App\Http\Controllers\Todo\functions;

trait Read {

    public function read($id = null)
    {
        // Read single data
        // read data through repository linked in the parent controller which is TodoController
        $find   = $this->repository_todo->read($id);
        if (empty($find)) {
            // give a response when there's no data matches with the given id
            return response()
                    ->json([
                        "msg"   => "There's no data matches with the given id"
                    ], 404);
        }

        return response()
                ->json($find, 200);
    }

    public function readMany()
    {
        // Read all data through repository linked in the parent controller
        $get_all = $this->repository_todo->readAll();
        if (empty($get_all)) {
            // give a response when there's no data on the database
            return response()
                    ->json([
                        "msg"   => "There's no todo list yet"
                    ], 404);
        }

        return response()
                ->json($get_all, 200);
    }
}