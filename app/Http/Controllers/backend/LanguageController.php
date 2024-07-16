<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\StoreRequest;
use App\Http\Requests\Language\UpdateRequest;
use App\Repositories\Language\LanguageInterface;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $repo;

    public function __construct(LanguageInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $languages      = $this->repo->get();
        return view('backend.language.index', compact('languages'));
    }

    //language create page
    public function create()
    {
        $flags        = $this->repo->flags();
        return view('backend.language.create', compact('flags'));
    }

    //language store
    public function store(StoreRequest $request)
    {
        // dd($request);
        if (env('DEMO')) {
            return redirect()->back()->withInput()->with('danger', __('store_system_error'));
        }

        $result = $this->repo->store($request);

        if ($result['status']) {
            return redirect()->route('language.index')->with('success', $result['message']);
        }
        return redirect()->back()->withInput()->with('danger', $result['message']);
    }


    public function edit($id)
    {
        $lang       = $this->repo->edit($id);
        $flags       = $this->repo->flags();
        return view('backend.language.edit', compact('lang', 'flags'));
    }

    //language update
    public function update(UpdateRequest $request)
    {

        if (env('DEMO')) {
            return redirect()->back()->withInput()->with('danger', __('update_system_error'),);
        }

        $result = $this->repo->update($request);

        if ($result['status']) {
            return redirect()->route('language.index')->with('success', $result['message']);
        }
        return redirect()->back()->withInput()->with('danger', $result['message']);
    }

    //edit phrase
    public function editPhrase($id)
    {
        $result = $this->repo->editPhrase($id);
        if ($result['status']) {
            $langData    = $result['data']['terms'];

            $lang        = $this->repo->edit($id);
            return view('backend.language.edit_phrase', compact('langData', 'lang'));
        }
        return redirect()->back()->withInput()->with('danger', $result['message']);
    }


    public function changeModule(Request $request)
    {
        $path           = base_path('lang/' . $request->code);
        $jsonString     = file_get_contents(base_path("lang/$request->code/$request->module.json"));
        $data['terms']  = json_decode($jsonString, true);

        return view('backend.language.ajax_terms', compact('data'))->render();
    }

    //update phrase
    public function updatePhrase(Request $request, $code)
    {

        $result = $this->repo->updatePhrase($request, $code);

        if ($result['status']) {
            return redirect()->route('language.index')->with('success', $result['message']);
        }
        return redirect()->back()->withInput()->with('danger', $result['message']);
    }

    //delete language
    public function delete($id)
    {
        if ($this->repo->delete($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = 'success';
            $success[2] = "Deleted";
            return response()->json($success);
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
            return response()->json($success);
        endif;
    }
}
