<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>

<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <p>You don't have permission for access this page</p>
                        <p>Please contact your Superadmin!</p>
                    </div>
                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                        <p>
                            <a href="{{ url()->previous() }}" class="text-cyan-600 hover:text-cyan-700"> Back to Previous &rarr; </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
