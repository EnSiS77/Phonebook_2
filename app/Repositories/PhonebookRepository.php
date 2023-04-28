<?php

namespace App\Repositories;

use App\Models\Phonebook as Model;

class PhonebookRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список контактов для вывлода в списке
     * (Админка)
     * 
     * @return  LengthAworePaginator
     */

    public function getAllWithPaginator()
    {
        $columns = [
            'id',
            'name',
            'email',
            'phone',
            'published_at',
            'user_id',

        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'user:id,name',
            ])
            ->paginate(25);

        return $result;
    }

    /**
     * Получить модель для редактирования в админке.
     *
     *@param int $id
     *
     *@return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()
            ->find($id);
    }
}
