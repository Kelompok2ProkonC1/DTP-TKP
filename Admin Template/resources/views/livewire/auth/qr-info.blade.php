{{-- @extends('layouts.app') --}}

<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="flex items-center justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h5><b>Cek Ajuan Surat</b></h5>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>ID Surat</td>
                                    <td>:</td>
                                    <td>{{ $surat->nomer_surat }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Surat</td>
                                    <td>:</td>
                                    <td>0{{ $surat->nomer_surat }}/{{ date("d-m-Y", strtotime($pengajuan->tanggal_verifikasi)) }}</td>
                                </tr>
                                <tr>
                                    <td>Judul Pelatihan</td>
                                    <td>:</td>
                                    <td>{{ $pelatihan->judul_pelatihan }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pelatihan</td>
                                    <td>:</td>
                                    <td>{{ date("d-m-Y", strtotime($pelatihan->tanggal_dimulai)) }} s/d {{ date("d-m-Y", strtotime($pelatihan->tanggal_berakhir)) }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Pelatihan</td>
                                    <td>:</td>
                                    <td>{{ $pelatihan->tempat_pelatihan }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya Pelatihan</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($pelatihan->biaya_pelatihan, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Scope Pelatihan</td>
                                    <td>:</td>
                                    <td>{{ $pelatihan->scope_pelatihan }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>Diterima</td>
                                </tr>
                                <tr>
                                    <td>Ditandatangai oleh</td>
                                    <td>:</td>
                                    <td>{{ $admin->nama_user }}</td>
                                </tr>
                                <tr>
                                    <td>Divisi</td>
                                    <td>:</td>
                                    <td>{{ $div_admin->nama_divisi }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</main>