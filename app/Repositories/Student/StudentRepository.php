<?php

namespace App\Repositories\Student;

use App\Models\Student;

interface StudentRepository
{
    /**
     * Get all students.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all student into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find student by id.
     *
     * @param $id Student Id
     * @return Student|null
     */
    public function find($id);

    /**
     * Find student by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new student.
     *
     * @param array $data
     * @return Student
     */
    public function create(array $data);

    /**
     * Update specified student.
     *
     * @param $id Student Id
     * @param array $data
     * @return Student
     */
    public function update($id, array $data);

    /**
     * Remove student from repository.
     *
     * @param $id Student Id
     * @return bool
     */
    public function delete($id);

    public function where($where);


}
