@extends('admin.layouts.app')

@section('title', 'Gestion des Paiements')

@section('content')
<div class="container mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold">Gestion des Paiements</h2>
            <p class="text-gray-600 text-sm mt-1">{{ $payments->total() ?? 0 }} paiement(s) au total</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-full">
                    <i class="fas fa-wallet text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-gray-600 text-sm">Total des Paiements</p>
                    <p class="text-lg font-semibold">{{ $totalPayments ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-full">
                    <i class="fas fa-coins text-green-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-gray-600 text-sm">Montant Total</p>
                    <p class="text-lg font-semibold text-green-600">{{ number_format($totalAmount ?? 0, 0) }} XOF</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-full">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-gray-600 text-sm">Paiements Réussis</p>
                    <p class="text-lg font-semibold">{{ $completedPayments ?? 0 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-full">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-gray-600 text-sm">En Attente</p>
                    <p class="text-lg font-semibold">{{ $pendingPayments ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Utilisateur
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Montant
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Méthode
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID Transaction
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date Paiement
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Durée Accès
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date Expiration
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Statut
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($payments as $payment)
                    <tr class="hover:bg-gray-50">
                        <!-- Utilisateur -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center">
                                        <span class="text-sm font-medium text-white">
                                            {{ strtoupper(substr($payment->user->name ?? 'N', 0, 2)) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $payment->user->name ?? 'N/A' }}</div>
                                    <div class="text-sm text-gray-500">
                                        <a href="mailto:{{ $payment->user->email }}" class="text-blue-600 hover:underline">
                                            {{ $payment->user->email ?? 'N/A' }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Montant -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">{{ number_format($payment->amount ?? 0, 0) }} {{ $payment->currency ?? 'XOF' }}</div>
                        </td>

                        <!-- Méthode -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-credit-card mr-1"></i>
                                {{ $payment->payment_method ?? 'N/A' }}
                            </span>
                        </td>

                        <!-- Transaction ID -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono text-xs">
                            {{ Str::limit($payment->transaction_id ?? 'N/A', 15) }}
                        </td>

                        <!-- Date Paiement -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div>{{ $payment->user->paid_at ? $payment->user->paid_at->format('d/m/Y') : 'N/A' }}</div>
                            <div class="text-xs">{{ $payment->user->paid_at ? $payment->user->paid_at->format('H:i') : '' }}</div>
                        </td>

                        <!-- Durée Accès -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ $payment->user->subscription_months ?? 0 }} mois
                            </span>
                        </td>

                        <!-- Date Expiration -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($payment->user->payment_expires_at)
                                <div>
                                    <div class="{{ $payment->user->payment_expires_at->isPast() ? 'text-red-600' : 'text-green-600' }} font-medium">
                                        {{ $payment->user->payment_expires_at->format('d/m/Y') }}
                                    </div>
                                    <div class="text-xs {{ $payment->user->payment_expires_at->isPast() ? 'text-red-500' : 'text-gray-500' }}">
                                        @if($payment->user->payment_expires_at->isPast())
                                            <i class="fas fa-exclamation-triangle mr-1"></i>Expiré
                                        @else
                                            {{ $payment->user->getDaysUntilExpiry() }} jour(s) restant(s)
                                        @endif
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-500">N/A</span>
                            @endif
                        </td>

                        <!-- Statut -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($payment->user->has_active_subscription)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Actif
                                </span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Inactif
                                </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.users.details', $payment->user_id) }}" 
                               class="text-indigo-600 hover:text-indigo-900" 
                               title="Voir les détails">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center py-6">
                                <i class="fas fa-inbox text-4xl text-gray-400 mb-3"></i>
                                <p class="text-gray-500">Aucun paiement trouvé.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $payments->links() }}
    </div>
</div>
@endsection