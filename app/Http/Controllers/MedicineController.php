<?php
namespace App\Http\Controllers;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MedicineController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:create medicines', only: ['create', 'store']),
            new Middleware('permission:edit medicines', only: ['edit', 'update']),
            new Middleware('permission:delete medicines', only: ['destroy']),
        ];
    }

    public function index()
    {
        $medicines = Medicine::latest()->get();
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');    
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'jenis'       => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|numeric|min:0',
        ]);

        Medicine::create($validated);

        return redirect()->route('medicines.index')
                         ->with('status', 'Obat berhasil ditambahkan!');
    }

    public function edit(Medicine $medicine)
    {
    // Jika user punya role Staff → tampilkan view khusus stok
    if (Auth::user()->hasRole('Staff')) {
        return view('medicines.edit-stok', compact('medicine'));
    }

    return view('medicines.edit', compact('medicine'));
    }       

    public function update(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'jenis'       => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|numeric|min:0',
        ]);

        $medicine->update($validated);

        return redirect()->route('medicines.index')
                         ->with('status', 'Obat berhasil diperbarui!');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')
                         ->with('status', 'Obat berhasil dihapus!');
    }
}