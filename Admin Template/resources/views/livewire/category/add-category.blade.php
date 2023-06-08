<div>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3 mb-6 e">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto py-4 px-8">
                    <div class="flex flex-wrap -mx-6">
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="mt-3 rounded-t-2xl">
                                <h5 class="dark:text-white"><b>Add New Category</b></h5>
                                <p>Create new category with specific description of the category!</p>
                            </div>
                        </div>
                        <div class="max-w-full px-3 w-1/2 lg:flex-none">
                            <div class="mx-6">
                                <a class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 leading-pro text-size-xs bg-gradient-fuchsia hover:shadow-soft-2xl hover:scale-102" href="{{ url('category-management') }}">Back To List</a>
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
                    <form wire:submit.prevent="add_category">
                        <div class="-mx-6 px-3">
                            <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Nama Kategori</h6>
                            <div class="mb-4">
                                <input wire:model.lazy="nama_kategori" type="text" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan nama kategori..." name="nama_kategori" aria-label="Nama Kategori" aria-describedby="nama_kategori-addon" required autofocus />
                                @error('nama_kategori') <p class="text-size-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <h6 class="font-bold leading-tight uppercase text-size-xs text-slate-500">Deskripsi Kategori</h6>

                            <div class="mb-4">
                                <textarea wire:model.lazy="deskripsi_kategori" rows="4" class="text-size-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Masukkan deskripsi kategori..." id="user-about" required>  </textarea>
                                @error('deskripsi_kategori') <p class="text-size-sm text-red-500">{{ $message }}</p> @enderror


                            </div>
                        </div>

                        <div class="flow-root">
                            <button type="submit" class="float-right inline-block mr-6 px-6 py-3 mt-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white">Add Category</button>
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