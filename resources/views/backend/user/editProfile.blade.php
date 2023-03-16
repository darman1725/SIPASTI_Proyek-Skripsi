<x-app-layout>
    <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-card.index>
            <x-slot name="header">
                <x-card.title :icon="'people-fill'" :title="'Edit Profile'"></x-card.title>
                <div>
                    <x-button.back :href="route('users.show', $user->id)"></x-button.back>
                </div>
            </x-slot>
            <x-input.image :label="'Avatar'" :name="'avatar'" :value="$profile->avatar ?? null"></x-input.image>
            <div></div>
            <div class="col-sm-6 mb-4">
                <label>Username : {{ $user->username }}</label>
            </div>
            <div class="col-sm-6 mb-4">
                <label>Email : {{ $user->email }}</label>
            </div>
            <x-input.2 :label="'Full Name'" :name="'name'" :type="'text'" :value="old('name', $profile->name ?? null)"></x-input.2>
            <x-input.2 :label="'Mobile Phone'" :name="'mobile'" :type="'text'" :value="old('mobile', $profile->mobile ?? null)"></x-input.2>
            <x-input.dropdown :label="'Gender'" :name="'gender'">
                <option @selected('Laki-Laki' == old('gender', $profile->gender ?? null)) value="Laki-Laki">Laki-Laki</option>
                <option @selected('Perempuan' == old('gender', $profile->gender ?? null)) value="Perempuan">Perempuan</option>
            </x-input.dropdown>
            <x-input.2 :label="'Date Of Birth'" :name="'date_of_birth'" :type="'date'" :value="old('date_of_birth', $profile->date_of_birth ?? null)"></x-input.2>
            <x-input.textarea :label="'Address'" :name="'address'" :type="'text'" :value="old('address', $profile->address ?? null)">
            </x-input.textarea>
            <x-input.textarea :label="'Bio'" :name="'bio'" :type="'text'" :value="old('bio', $profile->bio ?? null)">
            </x-input.textarea>
            <x-input.2 :label="'URL Website'" :name="'url_website'" :type="'text'" :value="old('url_website', $profile->url_website ?? null)"></x-input.2>
            <x-input.2 :label="'URL Github'" :name="'url_github'" :type="'text'" :value="old('url_github', $profile->url_github ?? null)"></x-input.2>
            <x-input.4 :label="'Url Facebook'" :name="'url_facebook'" :type="'text'" :value="old('url_facebook', $profile->url_facebook ?? null)"></x-input.4>
            <x-input.4 :label="'Url Instagram'" :name="'url_twitter'" :type="'text'" :value="old('url_twitter', $profile->url_twitter ?? null)"></x-input.4>
            <x-input.4 :label="'Url Twitter'" :name="'url_instagram'" :type="'text'" :value="old('url_instagram', $profile->url_instagram ?? null)"></x-input.4>
            <x-input.4 :label="'Url Linkedin'" :name="'url_linkedin'" :type="'text'" :value="old('url_linkedin', $profile->url_linkedin ?? null)"></x-input.4>
            <x-slot name="footer">
                <x-button.update></x-button.update>
                <div>
                    <x-button.back :href="route('users.index')"></x-button.back>
                </div>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>
