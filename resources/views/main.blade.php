<x-app-layout>
        <div class="w-96 my-20 mx-auto p-6 bg-white shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('app/create') }}" enctype="multipart/form-data">
                @csrf
                <div class="my-3">
                    <x-label for="subject" :value="__('Subject')" />

                    <x-input id="subject" class="block mt-3 w-full" type="text" name="subject" :value="old('subject')" />
                    @error('subject')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-3">
                    <x-label for="message" :value="__('Message')" />

                    <x-textarea id="message" class="block mt-3 w-full" type="text" name="message" :value="old('message')" />
                    @error('message')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-3">
                    <x-label for="file" :value="__('File')" />

                    <x-input-file/>
                    @error('file')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-button class="block my-3">
                        {{ __('Send') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>