<x-layout>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Data Keluarga</h4>

            <a href="/kartu-keluarga/create"
                class="lg:px-5 lg:py-2.5 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-3 text-center me-2 mb-2">Tambah
                Data
            </a>


        </div>

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
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kk->nomor_kartu_keluarga }}</td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kk->nama_kepala_keluarga }}</td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kk->rw }}/{{ $kk->rt }}</td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/kartu-keluarga/{{ $kk->id }}"
                                class="pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                            <a href="/kartu-keluarga/{{ $kk->id }}/edit"
                                class="pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/kartu-keluarga/{{ $kk->id }}"
                                data-confirm-delete="true"  class="font-medium text-red-800 dark:text-blue-500 hover:underline">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-layout>
