<x-layout>

    <form method="POST" action="/penduduk">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK (Nomor
                    Induk Kependudukan)</label>
                <input name="nik" type="text" id="first_name" value="{{ old('nik') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nik') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: 3277010101980012" required />
                @error('nik')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Lengkap</label>
                <input name="nama" type="text" id="last_name" value="{{ old('nama') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nama') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: Muhammad Rifky Ramadhani" required />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin</label>
                <select name="jenis_kelamin" id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                     @error('jenis_kelamin') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option selected>--Pilih--</option>
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki - laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }} >Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                    (Ket: Kota)</label>
                <input name="tempat_lahir" type="text" id="company" value="{{ old('tempat_lahir') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('tempat_lahir') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    "
                    placeholder="cont: Tangerang" required />
            </div>
            <div>
                <label for="datepicker-format"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>

                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="tanggal_lahir" id="datepicker-format" datepicker datepicker-autohide value="{{ old('tanggal_lahir') }}"
                        datepicker-max-date="{{ now()->toDateString() }}" datepicker-format="yyyy-mm-dd" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                        @error('tanggal_lahir') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                        "
                        placeholder="cont: 2005-11-01">
                </div>


            </div>
            <div>
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
                <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama
                </label>
                <input name="agama" type="text" id="visitors" value="{{ old('agama') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('agama') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    "
                    placeholder="" required />
            </div>
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Perkawinan</label>
                <select name="status_perkawinan" id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('status_perkawinan') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    ">
                    <option selected>--Pilih--</option>
                    <option value="kawin" {{ old('status_perkawinan') == 'kawin' ? 'selected' : '' }}>Kawin</option>
                    <option value="belum kawin" {{ old('jenis_kelamin') == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                </select>
            </div>
            <div>
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
            <div>
                <label for="kartu_keluarga_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                <select name="kartu_keluarga_id" id="kartu_keluarga_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('kartu_keluarga_id')
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option value=""  {{ old('kartu_keluarga_id') == null ? 'selected' : '' }}>Tidak ada kartu keluarga</option>
                    @foreach ($data_kk as $kk)
                    <option value="{{ $kk->id }}" {{ old('kartu_keluarga_id') == $kk->id ? 'selected' : '' }}>{{ $kk->nomor_kartu_keluarga }} - {{ $kk->nama_kepala_keluarga }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah</button>
        <a href="/penduduk"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
    </form>



</x-layout>
