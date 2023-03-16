<x-app-layout>
    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <x-card.index :icon="'newspaper'">
            <x-slot name="header">
                <x-card.title :icon="'newspaper'" :title="'Create Post'"></x-card.title>
                <div>
                    <x-button.back :href="route('post.index')"></x-button.back>
                </div>
            </x-slot>
            <x-input.1 :label="'Title'" :name="'name'" :type="'text'" :value="old('name')"></x-input.1>
            <x-input.ckeditor :label="'Content'" :name="'content'" :type="'text'" :value="old('content', $setting->google_analytics ?? null)">
            </x-input.ckeditor>
            <x-input.image :label="'Pilih Gambar Cover'" :name="'image'" :value="old('image')"></x-input.image>
            <x-input.textarea :label="'Tag'" :name="'tag'" :type="'text'" :value="old('tag')">
            </x-input.textarea>
            <x-input.dropdown-3 :label="'Category'" :name="'category_id'">
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </x-input.dropdown-3>
            <x-input.dropdown-3 :label="'Status'" :name="'category_id'">
                <option value="1">Publish</option>
                <option value="2">Draft</option>
            </x-input.dropdown-3>
            <x-input.3 :label="'Published At'" :name="'published_at'" :type="'date'" :value="old('published_at')"></x-input.3>
            <x-slot name="footer">
                <x-button.save></x-button.save>
                <div>
                    <x-button.back :href="route('post.index')"></x-button.back>
                </div>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>
