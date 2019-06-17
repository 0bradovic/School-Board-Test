<?php

namespace App\Repositories\Student;

use App\Models\Student;

class EloquentStudent implements StudentRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Student::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Student::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $student = Student::create($data);

        return $student;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $student = $this->find($id);

        $student->update($data);

        return $student;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $student = $this->find($id);

        return $student->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Student::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Student::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $student = Student::where($where);
        
        return $student;
    }


}
