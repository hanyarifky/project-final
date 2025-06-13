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
                            Nomor Kartu Keluarga
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Jenis Kelamin
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Action
                        </span>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</x-layout>
