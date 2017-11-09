<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Core\QueryFilter\SpecialistFilter;
use App\Http\Controllers\Controller;
use App\Models\Specialist;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\SpecialistRequest;

class SpecialistController extends BaseController
{
    public function search(Request $request, SpecialistFilter $query)
    {
        return Specialist::filterBy($query)->get()->toArray();
    }

    public function index()
    {
        $specialists = Specialist::get()
            ->mapWithKeys(function ($item, $idx) {
                $data = [
                    $idx + 1,
                    $item->name,
                    $item->description,
                ];
                return [$item->id => $data];
            })
            ->toArray();

        return view('admin.pages.specialist', [
            'items' => [
                'key' => [
                    'STT',
                    'Ten',
                    'Thong tin',
                ],
                'data' => $specialists,
            ],
            'baseUrl' => route('admin.specialists.index'),
        ]);
    }

    public function create(SpecialistRequest $request)
    {
        $newSpecialist = $request->only([
            'name',
            'description',
        ]);
        Specialist::create($newSpecialist);
        return redirect()->route('admin.specialists.index')
            ->with([
                'action' => 'create',
                'status' => 'success',
                'message' => 'Create specialist successful.',
            ]);
    }

    public function getUpdate(Specialist $specialist)
    {
        return view('admin.pages.specialist-update', [
            'specialist' => $specialist,
        ]);
    }

    public function update(Specialist $specialist, SpecialistRequest $request)
    {
        $specialist->update($request->only(['name', 'description']));
        return redirect()->route('admin.specialists.index')
            ->with([
                'action' => 'update',
                'status' => 'success',
                'message' => 'Update specialist successful.',
            ]);
    }

    public function delete(Specialist $specialist)
    {
        $specialist->delete();
        return redirect()->route('admin.specialists.index')
            ->with([
                'action' => 'delete',
                'status' => 'success',
                'message' => 'Delete specialist successful.',
            ]);
    }
}
