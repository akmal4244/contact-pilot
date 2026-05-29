{{-- resources/views/contact.blade.php — Contact Form (Zero-JS Minimal) --}}
@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Hubungi Kami</h1>
            <p class="mt-2 text-gray-600">Ada pertanyaan? Isi borang di bawah. Kami akan balas dalam masa 24 jam.</p>
        </div>

        {{-- Success --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Form --}}
        <div class="bg-white shadow-lg rounded-lg p-6 sm:p-8">
            <form method="POST" action="{{ route('contact.store') }}" novalidate>
                @csrf

                {{-- Name --}}
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" maxlength="100"
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                  @error('name') border-red-300 @enderror"
                           placeholder="Nama penuh anda">
                    @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Emel <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" maxlength="150"
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                  @error('email') border-red-300 @enderror"
                           placeholder="contoh@email.com">
                    @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Phone --}}
                <div class="mb-5">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                        Telefon <span class="text-gray-400 font-normal">(pilihan)</span>
                    </label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" maxlength="20"
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                  @error('phone') border-red-300 @enderror"
                           placeholder="012-3456789">
                    @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Subject --}}
                <div class="mb-5">
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                        Subjek <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" maxlength="200"
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                  @error('subject') border-red-300 @enderror"
                           placeholder="Subjek pertanyaan">
                    @error('subject')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Message --}}
                <div class="mb-6">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                        Mesej <span class="text-red-500">*</span>
                    </label>
                    <textarea id="message" name="message" rows="5" maxlength="5000"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                                     @error('message') border-red-300 @enderror"
                              placeholder="Tulis mesej anda di sini (minimum 20 aksara)">{{ old('message') }}</textarea>
                    @error('message')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full py-3 px-4 rounded-lg text-white font-medium bg-indigo-600 hover:bg-indigo-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                    Hantar Mesej
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
