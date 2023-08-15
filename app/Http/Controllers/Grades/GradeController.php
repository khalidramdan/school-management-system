<?php

namespace App\Http\Controllers\Grades;

use Exception;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\GradeRequest;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Grades = Grade::all();
        return view('pages.grades.Grades', compact('Grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
        try {
            //

            $validate = $request->validated();
            $Grade = new Grade();

            $Grade->Name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $Grade->Notes = $request->notes;
            $Grade->save();
            toastr()->success(trans('Grades-translate.message_success'));
            return to_route('Grades.index');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
