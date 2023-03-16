<x-app-layout>
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <x-card.index>
            <x-slot name="header">
                <x-card.title :icon="'people-fill'" :title="'Create Users'"></x-card.title>
                <div>
                    <x-button.back :href="route('users.index')"></x-button.back>
                </div>
            </x-slot>
            <x-input.2 :label="'User Name'" :name="'username'" :type="'text'" :value="old('username')"></x-input.2>
            <x-input.2 :label="'Email'" :name="'email'" :type="'text'" :value="old('email')"></x-input.2>
            <x-input.2 :label="'Password'" :name="'password'" :type="'password'" :value="old('password')"></x-input.2>
            <x-input.2 :label="'Confirm Password'" :name="'confpassword'" :type="'password'" :value="old('confpassword')"></x-input.2>
            <x-slot name="footer">
                <x-button.save></x-button.save>
                <div>
                    <x-button.back :href="route('users.index')"></x-button.back>
                </div>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>
