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
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $user->nama_user }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Judul Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pelatihan->judul_pelatihan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Divisi Pengaju</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $divisi->nama_divisi }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Kategori Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $kategori->nama_kategori }}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-6 px-3">
                        <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Deskripsi Pelatihan</h6>
                        <div class="mb-4">
                            <textarea rows="4" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" readonly >{{ $pelatihan->deskripsi_pelatihan }}</textarea>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Dimulai</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pelatihan->tanggal_dimulai }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Biaya Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="Rp. {{ number_format($pelatihan->biaya_pelatihan, 0, ',', '.') }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Berakhir</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pelatihan->tanggal_berakhir }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tempat Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pelatihan->tempat_pelatihan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Bersertifikat</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="<?php echo $pelatihan->bersetifikat ? 'Ya' : 'Tidak'; ?>" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Pengajuan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pengajuan->tanggal_pengajuan }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Scope Pelatihan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pelatihan->scope_pelatihan }}" readonly />
                                </div>
                                <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Status Pengajuan</h6>
                                <div class="mb-4">
                                    <input type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" value="{{ $pengajuan->status_pengajuan }}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flow-root">
                        <button type="submit" class="float-right inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white" onclick="return confirm('Apakah Anda yakin ingin mendownload file pengajuan pelatihan ini?')">Download File</button>
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