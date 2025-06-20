<x-layout>
    <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md  sm:rounded-lg">

        <div class="flex items-center gap-2  mb-4">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                    clip-rule="evenodd" />
            </svg>

            <h4 class=" text-xl font-bold dark:text-white">Data Kartu Keluarga</h4>
        </div>

        <div class="">
            <ul class="max-w-md space-y-3 text-gray-500 list-none list-inside dark:text-gray-400">
                <li class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Nomor Kartu Keluarga : {{ $kartuKeluarga->nomor_kartu_keluarga }}
                </li>
                <li class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Nama Kepala Keluarga : {{ $kartuKeluarga->nama_kepala_keluarga }}
                </li>
                <li class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span class="pr-29.5">RW/RT</span>: {{ $kartuKeluarga->rw }}/{{ $kartuKeluarga->rt }}
                </li>
            </ul>
        </div>

        <div class="container py-8">
            <a href="{{ route('laporan.kartu-keluarga') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </div>
        {{-- {{ $penduduk }} --}}


    </div>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 mb-10 mt-3">
            <h4 class=" text-center lg:text-xl text-xl font-bold dark:text-white">Data Keluarga</h4>

    

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <button data-modal-target="penduduk-baru" data-modal-toggle="penduduk-baru"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah
                            Data Penduduk Baru</button>
                    </li>
                    <li>
                        <button data-modal-target="penduduk-sudah-ada" data-modal-toggle="penduduk-sudah-ada"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tambah
                            Data Penduduk yang Sudah Ada</button>
                    </li>
                </ul>
            </div>
            {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Toggle modal
            </button> --}}


        </div>

        <table id="data-table" class="">

            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            NIK
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Nama
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Jenis Kelamin
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tempat Lahir
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Tanggal Lahir
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Status di keluarga
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Pekerjaan
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
                @foreach ($penduduk_kk as $penduduk)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $penduduk->nik }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $penduduk->nama }}
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ucfirst($penduduk->jenis_kelamin) }}</td>
                        </td>

                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $penduduk->tempat_lahir }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y') }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $penduduk->status_di_keluarga }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $penduduk->pekerjaan }}
                        </td>
                        <td class=" flex font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('laporan.detail-penduduk', $penduduk->id) }}"
                                class="cursor-pointer pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
