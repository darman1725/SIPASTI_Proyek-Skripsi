<x-app-layout>
    <x-card.nofooter>
        <x-slot name="header">
            <x-card.title :icon="'people-fill'" :title="'Users'"></x-card.title>
            <div>
                <x-button.add :href="route('users.create')"></x-button.add>
                <x-button.trash :href="route('users.trash')"></x-button.trash>
            </div>
        </x-slot>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>LAST LOGIN</th>
                    <th>AVATAR</th>
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
                            @if (Cache::has('user-is-online-' . $user->id))
                                <span class="text-success">Online</span>
                            @else
                                <span class="text-secondary">Offline</span>
                                <br>
                                @if ($user->last_seen === null)
                                    <small class="text-muted">
                                        never logged in
                                    </small>
                                @else
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                    </small>
                                @endif
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
                        <td class="text-center">
                            <x-button.view :href="route('users.show', $user->id)"></x-button.view>
                            <x-button.edit :href="route('users.edit', $user->id)"></x-button.edit>
                            <x-button.password :href="route('users.password', $user->id)"></x-button.password>
                            @if ($user->status === 1)
                                <x-button.block :action="route('users.status', $user->id)"></x-button.block>
                            @else
                                <x-button.active :action="route('users.status', $user->id)"></x-button.active>
                            @endif
                            <x-button.delete :action="route('users.destroy', $user->id)"></x-button.delete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card.nofooter>
</x-app-layout>
