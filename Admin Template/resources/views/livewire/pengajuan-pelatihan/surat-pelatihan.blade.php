<div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3 mb-6 e">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="mx-6">
                        <a class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 leading-pro text-size-xs bg-gradient-fuchsia hover:shadow-soft-2xl hover:scale-102" href="{{ url('history') }}">Back To List</a>
                    </div>
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1 lg:flex-none">
                            <div style="margin-left: 20px;">
                                <div style="background-color: #ffffff; color: black; width: 210mm; height: 297mm; border: 1px solid #ccc; padding: 60px; display: center; justify-content: center;">
                                    <div style="margin-top: 20px;  font-family: Times New Roman, Times, serif; ">
                                        <div style="text-align: right; float: right;">
                                            <img src="https://dtptkp-fe-dtptkp-dev.apps-okd-1-maas.playcourt.id/assets/logo.svg" alt="Logo Perusahaan" style="width: 180px;">
                                        </div>


                                        <div style="clear: both;"></div>
                                        <div style="text-align: center; margin: 30px;">
                                            <p style="margin: 20px; font-size: 20px; font-weight: bold;">Surat Persetujuan Pelatihan</p>
                                        </div>
                                        <p style="font-weight: bold;">No. {{ sprintf("%03d", $surat->nomer_surat)  }}/{{ date("d-m-Y", strtotime($pengajuan->tanggal_verifikasi)) }}</p>
                                        <p style="margin-top: 30px; text-align: justify;">
                                            Dengan hormat,<br><br>
                                            Sehubungan dengan pengajuan pelatihan karyawan yang diajukan oleh karyawan <b>{{ $karyawan->nama_user }}</b> dari <b>Divisi {{ $div_karyawan->nama_divisi }}</b>, kami memberikan persetujuan untuk melaksanakan pelatihan tersebut.<br><br>
                                            Dengan ini kami persilahkan kepada karyawan yang bersangkutan untuk melaksanakan pelatihan dengan rincian sebagai berikut :
                                        </p>
                                        <table style="margin-top: 20px; margin-left: 30px;">
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
                                        </table>
                                        <p style="margin-top: 20px; text-align: justify;">Demikianlah surat ini kami sampaikan sebagai tindak lanjut dari pengajuan pelatihan karyawan. Atas perhatian dan kerjasamanya kami ucapkan terimakasih</p>
                                        <p style="margin-top: 60px;font-weight: bold;">Hormat kami,</p>
                                        <!-- <div style="text-align: left; margin-top: 20px;">
                                            <img src="qr_code.png" alt="QR Code">
                                            
                                        </div> -->
                                        
                                            {!! QrCode::size(100)->generate(route('qr-info', ['id' => $pengajuan->id])); !!}
                                            {{-- {!! QrCode::size(100)->generate($admin->nama_user); !!} --}}
                                        <p style="margin-top: 10px; font-weight: bold; text-decoration: underline;">{{ $admin->nama_user }}</p>
                                        <p style="font-weight: bold;"> {{ $div_admin->nama_divisi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flow-root">
                  
                        <form action="{{ route('download-pdf') }}" method="POST" style="display: inline;" target="" class="ml-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pengajuan->id }}" class="mr-3">
                            <!-- Add other form fields here -->
                            <!-- <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button> -->
                            <button type="submit" style="margin-left: 20px;" class=" fas fa-download inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white" onclick="return confirm('Apakah Anda yakin ingin mendownload file pengajuan pelatihan ini?')"> Download Surat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function alertClose() {
            document.getElementById("alert").style.display = "none";
        }
    </script>

</div>