<div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3 mb-6 e">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="mt-3 rounded-t-2xl">
                                <h5 class="dark:text-white"><b>Add New User</b></h5>
                                <p>Insert all of the data about user below!</p>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="mx-6">
                                <a class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 leading-pro text-size-xs bg-gradient-fuchsia hover:shadow-soft-2xl hover:scale-102" href="{{ url('user-management') }}">Back To List</a>
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
                    <form wire:submit.prevent="add_user">
                        <div class="flex flex-wrap -mx-6">
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Nama</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="nama" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan Nama User..." name="nama" aria-label="Nama" aria-describedby="nama-addon" pattern=".{3,}" required title="minimum 3 characters" autofocus />
                                        @error('nama')
                                        {{-- <p class="text-size-sm text-red-500">{{ $message }}</p> --}}
                                        @enderror
                                    </div>
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">NIK</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="nik" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan NIK User..." name="nik" aria-label="NIK" aria-describedby="nik-addon" pattern=".{16,}" maxlength="16" required title="must 16 digit numbers" />
                                        @error('nik')
                                        {{-- <p class="text-size-sm text-red-500">{{ $message }}</p> --}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">E-Mail</h6>
                                    <div class="mb-4">
                                        <input wire:model.lazy="email" type="email" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan E-Mail User..." name="email" aria-label="Email" aria-describedby="email-addon" required />
                                        @error('email')
                                        {{-- <p class="text-size-sm text-red-500">{{ $message }}</p> --}}
                                        @enderror
                                    </div>
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Divisi</h6>
                                    <div class="mb-4">
                                        <select wire:model.lazy="divisi" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Pilih Divisi User..." name="divisi" aria-label="Divisi" aria-describedby="divisi-addon" required>
                                            <option disabled selected value="">Pilih Divisi User...</option>
                                            @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->nama_divisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('divisi') <p class="text-size-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="max-w-full px-3 w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Role</h6>
                                    <div class="mb-4">
                                        @if(auth()->user()->role_user == 'Super Admin')
                                            <select wire:model.lazy="role" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Pilih Role User..." name="role" aria-label="Role" aria-describedby="role-addon" required>
                                                <option disabled selected value="">Pilih Role User...</option>
                                                <option value="Super Admin">
                                                    Super Admin
                                                </option>
                                                <option value="Admin">
                                                    Admin
                                                </option>
                                                <option value="Karyawan">
                                                    Karyawan
                                                </option>
                                            </select>
                                        @endif
                                        @if(auth()->user()->role_user == 'Admin')
                                            <input wire:model.lazy="role" type="role" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="role"
                                            value="Karyawan" aria-label="Role" aria-describedby="role-addon" required readonly/>
                                        @endif
                                        @error('role') <p class="text-size-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flow-root">
                            <button type="submit" class="float-right inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white">Add User</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function alertClose() {
            document.getElementById("alert").style.display = "none";
        }
    </script>

</div>