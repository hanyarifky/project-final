<x-layout>
    <form action="/kematian/{{ $kematian->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            {{-- Penduduk (Read-Only Display) --}}
            <div>
                <label for="penduduk_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK - Nama</label>
                <input type="text" readonly
                    value="{{ $kematian->penduduk->nik }} - {{ $kematian->penduduk->nama }}"
                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:text-white"
                >
                <input type="hidden" name="penduduk_id" value="{{ $kematian->penduduk_id }}">
            </div>

            {{-- Tanggal Kematian --}}
            <div>
                <label for="datepicker-format"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Kematian</label>

                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="tanggal_kematian" id="datepicker-format" datepicker datepicker-autohide
                        value="{{ old('tanggal_kematian', $kematian->tanggal_kematian) }}" datepicker-max-date="{{ now()->toDateString() }}"
                        datepicker-format="yyyy-mm-dd" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                        @error('tanggal_kematian') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror
                        "
                        placeholder="cont: 2005-11-01" required>
                </div>

            </div>

            {{-- Waktu Kematian --}}
            <div class="">
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                    Kematian</label>
                <div class="relative">
                    <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="time" id="time" name="waktu_kematian" value="{{ old('waktu_kematian', \Carbon\Carbon::parse($kematian->waktu_kematian)->format('H:i')) }}"
                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('waktu_kematian') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        required />
                </div>
                @error('waktu_kematian')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                        {{ $message }} </p>
                @enderror
            </div>

            {{-- Sebab Kematian --}}
            <div>
                <label for="sebab_kematian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sebab Kematian</label>
                <select name="sebab_kematian" id="sebab_kematian" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 block w-full dark:bg-gray-700 dark:text-white">
                    <option disabled>--Pilih--</option>
                    <option value="sakit biasa/tua" {{ old('sebab_kematian', $kematian->sebab_kematian) == 'sakit biasa/tua' ? 'selected' : '' }}>Sakit biasa/Tua</option>
                    <option value="wabah penyakit" {{ old('sebab_kematian', $kematian->sebab_kematian) == 'wabah penyakit' ? 'selected' : '' }}>Wabah Penyakit</option>
                    <option value="kecelakaan" {{ old('sebab_kematian', $kematian->sebab_kematian) == 'kecelakaan' ? 'selected' : '' }}>Kecelakaan</option>
                    <option value="kriminalitas" {{ old('sebab_kematian', $kematian->sebab_kematian) == 'kriminalitas' ? 'selected' : '' }}>Kriminalitas</option>
                    <option value="bunuh diri" {{ old('sebab_kematian', $kematian->sebab_kematian) == 'bunuh diri' ? 'selected' : '' }}>Bunuh diri</option>
                    <option value="lainnya" {{ old('sebab_kematian', $kematian->sebab_kematian) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>

            {{-- Tempat Kematian --}}
            <div>
                <label for="tempat_kematian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Kematian</label>
                <input name="tempat_kematian" type="text" id="tempat_kematian"
                    value="{{ old('tempat_kematian', $kematian->tempat_kematian) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 block w-full dark:bg-gray-700 dark:text-white" required />
            </div>
        </div>

        <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Simpan Perubahan</button>
        <a href="/kematian"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
    </form>
</x-layout>
