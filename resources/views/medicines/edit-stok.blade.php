<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Stok Obat') }}
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

                    {{-- Nama Obat (readonly) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Obat</label>
                        <input type="text" value="{{ $medicine->name }}" disabled
                               class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm bg-gray-100 text-gray-500 cursor-not-allowed">
                        <input type="hidden" name="name" value="{{ $medicine->name }}">
                    </div>

                    {{-- Jenis (readonly) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Obat</label>
                        <input type="text" value="{{ $medicine->jenis }}" disabled
                               class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm bg-gray-100 text-gray-500 cursor-not-allowed">
                        <input type="hidden" name="jenis" value="{{ $medicine->jenis }}">
                    </div>

                    {{-- Harga (readonly) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="text" value="Rp {{ number_format($medicine->price, 0, ',', '.') }}" disabled
                               class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm bg-gray-100 text-gray-500 cursor-not-allowed">
                        <input type="hidden" name="price" value="{{ $medicine->price }}">
                    </div>

                    {{-- Stok (bisa diedit) --}}
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
                            Update Stok
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