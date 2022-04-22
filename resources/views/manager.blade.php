<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto mt-8 bg-white rounded-md">
        Applications @if (session('status')) <span class="ml-32">{{ session('status') }}</span> @endif
    </div>
    <div class="max-w-7xl mx-auto mt-8 bg-white">
        <div class="relative overflow-x-auto shadow-md rounded-md">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Message
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apps as $app)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $app->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $app->subject }}
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            {{ $app->message }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($app->status)
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $app->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form action="{{ route('apps.update', $app->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" <?php if ($app->status) { ?> disabled <?php } ?> class="font-medium text-blue-600 dark:text-blue-500 hover:underline disabled:text-gray-400">
                                    Replied
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>