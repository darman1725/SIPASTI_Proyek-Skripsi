<x-app-layout>
    <x-card.nofooter>
        <x-slot name="header">
            <x-card.title :icon="'people-fill'" :title="'Users Trash'"></x-card.title>
            <div>
                <x-button.back :href="route('users.index')"></x-button.back>
            </div>
        </x-slot>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>AVATAR</th>
                    <th>Delete At</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->profile->name ?? null }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->status === 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Blocked</span>
                            @endif
                        </td>
                        <td>
                            <div class="avatar avatar-xl">
                                @if (empty($user->profile->avatar))
                                    <img src="{{ Vite::asset('public/images/faces/1.jpg') }}" alt="avatar">
                                @else
                                    <img src="{{ url('storage/avatar/' . $user->profile->avatar) }}" alt="avatar">
                                @endif
                            </div>
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($user->deleted_at)->diffForHumans() }}
                        </td>
                        <td class="text-center">
                            <x-button.restore :action="route('users.restore', $user->id)"></x-button.restore>
                            <x-button.force :action="route('users.force', $user->id)"></x-button.force>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card.nofooter>
</x-app-layout>
