<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Trainer Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('trainers.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="nama_trainer" :value="__('Nama Trainer')" />
                            <x-text-input id="nama_trainer" class="block mt-1 w-full" type="text" name="nama_trainer" :value="old('nama_trainer')" required autofocus />
                            <x-input-error :messages="$errors->get('nama_trainer')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="spesialisasi" :value="__('Spesialisasi')" />
                            <x-text-input id="spesialisasi" class="block mt-1 w-full" type="text" name="spesialisasi" :value="old('spesialisasi')" required />
                            <x-input-error :messages="$errors->get('spesialisasi')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <textarea id="deskripsi" name="deskripsi" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="harga_per_sesi" :value="__('Harga per Sesi (Rp)')" />
                            <x-text-input id="harga_per_sesi" class="block mt-1 w-full" type="number" name="harga_per_sesi" :value="old('harga_per_sesi')" required />
                            <x-input-error :messages="$errors->get('harga_per_sesi')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon')" />
                            <x-input-error :messages="$errors->get('nomor_telepon')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('trainers.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>