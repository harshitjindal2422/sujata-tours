<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Sujata Tours</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 font-sans bg-slate-950">
    <div class="w-full max-w-md bg-white rounded-2xl p-8 shadow-2xl border border-slate-800">
        
        <div class="text-center mb-8">
            <span class="text-2xl font-black text-navy-900 tracking-tight block">SUJATA TOURS</span>
            <span class="text-xs uppercase font-bold text-slate-500 tracking-wider">Fleet and Dispatch Console</span>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-xs">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-800 rounded-lg text-xs">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold uppercase text-slate-600 mb-1">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email', 'admin@sujatatours.com') }}" required autofocus
                       class="w-full text-sm rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase text-slate-600 mb-1">Password</label>
                <input type="password" id="password" name="password" value="admin1234" required
                       class="w-full text-sm rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-navy-900 focus:ring-navy-900">
                    <span class="text-slate-600">Remember session</span>
                </label>
                <span class="text-slate-400">Default: admin1234</span>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full btn-primary py-3 text-sm font-bold shadow-md">
                    Sign In to Fleet Console
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-xs text-slate-400">
            <a href="{{ route('home') }}" class="hover:text-slate-600">&larr; Return to Public Website</a>
        </div>
    </div>
</body>
</html>
