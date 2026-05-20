@extends('layouts.app')

@push('css')
@endpush

@section('header')
{{ __('Dashboard') }}
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <p class="text-sm font-medium text-gray-500">Total Obat</p>
                <p class="mt-4 text-3xl font-semibold text-gray-900">{{ $medicineCount }}</p>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-6">
                <p class="text-sm font-medium text-gray-500">Total Stok</p>
                <p class="mt-4 text-3xl font-semibold text-gray-900">{{ $totalStock }}</p>
            </div>
            <div class="bg-white shadow-sm rounded-lg p-6">
                <p class="text-sm font-medium text-gray-500">Pengguna</p>
                <p class="mt-4 text-3xl font-semibold text-gray-900">{{ Auth::user()->name }}</p>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 space-y-4">
                <p class="text-lg font-semibold">Selamat datang, {{ Auth::user()->name }}!</p>
                <p class="text-sm text-gray-600">Dashboard ini menampilkan ringkasan singkat sistem dan tautan cepat untuk mengelola data obat Anda.</p>
                <div class="grid gap-4 sm:grid-cols-2">
                    <a href="{{ route('medicines.index') }}" class="block rounded-lg border border-gray-200 bg-gray-50 px-5 py-4 text-sm font-medium text-gray-900 hover:bg-gray-100 transition">
                        Lihat Daftar Obat
                    </a>
                    @can('create medicines')
                        <a href="{{ route('medicines.create') }}" class="block rounded-lg border border-transparent bg-gray-800 px-5 py-4 text-sm font-medium text-white hover:bg-gray-700 transition">
                            Tambah Obat Baru
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush
