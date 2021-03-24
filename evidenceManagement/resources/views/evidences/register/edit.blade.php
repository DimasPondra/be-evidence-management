<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Register Barang Bukti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
                @endif
                <form action="{{ route('register-evidence.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="register_number" class="block text-sm font-medium text-gray-700">Nomer
                                        Register</label>
                                    <input type="number" name="register_number" id="register_number"
                                        autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $item->register_number }}" placeholder="Nomer Register">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="register_date" class="block text-sm font-medium text-gray-700">Tanggal
                                        Register</label>
                                    <input type="date" name="register_date" id="register_date" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $item->register_date }}">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="suspect" class="block text-sm font-medium text-gray-700">Nama
                                        Tersangka</label>
                                    <input type="text" name="suspect" id="suspect" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $item->suspect }}" placeholder="Nama Tersangka">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="article" class="block text-sm font-medium text-gray-700">Pasal</label>
                                    <input type="text" name="article" id="article" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $item->article }}" placeholder="Pasal Kejahatan">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="prosecutor" class="block text-sm font-medium text-gray-700">Nama
                                        Jaksa</label>
                                    <input type="text" name="prosecutor" id="prosecutor" autocomplete="given-name"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ $item->prosecutor }}" placeholder="Nama Jaksa Penuntut Umum">
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Ubah Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>