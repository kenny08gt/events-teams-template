<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong>{{ $team->name }}</strong>
                </div>
                <div class="p-6">
                    <h2 class="bold">Members</h2>
                    <table class="text-left">
                        <thead>
                        <tr>
                            <th class="pr-8">Name</th>
                            <th class="pr-8">Collected</th>
                            <th class="pr-8"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($team->membersByDonations()->get() as $member)
                            <tr  class="p-2 rounded-lg relative  max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap bg-gray-100">
                                <td  class="px-4 py-2">
                                    <a href="{{ route('user.public.view', $member->slug) }}">
                                        {{$member->user->name}}
                                    </a>
                                </td>
                                <td  class="px-4 py-2">$ {{ number_format($member->donations()->sum('amount'), 2)}}</td>
                                <td  class="px-4 py-2">{{ number_format(($member->donations()->sum('amount') * 100) / $member->goal, 2) }} %</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
