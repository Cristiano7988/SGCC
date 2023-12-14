<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SGCC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="152" height="39" fill="none"><path fill="#EF3B2D" d="M11.54 38.94c-3.58 0-6.24-.79-7.98-2.37C1.84 34.97.92 32.46.8 29.04c-.02-.48.11-.86.39-1.14.3-.3.69-.45 1.17-.45s.86.14 1.14.42c.28.28.44.66.48 1.14.08 2.52.68 4.28 1.8 5.28s3.04 1.5 5.76 1.5h8.64c2.84 0 4.81-.55 5.91-1.65 1.12-1.12 1.68-3.08 1.68-5.88 0-2.84-.56-4.81-1.68-5.91-1.1-1.12-3.07-1.68-5.91-1.68h-8.22c-3.52 0-6.1-.82-7.74-2.46C2.58 16.57 1.76 14 1.76 10.5s.81-6.07 2.43-7.71C5.83 1.15 8.4.33 11.9.33h8.4c3.36 0 5.85.75 7.47 2.25 1.64 1.5 2.52 3.86 2.64 7.08.04.48-.09.87-.39 1.17-.28.28-.67.42-1.17.42-.46 0-.83-.14-1.11-.42-.28-.28-.44-.66-.48-1.14-.08-2.3-.64-3.91-1.68-4.83-1.04-.92-2.8-1.38-5.28-1.38h-8.4c-2.62 0-4.44.52-5.46 1.56-1.02 1.02-1.53 2.84-1.53 5.46s.51 4.45 1.53 5.49c1.04 1.02 2.88 1.53 5.52 1.53h8.22c3.72 0 6.44.87 8.16 2.61 1.72 1.72 2.58 4.43 2.58 8.13 0 3.7-.86 6.41-2.58 8.13-1.72 1.7-4.44 2.55-8.16 2.55h-8.64Zm41.497.06c-4.34 0-7.51-1-9.51-3s-3-5.17-3-9.51V12.84c0-4.38.99-7.56 2.97-9.54 2-1.98 5.16-2.97 9.48-2.97h7.26c3.68 0 6.42.77 8.22 2.31 1.8 1.52 2.79 3.97 2.97 7.35.06.54-.05.95-.33 1.23-.26.28-.65.42-1.17.42-1 0-1.55-.53-1.65-1.59-.14-2.48-.82-4.19-2.04-5.13-1.22-.96-3.22-1.44-6-1.44h-7.26c-2.3 0-4.13.3-5.49.9-1.36.58-2.34 1.56-2.94 2.94-.58 1.36-.87 3.2-.87 5.52v13.65c0 2.32.3 4.16.9 5.52.6 1.36 1.58 2.34 2.94 2.94 1.36.6 3.2.9 5.52.9h7.2c2.04 0 3.65-.25 4.83-.75 1.2-.5 2.05-1.34 2.55-2.52s.75-2.81.75-4.89v-3.75l-6.57-.06c-1.04 0-1.56-.53-1.56-1.59 0-1.04.52-1.56 1.56-1.56l8.16.06c1.04 0 1.56.52 1.56 1.56v5.34c0 3.96-.89 6.84-2.67 8.64-1.78 1.78-4.65 2.67-8.61 2.67h-7.2Zm39.96 0c-4.34 0-7.51-1-9.51-3s-3-5.17-3-9.51V12.84c0-4.38.99-7.56 2.97-9.54 2-1.98 5.16-2.97 9.48-2.97h7.261c3.68 0 6.42.77 8.22 2.31 1.8 1.52 2.79 3.97 2.97 7.35.06.54-.05.95-.33 1.23-.26.28-.65.42-1.17.42-1 0-1.55-.53-1.65-1.59-.14-2.48-.82-4.19-2.04-5.13-1.22-.96-3.22-1.44-6-1.44h-7.26c-2.3 0-4.13.3-5.49.9-1.36.58-2.34 1.56-2.94 2.94-.58 1.36-.87 3.2-.87 5.52v13.65c0 2.32.3 4.16.9 5.52.6 1.36 1.58 2.34 2.94 2.94 1.36.6 3.2.9 5.52.9h7.2c2.78 0 4.78-.47 6-1.41 1.22-.96 1.9-2.68 2.04-5.16.1-1.06.65-1.59 1.65-1.59.52 0 .91.15 1.17.45.28.28.39.68.33 1.2-.18 3.38-1.17 5.84-2.97 7.38-1.8 1.52-4.54 2.28-8.22 2.28h-7.2Zm39.903 0c-4.34 0-7.51-1-9.51-3s-3-5.17-3-9.51V12.84c0-4.38.99-7.56 2.97-9.54 2-1.98 5.16-2.97 9.48-2.97h7.26c3.68 0 6.42.77 8.22 2.31 1.8 1.52 2.79 3.97 2.97 7.35.06.54-.05.95-.33 1.23-.26.28-.65.42-1.17.42-1 0-1.55-.53-1.65-1.59-.14-2.48-.82-4.19-2.04-5.13-1.22-.96-3.22-1.44-6-1.44h-7.26c-2.3 0-4.13.3-5.49.9-1.36.58-2.34 1.56-2.94 2.94-.58 1.36-.87 3.2-.87 5.52v13.65c0 2.32.3 4.16.9 5.52.6 1.36 1.58 2.34 2.94 2.94 1.36.6 3.2.9 5.52.9h7.2c2.78 0 4.78-.47 6-1.41 1.22-.96 1.9-2.68 2.04-5.16.1-1.06.65-1.59 1.65-1.59.52 0 .91.15 1.17.45.28.28.39.68.33 1.2-.18 3.38-1.17 5.84-2.97 7.38-1.8 1.52-4.54 2.28-8.22 2.28h-7.2Z"/></svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                            <svg style="fill: #a0aec0;" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="30" viewBox="0 0 31.445 31.445"><path d="M7.592 16.86c-1.77 0-3.203 1.434-3.203 3.204a3.203 3.203 0 1 0 3.203-3.204zm0 4.172c-.532 0-.968-.434-.968-.967s.436-.967.968-.967a.968.968 0 0 1 0 1.934z"/><path d="m30.915 17.439-.524-4.262a1.57 1.57 0 0 0-1.643-1.373l-1.148.064-3.564-3.211a1.865 1.865 0 0 0-1.249-.479l-7.241-.001a7.133 7.133 0 0 0-4.468 1.573l-4.04 3.246-5.433 1.358a1.568 1.568 0 0 0-1.188 1.521v1.566a.415.415 0 0 0-.417.415v2.071c0 .295.239.534.534.534h3.067c-.013-.133-.04-.26-.04-.396 0-2.227 1.804-4.029 4.03-4.029s4.029 1.802 4.029 4.029c0 .137-.028.264-.041.396h8.493c-.012-.133-.039-.26-.039-.396a4.028 4.028 0 1 1 8.057 0c0 .137-.026.264-.04.396h2.861a.533.533 0 0 0 .533-.534v-1.953a.528.528 0 0 0-.529-.535zm-10.747-5.237-10.102.511L12 11.158a5.911 5.911 0 0 1 3.706-1.305h4.462v2.349zm1.678-.085V9.854h.657c.228 0 .447.084.616.237l2.062 1.856-3.335.17z"/><path d="M24.064 16.86c-1.77 0-3.203 1.434-3.203 3.204a3.203 3.203 0 1 0 3.203-3.204zm0 4.172c-.533 0-.967-.434-.967-.967s.434-.967.967-.967c.531 0 .967.434.967.967s-.435.967-.967.967z"/></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ route('list-carros') }}" class="underline text-gray-900 dark:text-white">Carros</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <p>Explore nossa coleção única de carros através do nosso novo sistema de gerenciamento. Clique agora para descobrir a excelência em quatro rodas: <a href="{{ route('list-carros') }}"><b>Explore Agora</b></a>.</p>
                                <p>Encontre o carro perfeito para você!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
