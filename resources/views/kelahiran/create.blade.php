<x-layout>

    <form method="POST" action="/kelahiran">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
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
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK (Nomor
                    Induk Kependudukan) (Optional)</label>
                <input name="nik" type="text" id="first_name" value="{{ old('nik') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nik') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: 3277010101980012" />
                @error('nik')
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
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki - laki
                    </option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
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

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="tanggal_lahir" id="datepicker-format" datepicker datepicker-autohide
                        value="{{ old('tanggal_lahir') }}" datepicker-max-date="{{ now()->toDateString() }}"
                        datepicker-format="yyyy-mm-dd" type="text"
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
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anak Ke-x</label>
                <input name="anak_ke" type="number" id="website" value="{{ old('anak_ke') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('anak_ke') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    "
                    placeholder="" required />
            </div>
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelahiran</label>
                <select name="jenis_kelahiran" id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                     @error('jenis_kelahiran') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option value="tunggal" {{ old('jenis_kelahiran') == 'tunggal' ? 'selected' : '' }}>Tunggal
                    </option>
                    <option value="kembar 2" {{ old('jenis_kelahiran') == 'kembar 2' ? 'selected' : '' }}>Kembar 2
                    </option>
                    <option value="kembar 3" {{ old('jenis_kelahiran') == 'kembar 3' ? 'selected' : '' }}>Kembar 3
                    </option>
                    <option value="lainnya" {{ old('jenis_kelahiran') == 'lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
                @error('jenis_kelahiran')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }} </p>
                @enderror
            </div>
            <div>
                <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                <select name="agama" id="agama" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('agama') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                    <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="budha" {{ old('agama') == 'budha' ? 'selected' : '' }}>Budha</option>
                    <option value="katholik" {{ old('agama') == 'katholik' ? 'selected' : '' }}>Katholik</option>
                    <option value="konghucu" {{ old('agama') == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                    <option value="lainnya" {{ old('agama') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('agama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="hidden ">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Perkawinan</label>
                <select name="status_perkawinan" id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('status_perkawinan') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    ">
                    <option>--Pilih--</option>
                    <option selected value="belum kawin" {{ old('jenis_kelamin') == 'belum kawin' ? 'selected' : '' }}>Belum
                        Kawin</option>
                </select>
            </div>
            <div class="hidden">
                <label for="visitors"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                <input name="pekerjaan" type="text" id="visitors" value="belum bekerja"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('pekerjaan') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                    "
                    placeholder="" required />
            </div>
              <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Berat Bayi -->
                <div>
                    <label for="berat_bayi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                        Bayi (dalam kg)</label>
                    <input name="berat_bayi" type="number" id="berat_bayi"
                        value="{{ old('berat_bayi', ) }}" step="0.01"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('berat_bayi') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="contoh: 3.5" required />
                    @error('berat_bayi')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Panjang Bayi -->
                <div>
                    <label for="panjang_bayi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panjang Bayi (dalam
                        cm)</label>
                    <input name="panjang_bayi" type="number" id="panjang_bayi"
                        value="{{ old('panjang_bayi') }}" step="0.01"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('panjang_bayi') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="contoh: 50" required />
                    @error('panjang_bayi')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="kartu_keluarga_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Kartu Keluarga</label>
                <select name="kartu_keluarga_id" id="kartu_keluarga_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('kartu_keluarga_id')
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option value="" {{ old('kartu_keluarga_id') == null ? 'selected' : '' }}>Tidak ada kartu
                        keluarga</option>
                    @foreach ($data_kk as $kk)
                        <option value="{{ $kk->id }}"
                            {{ old('kartu_keluarga_id') == $kk->id ? 'selected' : '' }}>
                            {{ $kk->nomor_kartu_keluarga }} - {{ $kk->nama_kepala_keluarga }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah</button>
        <a href="/kelahiran"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
    </form>



</x-layout>
