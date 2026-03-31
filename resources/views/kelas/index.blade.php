{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Daftar Kelas</title>
    <style>
        /* CSS SEDERHANA UNTUK CRUD */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: #f8f9fa;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Header Sederhana */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .header h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        /* Tombol Tambah */
        .btn-tambah {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .btn-tambah:hover {
            background: #45a049;
        }
        
        /* Tabel Sederhana */
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th {
            background: #f2f2f2;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
            color: #333;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background: #f9f9f9;
        }
        
        /* Tombol Aksi */
        .btn-aksi {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            margin: 0 3px;
            border: none;
            cursor: pointer;
        }
        
        .btn-lihat {
            background: #2196F3;
        }
        
        .btn-edit {
            background: #FF9800;
        }
        
        .btn-hapus {
            background: #f44336;
        }
        
        .btn-lihat:hover {
            background: #1976D2;
        }
        
        .btn-edit:hover {
            background: #F57C00;
        }
        
        .btn-hapus:hover {
            background: #d32f2f;
        }
        
        /* Gambar */
        .img-kelas {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .no-image {
            width: 80px;
            height: 80px;
            background: #f5f5f5;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
        }
        
        /* Modal Sederhana */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }
        
        /* Form Hapus */
        form {
            display: inline;
        }
        
        /* Pesan Notifikasi */
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 12px 20px;
            border-radius: 4px;
            color: white;
            z-index: 1001;
        }
        
        .success {
            background: #4CAF50;
        }
        
        .error {
            background: #f44336;
        }
        
        /* Kosong */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Data Kelas</h1>
            <p>Daftar Kelas yang Ada di Sekolah</p>
        </div>

        <!-- Tombol Tambah -->
        <div>
            <a href="{{ route('kelas.create') }}" class="btn-tambah">
                <i class="fas fa-plus"></i> Tambah Kelas Baru
            </a>
        </div>

        @if ($kelas->isEmpty())
            <!-- Kosong -->
            <div class="empty-state">
                <i class="fas fa-school" style="font-size: 48px; margin-bottom: 20px; color: #ccc;"></i>
                <h3>Belum ada data kelas</h3>
                <p>Mulai dengan menambahkan kelas pertama Anda</p>
            </div>
        @else
            <!-- Tabel -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Ketua Kelas</th>
                            <th>Kursi</th>
                            <th>Meja</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $gr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gr['namaKelas'] }}</td>
                                <td>{{ $gr['waliKelas'] }}</td>
                                <td>{{ $gr['ketuaKelas'] ?: '-' }}</td>
                                <td>{{ $gr['kursi'] }}</td>
                                <td>{{ $gr['meja'] }}</td>
                                <td>
                                    @if ($gr->gambar_kelas)
                                        <img src="{{ url('upload_gambar/' . $gr->gambar_kelas) }}" 
                                             class="img-kelas"
                                             onclick="openImageModal('{{ url('upload_gambar/' . $gr->gambar_kelas) }}', '{{ $gr->namaKelas }}')">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol Lihat -->
                                    <button type="button"
                                        onclick="showDetailModal('{{ $gr['id'] }}', '{{ $gr['namaKelas'] }}', '{{ $gr['waliKelas'] }}', '{{ $gr['ketuaKelas'] }}', '{{ $gr['kursi'] }}', '{{ $gr['meja'] }}', '{{ $gr->gambar_kelas }}')"
                                        class="btn-aksi btn-lihat"
                                        title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <!-- Tombol Edit -->
                                    <a href="/kelas/{{ $gr['id'] }}/edit"
                                        class="btn-aksi btn-edit"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="/kelas/{{ $gr['id'] }}" method="post"
                                        onsubmit="return confirm('Hapus kelas {{ $gr['namaKelas'] }}?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn-aksi btn-hapus"
                                            title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Modal Detail -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Kelas</h3>
                <button onclick="closeDetailModal()" class="modal-close">&times;</button>
            </div>
            <div>
                <table style="width: 100%; margin-bottom: 20px;">
                    <tr>
                        <td style="padding: 8px 0;"><strong>Nama Kelas:</strong></td>
                        <td id="detailNama"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Wali Kelas:</strong></td>
                        <td id="detailWali"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Ketua Kelas:</strong></td>
                        <td id="detailKetua"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Jumlah Kursi:</strong></td>
                        <td id="detailKursi"></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0;"><strong>Jumlah Meja:</strong></td>
                        <td id="detailMeja"></td>
                    </tr>
                </table>
                
                <div style="margin-top: 20px;">
                    <strong>Gambar Kelas:</strong>
                    <div id="detailGambarContainer" style="margin-top: 10px;">
                        <img id="detailGambar" class="img-kelas" style="max-width: 300px;">
                        <div id="noImageMessage" style="display: none;">
                            <div class="no-image" style="width: 200px; height: 150px;">
                                <i class="fas fa-image"></i>
                                <p style="margin-top: 10px;">Tidak ada gambar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: right; margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;">
                <button onclick="closeDetailModal()" style="padding: 8px 16px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 4px; cursor: pointer;">
                    Tutup
                </button>
                <a id="editBtn" href="#" style="padding: 8px 16px; background: #FF9800; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px;">
                    Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Modal Gambar -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle"></h3>
                <button onclick="closeImageModal()" class="modal-close">&times;</button>
            </div>
            <div style="text-align: center;">
                <img id="modalImage" style="max-width: 100%; max-height: 400px;">
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <button onclick="closeImageModal()" style="padding: 8px 16px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="notification success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                document.querySelector('.notification').style.display = 'none';
            }, 5000);
        </script>
    @endif

    @if (session('error'))
        <div class="notification error">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <!-- JavaScript (Disederhanakan) -->
    <script>
        // Modal Detail
        function showDetailModal(id, nama, wali, ketua, kursi, meja, gambar) {
            document.getElementById('detailNama').textContent = nama;
            document.getElementById('detailWali').textContent = wali;
            document.getElementById('detailKetua').textContent = ketua || '-';
            document.getElementById('detailKursi').textContent = kursi;
            document.getElementById('detailMeja').textContent = meja;
            
            document.getElementById('editBtn').href = '/kelas/' + id + '/edit';
            
            const gambarElement = document.getElementById('detailGambar');
            const noImageMessage = document.getElementById('noImageMessage');
            
            if (gambar) {
                gambarElement.src = '{{ url("upload_gambar") }}/' + gambar;
                gambarElement.style.display = 'block';
                noImageMessage.style.display = 'none';
            } else {
                gambarElement.style.display = 'none';
                noImageMessage.style.display = 'block';
            }
            
            document.getElementById('detailModal').style.display = 'flex';
        }
        
        function closeDetailModal() {
            document.getElementById('detailModal').style.display = 'none';
        }
        
        // Modal Gambar
        function openImageModal(imageSrc, title) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').textContent = title || 'Gambar Kelas';
            document.getElementById('imageModal').style.display = 'flex';
        }
        
        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
        }
        
        // Tutup modal dengan klik di luar
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeDetailModal();
                closeImageModal();
            }
        }
        
        // Tutup modal dengan ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDetailModal();
                closeImageModal();
            }
        });
        
        // Auto hide notification
        setTimeout(() => {
            const notification = document.querySelector('.notification');
            if (notification) {
                notification.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Daftar Kelas</title>
</head>

<body class="bg-gradient-to-br from-amber-50 to-yellow-50 min-h-screen">
    <div class="container mx-auto p-4 md:p-6">
        <!-- Header -->
        <div class="mb-8 text-center">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-amber-500 to-yellow-500 rounded-3xl mb-4 shadow-lg">
                <i class="fas fa-school text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Data Kelas Yang Ada Di Sekolah</h1>
        </div>

        <!-- Stats Card -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-amber-500">
                <div class="flex items-center">
                    <div class="p-3 bg-amber-100 rounded-xl mr-4">
                        <i class="fas fa-school text-amber-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Kelas</p>
                        <p class="text-2xl font-bold text-gray-800" id="totalKelas">{{ $kelas->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-yellow-500">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-xl mr-4">
                        <i class="fas fa-user-tie text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Wali Kelas</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $kelas->unique('waliKelas')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-amber-400">
                <div class="flex items-center">
                    <div class="p-3 bg-amber-50 rounded-xl mr-4">
                        <i class="fas fa-chair text-amber-500 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Kursi</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $kelas->sum('kursi') }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-amber-300">
                <div class="flex items-center">
                    <div class="p-3 bg-amber-50 rounded-xl mr-4">
                        <i class="fas fa-table text-amber-400 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Meja</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $kelas->sum('meja') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-amber-100">
            <!-- Table Header dengan Search -->
            <div class="bg-gradient-to-r from-amber-500 to-yellow-500 p-6">
                <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i class="fas fa-list mr-3"></i>
                            Daftar Kelas
                        </h2>
                        <p class="text-amber-100 mt-1">
                            Total <span id="filteredCount">{{ $kelas->count() }}</span> kelas yang ada
                        </p>
                    </div>
                    <div class="flex gap-3 mt-4 md:mt-0">
                        <!-- Bulk Delete Button -->
                        <button id="bulkDeleteBtn"
                            class="hidden bg-red-500 text-white font-semibold py-3 px-6 rounded-xl hover:bg-red-600 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Hapus Terpilih (<span id="selectedCount">0</span>)
                        </button>

                        <a href="{{ route('kelas.create') }}"
                            class="bg-white text-amber-600 font-semibold py-3 px-6 rounded-xl hover:bg-amber-50 transition duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Kelas Baru
                        </a>
                    </div>
                </div>

                <!-- Live Search Input -->
                <div class="relative">
                    <div class="flex items-center bg-white/20 backdrop-blur-sm rounded-xl p-2">
                        <i class="fas fa-search text-amber-100 ml-3"></i>
                        <input type="text" id="liveSearch" placeholder="Cari kelas, wali kelas, atau ketua kelas..."
                            class="w-full bg-transparent border-none text-white placeholder-amber-100 px-4 py-3 focus:outline-none focus:ring-0">
                        <button id="clearSearch" class="text-amber-100 hover:text-white px-3 hidden">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="text-amber-100 text-sm mt-2 flex items-center">
                        <i class="fas fa-info-circle mr-2"></i>
                        Ketik untuk mencari secara real-time
                    </div>
                </div>
            </div>

            <!-- Bulk Action Controls -->
            <div id="bulkControls" class="hidden p-4 bg-amber-50 border-b border-amber-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="selectAll"
                            class="h-5 w-5 text-amber-600 rounded border-amber-300 focus:ring-amber-500">
                        <label for="selectAll" class="ml-2 text-gray-700 font-medium">
                            Pilih Semua (<span id="totalCount">{{ $kelas->count() }}</span>)
                        </label>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span id="selectedItemsCount" class="text-amber-700 font-semibold">
                            0 item terpilih
                        </span>
                        <button id="deleteSelected"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 flex items-center">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Hapus Terpilih
                        </button>
                        <button id="clearSelection"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300 flex items-center">
                            <i class="fas fa-times mr-2"></i>
                            Batal Pilih
                        </button>
                    </div>
                </div>
            </div>

            @if ($kelas->isEmpty())
                <div class="text-center py-16">
                    <div class="mb-6">
                        <i class="fas fa-school text-gray-300 text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada data kelas</h3>
                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan kelas pertama Anda</p>
                    <a href="{{ route('kelas.create') }}"
                        class="inline-flex items-center bg-gradient-to-r from-amber-500 to-yellow-500 text-white font-semibold py-3 px-6 rounded-xl hover:from-amber-600 hover:to-yellow-600 transition duration-300">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Tambah Kelas Pertama
                    </a>
                </div>
            @else
                <!-- Search Results Info -->
                <div id="searchInfo" class="hidden p-4 bg-amber-50 border-b border-amber-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-search text-amber-600 mr-2"></i>
                            <span id="searchResultsText" class="text-amber-700 font-medium"></span>
                        </div>
                        <button id="clearSearchResults"
                            class="text-amber-600 hover:text-amber-800 text-sm font-medium">
                            <i class="fas fa-times mr-1"></i> Reset Pencarian
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <form id="bulkDeleteForm" action="{{ route('kelas.bulk-delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="selected_ids" id="selectedIds">

                        <table class="w-full">
                            <thead>
                                <tr class="bg-amber-50">
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700 w-12">
                                        <input type="checkbox" id="mainCheckbox"
                                            class="h-4 w-4 text-amber-600 rounded border-amber-300 focus:ring-amber-500">
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-hashtag mr-2"></i>
                                            ID
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-school mr-2"></i>
                                            Nama Kelas
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-user-tie mr-2"></i>
                                            Wali Kelas
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-crown mr-2"></i>
                                            Ketua Kelas
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-chair mr-2"></i>
                                            Kursi
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-table mr-2"></i>
                                            Meja
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-image mr-2"></i>
                                            Gambar
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">
                                        <div class="flex items-center">
                                            <i class="fas fa-cogs mr-2"></i>
                                            Aksi
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody" class="divide-y divide-amber-100">
                                @foreach ($kelas as $gr)
                                    <tr class="hover:bg-amber-50 transition duration-300 data-row"
                                        data-id="{{ $gr['id'] }}" data-nama="{{ strtolower($gr['namaKelas']) }}"
                                        data-wali="{{ strtolower($gr['waliKelas']) }}"
                                        data-ketua="{{ strtolower($gr['ketuaKelas']) }}"
                                        data-kursi="{{ $gr['kursi'] }}" data-meja="{{ $gr['meja'] }}">
                                        <td class="py-4 px-6">
                                            <input type="checkbox" name="selected[]" value="{{ $gr['id'] }}"
                                                class="item-checkbox h-4 w-4 text-amber-600 rounded border-amber-300 focus:ring-amber-500">
                                        </td>
                                        <td class="py-4 px-6">
                                            <span
                                                class="inline-flex items-center justify-center w-10 h-10 bg-amber-100 text-amber-800 font-bold rounded-lg">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="font-medium text-gray-900">{{ $gr['namaKelas'] }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center mr-3">
                                                    <i class="fas fa-user text-amber-600 text-sm"></i>
                                                </div>
                                                <span class="font-medium">{{ $gr['waliKelas'] }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <span
                                                class="bg-amber-100 text-amber-800 text-sm font-medium px-3 py-1 rounded-full">
                                                {{ $gr['ketuaKelas'] ?: '-' }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <i class="fas fa-chair text-amber-500 mr-2"></i>
                                                <span class="font-bold">{{ $gr['kursi'] }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <i class="fas fa-table text-yellow-500 mr-2"></i>
                                                <span class="font-bold">{{ $gr['meja'] }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            @if ($gr->gambar_kelas)
                                                <div class="group relative">
                                                    <img class="w-20 h-20 object-cover rounded-xl shadow-md border-2 border-amber-300 cursor-pointer group-hover:scale-105 transition duration-300"
                                                        src="{{ url('upload_gambar/' . $gr->gambar_kelas) }}"
                                                        alt="{{ $gr->namaKelas }}"
                                                        onclick="openImageModal('{{ url('upload_gambar/' . $gr->gambar_kelas) }}', '{{ $gr->namaKelas }}')">
                                                </div>
                                            @else
                                                <div
                                                    class="w-20 h-20 bg-gray-100 rounded-xl flex items-center justify-center">
                                                    <i class="fas fa-image text-gray-400 text-2xl"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2">
                                                <!-- Tombol View -->
                                                <button type="button"
                                                    onclick="showDetailModal('{{ $gr['id'] }}', '{{ $gr['namaKelas'] }}', '{{ $gr['waliKelas'] }}', '{{ $gr['ketuaKelas'] }}', '{{ $gr['kursi'] }}', '{{ $gr['meja'] }}', '{{ $gr->gambar_kelas }}')"
                                                    class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center hover:bg-emerald-200 transition duration-300 view-btn"
                                                    title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>

                                                <!-- Tombol Edit -->
                                                <a href="/kelas/{{ $gr['id'] }}/edit"
                                                    class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-200 transition duration-300"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Tombol Delete -->
                                                <form action="/kelas/{{ $gr['id'] }}" method="post"
                                                    class="inline"
                                                    onsubmit="return confirmDelete('{{ $gr['namaKelas'] }}')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="w-10 h-10 bg-red-100 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-200 transition duration-300"
                                                        title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="hidden text-center py-16">
                    <div class="mb-6">
                        <i class="fas fa-search text-gray-300 text-6xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ditemukan</h3>
                    <p class="text-gray-500 mb-6">Tidak ada kelas yang sesuai dengan pencarian Anda</p>
                    <button id="resetSearchBtn"
                        class="inline-flex items-center bg-gradient-to-r from-amber-500 to-yellow-500 text-white font-semibold py-3 px-6 rounded-xl hover:from-amber-600 hover:to-yellow-600 transition duration-300">
                        <i class="fas fa-times mr-2"></i>
                        Reset Pencarian
                    </button>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-gray-500 text-sm">
            <p><i class="fas fa-info-circle mr-1"></i> Sistem Manajemen Kelas v1.0 | {{ now()->format('d M Y') }}</p>
        </div>
    </div>

    <!-- ======================= MODAL-MODAL ======================= -->

    <!-- Image Preview Modal -->
    <div id="imageModal"
        class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center p-4">
        <div class="relative max-w-5xl max-h-full">
            <div class="bg-white rounded-lg overflow-hidden shadow-2xl">
                <div class="bg-gradient-to-r from-amber-500 to-yellow-500 p-4 text-white">
                    <h3 id="modalTitle" class="text-lg font-bold"></h3>
                </div>
                <div class="p-2">
                    <img id="modalImage" class="max-w-full max-h-[70vh] object-contain">
                </div>
                <div class="bg-gray-50 p-4 text-center">
                    <button onclick="closeImageModal()"
                        class="bg-amber-500 text-white px-6 py-2 rounded-lg hover:bg-amber-600 transition duration-300">
                        <i class="fas fa-times mr-2"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail View Modal -->
    <div id="detailModal"
        class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center p-4">
        <div class="relative max-w-2xl w-full max-h-full">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-amber-500 to-yellow-500 p-6 text-white">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold flex items-center">
                            <i class="fas fa-info-circle mr-3"></i>
                            Detail Kelas
                        </h3>
                        <button onclick="closeDetailModal()" class="text-white hover:text-amber-200 text-2xl">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kolom Kiri: Info Kelas -->
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-school text-amber-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nama Kelas</p>
                                    <h4 id="detailNama" class="text-lg font-bold text-gray-800"></h4>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-user-tie text-amber-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Wali Kelas</p>
                                    <h4 id="detailWali" class="text-lg font-bold text-gray-800"></h4>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-crown text-amber-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Ketua Kelas</p>
                                    <h4 id="detailKetua" class="text-lg font-bold text-gray-800"></h4>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Fasilitas -->
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-chair text-amber-500 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jumlah Kursi</p>
                                    <h4 id="detailKursi" class="text-2xl font-bold text-gray-800"></h4>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-table text-amber-500 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Jumlah Meja</p>
                                    <h4 id="detailMeja" class="text-2xl font-bold text-gray-800"></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gambar Kelas -->
                    <div class="mt-8">
                        <p class="text-sm font-medium text-gray-700 mb-3">Gambar Ruang Kelas:</p>
                        <div id="detailGambarContainer" class="relative">
                            <img id="detailGambar"
                                class="w-full h-64 object-cover rounded-xl shadow-lg border-4 border-amber-300">
                            <div id="noImageMessage"
                                class="hidden w-full h-64 bg-gray-100 rounded-xl flex flex-col items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl mb-3"></i>
                                <p class="text-gray-500">Tidak ada gambar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="bg-gray-50 p-6 border-t border-gray-200">
                    <div class="flex justify-end space-x-3">
                        <button onclick="closeDetailModal()"
                            class="px-6 py-3 border-2 border-amber-500 text-amber-600 font-semibold rounded-xl hover:bg-amber-50 transition duration-300">
                            <i class="fas fa-times mr-2"></i> Tutup
                        </button>
                        <a id="editBtn" href="#"
                            class="px-6 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-white font-semibold rounded-xl hover:from-amber-600 hover:to-yellow-600 transition duration-300">
                            <i class="fas fa-edit mr-2"></i> Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="fixed bottom-4 right-4 z-50 animate-fade-in-up">
            <div class="bg-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
        <script>
            setTimeout(() => {
                document.querySelector('.fixed.bottom-4').style.display = 'none';
            }, 5000);
        </script>
    @endif

    @if (session('error'))
        <div class="fixed bottom-4 right-4 z-50 animate-fade-in-up">
            <div class="bg-red-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif
    <script>
        // ======================= LIVE SEARCH FUNCTIONALITY =======================
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('liveSearch');
            const clearSearchBtn = document.getElementById('clearSearch');
            const clearSearchResultsBtn = document.getElementById('clearSearchResults');
            const resetSearchBtn = document.getElementById('resetSearchBtn');
            const tableBody = document.getElementById('tableBody');
            const searchInfo = document.getElementById('searchInfo');
            const searchResultsText = document.getElementById('searchResultsText');
            const filteredCount = document.getElementById('filteredCount');
            const noResults = document.getElementById('noResults');
            const rows = document.querySelectorAll('.data-row');

            // Fungsi untuk melakukan pencarian
            function performSearch(searchTerm) {
                const term = searchTerm.toLowerCase().trim();
                let visibleCount = 0;

                rows.forEach(row => {
                    const nama = row.getAttribute('data-nama');
                    const wali = row.getAttribute('data-wali');
                    const ketua = row.getAttribute('data-ketua');
                    const kursi = row.getAttribute('data-kursi');
                    const meja = row.getAttribute('data-meja');

                    // Cari di semua field
                    const match = nama.includes(term) ||
                        wali.includes(term) ||
                        ketua.includes(term) ||
                        kursi.includes(term) ||
                        meja.includes(term);

                    if (match || term === '') {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                // Update UI berdasarkan hasil pencarian
                updateSearchUI(visibleCount, term);
            }

            // Update UI setelah pencarian
            function updateSearchUI(visibleCount, term) {
                const totalRows = rows.length;

                // Update counter
                filteredCount.textContent = visibleCount;

                // Tampilkan/sembunyikan pesan "tidak ditemukan"
                if (term !== '' && visibleCount === 0) {
                    noResults.classList.remove('hidden');
                    tableBody.parentElement.parentElement.classList.add('hidden');
                } else {
                    noResults.classList.add('hidden');
                    tableBody.parentElement.parentElement.classList.remove('hidden');
                }

                // Tampilkan info pencarian
                if (term !== '') {
                    searchInfo.classList.remove('hidden');
                    searchResultsText.textContent =
                        `Menampilkan ${visibleCount} dari ${totalRows} hasil untuk "${term}"`;
                    clearSearchBtn.classList.remove('hidden');
                } else {
                    searchInfo.classList.add('hidden');
                    clearSearchBtn.classList.add('hidden');
                }
            }

            // Event listener untuk input search
            searchInput.addEventListener('input', function() {
                performSearch(this.value);
            });

            // Event listener untuk clear search
            clearSearchBtn.addEventListener('click', function() {
                searchInput.value = '';
                performSearch('');
                searchInput.focus();
            });

            // Event listener untuk clear search results
            if (clearSearchResultsBtn) {
                clearSearchResultsBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    performSearch('');
                    searchInput.focus();
                });
            }

            // Event listener untuk reset search button
            if (resetSearchBtn) {
                resetSearchBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    performSearch('');
                    searchInput.focus();
                });
            }

            // Debounce untuk search (optional, untuk performance)
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    performSearch(this.value);
                }, 300); // Delay 300ms
            });
        });

        // ======================= BULK DELETE FUNCTIONALITY =======================
        document.addEventListener('DOMContentLoaded', function() {
            const mainCheckbox = document.getElementById('mainCheckbox');
            const selectAllCheckbox = document.getElementById('selectAll');
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            const bulkControls = document.getElementById('bulkControls');
            const selectedItemsCount = document.getElementById('selectedItemsCount');
            const deleteSelectedBtn = document.getElementById('deleteSelected');
            const clearSelectionBtn = document.getElementById('clearSelection');
            const bulkDeleteForm = document.getElementById('bulkDeleteForm');
            const selectedIdsInput = document.getElementById('selectedIds');

            function updateSelectionUI() {
                const checkedBoxes = document.querySelectorAll('.item-checkbox:checked');
                const count = checkedBoxes.length;

                if (count > 0) {
                    bulkControls.classList.remove('hidden');
                    selectedItemsCount.textContent = `${count} item terpilih`;

                    mainCheckbox.checked = count === itemCheckboxes.length;
                    selectAllCheckbox.checked = count === itemCheckboxes.length;
                } else {
                    bulkControls.classList.add('hidden');
                }

                const selectedIds = Array.from(checkedBoxes).map(cb => cb.value);
                selectedIdsInput.value = JSON.stringify(selectedIds);
            }

            mainCheckbox.addEventListener('change', function() {
                const isChecked = this.checked;
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
                updateSelectionUI();
            });

            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = this.checked;
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
                mainCheckbox.checked = isChecked;
                updateSelectionUI();
            });

            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectionUI);
            });

            clearSelectionBtn.addEventListener('click', function() {
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                mainCheckbox.checked = false;
                selectAllCheckbox.checked = false;
                updateSelectionUI();
            });

            deleteSelectedBtn.addEventListener('click', function() {
                const checkedBoxes = document.querySelectorAll('.item-checkbox:checked');
                if (checkedBoxes.length === 0) {
                    alert('Pilih setidaknya satu item untuk dihapus');
                    return;
                }

                const itemNames = Array.from(checkedBoxes).map(cb => {
                    const row = cb.closest('tr');
                    return row.querySelector('td:nth-child(3) .font-medium').textContent;
                });

                if (confirm(
                        `Apakah Anda yakin ingin menghapus ${checkedBoxes.length} kelas berikut?\n\n${itemNames.join('\n')}`
                    )) {
                    bulkDeleteForm.submit();
                }
            });

            updateSelectionUI();
        });

        // ======================= DETAIL VIEW MODAL FUNCTIONS =======================
        function showDetailModal(id, nama, wali, ketua, kursi, meja, gambar) {
            // Set data ke modal
            document.getElementById('detailNama').textContent = nama || '-';
            document.getElementById('detailWali').textContent = wali || '-';
            document.getElementById('detailKetua').textContent = ketua || '-';
            document.getElementById('detailKursi').textContent = kursi || '0';
            document.getElementById('detailMeja').textContent = meja || '0';

            // Set link edit
            document.getElementById('editBtn').href = `/kelas/${id}/edit`;

            // Handle gambar
            const gambarContainer = document.getElementById('detailGambarContainer');
            const gambarElement = document.getElementById('detailGambar');
            const noImageMessage = document.getElementById('noImageMessage');

            if (gambar) {
                gambarElement.src = `{{ url('upload_gambar') }}/${gambar}`;
                gambarElement.classList.remove('hidden');
                noImageMessage.classList.add('hidden');
                gambarElement.onclick = () => openImageModal(`{{ url('upload_gambar') }}/${gambar}`, nama);
            } else {
                gambarElement.classList.add('hidden');
                noImageMessage.classList.remove('hidden');
            }

            // Tampilkan modal
            document.getElementById('detailModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // ======================= IMAGE MODAL FUNCTIONS =======================
        function openImageModal(imageSrc, title) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('modalTitle').textContent = title || 'Preview Gambar';
            document.getElementById('imageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // ======================= UTILITY FUNCTIONS =======================
        function confirmDelete(className) {
            return confirm(`Apakah Anda yakin ingin menghapus kelas "${className}"?`);
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
                closeDetailModal();
            }
        });

        // Close modal on background click
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
        });

        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target.id === 'detailModal') {
                closeDetailModal();
            }
        });
        setTimeout(() => {
            document.querySelector('.fixed.bottom-4').style.display = 'none';
        }, 5000);
    </script>
</body>

</html>
