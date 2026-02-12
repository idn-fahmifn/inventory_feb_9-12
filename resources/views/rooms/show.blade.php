<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Detail Room') }}
            </h2>

            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-room')"
                class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-200 dark:shadow-none transition-all duration-300 transform hover:scale-105">
                + Add New
            </button>

        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-slate-950 min-h-screen transition-colors duration-500">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 ">
            <div
                class="bg-white dark:bg-slate-900 rounded-md shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden py-4 px-4">
                <h2 class="text-lg font-semibold text-slate-400 dark:text-slate-500 mb-4">Detail <span
                        class="uppercase font-bold">{{ $room->room_name }}</span></h2>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Room Name </p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $room->room_name }}</p>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Status</p>
                    <span
                        class="inline-flex items-center text-[10px] font-black uppercase tracking-widest {{ $room->status === 'available' ? 'text-emerald-500' : ($room->status === 'maintenance' ? 'text-amber-500' : 'text-rose-500') }}">
                        <span
                            class="w-2 h-2 rounded-full mr-2 animate-pulse {{ $room->status === 'available' ? 'bg-emerald-500' : ($room->status === 'maintenance' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                        {{ $room->status }}
                    </span>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Size</p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $room->size }}</p>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Room Description</p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $room->desc }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="bg-white dark:bg-slate-900 rounded-md shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="text-slate-400 dark:text-slate-500 text-[10px] uppercase tracking-[0.2em] font-black bg-slate-50/50 dark:bg-slate-800/50">
                                <th class="px-8 py-5">Room Name</th>
                                <th class="px-8 py-5">Status</th>
                                <th class="px-8 py-5 text-right">#</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                            @forelse ($rooms as $room)
                                <tr class="group hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-colors">
                                    <td class="px-8 py-6">
                                        <div class="font-bold text-slate-700 dark:text-slate-200 text-sm">
                                            {{ $room->room_name }}</div>
                                        <div class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 tracking-wider">
                                            {{ $room->size }}</div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-sm text-slate-600 dark:text-slate-400 px-3 py-1 rounded-lg">
                                            {{ $room->status }} room
                                        </span>
                                    </td>

                                    <td class="px-8 py-6 text-right">
                                        <button
                                            class="text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors mx-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="group hover:bg-blue-50/30 dark:hover:bg-blue-900/10 transition-colors">
                                    <td colspan="3" class="px-8 py-6 text-center ">
                                        <span class="text-sm text-slate-600 dark:text-slate-400 px-3 py-1 rounded-lg">
                                            Room Not Found
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('user.delete', $user->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once this account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>


</x-app-layout>
