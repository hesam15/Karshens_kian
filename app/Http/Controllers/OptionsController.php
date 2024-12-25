<?php

namespace App\Http\Controllers;

use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OptionsController extends Controller
{
    public function index(){
        $options = Options::all();
        $suboptions = Options::pluck('values')->toArray();

        return view('admin.options.index', compact('options', 'suboptions'));
    }

    public function create(){

        return view('admin.options.createOption');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_options' => 'required|array',
            'sub_values' => 'required|array',
        ]);

        $sub_options = $request->sub_options;
        $sub_values = $request->sub_values;
        
        $options_array = [];
        
        for($i = 0; $i < count($sub_options); $i++) {
            $values = explode('،', $sub_values[$i]);
            $options_array[$sub_options[$i]] = $values;
        }
        
        $option = new Options();
        $option->name = $request->name;
        $option->values = json_encode($options_array, JSON_UNESCAPED_UNICODE);
        $option->user_id = Auth::user()->id;
        $option->save();
    
        return redirect()->back()->with('success', true);
    }

    public function edit($id){
        $option = Options::where('id', $id)->first();
        $values = json_decode($option->values, true);
        return view('admin.options.editOption', compact('option', 'values'));
    }
}
