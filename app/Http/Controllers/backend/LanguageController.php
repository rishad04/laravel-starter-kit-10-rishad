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

        if (env('DEMO')) {
            toast(__('store_system_error'), 'error');
            // toast(__('Store system is disable for the demo mode.'),'error');
            return redirect()->back()->withInput();
        }

        if ($this->repo->store($request)) :
            toast(__('language_added'), 'success');
            return redirect()->route('language.index');
        else :
            toast(__('error'), 'error');
            return redirect()->back()->withInput();
        endif;
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
            toast(__('update_system_error.'), 'error');
            return redirect()->back()->withInput();
        }
        if ($this->repo->update($request)) :
            toast(__('language_updated'), 'success');
            return redirect()->route('language.index');
        else :
            toast(__('error'), 'error');
            return redirect()->back();
        endif;
    }

    //edit phrase
    public function editPhrase($id)
    {

        if ($this->repo->editPhrase($id)) :
            $langData    = $this->repo->editPhrase($id);
            $lang        = $this->repo->edit($id);
            return view('backend.language.edit_phrase', compact('langData', 'lang'));
        else :
            toast(__('error'), 'error');
            return redirect()->back();
        endif;
    }

    //update phrase
    public function updatePhrase(Request $request, $code)
    {
        if (env('DEMO')) {
            toast(__('update_system_error'), 'error');
            return redirect()->back()->withInput();
        }
        if ($this->repo->updatePhrase($request, $code)) :
            toast(__('phrase_updated'), 'success');
            return redirect()->route('language.index');
        else :
            toast(__('error'), 'error');
            return redirect()->back()->withInput();
        endif;
    }
    //delete language
    public function delete($id)
    {
        if (env('DEMO')) {
            toast(__('delete_system_error.'), 'error');
            return redirect()->back();
        }
        if ($this->repo->delete($id)) :
            toast(__('language_deleted'), 'success');
            return redirect()->route('language.index');
        else :
            toast(__('error'), 'error');
            return redirect()->back();
        endif;
    }
}
