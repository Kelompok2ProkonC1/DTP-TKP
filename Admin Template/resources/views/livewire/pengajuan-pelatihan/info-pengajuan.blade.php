<div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3 mb-6 e">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="mt-3 rounded-t-2xl">
                                <h5 class="dark:text-white"><b>Informasi Pengajuan Pelatihan</b></h5>
                                <p>Informasi lengkap suatu spesifik pengajuan pelatihan</p>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="mx-6">
                                <a class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 leading-pro text-size-xs bg-gradient-fuchsia hover:shadow-soft-2xl hover:scale-102" href="{{ url()->previous() }}">Back To List</a>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Nama Pengaju</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $user->nama_user }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Judul Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pelatihan->judul_pelatihan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Divisi Pengaju</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $divisi->nama_divisi }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Kategori Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $kategori->nama_kategori }}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-6 px-3">
                        <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Deskripsi Pelatihan</h6>
                        <div class="mb-4">
                            <textarea rows="4" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" readonly>{{ $pelatihan->deskripsi_pelatihan }}</textarea>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Dimulai</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pelatihan->tanggal_dimulai }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Biaya Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="Rp. {{ number_format($pelatihan->biaya_pelatihan, 0, ',', '.') }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Berakhir</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pelatihan->tanggal_berakhir }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tempat Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pelatihan->tempat_pelatihan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Bersertifikat</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="<?php echo $pelatihan->bersetifikat ? 'Ya' : 'Tidak'; ?>" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Pengajuan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pengajuan->tanggal_pengajuan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Scope Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pelatihan->scope_pelatihan }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Status Pengajuan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pengajuan->status_pengajuan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Gambar Pelatihan</h6>
                                <div class="mb-4">
                                    <!-- <div class="border border-solid py-2 px-3 bg-clip-padding bg-white border-gray-300 rounded-lg"> -->
                                    <div class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none">
                                        <a href="{{ asset('storage/images/' . $pelatihan->gambar_pelatihan) }}" target="_blank" class="text-size-sm">
                                            {{$pelatihan->gambar_pelatihan}}
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($pengajuan->tanggal_verifikasi))
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Verifikasi</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 focus:outline-none" style="cursor: auto;" value="{{ $pengajuan->tanggal_verifikasi }}" readonly />
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="flow-root">

                        <button type="button" class="float-right inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white">Download File</button>

                        <!-- <div id="myDiv" style="display: none;" class="text-center">
                            <span style="cursor: pointer;" onclick="imageClose()">Close</span>
                            <img src="{{ asset('storage/images/' . $pelatihan->gambar_pelatihan) }}" alt="Uploaded Image">
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function alertClose() {
            document.getElementById("alert").style.display = "none";
        }

        function imageOpen() {
            var div = document.getElementById('myDiv');
            div.style.display = div.style.display === 'none' ? 'block' : 'none';
        }

        function imageClose() {
            var div = document.getElementById('myDiv');
            div.style.display = 'none';
        }
    </script>

</div>