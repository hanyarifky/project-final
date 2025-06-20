<x-layout>
    <div class="relative p-5 overflow-x-auto dark:bg-gray-800 shadow-md  sm:rounded-lg">

        <div class="flex items-center gap-2  mb-10">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                    clip-rule="evenodd" />
            </svg>

            <h4 class=" text-xl font-bold dark:text-white">Detail Data Perpindahan</h4>

        </div>

        <div class="container grid gap-6  md:grid-cols-2">
            
            <div class="border border-b-slate-400 border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Nama
                    Lengkap</p>
                <p class="dark:text-white">{{ $perpindahan->penduduk->nama }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">NIK</p>
                <p class="dark:text-white">{{ $perpindahan->penduduk->nik }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Jenis Kelamin</p>
                <p class="dark:text-white">{{ ucfirst($perpindahan->penduduk->jenis_kelamin) }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Tempat Lahir</p>
                <p class="dark:text-white">{{ $perpindahan->penduduk->tempat_lahir }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Tanggal Lahir</p>
                <p class="dark:text-white">{{ \Carbon\Carbon::parse($perpindahan->penduduk->tanggal_lahir)->locale('id')->translatedFormat('l, d-m-Y') }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Tanggal Pindah</p>
                <p class="dark:text-white">{{ \Carbon\Carbon::parse($perpindahan->tanggal_pindah)->locale('id')->translatedFormat('l, d-m-Y') }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Alamat Asal</p>
                <p class="dark:text-white">{{ $perpindahan->alamat_asal }}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Alamat Tujuan</p>
                <p class="dark:text-white">{{ $perpindahan->alamat_tujuan}}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Alasan Pindah</p>
                <p class="dark:text-white">{{ $perpindahan->alasan_pindah}}</p>
            </div>
            <div class="border border-b-3 p-2">
                <p class="text-sm underline font-medium text-gray-900 dark:text-white">Status Perpindahan</p>
                <p class="dark:text-white">{{ Str::ucfirst($perpindahan->status_perpindahan ) }}</p>
            </div>
            


        </div>

        <div class="container py-8">
            <a href="javascript:void(0);" onclick="window.history.back();" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </div>
        {{-- {{ $penduduk }} --}}
    </div>
</x-layout>
