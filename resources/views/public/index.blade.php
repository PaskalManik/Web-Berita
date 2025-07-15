<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div class="flex items-center">
                    <label for="tahun" class="mr-3 text-gray-700 whitespace-nowrap">Tahun Rilis:</label>
                    <select id="tahun" class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-green-500">
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="w-full max-w-lg">
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Cari berita disini..." class="border border-gray-300 rounded-md px-4 py-2 w-full focus:ring-2 focus:ring-green-500">
                        <button class="bg-green-600 text-white font-semibold px-6 py-2 rounded-md hover:bg-green-700 flex-shrink-0">CARI</button>
                    </div>
                </div>
            </div>

            @if($posts->count())
                <div class="space-y-1">
                    @foreach ($posts as $post)
                        <x-news-item-card :post="$post" />
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endif
        </div>

        <aside class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                <h3 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4">Kategori</h3>
                <div class="space-y-3">
                    @foreach (['Tanpa Kemiskinan', 'Tanpa Kelaparan', 'Kehidupan Sehat dan Sejahtera', 'Pendidikan Berkualitas', 'Kesetaraan Gender', 'Air Bersih dan Sanitasi Layak', 'Energi Bersih dan Terjangkau', 'Pekerjaan Layak dan Pertumbuhan Ekonomi', 'Industri, Inovasi dan Infrastruktur', 'Berkurangnya Kesenjangan', 'Kota dan Permukiman yang Berkelanjutan', 'Konsumsi dan Produksi yang Bertanggung Jawab', 'Penanganan Perubahan Iklim', 'Ekosistem Lautan', 'Ekosistem Darat', 'Perdamaian, Keadilan dan Kelembagaan yang Tangguh', 'Kemitraan untuk Mencapai Tujuan'] as $index => $kategori)
                        <div class="flex items-center">
                            <input id="cat{{ $index }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-600">
                            <label for="cat{{ $index }}" class="ml-3 text-sm text-gray-700">TPB {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} {{ $kategori }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</x-guest-layout>