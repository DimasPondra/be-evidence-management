<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gambar Barang Bukti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <x-jet-welcome />
          </div> --}}

            <div class="mb-10">
                <a href="{{ route('image-evidence.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Gambar Baru
                </a>
            </div>

            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Nama Barang Bukti</th>
                            <th class="border px-6 py-4">Image</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4">{{ $item->detail->name }}</td>
                            <td class="border px-6 py-4">
                                <img src="{{ url($item->image) }}" alt="" class="object-scale-down h-32 w-32 ">
                            </td>
                            <td class="border px-6 py-4">
                                <a href="{{ route('image-evidence.edit', $item->id) }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('image-evidence.destroy', $item->id) }}" method="POST"
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
                            <td colspan="4" class="border px-6 py-4 text-center">Data tidak ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- <div class="text-center mt-5">
            {{ $data->links() }}
        </div> --}}

    </div>
    </div>
</x-app-layout>
