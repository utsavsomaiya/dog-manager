<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form
            method="POST"
            action="{{ route('dogs.store') }}"
        >
            @csrf

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    placeholder="Enter Name"
                    value="{{ old('name') }}"
                    required
                />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="breed" :value="__('Breed')" />

                <select
                    id="breed"
                    name="breed"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                >
                    <option value="">Select a Breed</option>
                    @foreach (App\Enums\Breed::values() as $value)
                        <option value="{{ $value }}" @selected(old('breed') === $value)>{{ $value }}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('breed')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="birth-year" :value="__('Birth Year')" />

                <x-text-input
                    id="birth-year"
                    class="block mt-1 w-full"
                    type="number"
                    name="birth_year"
                    placeholder="Enter Birth Year"
                    value="{{ old('birth_year') }}"
                    required
                />

                <x-input-error :messages="$errors->get('birth_year')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4">Submit</x-primary-button>
        </form>
    </div>
</x-app-layout>
