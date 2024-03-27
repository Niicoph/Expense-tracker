<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
     @vite('resources/css/app.css')
     @vite('resources/js/app.js')
    <title>Document</title>
</head>
<body class="h-screen md:flex md:justify-center md:items-center">
    <main class="h-screen w-full md:h-full md:w-2/4 xl:w-1/4">
        <header class="h-1/4 w-full flex justify-center items-center text-3xl">
            <h1 style="font-family: 'Krona One', sans-serif;">ExpenseTracker</h1>
        </header>
        <section class="h-2/4 w-full  flex justify-center items-center ">
            <div class="h-full w-3/4 flex flex-col justify-center items-center ">
                <form method="POST" action="{{ route('authenticate') }}" class="h-auto w-full flex flex-col justify-center items-center">
                    @csrf 
                    <input type="email" id="email" name="email" class="border border-slate-300 rounded w-full h-8 placeholder:text-sm pl-2" placeholder="email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <input type="password" id="password" name="password" class="border border-slate-300 rounded w-full h-8 mt-1 placeholder:text-sm pl-2" placeholder="password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <input type="submit" value="Log in" class="border border-slate-300  rounded-md w-full  h-8 mt-3 text-white text-md bg-blue-600   hover:border-blue-600 hover:text-blue-600 hover:bg-white transition-colors duration-300 ease-in-out">
                    @if($errors->has('error'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('error') }}</p>
                    @endif
                </form>
                
                    <div class="h-1/6 w-full flex jutify-center items-center">
                        <hr class="w-full">
                            <p class="w-2/5 flex justify-center items-center text-xs text-slate-400">OR</p>
                        <hr class="w-full">
                    </div>
                    <div class="h-1/6 w-full flex flex-col justify-center items-center">
                        <p class=" text-xs text-blue-800">  <a href=""> Forgot password?   </a>  </p>
                        <p class="text-sm mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500"> Sign up </a> </p>
                    </div>
            </div>
        </section>
        <footer class="h-1/4 w-full flex flex-col justify-center items-center">
            <h2 style="font-family: 'Krona One', sans-serif;">By @niicoph</h2>
            <p class="text-sm p-1">This site is in <strong> <a href="https://github.com/Niicoph/Expense-tracker.git">github/ExpenseTracker</a></strong></p>
        </footer>
    </main>  
</body>
</html>


