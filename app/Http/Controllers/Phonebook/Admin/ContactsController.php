<?php

namespace App\Http\Controllers\Phonebook\Admin;

use App\Http\Requests\PhonebookCreateRequest;
use App\Http\Requests\PhonebookUpdateRequest;
use App\Models\Phonebook;
use App\Repositories\PhonebookRepository;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;


/**
 * Управление контактами
 * 
 * @package App\Http\Controllers\Blog\Admin
 */

class ContactsController extends BaseController
{

    /**
     * @var PhonebookRepository
     */
    private $phonebookRepository;


    /**
     * ContactsController constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->phonebookRepository = app(PhonebookRepository::class);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = $this->phonebookRepository->getAllWithPaginator();
        return view('book.admin.contacts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new Phonebook();

        return view(
            'book.admin.contacts.create',
            compact('item')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhonebookCreateRequest $request)
    {
        $successMsg = 'Успешно сохранено';
        $errorMsg = 'Ошибка сохранения';

        foreach ($request->inputs as $key => $value) {
            try {
                Phonebook::create($value);
                $successMsg .= ' для контакта ' . $value['name'];
            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == 1062) {
                    $errorMsg .= ' для контакта ' . $value['name'] . ': дубликат';
                } else {
                    $errorMsg .= ' для контакта ' . $value['name'] . ': неизвестная ошибка';
                }
            }
        }

        return redirect()->route('book.admin.contacts.create')
            ->with('success', $successMsg)
            ->withErrors(['msg' => $errorMsg]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = $this->phonebookRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('book.admin.contacts.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param PhonebookupdateREquest $request
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookUpdateRequest $request, $id)
    {
        $item = $this->phonebookRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('book.admin.contacts.edit', $item->id)
                ->with(['success' => 'Успешно обновлено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка обносления'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Софт-удаление, в бд остается.
        // $result = Phonebook::destroy($id);

        //Полное удаление с бд
        $result = Phonebook::find($id)->forceDelete();

        if ($result) {
            return redirect()
                ->route('book.admin.contacts.index')
                ->with(['success' => "Запись id=[{$id}] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

    /**
     * Выборочное удаление, удаляет и с базы
     */

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Phonebook::whereIn('id', $ids)->delete();


        return response()->json(["success" => "Контакты были удалены!"]);
    }

    /**
     * Посиковой контроллер
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $contacts = Phonebook::query()
            ->where('id', 'LIKE', "%{$query}%")
            ->orWhere('user_id', 'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->orderBy('id')
            ->paginate(10);
    
        return view('book.search.search', compact('contacts'));
    }
    

}
