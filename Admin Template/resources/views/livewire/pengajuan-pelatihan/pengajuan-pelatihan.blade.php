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
                    </div>
                    @if (Session::has('status'))

                    <div id="alert" class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-dark-gray border-slate-100">
                        {{ Session::get('status') }}
                        <button type="button" onclick="alertClose()" class="box-content absolute top-0 right-0 p-2 text-white bg-transparent border-0 rounded w-4-em h-4-em text-size-sm z-2">
                            <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                        </button>
                    </div>

                    @endif
                    <form wire:submit.prevent="add_pengajuan_pelatihan">
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
                                        <input wire:model.lazy="judul_pelatihan" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan judul pelatihan..." name="judul_pelatihan" aria-label="Judul Pelatihan" aria-describedby="judul_pelatihan-addon" required autofocus />
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
                                        <select wire:model.lazy="id_kategori" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Pilih kategori pelatihan..." name="id_kategori" aria-label="id_kategori" aria-describedby="id_kategori-addon" required>
                                            <option disabled selected value="0">Pilih kategori pelatihan...</option>
                                            @foreach($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="-mx-6 px-3">
                            <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Deskripsi Pelatihan</h6>
                            <div class="mb-4">
                                <textarea wire:model.lazy="deskripsi_pelatihan" rows="4" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan deskripsi pelatihan..." id="deskripsi_pelatihan">  </textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-6">
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Dimulai</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="tanggal_dimulai" type="date" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="tanggal_dimulai" aria-label="Tanggal dimulai" aria-describedby="tanggal_dimulai-addon" required />
                                    </div>
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Biaya Pelatihan</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="biaya_pelatihan" type="number" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="500000" name="biaya_pelatihan" aria-label="Biaya Pelatihan" aria-describedby="biaya_pelatihan-addon" required />
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tanggal Berakhir</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="tanggal_berakhir" type="date" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="tanggal_berakhir" placeholder="Masukkan tempat pelatihan..." aria-label="Tanggal berakhir" aria-describedby="tanggal_berakhir-addon" required />
                                    </div>
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Tempat Pelatihan</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="tempat_pelatihan" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan tempat pelatihan..." name="tempat_pelatihan" aria-label="Tempat Pelatihan" aria-describedby="tempat_pelatihan-addon" required />
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Bersertifikat</h6>
                                    <div class="mb-4">
                                        <select wire:model.lazy="bersetifikat" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Apakah pelatihan bersertifikat?" name="bersetifikat" aria-label="bersetifikat" aria-describedby="bersetifikat-addon" required>
                                            <option disabled selected value="">Apakah pelatihan bersertifikat?</option>
                                            <option value="true">Ya</option>
                                            <option value="false">Tidak</option>
                                        </select>
                                    </div>
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Gambar Pelatihan</h6>
                                    <div class="mb-4">
                                        <input type="file" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Scope Pelatihan</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="scope_pelatihan" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan scope pelatihan..." name="scope_pelatihan" aria-label="Scope Pelatihan" aria-describedby="scope_pelatihan-addon" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flow-root">
                            <button type="submit" class="float-right inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white" onclick="return confirm('Apakah Anda yakin ingin mengajukan pelatihan ini?')">a j u k a n</button>
                        </div>
                    </form>
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