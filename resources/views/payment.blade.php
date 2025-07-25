@extends('layouts.app')

@section('title', 'Paiement')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-2xl font-bold mb-6">Effectuer un paiement</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('payment.process') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="amount" class="block mb-1 font-semibold">Montant</label>
            <input type="number" name="amount" id="amount" min="1" step="0.01" value="{{ old('amount') }}" required
                   class="w-full border border-gray-300 rounded px-3 py-2 @error('amount') border-red-500 @enderror">
            @error('amount')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="currency" class="block mb-1 font-semibold">Devise</label>
            <select name="currency" id="currency" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('currency') border-red-500 @enderror">
                <option value="">-- Choisir une devise --</option>
                <option value="XOF" {{ old('currency') == 'XOF' ? 'selected' : '' }}>XOF</option>
                <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select>
            @error('currency')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="payment_method_nonce" class="block mb-1 font-semibold">Moyen de paiement (token)</label>
            <input type="text" name="payment_method_nonce" id="payment_method_nonce" value="{{ old('payment_method_nonce') }}" required
                   class="w-full border border-gray-300 rounded px-3 py-2 @error('payment_method_nonce') border-red-500 @enderror"
                   placeholder="Ex: token123">
            @error('payment_method_nonce')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Payer</button>
    </form>
</div>
@endsection
