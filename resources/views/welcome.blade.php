<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - API Finanzas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-white min-h-screen flex flex-col justify-between">

    <header class="w-full max-w-7xl mx-auto p-6 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="bg-indigo-600 p-2 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-xl font-bold tracking-wide">Finanzas API</span>
        </div>
        <span class="text-xs bg-indigo-500/20 text-indigo-300 px-3 py-1 rounded-full border border-indigo-500/30">
            v1.0.0
        </span>
    </header>


    <main class="w-full max-w-4xl mx-auto px-6 text-center my-auto">
        <div class="inline-block mb-4 px-4 py-1.5 bg-emerald-500/10 text-emerald-400 text-sm font-semibold rounded-full border border-emerald-500/20">
            ● Sistema Online y Conectado
        </div>

        <h1 class="text-4xl sm:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-400 mb-6">
            Bienvenido a tu API de Finanzas
        </h1>

        <p class="text-slate-400 text-lg sm:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            Gestión inteligente de ingresos, egresos y control presupuestario 
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-left max-w-3xl mx-auto mb-10">
            <div class="bg-slate-800/60 border border-slate-700/50 p-5 rounded-xl">
                <p class="text-xs text-slate-400 uppercase font-semibold mb-1">Presupuestos</p>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/50 p-5 rounded-xl">
                <p class="text-xs text-slate-400 uppercase font-semibold mb-1">Cuentas y Métodos de Pago</p>
            </div>
            <div class="bg-slate-800/60 border border-slate-700/50 p-5 rounded-xl">
                <p class="text-xs text-slate-400 uppercase font-semibold mb-1">Transacciones</p>
            </div>
        </div>

    </main>

    <footer class="w-full text-center p-6 text-slate-500 text-sm">
        Desarrollado por Alonso Vasquez en su homelab
    </footer>

</body>
</html>