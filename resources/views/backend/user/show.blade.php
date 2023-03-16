<x-app-layout>
    <x-card.index>
        <x-slot name="header">
            <x-card.title :icon="'people-fill'" :title="'Profile'"></x-card.title>
            <div>
                <x-button.edit :href="route('profile.edit', $user->id)"></x-button.edit>
                <x-button.back :href="route('users.index')"></x-button.back>
            </div>
        </x-slot>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="col-sm-4"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Avatar</td>
                    <td>
                        @if (empty($user->profile->avatar))
                            <img src="{{ Vite::asset('public/images/faces/1.jpg') }}"
                                style="max-height:200px; max-width:200px;" alt="avatar">
                        @else
                            <img src="{{ url('storage/avatar/' . $user->profile->avatar) }}"
                                style="max-height:200px; max-width:200px;" alt="avatar">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td>{{ $user->profile->name ?? null }}</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Mobile Phone</td>
                    <td>{{ $user->profile->mobile ?? null }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $user->profile->gender ?? null }}</td>
                </tr>
                <tr>
                    <td>Date Of Birth</td>
                    <td>{{ $user->profile->date_of_birth ?? null }}</td>
                </tr>
                <tr>
                    <td>Url Website</td>
                    <td>{{ $user->profile->url_website ?? null }}</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td>{{ $user->profile->url_facebook ?? null }}</td>
                </tr>
                <tr>
                    <td>Twitter</td>
                    <td>{{ $user->profile->url_twitter ?? null }}</td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>{{ $user->profile->url_instagram ?? null }}</td>
                </tr>
                <tr>
                    <td>LinkedIn</td>
                    <td>{{ $user->profile->url_linkedin ?? null }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $user->profile->address ?? null }}</td>
                </tr>
                <tr>
                    <td>Bio</td>
                    <td>{{ $user->profile->bio ?? null }}</td>
                </tr>
                <tr>
                    <td>Login Count</td>
                    <td>{{ $user->login_count }}</td>
                </tr>
                <tr>
                    <td>Last Login</td>
                    <td>
                        @if (Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online

                            </span>
                        @else
                            <span class="text-secondary">Offline

                            </span>
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
                </tr>
                <tr>
                    <td>Last IP</td>
                    <td>{{ $user->last_ip }}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td> <a href="{{ route('users.password', $user->id) }}" class="btn btn-outline-primary">Change
                            Password
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if ($user->status === 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Blocked</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>
                        {{ $user->created_at->format('d F Y') }}
                        <br>
                        <small class="text-muted">({{ $user->created_at->diffForHumans() }})</small>
                    </td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>
                        {{ $user->updated_at->format('d F Y') }}
                        <br>
                        <small class="text-muted">({{ $user->updated_at->diffForHumans() }})</small>
                    </td>
                </tr>
            </tbody>
        </table>
        <x-slot name="footer">
            <div></div>
            <div>
                <x-button.back :href="route('users.index')"></x-button.back>
            </div>
        </x-slot>
    </x-card.index>
</x-app-layout>
