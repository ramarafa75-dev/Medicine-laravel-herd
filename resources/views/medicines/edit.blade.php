<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Obat') }}
            </h2>
            <a href="{{ route('medicines.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('medicines.update', $medicine) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Obat --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Obat <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name"
                               value="{{ old('name', $medicine->name) }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-gray-400
                                      @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="price" min="0"
                               value="{{ old('price', $medicine->price) }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-gray-400
                                      @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Obat --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Jenis Obat <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm
                                       focus:outline-none focus:ring-2 focus:ring-gray-400
                                       @error('jenis') border-red-500 @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Tablet"  {{ old('jenis', $medicine->jenis) == 'Tablet'  ? 'selected' : '' }}>Tablet</option>
                            <option value="Sirup"   {{ old('jenis', $medicine->jenis) == 'Sirup'   ? 'selected' : '' }}>Sirup</option>
                            <option value="Kapsul"  {{ old('jenis', $medicine->jenis) == 'Kapsul'  ? 'selected' : '' }}>Kapsul</option>
                            <option value="Salep"   {{ old('jenis', $medicine->jenis) == 'Salep'   ? 'selected' : '' }}>Salep</option>
                            <option value="Injeksi" {{ old('jenis', $medicine->jenis) == 'Injeksi' ? 'selected' : '' }}>Injeksi</option>
                        </select>
                        @error('jenis')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Stok --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Stok <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="stock" min="0"
                               value="{{ old('stock', $medicine->stock) }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm
                                      focus:outline-none focus:ring-2 focus:ring-gray-400
                                      @error('stock') border-red-500 @enderror">
                        @error('stock')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-gray-800 text-white px-5 py-2 rounded-md text-sm font-medium hover:bg-gray-700 transition">
                            Update
                        </button>
                        <a href="{{ route('medicines.index') }}"
                           class="bg-gray-100 text-gray-700 px-5 py-2 rounded-md text-sm font-medium hover:bg-gray-200 transition">
                            Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>