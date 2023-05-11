<div class="flex flex-wrap -mx-3">

    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex items-center justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h5><b>All Users</b></h5>
                    <p>Here you can manage users.</p>
                </div>

                <div class="my-auto ml-auto pr-6">
                    <a class="float-right inline-block px-6 py-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-150 bg-x-25 leading-pro text-size-xs bg-gradient-fuchsia hover:shadow-soft-2xl hover:scale-102" href="{{ url('/add-user') }}">+&nbsp;Add New User</a>
                </div>
            </div>

            @if (Session::has('status'))

            <div id="alert" class="relative p-4 pr-12 my-4 mx-6 text-white border border-solid rounded-lg bg-gradient-dark-gray border-slate-100">
                {{ Session::get('status') }}
                <button type="button" onclick="alertClose()" class="box-content absolute top-0 right-0 p-2 text-white bg-transparent border-0 rounded w-4-em h-4-em text-size-sm z-2">
                    <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
                </button>
            </div>

            @endif

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Name</th>

                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Division</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Email</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Role</th>

                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Creation Date</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = $range * 10 - 10 + 1; ?>
                            @foreach ($users as $index => $user)
                            @if($index >= $range * 10 - 10 && $index < $range * 10 && auth()->user()->id != $user->id)
                            <tr>
                                <td class="pl-6 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $number }}</p>
                                </td>

                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $user->nama_user }}</p>
                                </td>

                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">
                                        <?php foreach($divisi as $d)
                                        {
                                            if($d->id == $user->id_divisi)
                                            {
                                                echo $d->nama_divisi;
                                            }
                                        } ?>
                                    </p>
                                </td>

                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $user->email }}</p>
                                </td>

                                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $user->role_user }}</p>
                                </td>

                                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ date('Y-m-d', $user->created_at->timestamp) }}</p>
                                </td>

                                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-base">
                                    <form action="{{ route('update-user') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}" class="mr-3">
                                        <!-- Add other form fields here -->
                                        <button type="submit"><i class="fas fa-user-edit" aria-hidden="true"></i></button>
                                    </form>
                                    <form action="{{ route('delete-user') }}" method="POST" style="display: inline;" class="ml-3">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <!-- Add other form fields here -->
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus User {{ $user->name }}?')"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                    </p>
                                </td>
                            </tr>
                            <?php $number += 1; ?>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-center">
                <form action="{{ url('user-management') }}">
                    <input type="hidden" name="range" value="{{ $range - 1 }}">
                    <button {{ $range != 1 ? '' : 'disabled' }}><h4><i class="fas fa-angle-left"></i></h4></button>
                </form>
                <span style="pointer-events: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <h6 style="pointer-events: none;">{{ $range }}</h6>
                <span style="pointer-events: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <form action="{{ url('user-management') }}">
                    <input type="hidden" name="range" value="{{ $range + 1 }}">
                    <button {{ count($users) > $range * 10 ? '' : 'disabled' }}><h4><i class="fas fa-angle-right"></i></h4></button>
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