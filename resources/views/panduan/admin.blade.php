@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header text-center">Panduan Penggunaan</h1>
		<h3 class="text-center">Sistem Inventory dan Pengajuan Barang</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<!-- .panel-heading -->
			<div class="panel-body">
				<div class="panel-group" id="accordion">
					<!-- 1 -->
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">Menu Master Data - Data Pengguna</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="">
							<div class="panel-body">
								<!-- tambah pengguna -->
								<div class="col-md-6">
									<div style="padding-top: 30px">
										<h3 class="text-center">Tambah Pengguna</h3>
										<p class="text-center">Untuk menambahkan Pengguna Sistem, Silahkan Ikuti Langkah-langkah berikut ini:</p>
										<p class="text-center">1. Klik Tombol <b>Daftarkan</b> yang berada pada Pojok Kanan Tabel</p>
										<p class="text-center">2. Maka akan muncul Tampilan seperti gambar disamping</p>
										<p class="text-center">3. Masukkan Data Pengguna</p>
										<p class="text-center">4. Jika sudah selesai, maka Klik tombol <b>Daftarkan</b></p>
									</div>
								</div>
								<div class="col-md-6" style="padding-top: 5px">
									<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-daftar-simpan.png')}}">
								</div>
								<!-- edit pengguna  -->
								<div class="col-md-6">
									<div style="padding-top: 30px">
										<h3 class="text-center">Ubah Pengguna</h3>
										<p class="text-center">Untuk mengubah data Pengguna Sistem, Silahkan Ikuti Langkah-langkah berikut ini:</p>
										<p class="text-center">1. Klik Tombol <b>Ubah</b> yang berada pada Kolom Aksi (berwarna biru)</p>
										<p class="text-center">2. Maka akan muncul tampilan seperti gambar disamping</p>
										<p class="text-center">3. Ubah Data Pengguna</p>
										<p class="text-center">4. Jika sudah selesai, maka Klik tombol <b>Ubah</b></p>
									</div>
								</div>
								<div class="col-md-6" style="padding-top: 30px">
									<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-edit-pengguna.png')}}">
								</div>
								<!-- nonaktifkan pengguna -->
								<div class="col-md-6">
									<div>
										<h3 class="text-center">Nonaktifkan Pengguna</h3>
										<p class="text-center">Pada tombol aksi ini Anda dapat menonaktifkan Hak Akses Pengguna, sehingga Pengguna tidak bisa lagi membuka Sistem ini</p>
										<p class="text-center">1. Klik Tombol <b>Nonaktifkan</b> yang berada pada Kolom Aksi (berwarna merah)</p>
										<p class="text-center">2. Maka akan muncul tampilan seperti gambar disamping</p>
										<p class="text-center">3. Jika anda Yakin untuk menonaktifkan Data Pengguna, maka Klik 'Ya'</p>
										<p class="text-center">4. Namun, jika anda tidak yakin untuk menonaktifkan Data Pengguna, maka Klik 'Tidak'</p>
										<h3 class="text-center" style="padding-top: 30px">Reset Password</h3>
										<p class="text-center">Pada tombol aksi ini Anda dapat melakukan reset password, jika pengguna lupa password saat akan masuk ke sistem. Reset Password akan mengembalikan Password menjadi sama dengan NIP pengguna</p>
										<p class="text-center">1. Klik Tombol <b>Reset Password</b> yang berada pada Kolom Aksi (berwarna orange)</p>
									</div>
								</div>
								<div class="col-md-6" style="padding-top: 60px">
									<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-nonaktifkan-pengguna.png')}}">
									<img style="width: 400px; padding-top: 100px" src="{{url('inventoriadmin/dist/css/images/panduan-reset-pengguna.png')}}">
								</div>
								<!-- reset password -->
							</div>
						</div>
					</div>
				</div>
				<!-- 2 -->
				<div class="panel panel-green">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" class="collapsed">Menu Master Data - Data Supplier</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<div class="col-md-6">
								<div>
									<p class="text-center">Menu Data Supplier adalah untuk menampilkan, menambah, mengubah sekaligus menonaktifkan Data Supplier. Berikut merupakan langkah-langkah untuk penggunaan Menu Master Data - Data Supplier</p>
									<h3 class="text-center">Tambah Supplier</h3>
									<p class="text-center">1. Klik Tombol <b>Tambahkan</b> yang berada pada Pojok Kanan Tabel</p>
									<p class="text-center">2. Maka akan muncul Tampilan seperti gambar disamping</p>
									<p class="text-center">3. Masukkan Data Supplier</p>
									<p class="text-center">4. Jika sudah selesai, maka Klik tombol <b>Tambahkan</b></p>

									<h3 class="text-center" style="padding-top: 20px">Ubah Supplier</h3>
									<p class="text-center">1. Klik Tombol <b>Ubah</b> yang berada pada Kolom Aksi (berwarna biru)</p>
									<p class="text-center">2. Maka akan muncul tampilan seperti gambar disamping</p>
									<p class="text-center">3. Ubah Data Supplier</p>
									<p class="text-center">4. Jika sudah selesai, maka Klik tombol <b>Ubah</b></p>

									<h3 class="text-center" style="padding-top: 20px">Nonaktifkan Supplier</h3>
									<p class="text-center">Pada tombol aksi ini Anda dapat menonaktifkan Hak Akses Supplier, sehingga saat melakukan pencatatan transaksi barang masuk, Data Supplier yang telah anda nonaktifkan tidak akan ditampilkan</p>
									<p class="text-center">1. Klik Tombol <b>Nonaktifkan</b> yang berada pada Kolom Aksi (berwarna merah)</p>
									<p class="text-center">2. Maka akan muncul tampilan seperti gambar disamping</p>
									<p class="text-center">3. Jika anda Yakin untuk menonaktifkan Data Supplier, maka Klik 'Ya'</p>
									<p class="text-center">4. Namun, jika anda tidak yakin untuk menonaktifkan Data Supplier, maka Klik 'Tidak'</p>
								</div>
							</div>
							<div class="col-md-6">
								<img style="width: 400px; padding-top: 50px" src="{{url('inventoriadmin/dist/css/images/panduan-tambah-supplier.png')}}">
								<img style="width: 400px; padding-top: 20px" src="{{url('inventoriadmin/dist/css/images/panduan-edit-supplier.png')}}">
								<img style="width: 400px; padding-top: 80px" src="{{url('inventoriadmin/dist/css/images/panduan-nonaktifkan-supplier.png')}}">
							</div>		
						</div>
					</div>
				</div>
				<!-- 3 -->
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="" aria-expanded="false">Menu Master Data - Data Jenis Barang (Import Data Excel)</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<!-- a -->
							<div class="col-md-6">
								<div style="padding-top: 90px">
									<p class="text-center">1. Pastikan Nama Kolom pada Data Excel Anda sesuai dengan Gambar disamping (<b>Berdasarkan Nama Jenis Barang dan Jenis Barang</b>)</p>
									<p class="text-center">2. Pastikan Penulisan Data Jenis Barang semua berhuruf KAPITAL</p>
								</div>
							</div>
							<div class="col-md-6 pull">
								<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-jenis.png')}}">
							</div>
							<!-- b -->
							<div class="col-md-6">
								<div style="padding-top: 50px">
									<p class="text-center">3. Klik <b>Telusuri</b> untuk Memasukkan Data Excel yang ada pada File Anda</p>
									<p class="text-center">4. Pilih Data Excel yang tersimpan pada Dokumen atau berkas yang berada pada Komputer Anda, kemudian klik <b>Open</b></p>
								</div>
							</div>
							<div class="col-md-6 pull">
								<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/import-open-jenis.png')}}">
							</div>
							<!-- c -->
							<div class="col-md-6">
								<div style="padding-top: 50px">
									<p class="text-center">5. Jika Nama File Data Excel anda sudah masuk, seperti gambar disamping maka Klik Tombol <b>Import</b></p>
								</div>
							</div>
							<div class="col-md-6">
								<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-import-jenis.png')}}">
							</div>
						</div>
					</div>
				</div>
				<!-- 4 -->
				<div class="panel panel-red">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed" aria-expanded="false">Menu Master Data - Data Barang (Import Data Excel)</a>
						</h4>
					</div>
					<div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<!-- a -->
							<div class="col-md-6">
								<div>
									<p class="text-center" style="color: #FF0000"><b>Pastikan terlebih dahulu Nama Jenis Barang telah terdaftar di Sistem! <a href="{{'/jenisbarang'}}">Klik Disini</a></b></p>
								</div>
								<div>
									<p class="text-center">1. Pastikan Nama Kolom pada Data Excel Anda sesuai dengan Gambar disamping (<b>Kode Barang, Nama Barang, Jenis Barang, Satuan dan Jumlah Barang</b>)</p>
									<p class="text-center">2. Pastikan Penulisan Data Barang berhufur KAPITAL diawal Kata</p>
								</div>
							</div>
							<div class="col-md-6">
								<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-excel-barang.png')}}">
							</div>
							<!-- b -->
							<div class="col-md-6" style="padding-top: 50px">
								<div>
									<p class="text-center">3. Klik <b>Telusuri</b> untuk Memasukkan Data Excel yang ada pada File Anda</p>
									<p class="text-center">4. Pilih Data Excel yang tersimpan pada Dokumen atau berkas yang berada pada Komputer Anda, kemudian klik <b>Open</b></p>
								</div>
							</div>
							<div class="col-md-6">
								<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-open-barang.png')}}">
							</div>
							<!-- c -->
							<div class="col-md-6">
								<div style="padding-top: 50px">
									<p class="text-center">5. Jika Nama File Data Excel anda sudah masuk, seperti gambar disamping maka Klik Tombol <b>Import</b></p>
								</div>
							</div>
							<div class="col-md-6">
								<img style="width: 400px;" src="{{url('inventoriadmin/dist/css/images/panduan-import-barang.png')}}">
							</div>		
						</div>
					</div>
				</div>
				<!-- 5 -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="collapsed" aria-expanded="false">Menu Barang Masuk</a>
						</h4>
					</div>
					<div id="collapseFive" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<div class="col-md-6">
								<div>
									<h3 class="text-center">Tambah Barang Masuk</h3>
									<p class="text-center">1. Klik Tombol <b>Tambahkan</b> yang berada pada Pojok Kanan Tabel</p>
									<p class="text-center">2. Maka akan muncul Tampilan seperti gambar disamping</p>
									<p class="text-center">3. Masukkan Data Barang Masuk pada tabel <b>'Tambahkan Barang Masuk'</b></p>
									<p class="text-center">4. Klik Tombol <b>Tambahkan</b></p>
									<p class="text-center">5. Maka barang yang anda isi akan masuk ke dalam daftar barang</p>
									<p class="text-center">6. Jika semua barang berada pada daftar maka klik tombol <b>Simpan</b></p>
									<p class="text-center" style="padding-top: 50px">7. Maka akan muncul tampilan seperti gambar disamping</p>
									<p class="text-center">8. Masukkan Tanggal dan Supplier pada kolom yang telah tersedia</p>
									<p class="text-center">9. Klik Tombol <b>Simpan</b></p>

									<h3 class="text-center" style="padding-top: 120px">Tampilkan Data Barang Masuk Per-Bulan/Tahun</h3>
									<p class="text-center">1. Pilih Bulan dan Tahun untuk menampilkan Data Bulan dan Tahun Data Terpilih</p>
									<p class="text-center">2. Kemudian klik tombol <b>Lihat Laporan</b></p>
								</div>
							</div>
							<div class="col-md-6" style="padding-top: 30px">
								<img style="width: 480px;" src="{{url('inventoriadmin/dist/css/images/panduan-tambah-bm.png')}}">
								<img style="width: 480px;" src="{{url('inventoriadmin/dist/css/images/panduan-tambah-bm2.png')}}">
								<img style="width: 480px;" src="{{url('inventoriadmin/dist/css/images/panduan-lihat-bm.png')}}">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
@endsection