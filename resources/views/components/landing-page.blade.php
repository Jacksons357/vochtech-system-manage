<div class="bg-zinc-950 text-[#1b1b18] dark:text-neutral-200 flex flex-col">

    <!-- HEADER FIXO -->
    <header class="fixed top-0 left-0 w-full z-50 backdrop-blur bg-white/80 dark:bg-black/40 border-b border-neutral-200 dark:border-neutral-800">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-lg font-semibold dark:text-neutral-100">Gestão Inteligente</h1>

            @if (Route::has('login'))
            <nav class="flex items-center gap-4 text-sm">
                @auth
                <a href="/dashboard"
                    class="px-5 py-1.5 rounded-sm border border-neutral-300 dark:border-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="px-5 py-1.5 hover:text-neutral-600 dark:hover:text-neutral-300 transition">
                    Entrar
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="px-5 py-1.5 rounded-sm border border-neutral-300 dark:border-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition">
                    Registrar
                </a>
                @endif
                @endauth
            </nav>
            @endif
        </div>
    </header>

    <main class="h-screen flex justify-between flex-col">

        <div>

            <section class="flex flex-col items-center text-center px-6 mt-28 mb-16">
                <h2 class="text-3xl lg:text-5xl font-bold mb-4 text-white">
                    Bem-vindo ao Sistema de Gestão
                </h2>

                <p class="text-white text-neutral-600 dark:text-neutral-400 max-w-xl">
                    Organize, controle e acompanhe seus processos de forma simples, rápida e eficiente.
                </p>
            </section>

            <!-- FEATURES -->
            <section class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6 mb-20">

                <div class="p-6 rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 shadow-sm">
                    <h3 class="text-xl font-semibold mb-2">Dashboard Inteligente</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Visualize dados importantes do seu negócio em um painel claro e intuitivo.
                    </p>
                </div>

                <div class="p-6 rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 shadow-sm">
                    <h3 class="text-xl font-semibold mb-2">Relatórios Exportáveis</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Gere relatórios completos e exporte facilmente para Excel.
                    </p>
                </div>

                <div class="p-6 rounded-lg border border-neutral-200 dark:border-neutral-800 bg-white dark:bg-neutral-900 shadow-sm">
                    <h3 class="text-xl font-semibold mb-2">Gerenciamento Completo</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Controle Grupos Econômicos, Bandeiras, Unidades, Colaboradores e muito mais.
                    </p>
                </div>

            </section>
        </div>

        <footer class="text-center py-6 text-white dark:text-white border-t border-neutral-200 dark:border-neutral-800">
            © {{ date('Y') }} Gestão Inteligente — Desenvolvido por Jackson Santos para o Desafio da Vochtech.
        </footer>
    </main>


</div>