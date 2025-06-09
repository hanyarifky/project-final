<x-layout>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <h4 class="mb-10 mt-3 text-xl font-bold dark:text-white">Data Kartu Keluarga</h4>

        <table id="data-table" class="">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            NO KK
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Nama Kepala Keluarga
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            RW/RT
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Action
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartu_keluargas as $kk)
                <tr>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $kk->nomor_kartu_keluarga }}</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $kk->nama_kepala_keluarga }}</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $kk->rw }}/{{ $kk->rt }}</td>
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/kk/{{ $kk->id  }}" class="pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                        <a href="#" class="pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-800 dark:text-blue-500 hover:underline">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-layout>
