<?php

namespace App\Repositories\Mark;

use App\Models\Mark;

class EloquentMark implements MarkRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Mark::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Mark::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $mark = Mark::create($data);

        return $mark;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $mark = $this->find($id);

        $mark->update($data);

        return $mark;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $mark = $this->find($id);

        return $mark->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Mark::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return mark::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $mark = Mark::where($where);
        
        return $mark;
    }


}
