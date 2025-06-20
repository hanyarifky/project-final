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
            <a href="/kartu-keluarga"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </div>
        {{-- {{ $penduduk }} --}}


    </div>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 mb-10 mt-3">
            <h4 class=" text-center lg:text-xl text-xl font-bold dark:text-white">Data Keluarga</h4>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2  inline-flex items-center justify-center"
                type="button">Tambah Data<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

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
                            <a href="/penduduk/{{ $penduduk->id }}"
                                class="cursor-pointer pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                            <a data-modal-target="edit-penduduk-kk{{ $penduduk->id }}"
                                data-modal-toggle="edit-penduduk-kk{{ $penduduk->id }}"
                                class="cursor-pointer pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/kartu-keluarga/penduduk/{{ $penduduk->id }}"
                                class="cursor-pointer font-medium text-red-800 dark:text-blue-500 hover:underline"
                                data-confirm-delete="true">Hapus</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <!-- Tambah Data Penduduk Baru di Kartu Keluarga Terpilih -->
    <div id="penduduk-baru" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 border-8 border-blue-300">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Tambah Data Penduduk Baru ke Kartu Keluarga Terpilih
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="penduduk-baru">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="/kartu-keluarga/pendudukTambahBaru" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK (Nomor Induk
                                Kewarganegaraan)</label>
                            <input type="text" name="nik" id="price" value="{{ old('nik') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="cont: 3612345678901234" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="nama" id="price" value="{{ old('nama') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="cont: Muhammad Rifky Ramadhani" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select name="jenis_kelamin" id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            @error('jenis_kelamin') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                            @enderror">
                                <option selected>--Pilih--</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>
                                    Laki - laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                    {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="company"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                                (Ket: Kota)</label>
                            <input name="tempat_lahir" type="text" id="company"
                                value="{{ old('tempat_lahir') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                             @error('tempat_lahir') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                             @enderror"
                                placeholder="cont: Tangerang" required />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="datepicker-format"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="tanggal_lahir" id="datepicker-format" datepicker datepicker-autohide
                                    value="{{ old('tanggal_lahir') }}"
                                    datepicker-max-date="{{ now()->toDateString() }}" datepicker-format="yyyy-mm-dd"
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                        @error('tanggal_lahir') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                        "
                                    placeholder="cont: 2005-11-01">
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="website"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input name="alamat" type="text" id="website" value="{{ old('alamat') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('alamat') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    "
                                placeholder="" required />
                        </div>
                        <div>
                            <label for="agama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                            <select name="agama" id="agama" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('agama') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                                <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam</option>
                                <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen
                                </option>
                                <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="budha" {{ old('agama') == 'budha' ? 'selected' : '' }}>Budha</option>
                                <option value="katholik" {{ old('agama') == 'katholik' ? 'selected' : '' }}>Katholik
                                </option>
                                <option value="konghucu" {{ old('agama') == 'konghucu' ? 'selected' : '' }}>Konghucu
                                </option>
                                <option value="lainnya" {{ old('agama') == 'lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                            @error('agama')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Perkawinan</label>
                            <select name="status_perkawinan" id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('status_perkawinan') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    ">
                                <option selected>--Pilih--</option>
                                <option value="kawin" {{ old('status_perkawinan') == 'kawin' ? 'selected' : '' }}>
                                    Kawin</option>
                                <option value="belum kawin"
                                    {{ old('jenis_kelamin') == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="visitors"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                            <input name="pekerjaan" type="text" id="visitors" value="{{ old('pekerjaan') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('pekerjaan') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    "
                                placeholder="" required />
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <div>
                                <label for="status_di_keluarga"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    di Keluarga</label>
                                <select name="status_di_keluarga" id="status_di_keluarga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    @error('status_di_keluarga')
                                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                    @enderror">
                                    <option selected>--Pilih--</option>
                                    <option value="ayah"
                                        {{ old('status_di_keluarga') == 'ayah' ? 'selected' : '' }}>Ayah
                                    </option>
                                    <option value="ibu" {{ old('status_di_keluarga') == 'ibu' ? 'selected' : '' }}>
                                        Ibu</option>
                                    <option value="anak"
                                        {{ old('status_di_keluarga') == 'anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                                @error('status_di_keluarga')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium"></span>
                                        {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1 hidden">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Kartu
                                Keluarga</label>
                            <input type="text" name="kartu_keluarga_id" id="price"
                                value="{{ $kartuKeluarga->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ $kartuKeluarga->nomor_kartu_keluarga }}" readonly>
                        </div>


                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Data
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Tambah Data Penduduk yang sudah ada di Kartu Keluarga Terpilih -->
    <div id="penduduk-sudah-ada" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 border-8 border-blue-300">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Tambah Data Penduduk yang sudah ada ke Kartu Keluarga terpilih
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="penduduk-sudah-ada">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="/kartu-keluarga/pendudukTambah" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="nik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK (Nomor Induk
                                Kewarganegaraan) + Nama Lengkap </label>
                            <select name="id" id="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                @error('id')
                                    bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                @enderror">
                                <option value="" selected>
                                    --Pilih--</option>
                                @foreach ($penduduks as $penduduk)
                                    <option value="{{ $penduduk->id }}"
                                        {{ old('id') == $penduduk->id ? 'selected' : '' }}>
                                        {{ $penduduk->nik }} - {{ $penduduk->nama }}</option>
                                @endforeach
                            </select>
                            @error('id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                                    {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <div>
                                <label for="status_di_keluarga"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status di
                                    Keluarga</label>
                                <select name="status_di_keluarga" id="status_di_keluarga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    @error('status_di_keluarga')
                                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                    @enderror">
                                    <option selected>--Pilih--</option>
                                    <option value="ayah"
                                        {{ old('status_di_keluarga') == 'ayah' ? 'selected' : '' }}>Ayah
                                    </option>
                                    <option value="ibu" {{ old('status_di_keluarga') == 'ibu' ? 'selected' : '' }}>
                                        Ibu</option>
                                    <option value="anak"
                                        {{ old('status_di_keluarga') == 'anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                                @error('status_di_keluarga')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium"></span>
                                        {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1 hidden">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Kartu
                                Keluarga</label>
                            <input type="text" name="kartu_keluarga_id" id="price"
                                value="{{ $kartuKeluarga->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="{{ $kartuKeluarga->nomor_kartu_keluarga }}" readonly>
                        </div>


                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Data
                    </button>
                </form>

            </div>
        </div>
    </div>
    <!-- Edit Data Penduduk di Kartu Keluarga Terpilih -->
    @foreach ($penduduk_kk as $penduduk)
        <div id="edit-penduduk-kk{{ $penduduk->id }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-4xl max-h-full ">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 border-8 border-blue-300">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Edit Data Penduduk yang sudah ada di Kartu Keluarga terpilih
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="edit-penduduk-kk{{ $penduduk->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="/kartu-keluarga/updatePendudukKk/{{ $penduduk->id }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="nik"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK (Nomor
                                    Induk
                                    Kewarganegaraan) + Nama Lengkap </label>
                                <select name="id" id="nik"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                @error('id')
                                    bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                @enderror">
                                    <option value="{{ $penduduk->id }}" selected>
                                        {{ $penduduk->nama }}
                                    </option>
                                </select>
                                @error('id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium"></span>
                                        {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div>
                                    <label for="status_di_keluarga"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status di
                                        Keluarga</label>
                                    <select name="status_di_keluarga" id="status_di_keluarga"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                    @error('status_di_keluarga')
                                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                    @enderror">
                                        <option selected>--Pilih--</option>
                                        <option value="ayah"
                                            {{ old('status_di_keluarga', $penduduk->status_di_keluarga) == 'ayah' ? 'selected' : '' }}>
                                            Ayah
                                        </option>
                                        <option value="ibu"
                                            {{ old('status_di_keluarga', $penduduk->status_di_keluarga) == 'ibu' ? 'selected' : '' }}>
                                            Ibu</option>
                                        <option value="anak"
                                            {{ old('status_di_keluarga', $penduduk->status_di_keluarga) == 'anak' ? 'selected' : '' }}>
                                            Anak</option>
                                    </select>
                                    @error('status_di_keluarga')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                class="font-medium"></span>
                                            {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1 hidden">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Kartu
                                    Keluarga</label>
                                <input type="text" name="kartu_keluarga_id" id="price"
                                    value="{{ $kartuKeluarga->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="{{ $kartuKeluarga->nomor_kartu_keluarga }}" readonly>
                            </div>


                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Edit new product
                        </button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
</x-layout>
