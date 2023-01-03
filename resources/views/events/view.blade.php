<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <strong>{{ $event->name }}</strong>
                </div>
                <div class="p-6">
                    <h2 class="bold">Teams</h2>
                    <table class="text-left">
                        <thead>
                        <tr>
                            <th class="pr-8">Name</th>
                            <th class="pr-8">Members</th>
                            <th class="pr-8">Collected</th>
                            <th class="pr-8"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($event->teamsByDonation()->get() as $team)
                            <tr  class="p-2 rounded-lg relative  max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap bg-gray-100">
                                <td  class="px-4 py-2">
                                    <a href="{{ route('team.view', $team->slug) }}">
                                    {{$team->name}}
                                    </a>
                                </td>
                                <td  class="px-4 py-2">{{$team->members()->count()}} - {{$team->event_id}}</td>
                                <td  class="px-4 py-2">$ {{ number_format($team->amount, 2)}}</td>
                                <td  class="px-4 py-2">{{ number_format(($team->amount * 100) / $team->members()->sum('goal'), 2) }} %</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <hr>
                <div class="p-6">
                    <h2>Users</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Donations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($event->usersByDonation()->limit(25)->get() as $user)
                            <tr class="p-2 rounded-lg relative  max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap bg-gray-100">
                               <td class="py-2 px-8">
                                   {{$user->user->name}}
                               </td>
                                <td>$ {{ number_format($user->amount, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>           <hr>
                <div class="p-6">
                    <h2>Donations</h2>
                    <table class="table table-bordered text-left">
                        <thead>
                        <tr>
                            <th class="py-2 px-8">Donor</th>
                            <th class="py-2 px-8">User</th>
                            <th class="py-2 px-8">Amount</th>
                            <th class="py-2 px-8">Message</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($event->donations()->orderBy('amount', 'desc')->limit(25)->get() as $donation)
                            <tr class="p-2 rounded-lg relative  max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap bg-gray-100">
                                <td class="py-2 px-8">{{$donation->from_name}}</td>
                                <td class="py-2 px-8">{{$donation->user->name}}</td>
                                <td class="py-2 px-8">${{ number_format($donation->amount, 2)}}</td>
                                <td class="py-2 px-8 overflow-hidden text-break whitespace-nowrap w-4">{{$donation->message}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>           <hr>
                <div class="p-6">
                    <h2>Volunteers</h2>
                    <ul>
                        @foreach($event->volunteers()->limit(25)->get() as $volunteer)
                            <li class="p-2 rounded-lg relative block max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap bg-gray-100">
                                    {{$volunteer->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
