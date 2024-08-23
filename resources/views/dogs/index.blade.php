<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <a
                    class="inline-flex mb-2 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    href="{{ route('dogs.create') }}"
                >
                    Create
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <table class="border-collapse table-fixed w-full text-sm">
                    <thead>
                        <tr>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Name</th>
                            <th class="border-b font-medium p-4 pt-0 pb-3 text-left">Breed</th>
                            <th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-left">Birth Year</th>
                            <th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($dogs as $dog)
                            <tr>
                                <td class="p-4 pl-8">{{ $dog->name }}</td>
                                <td class="p-4">{{ $dog->breed }}</td>
                                <td class="p-4">{{ $dog->birth_year }}</td>
                                <td class="p-4 pr-8 flex space-x-5">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('dogs.edit', $dog)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('dogs.destroy', $dog) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('dogs.destroy', $dog)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-3 font-bold">No dogs found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
