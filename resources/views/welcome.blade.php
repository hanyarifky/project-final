<!-- resources/views/dashboard.blade.php -->
<x-layout>
    <div class="text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Penduduk</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalPenduduk }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Kartu Keluarga</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalKartuKeluarga }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Perpindahan</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalPerpindahan }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Kelahiran</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalKelahiran }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Total Kematian</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalKematian }}</p>
            </div>
        </div>

        <!-- Chart Section -->
        <!-- Section untuk menampilkan chart -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Jumlah Penduduk Laki-laki dan Perempuan</h3>
            <canvas id="pendudukChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Ambil elemen canvas
            var ctx = document.getElementById('pendudukChart').getContext('2d');

            // Data untuk chart
            var pendudukChart = new Chart(ctx, {
                type: 'bar', // Jenis chart: bar
                data: {
                    labels: ['Laki-laki', 'Perempuan'], // Label sumbu X
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: [{{ $jumlahLakiLaki }},
                        {{ $jumlahPerempuan }}], // Data jumlah penduduk laki-laki dan perempuan
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.6)', // Warna untuk laki-laki
                            'rgba(255, 99, 132, 0.6)' // Warna untuk perempuan
                        ],
                        borderColor: [
                            'rgba(59, 130, 246, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true // Memulai sumbu Y dari 0
                        }
                    },
                    plugins: {
                        datalabels: {
                            color: 'black', // Warna teks label
                            font: {
                                weight: 'bold', // Membuat font tebal
                                size: 14 // Ukuran font
                            },
                            formatter: function(value) {
                                return value; // Menampilkan angka jumlah penduduk di atas bar
                            },
                            anchor: 'end', // Menempatkan label di atas bar
                            align: 'top' // Menempatkan label di atas bar
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        }
    </script>


</x-layout>
