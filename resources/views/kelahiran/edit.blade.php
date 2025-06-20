<x-layout>
    <form method="POST" action="/kelahiran/{{ $kelahiran->id }}">
        @csrf
        @method('PUT') <!-- Menambahkan method PUT untuk update data -->

        {{-- <input type="hidden" name="id" value="{{ $kelahiran->id }}"> --}}
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- Nama Lengkap -->
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Lengkap</label>
                <input name="nama" type="text" id="nama" value="{{ old('nama', $kelahiran->penduduk->nama) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nama') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: Muhammad Rifky Ramadhani" required />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIK -->
            <div>
                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK (Nomor
                    Induk Kependudukan) (Optional)</label>
                <input name="nik" type="text" id="nik" value="{{ old('nik', $kelahiran->penduduk->nik) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nik') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: 3277010101980012" />
                @error('nik')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('jenis_kelamin') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option value="laki-laki"
                        {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki -
                        laki</option>
                    <option value="perempuan"
                        {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
                @error('jenis_kelamin')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tempat Lahir -->
            <div>
                <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                    Lahir (Ket: Kota)</label>
                <input name="tempat_lahir" type="text" id="tempat_lahir"
                    value="{{ old('tempat_lahir', $kelahiran->penduduk->tempat_lahir) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('tempat_lahir') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: Tangerang" required />
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>
                <input name="tanggal_lahir" type="date" id="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $kelahiran->penduduk->tanggal_lahir) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('tanggal_lahir') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="cont: 2005-11-01" required />
            </div>

            <!-- Anak Ke-x -->
            <div>
                <label for="anak_ke" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anak
                    Ke-x</label>
                <input name="anak_ke" type="number" id="anak_ke" value="{{ old('anak_ke', $kelahiran->anak_ke) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('anak_ke') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                    placeholder="" required />
            </div>

            <!-- Jenis Kelahiran -->
            <div>
                <label for="jenis_kelahiran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelahiran</label>
                <select name="jenis_kelahiran" id="jenis_kelahiran"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                     @error('jenis_kelahiran') 
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option value="tunggal"
                        {{ old('jenis_kelahiran', $kelahiran->jenis_kelahiran) == 'tunggal' ? 'selected' : '' }}>
                        Tunggal</option>
                    <option value="kembar 2"
                        {{ old('jenis_kelahiran', $kelahiran->jenis_kelahiran) == 'kembar 2' ? 'selected' : '' }}>
                        Kembar 2</option>
                    <option value="kembar 3"
                        {{ old('jenis_kelahiran', $kelahiran->jenis_kelahiran) == 'kembar 3' ? 'selected' : '' }}>
                        Kembar 3</option>
                    <option value="lainnya"
                        {{ old('jenis_kelahiran', $kelahiran->jenis_kelahiran) == 'lainnya' ? 'selected' : '' }}>
                        Lainnya</option>
                </select>
                @error('jenis_kelahiran')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Agama -->
            <div>
                <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                <select name="agama" id="agama" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('agama') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                    <option value="islam" {{ old('agama', $kelahiran->penduduk->agama) == 'islam' ? 'selected' : '' }}>Islam
                    </option>
                    <option value="kristen" {{ old('agama', $kelahiran->penduduk->agama) == 'kristen' ? 'selected' : '' }}>Kristen
                    </option>
                    <option value="hindu" {{ old('agama', $kelahiran->penduduk->agama) == 'hindu' ? 'selected' : '' }}>Hindu
                    </option>
                    <option value="budha" {{ old('agama', $kelahiran->penduduk->agama) == 'budha' ? 'selected' : '' }}>Budha
                    </option>
                    <option value="katholik" {{ old('agama', $kelahiran->penduduk->agama) == 'katholik' ? 'selected' : '' }}>
                        Katholik</option>
                    <option value="konghucu" {{ old('agama', $kelahiran->penduduk->agama) == 'konghucu' ? 'selected' : '' }}>
                        Konghucu</option>
                    <option value="lainnya" {{ old('agama', $kelahiran->penduduk->agama) == 'lainnya' ? 'selected' : '' }}>Lainnya
                    </option>
                </select>
                @error('agama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <!-- Berat dan Panjang Bayi-->
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Berat Bayi -->
                <div>
                    <label for="berat_bayi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                        Bayi (dalam kg)</label>
                    <input name="berat_bayi" type="number" id="berat_bayi"
                        value="{{ old('berat_bayi', $kelahiran->berat_bayi) }}" step="0.01"
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
                        value="{{ old('panjang_bayi', $kelahiran->panjang_bayi) }}" step="0.01"
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

            <!-- Kartu Keluarga ID -->
            <div>
                <label for="kartu_keluarga_id"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Kartu Keluarga</label>
                <select name="kartu_keluarga_id" id="kartu_keluarga_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('kartu_keluarga_id')
                        bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror">
                    <option value=""
                        {{ old('kartu_keluarga_id', $kelahiran->kartu_keluarga_id) == null ? 'selected' : '' }}>Tidak
                        ada kartu keluarga</option>
                    @foreach ($data_kk as $kk)
                        <option value="{{ $kk->id }}"
                            {{ old('kartu_keluarga_id', $kelahiran->penduduk->kartu_keluarga_id) == $kk->id ? 'selected' : '' }}>
                            {{ $kk->nomor_kartu_keluarga }} - {{ $kk->nama_kepala_keluarga }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
        <a href="/kelahiran"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
    </form>
</x-layout>
