<x-app-layout>
    <form method="POST" action="{{ route('category.update', $category->slug) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-card.index>
            <x-slot name="header">
                <x-card.title :icon="'menu-button-fill'" :title="'Edit Categories'"></x-card.title>
                <div>
                    <x-button.back :href="route('category.index')"></x-button.back>
                </div>
            </x-slot>
            <x-input.1 :label="'Name'" :name="'name'" :type="'text'" :value="old('name', $category->name)"></x-input.1>
            <x-input.textarea-full :label="'Description'" :name="'description'" :type="'text'" :value="old('description', $category->description)">
            </x-input.textarea-full>
            <x-slot name="footer">
                <x-button.update></x-button.update>
                <div>
                    <x-button.back :href="route('category.index')"></x-button.back>
                </div>
            </x-slot>
        </x-card.index>
    </form>
</x-app-layout>
