<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index (){
        return view('users.index');
    }
    public function getUsers(Request $request){
        if ($request->ajax()) {
            $data = User::select(['id', 'name', 'email', 'created_at']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return $row->created_at ? $row->created_at->format('d-m-Y H:i:s') : '-';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
    }    
    public function edit($id){
        $user = User::find($id);
        return response()->json($user);    
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return response()->json(['success' => 'Data user berhasil diperbarui.']);
    }
}

