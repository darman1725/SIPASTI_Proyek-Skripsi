<x-app-layout>
    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-card.index>
            <x-slot name="header">
                <x-card.title :icon="'people-fill'" :title="'Edit Users'"></x-card.title>
                <div>
                    <x-button.back :href="route('users.index')"></x-button.back>
                </div>
            </x-slot>
            <x-input.2 :label="'User Name'" :name="'username'" :type="'text'" :value="old('username', $user->username)"></x-input.2>
            <x-input.2 :label="'Email'" :name="'email'" :type="'text'" :value="old('email', $user->email)"></x-input.2>
            <div class="col-sm-6 mb-4">
                <label>Change Password</label>
                <a href="{{ route('users.password', $user->id) }}" class="btn btn-outline-primary mx-5">Change
                    Password</a>
            </div>
            <div class="col-sm-6 mb-4">
                <label>Update Profile</label>
                <a href="{{ route('profile', $user->id) }}" class="btn btn-outline-primary mx-5">Update Profile</a>
            </div>
            <x-slot name="footer">
                <x-button.update></x-button.update>
                <div>
                    <x-button.back :href="route('users.index')"></x-button.back>
                </div>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>
