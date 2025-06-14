<x-layout>
    <form method="POST" action="/perpindahan/{{ $perpindahan->id }}">
        @csrf
        @method('PUT') <!-- Tambahkan method PUT untuk melakukan update -->
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- NIK Penduduk -->
            <div>
                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK Penduduk</label>
                <input type="text" name="nik" id="nik" value="{{ old('nik', $perpindahan->penduduk->nik) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('nik') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                @error('nik')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Penduduk -->
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penduduk</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $perpindahan->penduduk->nama) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('nama') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('jenis_kelamin') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                    <option value="laki-laki" {{ old('jenis_kelamin', $perpindahan->penduduk->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin', $perpindahan->penduduk->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Agama -->
            <div>
                <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                <select name="agama" id="agama" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('agama') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                    <option value="islam" {{ old('agama', $perpindahan->penduduk->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ old('agama', $perpindahan->penduduk->agama) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="hindu" {{ old('agama', $perpindahan->penduduk->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="budha" {{ old('agama', $perpindahan->penduduk->agama) == 'budha' ? 'selected' : '' }}>Budha</option>
                    <option value="katholik" {{ old('agama', $perpindahan->penduduk->agama) == 'katholik' ? 'selected' : '' }}>Katholik</option>
                    <option value="konghucu" {{ old('agama', $perpindahan->penduduk->agama) == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                    <option value="lainnya" {{ old('agama', $perpindahan->penduduk->agama) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('agama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tempat Lahir dan Tanggal Lahir-->
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Tempat Lahir -->
                <div>
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $perpindahan->penduduk->tempat_lahir) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('tempat_lahir') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                    @error('tempat_lahir')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label for="datepicker-format-lahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input name="tanggal_lahir" id="datepicker-format-lahir" datepicker datepicker-autohide
                            value="{{ old('tanggal_lahir', $perpindahan->penduduk->tanggal_lahir) }}" datepicker-max-date="{{ now()->toDateString() }}"
                            datepicker-format="yyyy-mm-dd" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            @error('tanggal_lahir') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror"
                            placeholder="cont: 2005-11-01">
                    </div>
                    @error('tanggal_lahir')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Status Perkawinan -->
            <div>
                <label for="status_perkawinan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                <select name="status_perkawinan" id="status_perkawinan" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('status_perkawinan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                    <option value="belum kawin" {{ old('status_perkawinan', $perpindahan->penduduk->status_perkawinan) == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    <option value="kawin" {{ old('status_perkawinan', $perpindahan->penduduk->status_perkawinan) == 'kawin' ? 'selected' : '' }}>Kawin</option>
                </select>
                @error('status_perkawinan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Pekerjaan -->
            <div>
                <label for="pekerjaan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $perpindahan->penduduk->pekerjaan) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('pekerjaan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                @error('pekerjaan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Pindah -->
            <div>
                <label for="datepicker-format-pindah"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pindah</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="tanggal_pindah" id="datepicker-format-pindah" datepicker datepicker-autohide
                        value="{{ old('tanggal_pindah', $perpindahan->tanggal_pindah) }}" datepicker-max-date="{{ now()->toDateString() }}"

                        datepicker-format="yyyy-mm-dd" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                        @error('tanggal_pindah') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror"
                        placeholder="cont: 2005-11-01">
                </div>
                @error('tanggal_pindah')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alamat Asal -->
            <div>
                <label for="alamat_asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Asal</label>
                <input type="text" name="alamat_asal" id="alamat_asal" value="{{ old('alamat_asal', $perpindahan->alamat_asal) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('alamat_asal') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                @error('alamat_asal')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alamat Tujuan -->
            <div>
                <label for="alamat_tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Tujuan</label>
                <input type="text" name="alamat_tujuan" id="alamat_tujuan" value="{{ old('alamat_tujuan', $perpindahan->alamat_tujuan) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('alamat_tujuan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                @error('alamat_tujuan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alasan Pindah -->
            <div>
                <label for="alasan_pindah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan Pindah</label>
                <input type="text" name="alasan_pindah" id="alasan_pindah" value="{{ old('alasan_pindah', $perpindahan->alasan_pindah) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('alasan_pindah') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror" />
                @error('alasan_pindah')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Perpindahan -->
            <div>
                <label for="status_perpindahan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perpindahan</label>
                <select name="status_perpindahan" id="status_perpindahan" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white @error('status_perpindahan') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror">
                    <option value="sementara" {{ old('status_perpindahan', $perpindahan->status_perpindahan) == 'sementara' ? 'selected' : '' }}>Sementara</option>
                    <option value="permanen" {{ old('status_perpindahan', $perpindahan->status_perpindahan) == 'permanen' ? 'selected' : '' }}>Permanen</option>
                </select>
                @error('status_perpindahan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Edit
        </button>
        <a href="/penduduk"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</a>
    </form>
</x-layout>
