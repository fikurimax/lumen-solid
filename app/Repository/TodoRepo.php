<?php
namespace App\Repository;

use App\Models\Todo;

class TodoRepo implements TodoRepoImpl
{
    public function create(string $name, string $due_time) : bool {
        try {
            Todo::create([
                "name"      => $name,
                "due_date"  => $due_time
            ]);
    
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function read(int $id) : array {
        $get = Todo::find($id);
        if ($get) {
            return $get->attributesToArray();
        }

        return [];
    }

    public function readAll() : array {
        return Todo::all()->toArray();
    }

    public function update(int $id, array $data) : bool {
        try {
            Todo::where('id', $id)->update($data);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete(int $id) : bool {
        try {
            Todo::where('id', $id)->delete();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
