<?php

namespace App\Repositories\Mark;

use App\Models\Mark;

interface MarkRepository
{
    /**
     * Get all marks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all mark into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find mark by id.
     *
     * @param $id Mark Id
     * @return Mark|null
     */
    public function find($id);

    /**
     * Find mark by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new mark.
     *
     * @param array $data
     * @return Mark
     */
    public function create(array $data);

    /**
     * Update specified mark.
     *
     * @param $id Mark Id
     * @param array $data
     * @return Mark
     */
    public function update($id, array $data);

    /**
     * Remove mark from repository.
     *
     * @param $id Mark Id
     * @return bool
     */
    public function delete($id);

    public function where($where);


}
