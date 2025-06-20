<x-layout>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Data Kematian</h4>

            <a href="/kematian/create"
                class="lg:px-5 lg:py-2.5 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-3 text-center me-2 mb-2">Tambah
                Data Kematiann
            </a>


        </div>

        <table id="data-table">
             <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Nama
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Umur
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal Kematian
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Sebab Kematian
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
                @foreach ($kematians as $kematian)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $kematian->penduduk->nama }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $kematian->umur }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ \Carbon\Carbon::parse($kematian->tanggal_kematian)->locale('id')->translatedFormat('l, d F Y') }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::ucfirst($kematian->sebab_kematian) }}
                        </td>
                        <td class=" flex font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/kematian/{{ $kematian->id }}"
                                class="cursor-pointer pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                            <a href="/kematian/{{ $kematian->id }}/edit"
                                class="cursor-pointer pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/kematian/{{ $kematian->id }}"
                                class="cursor-pointer pr-3 font-medium text-red-800 dark:text-blue-500 hover:underline"
                                data-confirm-delete="true">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
