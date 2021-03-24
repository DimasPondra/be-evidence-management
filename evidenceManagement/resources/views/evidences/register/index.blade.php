<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Barang Bukti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <x-jet-welcome />
          </div> --}}

            <div class="mb-10">
                <a href="{{ route('register-evidence.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Register Barang Bukti Baru
                </a>
            </div>

            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Nomer Register</th>
                            <th class="border px-6 py-4">Nama Tersangka</th>
                            <th class="border px-6 py-4">Pasal</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->register_number }}</td>
                            <td class="border px-6 py-4">{{ $item->suspect }}</td>
                            <td class="border px-6 py-4">{{ $item->article }}</td>
                            <td class="border px-6 py-4">
                                <a href="{{ route('register-evidence.edit', $item->id) }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('register-evidence.destroy', $item->id) }}" method="POST"
                                    class="inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class=" bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="border px-6 py-4 text-center">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-5">
                {{ $data->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
