<x-layout>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Data Keluarga</h4>

            <div class="">
                <a href="/laporan/cetak-kartu-keluarga"
                    class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 rounded-lg me-2 mb-2 ">
                    <svg class="w-[18px] h-[18px] text-white mr-1 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                            clip-rule="evenodd" />
                    </svg>
                    Cetak
                </a>
            </div>


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
                        <a href="{{ route('laporan.detail-kartu-keluarga', $kk->id) }}"
                                class="pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-layout>
