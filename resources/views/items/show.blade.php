<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-200 leading-tight">
                {{ __('Detail Item') }}
            </h2>

            <div class="">
                <x-danger-button x-data=""
                    class="transition-all duration-300 transform hover:scale-105 me-2"
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-room')"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-blue-200 dark:shadow-none transition-all duration-300 transform hover:scale-105">
                    + Edit Item
                </button>
            </div>


        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-slate-950 min-h-screen transition-colors duration-500">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 ">
            <div
                class="bg-white dark:bg-slate-900 rounded-md shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden py-4 px-4">
                <h2 class="text-lg font-semibold text-slate-400 dark:text-slate-500 mb-4">Detail <span
                        class="uppercase font-bold">{{ $item->item_name }}</span></h2>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Item Name </p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $item->item_name }}</p>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Brand </p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $item->brand }}</p>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Condition</p>
                    <span
                        class="inline-flex items-center text-[10px] font-black uppercase tracking-widest {{ $item->condition === 'good' ? 'text-emerald-500' : ($item->condition === 'maintenance' ? 'text-amber-500' : 'text-rose-500') }}">
                        <span
                            class="w-2 h-2 rounded-full mr-2 animate-pulse {{ $item->condition === 'good' ? 'bg-emerald-500' : ($item->condition === 'maintenance' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                        {{ $item->condition }}
                    </span>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Stock</p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $item->stok }}</p>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Date Purchase</p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $item->date_purchase }}</p>
                </div>
                <div class="py-2">
                    <p class="font-semibold text-slate-400 dark:text-slate-500">Item Description</p>
                    <p class="text-slate-400 dark:text-slate-500">{{ $item->desc }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="bg-white dark:bg-slate-900 rounded-md shadow-sm border border-slate-100 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto flex justify-center py-4">
                    <img src="{{ asset('storage/images/items/' . $item->image) }}" class="img-fluid" width="400"
                        alt="Gambar Produk">
                </div>
            </div>
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('item.delete', $item->slug) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this room?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once this room is deleted, all of its resources and data will be permanently deleted.') }}
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

            <form method="post" action="{{ route('item.update', $item->slug) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('put')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="item_name" value="Item Name" class="dark:text-slate-400" />
                        <x-text-input id="item_name" name="item_name" type="text"
                            class="mt-1 block w-full dark:bg-slate-800 dark:border-slate-700 rounded-xl"
                            placeholder="Server" :value="old('item_name', $item->item_name)" />
                        <x-input-error :messages="$errors->get('item_name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="location" value="Location" class="dark:text-slate-400" />
                        <select id="location" name="location"
                            class="mt-1 block w-full border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm">
                            <option value="" disabled> - Choose location - </option>
                            @foreach ($rooms as $row)
                                <option value="{{ $row->id }}" @selected(old('room_id', $item->room_id == $row->id))>{{ $row->room_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />

                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="brand" value="Brand" class="dark:text-slate-400" />
                        <x-text-input id="brand" name="brand" type="text"
                            class="mt-1 block w-full dark:bg-slate-800 dark:border-slate-700 rounded-xl"
                            placeholder="ex. Rucika" :value="old('brand', $item->brand)" />
                        <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="stok" value="Stock" class="dark:text-slate-400" />
                        <x-text-input id="stok" name="stok" type="number"
                            class="mt-1 block w-full dark:bg-slate-800 dark:border-slate-700 rounded-xl"
                            placeholder="ex. Rucika" :value="old('stok', $item->stok)" />
                        <x-input-error :messages="$errors->get('stok')" class="mt-2" />
                    </div>


                </div>

                <div>
                    <x-input-label for="image" value="Image Item" class="dark:text-slate-400" />
                    <x-text-input id="image" name="image" type="file"
                        class="mt-1 block w-full rounded-xl px-2 py-8 border border-dotted"
                        placeholder="ex. Rucika" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />

                </div>

                <div>
                    <x-input-label for="date_purchase" value="Date Purchase" class="dark:text-slate-400" />
                    <x-text-input id="date_purchase" name="date_purchase" type="date"
                        class="mt-1 block w-full dark:bg-slate-800 dark:border-slate-700 rounded-xl"
                        placeholder="ex. Rucika" :value="old('date_purchase', $item->date_purchase)" />
                    <x-input-error :messages="$errors->get('date_purchase')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="condition" value="Condition" class="dark:text-slate-400" />
                    <select id="condition" name="condition"
                        class="mt-1 block w-full border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm">
                        <option disabled>Choose Condition</option>
                        <option value="{{ $item->condition }}">{{ $item->condition }}</option>
                        <option value="good">Good</option>
                        <option value="broke">Broke</option>
                        <option value="maintenance">maintenance</option>
                    </select>
                    <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="desc" value="Item Description" class="dark:text-slate-400" />
                    <textarea name="desc"
                        class="mt-1 block w-full border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm"
                        id="">{{ $item->desc }}</textarea>
                    <x-input-error :messages="$errors->get('desc')" class="mt-2" />
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
