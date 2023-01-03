<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong>{{ $user->user->name }}</strong>
                </div>
                <div class="p-6">
                    <h2 class="bold">Donations</h2>
                    <table class="text-left">
                        <thead>
                        <tr>
                            <th class="pr-8">Name</th>
                            <th class="pr-8">Email</th>
                            <th class="pr-8">Amount</th>
                            <th class="pr-8">Message</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($user->donations as $donation)
                            <tr class="p-2 rounded-lg relative  max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap bg-gray-100">
                                <td class="px-4 py-2">
                                    {{$donation->from_name}}
                                </td>
                                <td class="px-4 py-2">
                                    {{$donation->from_email}}
                                </td>
                                <td class="px-4 py-2">
                                    $ {{$donation->amount}}
                                </td>
                                <td class="px-4 py-2">
                                    {{$donation->message}}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
