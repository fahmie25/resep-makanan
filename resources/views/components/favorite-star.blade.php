@props(['resep' => null, 'id' => null])

<?php
    $resepId = $resep->id ?? $id;

    $isFavorite = auth()->check()
        ? auth()->user()->favorites->contains($resepId)
        : false;

    $star = $isFavorite ? '★' : '☆';
    $color = $isFavorite ? '#d41c1c' : '#b6b6b6';
?>

<form action="{{ route('reseps.favorite', $resepId) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit"
            style="background:none;border:none;font-size:26px;cursor:pointer;color:{{ $color }}">
        {{ $star }}
    </button>
</form>
