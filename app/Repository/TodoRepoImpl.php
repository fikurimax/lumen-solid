<?php
namespace App\Repository;

interface TodoRepoImpl {

    /**
     * this function will be used for create new todo list
     *
     * @param string $name
     * @param string $due_time
     * @return bool
     */
    public function create(string $name, string $due_time) : bool;

    /**
     * this function is for read one todo list
     *
     * @param integer $id
     * @return TbTodo
     */
    public function read(int $id) : array;

    /**
     * this function is for read all todo list data
     *
     * @return array
     */ 
    public function readAll() : array;

    /**
     * this function will be used for update an existing todo
     *
     * @param integer $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data) : bool;

    /**
     * this function will delete an existing todo
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id) : bool;
}