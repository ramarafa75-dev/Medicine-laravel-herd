@extends('layouts.app')

@section('header')
    Edit Obat
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Obat</h3>
                </div>

                <form action="{{ route('medicines.update', $medicine) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        {{-- Nama Obat --}}
                        <div class="form-group">
                            <label>Nama Obat <span class="text-danger">*</span></label>
                            <input type="text" name="name"
                                   value="{{ old('name', $medicine->name) }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Contoh: Paracetamol">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Harga --}}
                        <div class="form-group">
                            <label>Harga (Rp) <span class="text-danger">*</span></label>
                            <input type="number" name="price" min="0"
                                   value="{{ old('price', $medicine->price) }}"
                                   class="form-control @error('price') is-invalid @enderror"
                                   placeholder="Contoh: 10000">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Jenis Obat --}}
                        <div class="form-group">
                            <label>Jenis Obat <span class="text-danger">*</span></label>
                            <select name="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Tablet"  {{ old('jenis', $medicine->jenis) == 'Tablet'  ? 'selected' : '' }}>Tablet</option>
                                <option value="Sirup"   {{ old('jenis', $medicine->jenis) == 'Sirup'   ? 'selected' : '' }}>Sirup</option>
                                <option value="Kapsul"  {{ old('jenis', $medicine->jenis) == 'Kapsul'  ? 'selected' : '' }}>Kapsul</option>
                                <option value="Salep"   {{ old('jenis', $medicine->jenis) == 'Salep'   ? 'selected' : '' }}>Salep</option>
                                <option value="Injeksi" {{ old('jenis', $medicine->jenis) == 'Injeksi' ? 'selected' : '' }}>Injeksi</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Stok --}}
                        <div class="form-group">
                            <label>Stok <span class="text-danger">*</span></label>
                            <input type="number" name="stock" min="0"
                                   value="{{ old('stock', $medicine->stock) }}"
                                   class="form-control @error('stock') is-invalid @enderror"
                                   placeholder="Contoh: 100">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('medicines.index') }}" class="btn btn-secondary ml-2">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection