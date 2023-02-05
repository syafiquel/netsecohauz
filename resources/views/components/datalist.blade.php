@props(['lists' => []])
@php $lists = json_decode($lists); @endphp
<input type="text" id="search" wire:model="query" list="search-results">
<datalist id="search-results">
    @foreach($lists as $item)
        <option value="{{ $item->id }}"> 
    @endforeach
</datalist>