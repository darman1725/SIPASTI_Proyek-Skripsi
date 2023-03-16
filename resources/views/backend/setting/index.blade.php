<x-app-layout>
    <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
        @csrf
        <x-card.index>
            <x-slot name="header">
                <x-card.title :icon="'wrench-adjustable-circle-fill'" :title="'Settings'"></x-card.title>
            </x-slot>
            <x-card.shadow>
                <x-slot name="header">
                    <x-card.title :icon="'exclude'" :title="'General'"></x-card.title>
                </x-slot>
                <input name="id" type="hidden" value="{{ $setting->id ?? null }}">
                <x-input.2 :label="'App Name'" :name="'app_name'" :type="'text'" :value="old('app_name', $setting->app_name ?? null)"></x-input.2>
                <x-input.2 :label="'Footer Text'" :name="'footer_text'" :type="'text'" :value="old('footer_text', $setting->footer_text ?? null)">
                </x-input.2>
            </x-card.shadow>
            <x-card.shadow>
                <x-slot name="header">
                    <x-card.title :icon="'envelope-fill'" :title="'Email'"></x-card.title>
                </x-slot>
                <x-input.1 :label="'Email '" :name="'email'" :type="'text'" :value="old('email', $setting->email ?? null)">
                </x-input.1>
            </x-card.shadow>
            <x-card.shadow>
                <x-slot name="header">
                    <x-card.title :icon="'at'" :title="'Social Profiles'"></x-card.title>
                </x-slot>
                <x-input.2 :label="'Facebook Page URL'" :name="'facebook_url'" :type="'text'" :value="old('facebook_url', $setting->facebook_url ?? null)">
                </x-input.2>
                <x-input.2 :label="'Twitter Profile URL'" :name="'twitter_url'" :type="'text'" :value="old('twitter_url', $setting->twitter_url ?? null)">
                </x-input.2>
                <x-input.2 :label="'Instagram Account URL'" :name="'instagram_url'" :type="'text'" :value="old('instagram_url', $setting->instagram_url ?? null)">
                </x-input.2>
                <x-input.2 :label="'LinkedIn URL'" :name="'linkedin_url'" :type="'text'" :value="old('linkedin_url', $setting->linkedin_url ?? null)">
                </x-input.2>
                <x-input.2 :label="'Youtube Channel URL'" :name="'youtube_url'" :type="'text'" :value="old('youtube_url', $setting->youtube_url ?? null)">
                </x-input.2>
            </x-card.shadow>
            <x-card.shadow>
                <x-slot name="header">
                    <x-card.title :icon="'globe'" :title="'Metadata'"></x-card.title>
                </x-slot>
                <x-input.2 :label="'Meta Site Name'" :name="'meta_site_name'" :type="'text'" :value="old('meta_site_name', $setting->meta_site_name ?? null)">
                </x-input.2>
                <x-input.2 :label="'Meta Description'" :name="'meta_description'" :type="'text'" :value="old('meta_description', $setting->meta_description ?? null)">
                </x-input.2>
                <x-input.2 :label="'Meta Keyword'" :name="'meta_keyword'" :type="'text'" :value="old('meta_keyword', $setting->meta_keyword ?? null)">
                </x-input.2>
                <x-input.2 :label="'Meta Image'" :name="'meta_image'" :type="'text'" :value="old('meta_image', $setting->meta_image ?? null)">
                </x-input.2>
                <x-input.2 :label="'Meta Facebook App Id'" :name="'meta_fb_app_id'" :type="'text'" :value="old('meta_fb_app_id', $setting->meta_fb_app_id ?? null)">
                </x-input.2>
                <x-input.2 :label="'Meta Twitter Site Account'" :name="'meta_twitter_site'" :type="'text'" :value="old('meta_twitter_site', $setting->meta_twitter_site ?? null)">
                </x-input.2>
                <x-input.2 :label="'Meta Twitter Creator Account'" :name="'meta_twitter_creator'" :type="'text'" :value="old('meta_twitter_creator', $setting->meta_twitter_creator ?? null)">
                </x-input.2>
            </x-card.shadow>
            <x-card.shadow>
                <x-slot name="header">
                    <x-card.title :icon="'graph-up-arrow'" :title="'Analytics'"></x-card.title>
                </x-slot>
                <x-input.textarea-full :label="'Google Analytics'" :name="'google_analytics'" :type="'text'" :value="old('google_analytics', $setting->google_analytics ?? null)">
                </x-input.textarea-full>
            </x-card.shadow>
            <x-slot name="footer">
                <x-button.update></x-button.update>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>
