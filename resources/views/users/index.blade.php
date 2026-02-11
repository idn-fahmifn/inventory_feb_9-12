<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('List Users') }}
            </h2>
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-room')"
                class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-200 dark:shadow-none transition-all duration-300 transform hover:scale-105">
                + Add New
            </button>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-slate-950 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="text-slate-400 dark:text-slate-500 text-[10px] uppercase tracking-[0.2em] font-black bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="px-8 py-5">Name & Email</th>
                                <th class="px-8 py-5">Number Of Rooms</th>
                                <th class="px-8 py-5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                            @foreach ($users as $user)
                                <tr class="group hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-colors">
                                    <td class="px-8 py-6">
                                        <div class="font-bold text-slate-700 dark:text-slate-200 text-sm">
                                            {{ $user->name }}</div>
                                        <div class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 tracking-wider">
                                            {{ $user->email }}</div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-sm text-slate-600 dark:text-slate-400 px-3 py-1 rounded-lg">
                                            {{ $user->rooms_count }} room
                                        </span>
                                    </td>

                                    <td class="px-8 py-6 text-right">
                                        <a href="{{ route('user.show', $user->id) }}"
                                            class="text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors mx-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="create-room" :show="false" focusable>
        <div class="p-8 dark:bg-slate-900">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-xl font-black text-slate-800 dark:text-white">
                        Add Users
                    </h2>
                    <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">Add new users for employee.</p>
                </div>
                <div class="p-3 rounded-2xl bg-blue-50 dark:bg-blue-900/30 text-blue-500">
                    {{-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg> --}}

                    <svg fill="rgb(239 246 255)" class="w-6 h-6" viewBox="0 0 100 100"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <circle cx="63.3" cy="47.6" r="10.7"></circle>
                            <path
                                d="M63.6,60.3h-.8A16.43,16.43,0,0,0,46.7,74.2c0,.7.2,2.4,2.7,2.4H76.6c2.5,0,2.7-1.5,2.7-2.4A15.65,15.65,0,0,0,63.6,60.3Z">
                            </path>
                            <path
                                d="M48.6,58.3c.4-.4.1-.7.1-.7h0a17.94,17.94,0,0,1-3.1-10,17.18,17.18,0,0,1,3.2-10.2.1.1,0,0,1,.1-.1,1.76,1.76,0,0,0,.4-1.1V25.4a2.15,2.15,0,0,0-2-2H22.5a2.18,2.18,0,0,0-2,2.1V71.7H40a24.12,24.12,0,0,1,8.6-13.4ZM31.6,66a2.18,2.18,0,0,1-2.1,2.1H27.4A2.18,2.18,0,0,1,25.3,66V63.9a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H27.4a2.18,2.18,0,0,1-2.1-2.1V53.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H27.4A2.18,2.18,0,0,1,25.3,45V42.9a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H27.4a2.18,2.18,0,0,1-2.1-2.1V32.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm11.9,21a2.18,2.18,0,0,1-2.1,2.1H39.3a2.18,2.18,0,0,1-2.1-2.1V53.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H39.3A2.18,2.18,0,0,1,37.2,45V42.9a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Zm0-10.5a2.18,2.18,0,0,1-2.1,2.1H39.3a2.18,2.18,0,0,1-2.1-2.1V32.4a2.18,2.18,0,0,1,2.1-2.1h2.1a2.18,2.18,0,0,1,2.1,2.1Z">
                            </path>
                        </g>
                    </svg>

                </div>
            </div>

            <form method="post" action="{{ route('user.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="name" value="Fullname" class="dark:text-slate-400" />
                        <x-text-input id="name" name="name" type="text"
                            class="mt-1 block w-full dark:bg-slate-800 dark:border-slate-700 rounded-xl"
                            placeholder="ex. Fahmi" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                    <div>
                        <x-input-label for="email" value="Email" class="dark:text-slate-400" />
                        <x-text-input id="email" name="email" type="email"
                            class="mt-1 block w-full dark:bg-slate-800 dark:border-slate-700 rounded-xl"
                            placeholder="ex. fahmi@test.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                </div>



                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" x-on:click="$dispatch('close')"
                        class="px-6 py-2.5 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-200 dark:shadow-none transition transform active:scale-95">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>
