<x-app-layout>
    <x-card.index>
        <x-slot name="header">
            <x-card.title :icon="'people-fill'" :title="'Change Password'"></x-card.title>
            <div>
                <x-button.back :href="route('users.index')"></x-button.back>
            </div>
        </x-slot>
        <div class="row">
            <div class="col-6 mb-4">
                <h5>Nama : {{ $user->name }}</h5>
            </div>
            <div class="col-6 mb-4">
                <h5>Email : {{ $user->email }}</h5>
            </div>
        </div>
        <x-input.2 :label="'Password'" :name="'password'" :type="'password'" :value="''"></x-input.2>
        <x-input.2 :label="'Confirm Password'" :name="'confpassword'" :type="'password'" :value="''"></x-input.2>
        <x-slot name="footer">
            <x-button.update></x-button.update>
            <div>
                <x-button.back :href="route('users.index')"></x-button.back>
            </div>
        </x-slot>
    </x-card.index>
</x-app-layout>
