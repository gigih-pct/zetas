<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Terpusat | Zetas Build & Construct</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F5F5F7] font-sans text-black antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="mb-8 scale-110">
            <a href="/" class="flex flex-col items-center gap-3">
                <div class="w-16 h-16 bg-construction-black flex items-center justify-center font-black text-construction-yellow text-3xl rounded-xl shadow-apple">
                    Z
                </div>
                <div class="text-center">
                    <h2 class="font-extrabold text-xl leading-tight tracking-tight text-black">ZETAS</h2>
                    <p class="text-[9px] font-bold text-black/40 uppercase tracking-[0.3em]">Build & Construct</p>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-12 py-14 bg-white border border-black/[0.05] rounded-[40px] shadow-heavy relative overflow-hidden">
            <!-- CAT-Style Industrial Border Accent -->
            <div class="absolute top-0 left-0 w-full h-2 bg-construction-yellow"></div>
            
            {{ $slot }}
        </div>
        
        <div class="mt-12 text-black/20 text-[10px] font-extrabold uppercase tracking-[0.4em]">
            Secure Infrastructure Access
        </div>
    </div>
</body>
</html>
